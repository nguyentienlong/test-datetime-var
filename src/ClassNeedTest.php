<?php

namespace LongKa;

use Carbon\Carbon;

class ClassNeedTest
{
    public function getPayoutPeriods(int $periods) : array
    {
        $periodList = [];
        $now = Carbon::now();
        $dateTo = $now->day > 15 ? Carbon::create($now->year, $now->month, 15, 23, 59, 59)->addMonth() :
            Carbon::create($now->year, $now->month, 15, 23, 59, 59);

        for ($i = 0; $i < $periods; ++$i) {
            $dateFrom = $dateTo->copy()->subMonth()->addDay(1)->setTime(0, 0, 0);
            $periodList[] = ['from' => $dateFrom, 'to' => $dateTo];
            $dateTo = $dateFrom->copy()->subDay(1)->setTime(23, 59, 59);
        }

        return $periodList;
    }
}
