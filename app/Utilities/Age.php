<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Collection;

class Age
{
    /**
     * AVG
     *
     * @param Collection $peoples
     * @return int|null
     */
    public static function avg(Collection $peoples): int|null
    {
        return $peoples->avg(function ($peoples) {
            return intval($peoples->age);
        });
    }

    /**
     * SUM
     *
     * @param Collection $peoples
     * @return int|null
     */
    public static function sum(Collection $peoples): int|null
    {
        return $peoples->sum(function ($people) {
            return $people->age;
        });
    }

}
