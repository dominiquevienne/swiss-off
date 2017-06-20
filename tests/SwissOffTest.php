<?php

/**
 * Created by PhpStorm.
 * User: dvienne
 * Date: 19/06/2017
 * Time: 14:20
 */
require './vendor/autoload.php';

use \Dominiquevienne\SwissOff\SwissOff;

class SwissOffTest extends PHPUnit_Framework_TestCase {

  public function testSwissOffEaster()
  {
    $swissOff = new SwissOff();
    $this->assertTrue($swissOff->isEaster(1492300800));
    $this->assertTrue($swissOff->isEaster(1492300800+(4*3600)));
    $this->assertFalse($swissOff->isEaster(strtotime('2017-09-12')));
    $this->assertFalse($swissOff->isEaster(strtotime('2018-02-26')));
    $this->assertTrue($swissOff->isEaster($swissOff->getEaster()));
  }


  public function testSwissOffChristmas()
  {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isChristmas(1492300800));
    $this->assertFalse($swissOff->isChristmas(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isChristmas(strtotime('2017-12-25')));
    $this->assertTrue($swissOff->isChristmas(strtotime('2018-12-25')));
    $this->assertTrue($swissOff->isChristmas($swissOff->getChristmas()));
  }


  public function testSwissOffNewYear() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isNewYear(1492300800));
    $this->assertFalse($swissOff->isNewYear(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isNewYear(strtotime('2017-01-01')));
    $this->assertTrue($swissOff->isNewYear(strtotime('2018-01-01')));
    $this->assertTrue($swissOff->isNewYear($swissOff->getNewYear()));
  }


  public function testSwissOffBerchtold() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isBerchtold(1492300800));
    $this->assertFalse($swissOff->isBerchtold(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isBerchtold(strtotime('2017-01-02')));
    $this->assertTrue($swissOff->isBerchtold(strtotime('2018-01-02')));
    $this->assertTrue($swissOff->isBerchtold($swissOff->getBerchtold()));
  }


  public function testSwissOffEpiphany() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isEpiphany(1492300800));
    $this->assertFalse($swissOff->isEpiphany(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isEpiphany(strtotime('2017-01-06')));
    $this->assertTrue($swissOff->isEpiphany(strtotime('2018-01-06')));
    $this->assertTrue($swissOff->isEpiphany($swissOff->getEpiphany()));
  }


  public function testSwissOffRepublicDay() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isRepublicDay(1492300800));
    $this->assertFalse($swissOff->isRepublicDay(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isRepublicDay(strtotime('2017-03-01')));
    $this->assertTrue($swissOff->isRepublicDay(strtotime('2018-03-01')));
    $this->assertTrue($swissOff->isRepublicDay($swissOff->getRepublicDay()));
  }


  public function testSwissOffJoseph() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isJoseph(1492300800));
    $this->assertFalse($swissOff->isJoseph(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isJoseph(strtotime('2017-03-19')));
    $this->assertTrue($swissOff->isJoseph(strtotime('2018-03-19')));
    $this->assertTrue($swissOff->isJoseph($swissOff->getJoseph()));
  }


  public function testSwissOffNafelser() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isNafelser(1492300800));
    $this->assertFalse($swissOff->isNafelser(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isNafelser(strtotime('2017-04-03')));
    $this->assertTrue($swissOff->isNafelser(strtotime('2018-04-03')));
    $this->assertTrue($swissOff->isNafelser($swissOff->getNafelser()));
  }


  public function testSwissOffPalm() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isPalm(1492300800));
    $this->assertFalse($swissOff->isPalm(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isPalm(strtotime('2017-04-09')));
    $this->assertTrue($swissOff->isPalm(strtotime('2018-03-25')));
    $this->assertTrue($swissOff->isPalm($swissOff->getPalm()));
  }


  public function testSwissOffGoodFriday() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isGoodFriday(1492300800));
    $this->assertFalse($swissOff->isGoodFriday(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isGoodFriday(strtotime('2017-04-14')));
    $this->assertTrue($swissOff->isGoodFriday(strtotime('2018-03-30')));
    $this->assertTrue($swissOff->isGoodFriday($swissOff->getGoodFriday()));
  }


  public function testSwissOffEasterMonday() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isEasterMonday(1492300800));
    $this->assertFalse($swissOff->isEasterMonday(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isEasterMonday(strtotime('2017-04-17')));
    $this->assertTrue($swissOff->isEasterMonday(strtotime('2018-04-02')));
    $this->assertTrue($swissOff->isEasterMonday($swissOff->getEasterMonday()));
  }


  public function testSwissOffLaborDay() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isLaborDay(1492300800));
    $this->assertFalse($swissOff->isLaborDay(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isLaborDay(strtotime('2017-05-01')));
    $this->assertTrue($swissOff->isLaborDay(strtotime('2018-05-01')));
    $this->assertTrue($swissOff->isLaborDay($swissOff->getLaborDay()));
  }


  public function testSwissOffAscension() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isAscension(1492300800));
    $this->assertFalse($swissOff->isAscension(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isAscension(strtotime('2017-05-25')));
    $this->assertTrue($swissOff->isAscension(strtotime('2018-05-10')));
    $this->assertTrue($swissOff->isAscension($swissOff->getAscension()));
  }


  public function testSwissOffPentecost() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isPentecost(1492300800));
    $this->assertFalse($swissOff->isPentecost(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isPentecost(strtotime('2017-06-04')));
    $this->assertTrue($swissOff->isPentecost(strtotime('2018-05-20')));
    $this->assertTrue($swissOff->isPentecost($swissOff->getPentecost()));
  }


  public function testSwissOffWhitMonday() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isWhitMonday(1492300800));
    $this->assertFalse($swissOff->isWhitMonday(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isWhitMonday(strtotime('2017-06-05')));
    $this->assertTrue($swissOff->isWhitMonday(strtotime('2018-05-21')));
    $this->assertTrue($swissOff->isWhitMonday($swissOff->getWhitMonday()));
  }


  public function testSwissOffCorpusChristi() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isCorpusChristi(1492300800));
    $this->assertFalse($swissOff->isCorpusChristi(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isCorpusChristi(strtotime('2017-06-15')));
    $this->assertTrue($swissOff->isCorpusChristi(strtotime('2018-05-31')));
    $this->assertTrue($swissOff->isCorpusChristi($swissOff->getCorpusChristi()));
  }


  public function testSwissOffIndependance() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isIndependance(1492300800));
    $this->assertFalse($swissOff->isIndependance(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isIndependance(strtotime('2017-06-23')));
    $this->assertTrue($swissOff->isIndependance(strtotime('2018-06-23')));
    $this->assertTrue($swissOff->isIndependance($swissOff->getIndependance()));
  }


  public function testSwissOffPeterPaul() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isPeterPaul(1492300800));
    $this->assertFalse($swissOff->isPeterPaul(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isPeterPaul(strtotime('2017-06-29')));
    $this->assertTrue($swissOff->isPeterPaul(strtotime('2018-06-29')));
    $this->assertTrue($swissOff->isPeterPaul($swissOff->getPeterPaul()));
  }


  public function testSwissOffNational() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isNational(1492300800));
    $this->assertFalse($swissOff->isNational(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isNational(strtotime('2017-08-01')));
    $this->assertTrue($swissOff->isNational(strtotime('2018-08-01')));
    $this->assertTrue($swissOff->isNational($swissOff->getNational()));
  }


  public function testSwissOffAssumption() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isAssumption(1492300800));
    $this->assertFalse($swissOff->isAssumption(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isAssumption(strtotime('2017-08-15')));
    $this->assertTrue($swissOff->isAssumption(strtotime('2018-08-15')));
    $this->assertTrue($swissOff->isAssumption($swissOff->getAssumption()));
  }


  public function testSwissOffJeuneGenevois() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isJeuneGenevois(1492300800));
    $this->assertFalse($swissOff->isJeuneGenevois(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isJeuneGenevois(strtotime('2017-09-07')));
    $this->assertTrue($swissOff->isJeuneGenevois(strtotime('2018-09-06')));
    $this->assertTrue($swissOff->isJeuneGenevois($swissOff->getJeuneGenevois()));
  }


  public function testSwissOffThanksgiving() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isThanksgiving(1492300800));
    $this->assertFalse($swissOff->isThanksgiving(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isThanksgiving(strtotime('2017-09-17')));
    $this->assertTrue($swissOff->isThanksgiving(strtotime('2018-09-16')));
    $this->assertTrue($swissOff->isThanksgiving($swissOff->getThanksgiving()));
  }


  public function testSwissOffJeune() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isJeune(1492300800));
    $this->assertFalse($swissOff->isJeune(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isJeune(strtotime('2017-09-18')));
    $this->assertTrue($swissOff->isJeune(strtotime('2018-09-17')));
    $this->assertTrue($swissOff->isJeune($swissOff->getJeune()));
  }


  public function testSwissOffNicolasFlue() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isNicolasFlue(1492300800));
    $this->assertFalse($swissOff->isNicolasFlue(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isNicolasFlue(strtotime('2017-09-25')));
    $this->assertTrue($swissOff->isNicolasFlue(strtotime('2018-09-25')));
    $this->assertTrue($swissOff->isNicolasFlue($swissOff->getNicolasFlue()));
  }


  public function testSwissOffAllSaint() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isAllSaint(1492300800));
    $this->assertFalse($swissOff->isAllSaint(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isAllSaint(strtotime('2017-10-01')));
    $this->assertTrue($swissOff->isAllSaint(strtotime('2018-10-01')));
    $this->assertTrue($swissOff->isAllSaint($swissOff->getAllSaint()));
  }


  public function testSwissOffImmaculate() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isImmaculate(1492300800));
    $this->assertFalse($swissOff->isImmaculate(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isImmaculate(strtotime('2017-12-08')));
    $this->assertTrue($swissOff->isImmaculate(strtotime('2018-12-08')));
    $this->assertTrue($swissOff->isImmaculate($swissOff->getImmaculate()));
  }


  public function testSwissOffStephen() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isStephen(1492300800));
    $this->assertFalse($swissOff->isStephen(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isStephen(strtotime('2017-12-26')));
    $this->assertTrue($swissOff->isStephen(strtotime('2018-12-26')));
    $this->assertTrue($swissOff->isStephen($swissOff->getStephen()));
  }


  public function testSwissOffRestoration() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isRestoration(1492300800));
    $this->assertFalse($swissOff->isRestoration(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isRestoration(strtotime('2017-12-31')));
    $this->assertTrue($swissOff->isRestoration(strtotime('2018-12-31')));
    $this->assertTrue($swissOff->isRestoration($swissOff->getRestoration()));
  }


  public function testSwissOffNewEve() {
    $swissOff = new SwissOff();
    $this->assertFalse($swissOff->isNewEve(1492300800));
    $this->assertFalse($swissOff->isNewEve(1492300800+(4*3600)));
    $this->assertTrue($swissOff->isNewEve(strtotime('2017-12-31')+12*3600));
    $this->assertTrue($swissOff->isNewEve(strtotime('2018-12-31')+12*3600));
    $this->assertTrue($swissOff->isNewEve($swissOff->getNewEve()));
  }
}

