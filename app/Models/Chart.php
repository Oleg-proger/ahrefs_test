<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chart
 * @package App\Models
 * @property int $id
 * @property string $chart
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Chart extends Model
{
    use HasFactory;

    protected $casts = [
        'chart' => 'array',
    ];

    public const JANUARY_MONTH = 'January';
    public const FEBRUARY_MONTH = 'February';
    public const MARCH_MONTH = 'March';
    public const APRIL_MONTH = 'April';
    public const MAY_MONTH = 'May';
    public const JUNE_MONTH = 'June';
    public const JULY_MONTH = 'July';
    public const AUGUST_MONTH = 'August';
    public const SEPTEMBER_MONTH = 'September';
    public const OCTOBER_MONTH = 'October';
    public const NOVEMBER_MONTH = 'November';
    public const DECEMBER_MONTH = 'December';

    public const MONTHS = [
        self::JANUARY_MONTH,
        self::FEBRUARY_MONTH,
        self::MARCH_MONTH,
        self::APRIL_MONTH,
        self::MAY_MONTH,
        self::JUNE_MONTH,
        self::JULY_MONTH,
        self::AUGUST_MONTH,
        self::SEPTEMBER_MONTH,
        self::OCTOBER_MONTH,
        self::NOVEMBER_MONTH,
        self::DECEMBER_MONTH,
    ];

    public const NOFOLLOW = 'nofollow';
    public const DOFOLLOW = 'dofollow';
}
