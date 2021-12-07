@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>    </th>
                                @foreach(\App\Models\Chart::MONTHS as $month)
                                <th id="{{$month}}">{{$month}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="nofollow">
                                <td>{{\App\Models\Chart::NOFOLLOW}}</td>
                            </tr>
                            <tr id="dofollow">
                                <td>{{\App\Models\Chart::DOFOLLOW}}</td>
                            </tr>
                        </tbody>
                        @foreach(\App\Models\Chart::MONTHS as $month)
                            <script>
                                $('<td>{{$data[$month][\App\Models\Chart::NOFOLLOW]}}</td>').appendTo('#{{\App\Models\Chart::NOFOLLOW}}');
                                $('<td>{{$data[$month][\App\Models\Chart::DOFOLLOW]}}</td>').appendTo('#{{\App\Models\Chart::DOFOLLOW}}');
                            </script>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
