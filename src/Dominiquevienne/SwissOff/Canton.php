<?php
/**
 * Created by PhpStorm.
 * User: dvienne
 * Date: 20/06/2017
 * Time: 09:22
 */

namespace Dominiquevienne\SwissOff;


class Canton {

  private $_cantonDaysOffJson = '{"AG":["NewYear","Berchtold","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"AI":["NewYear","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"AR":["NewYear","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen","NewEve"],"BL":["NewYear","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen"],"BS":["NewYear","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen"],"BE":["NewYear","Berchtold","GoodFriday","EasterMonday","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen","NewEve"],"FR":["NewYear","Berchtold","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen"],"GE":["NewYear","GoodFriday","EasterMonday","Ascension","WhitMonday","National","JeuneGenevois","Christmas","Restoration"],"GL":["NewYear","Berchtold","Nafelser","GoodFriday","EasterMonday","Ascension","WhitMonday","National","Thanksgiving","AllSaint","Christmas","Stephen","NewEve"],"GR":["NewYear","Epiphany","Joseph","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Thanksgiving","Immaculate","Christmas","Stephen","NewEve"],"JU":["NewYear","Berchtold","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","CorpusChristi","Independance","National","Assumption","Thanksgiving","AllSaint","Christmas"],"LU":["NewYear","Berchtold","Epiphany","Joseph","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"NE":["NewYear","Berchtold","RepublicDay","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas"],"NW":["NewYear","Joseph","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"OW":["NewYear","Berchtold","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","NicolasFlue","AllSaint","Immaculate","Christmas","Stephen"],"SG":["NewYear","GoodFriday","EasterMonday","Ascension","WhitMonday","National","Thanksgiving","AllSaint","Christmas","Stephen"],"SH":["NewYear","Berchtold","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen","NewEve"],"SZ":["NewYear","Epiphany","Joseph","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"SO":["NewYear","Berchtold","Joseph","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"TG":["NewYear","Berchtold","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen"],"TI":["NewYear","Epiphany","Joseph","EasterMonday","LaborDay","Ascension","WhitMonday","CorpusChristi","PeterPaul","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"UR":["NewYear","Epiphany","Joseph","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"VS":["NewYear","Joseph","Ascension","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","NewEve"],"VD":["NewYear","Berchtold","GoodFriday","EasterMonday","Ascension","WhitMonday","National","Thanksgiving","Jeune","Christmas"],"ZG":["NewYear","Berchtold","GoodFriday","EasterMonday","Ascension","WhitMonday","CorpusChristi","National","Assumption","Thanksgiving","AllSaint","Immaculate","Christmas","Stephen","NewEve"],"ZH":["NewYear","Berchtold","GoodFriday","EasterMonday","LaborDay","Ascension","WhitMonday","National","Thanksgiving","Christmas","Stephen"]}';
  private $_daysOffCantonJson = '{"NewYear":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VS","VD","ZG","ZH"],"Berchtold":["AG","BE","FR","GL","JU","LU","NE","OW","SH","SO","TG","VD","ZG","ZH"],"GoodFriday":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","UR","VD","ZG","ZH"],"EasterMonday":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VD","ZG","ZH"],"Ascension":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VS","VD","ZG","ZH"],"WhitMonday":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VD","ZG","ZH"],"CorpusChristi":["AG","AI","FR","GR","JU","LU","NW","OW","SZ","SO","TI","UR","VS","ZG"],"National":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VS","VD","ZG","ZH"],"Assumption":["AG","AI","FR","JU","LU","NW","OW","SZ","SO","TI","UR","VS","ZG"],"Thanksgiving":["AG","AI","AR","BL","BS","BE","FR","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VS","VD","ZG","ZH"],"AllSaint":["AG","AI","FR","GL","JU","LU","NW","OW","SG","SZ","SO","TI","UR","VS","ZG"],"Immaculate":["AG","AI","FR","GR","LU","NW","OW","SZ","SO","TI","UR","VS","ZG"],"Christmas":["AG","AI","AR","BL","BS","BE","FR","GE","GL","GR","JU","LU","NE","NW","OW","SG","SH","SZ","SO","TG","TI","UR","VS","VD","ZG","ZH"],"Stephen":["AG","AI","AR","BL","BS","BE","FR","GL","GR","LU","NW","OW","SG","SH","SZ","SO","TG","TI","UR","ZG","ZH"],"NewEve":["AG","AI","AR","BE","GL","GR","LU","NW","SH","SZ","SO","TI","UR","VS","ZG"],"LaborDay":["AR","BL","BS","FR","JU","NE","SH","SO","TG","TI","ZH"],"JeuneGenevois":["GE"],"Restoration":["GE"],"Nafelser":["GL"],"Epiphany":["GR","LU","SZ","TI","UR"],"Joseph":["GR","LU","NW","SZ","SO","TI","UR","VS"],"Independance":["JU"],"RepublicDay":["NE"],"NicolasFlue":["OW"],"PeterPaul":["TI"],"Jeune":["VD"]}';

  public $cantonDaysOff;
  public $daysOffCanton;



  public function __construct() {
    $this->_loadCantonDaysOff();
    $this->_loadDaysOffCanton();
  }


  /**
   * Loads the days off of Swiss cantons by canton
   *
   * @return mixed
   */
  private function _loadCantonDaysOff() {
    $this->cantonDaysOff  = json_decode($this->_cantonDaysOffJson, TRUE);

    return $this->cantonDaysOff;
  }


  /**
   * Loads the days off of Swiss cantons by day
   *
   * @return string
   */
  private function _loadDaysOffCanton() {
    $this->daysOffCanton  = json_decode($this->_daysOffCantonJson, TRUE);

    return $this->_daysOffCantonJson;
  }


  /**
   * Returns the timestamps of the days off of a specific canton given by its two letters code
   *
   * @param $canton
   * @param null $time
   *
   * @return array|bool
   */
  public function getDaysOffByCantonAndTime($canton, $time = null) {
    if(empty($time)) {
      $time = time();
    }

    $canton = strtoupper($canton);
    if(empty($this->cantonDaysOff[$canton])) {
      return FALSE;
    } else {
      $daysOff  = [];
      $swissOff = new SwissOff();

      foreach($this->cantonDaysOff[$canton] as $day) {
        $functionName   = 'get' . $day;
        $daysOff[$day]  = $swissOff->$functionName($time);
      }

      return $daysOff;
    }
  }


  /**
   * Returns the days off machine names
   *
   * @return array
   */
  public function getDaysOffNames() {
    $daysOff  = [];

    foreach($this->daysOffCanton as $day => $temp) {
      $daysOff[]  = $day;
    }

    return $daysOff;
  }


  /**
   * Returns the cantons for a given day off machine name (case sensitive)
   *
   * @param $dayOffName
   *
   * @return bool
   */
  public function getCantonsByDayOffName($dayOffName) {
    if(empty($this->daysOffCanton[$dayOffName])) {
      return FALSE;
    } else {
      $cantons  = $this->daysOffCanton[$dayOffName];

      return $cantons;
    }
  }


  /**
   * Returns timestamp of the next day off for a given canton
   *
   * @param $canton
   * @param null $time
   *
   * @return bool
   */
  public function getNextDayOffByCanton($canton, $time = null) {
    if(empty($time)) {
      $time = time();
    }

    $canton = strtoupper($canton);
    if(empty($this->cantonDaysOff[$canton])) {
      return FALSE;
    } else {
      $swissOff     = new SwissOff();
      $daysOff      = $this->cantonDaysOff[$canton];
      $functionName = 'get' . $daysOff[0];
      unset($daysOff[0]);
      $nextDayOff   = strtotime('+1 year', $swissOff->$functionName($time));

      foreach($daysOff as $dayOff) {
        $functionName = 'get' . $dayOff;
        $temp         = $swissOff->$functionName($time);

        if($temp>$time) {
          return $temp;
        }
      }

      return $nextDayOff;
    }
  }


  /**
   * Returns a list of next days off by canton 2 letters code
   *
   * @param null $time
   *
   * @return array
   */
  public function getNextDaysOff($time = null) {
    if(empty($time)) {
      $time = time();
    }

    $daysOff  = [];
    foreach($this->cantonDaysOff as $canton => $temp) {
      $daysOff[$canton] = $this->getNextDayOffByCanton($canton, $time);
    }

    return $daysOff;
  }
}