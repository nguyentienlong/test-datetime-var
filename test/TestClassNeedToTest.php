<?php

namespace Test;

use LongKa\ClassNeedTest;

use Carbon\Carbon;

class TestClassNeedToTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPayoutPeriods()
    {

        $from = Carbon::create(2016, 04, 16, 00);
        $to = Carbon::create(2016, 05, 15, 23, 59, 59);

        $item = ['from' => $from, 'to' => $to];

        $expected = [ $item ];

        $today = Carbon::create(2016, 05, 11, 00);
        Carbon::setTestNow($today);

        $classNeedTest = new ClassNeedTest;


        $result = $classNeedTest->getPayoutPeriods(1);

        $this->assertTrue($expected == $result);

        Carbon::setTestNow();

    }
}
