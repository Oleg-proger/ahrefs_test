<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use League\Csv\Statement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function start(Request $request)
    {
        return view('start', ['id' => $request->get('id')]);
    }

    public function importFile(Request $request)
    {
        $request->validate([
            'csv' => 'required',
        ]);
        $csv = Reader::createFromPath($request->csv->path(), 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter("\t");
        $csv->setOutputBOM(Reader::BOM_UTF8);
        $csv->addStreamFilter('convert.iconv.UTF-16/UTF-8');
        $records = Statement::create()->process($csv);
        $data = [
            Chart::JANUARY_MONTH   => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::FEBRUARY_MONTH  => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::MARCH_MONTH     => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::APRIL_MONTH     => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::MAY_MONTH       => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::JUNE_MONTH      => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::JULY_MONTH      => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::AUGUST_MONTH    => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::SEPTEMBER_MONTH => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::OCTOBER_MONTH   => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::NOVEMBER_MONTH  => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
            Chart::DECEMBER_MONTH  => [
                Chart::NOFOLLOW => 0,
                Chart::DOFOLLOW => 0,
            ],
        ];
        foreach ($records->getRecords() as $record) {
            $month = Carbon::parse($record['First seen'])->getTranslatedMonthName();
            $nofollow = $record['Nofollow'] === "true" ? Chart::NOFOLLOW : Chart::DOFOLLOW;
            $data[$month][$nofollow]++;
        }
        $chart = new Chart();
        $chart->chart = $data;
        $chart->save();

        return redirect()->route('start', ['id' => $chart->id]);

    }

    public function chartData(Request $request)
    {
        $chart = Chart::query()
            ->find($request->get('id'));
        $data_nofollow = [];
        $data_dofollow = [];
        foreach (Chart::MONTHS as $month) {
            $data_nofollow[] = $chart->chart[$month][Chart::NOFOLLOW];
            $data_dofollow[] = $chart->chart[$month][Chart::DOFOLLOW];
        }
        $data = [
            'labels'   => Chart::MONTHS,
            'datasets' => [
                [
                    'label'           => 'Nofollow',
                    'backgroundСolor' => '#FF0066',
                    'data'            => $data_nofollow,
                ],
                [
                    'label'           => 'Dofollow',
                    'backgroundСolor' => '#f26202',
                    'data'            => $data_dofollow,
                ],
            ],
        ];
        return $data;
    }

    public function chartTable($id)
    {
        /** @var Chart $chart */
        $chart = Chart::query()->find($id);
        if (!$chart) {
            return view('error');
        }
        return view('table', ['data' => $chart->chart]);
    }
}
