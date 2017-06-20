<?php

/**
 * Created by PhpStorm.
 * User: dvienne
 * Date: 19/06/2017
 * Time: 14:20
 */
require './vendor/autoload.php';

use \Dominiquevienne\SwissOff\Canton;

class CantonTest extends PHPUnit_Framework_TestCase {

  public function testCantonLoad()
  {
    $canton = new Canton();
    $this->assertTrue(count($canton->cantonDaysOff)==26);
    /** It's a coincidence that there is same number of cantons and days off */
    $this->assertTrue(count($canton->daysOffCanton)==26);
  }


  public function testCantonDaysOffByCantonAndTime() {
    $canton = new Canton();
    $this->assertFalse($canton->getDaysOffByCantonAndTime('AB'));
    $this->assertTrue(strtotime('2017-12-25')==$canton->getNextDayOffByCanton('VD', strtotime('2017-12-22')));
    $this->assertTrue(strtotime('2018-01-01')==$canton->getNextDayOffByCanton('FR', strtotime('2017-12-31')));
    $temp = $canton->getNextDaysOff(strtotime('2017-08-02'));
    $this->assertTrue(strtotime('2017-09-17')==$temp['ZH']);
    $this->assertTrue(strtotime('2017-08-15')==$temp['VS']);
    $temp = $canton->getNextDaysOff(strtotime('2018-03-20'));
    $this->assertTrue(strtotime('2018-04-03')==$temp['GL']);
    $this->assertTrue(strtotime('2018-03-30')==$temp['AG']);
    $this->assertTrue(strtotime('2018-05-10')==$temp['VS']);
  }


}

