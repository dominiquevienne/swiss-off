<?php
/**
 * Based on https://en.wikipedia.org/wiki/Public_holidays_in_Switzerland
 */

namespace Dominiquevienne\SwissOff;


class SwissOff {

  private $_time  = null;


  /**
   * Will treat passed time and store it in $this->_time
   *
   * @param null $time
   */
  private function _getTime($time = null) {
    if(empty($time)) {
      $this->_time = time();
    } else {
      $this->_time = $time;
    }
  }


  /**
   * Returns the first second of a day
   *
   * @param $time
   *
   * @return false|int
   */
  private function _dayBeginning($time) {
    $time = strtotime(date('Y-M-d', $time));

    return $time;
  }


  /**
   * Checks if given time is between time2check and time2check + 24h
   *
   * @param $timeToCheck
   * @param null $time
   *
   * @return bool
   */
  private function _isInDay($timeToCheck, $time = null) {
    $this->_getTime($time);
    $this->_time  = $this->_dayBeginning($this->_time);

    if(($timeToCheck<=$this->_time) AND ($this->_time<=($timeToCheck+24*3600))) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  /**
   * Checks if given time is between time2check and time2check + 12h
   *
   * @param $timeToCheck
   * @param null $time
   *
   * @return bool
   */
  private function _isInMorning($timeToCheck, $time = NULL) {
    $this->_getTime($time);
    $this->_time  = $this->_dayBeginning($this->_time);

    if(($timeToCheck<=$this->_time) AND ($this->_time<=($timeToCheck+12*3600))) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  /**
   * Checks if given time is between time2check + 12h and time2check + 24h
   *
   * @param $timeToCheck
   * @param null $time
   *
   * @return bool
   */
  private function _isInAfternoon($timeToCheck, $time = NULL) {
    $this->_getTime($time);
    $timeToCheck  = $this->_dayBeginning($timeToCheck);

    if((($timeToCheck+12*3600)<=$this->_time) AND ($this->_time<=($timeToCheck+24*3600))) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  /**
   * This function will return the first sunday of a month
   * https://stackoverflow.com/questions/14019961/how-to-find-find-first-sunday-of-every-month
   *
   * @param null $time
   *
   * @return string
   */
  private function _firstSunday($time = null) {
    $this->_getTime($time);

    $date = strftime("%Y-%m",$this->_time);
    $day  = 1;

    for($day; $day <= '7'; $day++){
      $dd = strftime("%A",strtotime($date . '-' . $day));
      if($dd == 'Sunday'){
        return mktime(0,0,0,date('m',$this->_time),$day,date('Y', $this->_time));
      }
    }
  }


  /**
   * Will throw easter date for given year
   *
   * @param null $time
   */
  public function getEaster($time = null) {
    $this->_getTime($time);

    $year = date('Y',$this->_time);

    return easter_date($year);
  }


  /**
   * Checks if given time corresponds to easter date
   *
   * @param null $time
   *
   * @return bool
   */
  public function isEaster($time = null) {
    $this->_getTime($time);
    $easter = $this->getEaster($this->_time);

    return $this->_isInDay($easter, $this->_time);
  }


  /**
   * Returns christmas of the current year
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getChristmas($time = null) {
    $this->_getTime($time);
    $christmas  = strtotime(date('Y-12-25', $this->_time));

    return $christmas;
  }


  /**
   * Checks if given time corresponds to christmas date
   *
   * @param null $time
   *
   * @return bool
   */
  public function isChristmas($time = null) {
    $this->_getTime($time);
    $christmas  = $this->getChristmas($this->_time);

    return $this->_isInDay($christmas, $this->_time);
  }


  /**
   * Returns the current new year date
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getNewYear($time = null) {
    $this->_getTime($time);
    $newYear  = strtotime(date('Y-01-01', $this->_time));

    return $newYear;
  }


  /**
   * Checks if given time corresponds to new year
   *
   * @param null $time
   *
   * @return bool
   */
  public function isNewYear($time = null) {
    $this->_getTime($time);
    $newYear  = $this->getNewYear($this->_time);

    return $this->_isInDay($newYear, $this->_time);
  }


  /**
   * Returns the current Saint Berchtold date
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getBerchtold($time = null) {
    $this->_getTime($time);
    $berchtold  = strtotime(date('Y-01-02', $this->_time));

    return $berchtold;
  }


  /**
   * Checks if given time corresponds to Saint Berchtold
   *
   * @param null $time
   *
   * @return bool
   */
  public function isBerchtold($time = null) {
    $this->_getTime($time);
    $berchtold  = $this->getBerchtold($this->_time);

    return $this->_isInDay($berchtold, $this->_time);
  }


  /**
   * Returns the current epiphany date
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getEpiphany($time = null) {
    $this->_getTime($time);
    $epiphany = strtotime(date('Y-01-06', $this->_time));

    return $epiphany;
  }


  /**
   * Checks if given time corresponds to Epiphany
   *
   * @param null $time
   *
   * @return bool
   */
  public function isEpiphany($time = null) {
    $this->_getTime($time);
    $epiphany = $this->getEpiphany($this->_time);

    return $this->_isInDay($epiphany, $this->_time);
  }


  /**
   * Returns the current republic day
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getRepublicDay($time = null) {
    $this->_getTime($time);
    $republicDay  = strtotime(date('Y-03-01', $this->_time));

    return $republicDay;
  }


  /**
   * Checks if given time corresponds to Republic day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isRepublicDay($time = null) {
    $this->_getTime($time);
    $republicDay  = $this->getRepublicDay($this->_time);

    return $this->_isInDay($republicDay, $this->_time);
  }


  /**
   * Returns the current Saint Joseph
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getJoseph($time = null) {
    $this->_getTime($time);
    $joseph = strtotime(date('Y-03-19', $this->_time));

    return $joseph;
  }


  /**
   * Checks if given time corresponds to Saint Joseph
   *
   * @param null $time
   *
   * @return bool
   */
  public function isJoseph($time = null) {
    $this->_getTime($time);
    $joseph = $this->getJoseph($this->_time);

    return $this->_isInDay($joseph, $this->_time);
  }


  /**
   * Returns the current Nafelser farht
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getNafelser($time = null) {
    $this->_getTime($time);
    $nafelser = strtotime(date('Y-04-03', $this->_time));

    return $nafelser;
  }


  /**
   * Checks if given time corresponds to Nafelser farht
   *
   * @param null $time
   *
   * @return bool
   */
  public function isNafelser($time = null) {
    $this->_getTime($time);
    $nafelser = $this->getNafelser($this->_time);

    return $this->_isInDay($nafelser, $this->_time);
  }


  /**
   * Returns the current Palm sunday
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getPalm($time = null) {
    $this->_getTime($time);
    $easter = $this->getEaster($this->_time);
    $palm   = $easter - (7*24*3600);

    return $palm;
  }


  /**
   * Checks if given time corresponds to Palm sunday
   *
   * @param null $time
   *
   * @return bool
   */
  public function isPalm($time = null) {
    $this->_getTime($time);
    $palm = $this->getPalm($this->_time);

    return $this->_isInDay($palm, $this->_time);
  }


  /**
   * Returns the current Good Friday
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getGoodFriday($time = null) {
    $this->_getTime($time);
    $easter     = $this->getEaster($this->_time);
    $goodFriday = $easter - (2*24*3600);

    return $goodFriday;
  }


  /**
   * Checks if given time corresponds to Good Friday
   *
   * @param null $time
   *
   * @return bool
   */
  public function isGoodFriday($time = null) {
    $this->_getTime($time);
    $goodFriday = $this->getGoodFriday($this->_time);

    return $this->_isInDay($goodFriday, $this->_time);
  }


  /**
   * Returns the current easter monday
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getEasterMonday($time = null) {
    $this->_getTime($time);
    $easter       = $this->getEaster($this->_time);
    $easterMonday = $easter + (1*24*3600);

    return $easterMonday;
  }


  /**
   * Checks if given time corresponds to easter monday
   *
   * @param null $time
   *
   * @return bool
   */
  public function isEasterMonday($time = null) {
    $this->_getTime($time);
    $easterMonday = $this->getEasterMonday($this->_time);

    return $this->_isInDay($easterMonday, $this->_time);
  }


  /**
   * Returns the current labor day
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getLaborDay($time = null) {
    $this->_getTime($time);
    $laborDay   = strtotime(date('Y-05-01', $this->_time));

    return $laborDay;
  }


  /**
   * Checks if given time corresponds to labor day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isLaborDay($time = null) {
    $this->_getTime($time);
    $laborDay = $this->getLaborDay($this->_time);

    return $this->_isInDay($laborDay, $this->_time);
  }


  /**
   * Returns the current Ascension day
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getAscension($time = null) {
    $this->_getTime($time);
    $easter     = $this->getEaster($this->_time);
    $ascension  = $easter + (39*24*3600);

    return $ascension;
  }


  /**
   * Checks if given time corresponds to ascension day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isAscension($time = null) {
    $this->_getTime($time);
    $ascension  = $this->getAscension($this->_time);

    return $this->_isInDay($ascension, $this->_time);
  }


  /**
   * Returns the current Pentecost
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getPentecost($time = null) {
    $this->_getTime($time);
    $easter     = $this->getEaster($this->_time);
    $pentecost  = $easter + (49*24*3600);

    return $pentecost;
  }


  /**
   * Checks if given time corresponds to pentecost day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isPentecost($time = null) {
    $this->_getTime($time);
    $pentecost  = $this->getPentecost($this->_time);

    return $this->_isInDay($pentecost, $this->_time);
  }


  /**
   * Returns the current Whit Monday
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getWhitMonday($time = null) {
    $this->_getTime($time);
    $easter     = $this->getEaster($this->_time);
    $whitMonday = $easter + (50*24*3600);

    return $whitMonday;
  }


  /**
   * Checks if given time corresponds to whit monday
   *
   * @param null $time
   *
   * @return bool
   */
  public function isWhitMonday($time = null) {
    $this->_getTime($time);
    $whitMonday = $this->getWhitMonday($this->_time);

    return $this->_isInDay($whitMonday, $this->_time);
  }


  /**
   * Returns the current Corpus Christi
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getCorpusChristi($time = null) {
    $this->_getTime($time);
    $easter         = $this->getEaster($this->_time);
    $corpusChristi  = $easter + (60*24*3600);

    return $corpusChristi;
  }


  /**
   * Checks if given time corresponds to Corpus Christi
   *
   * @param null $time
   *
   * @return bool
   */
  public function isCorpusChristi($time = null) {
    $this->_getTime($time);
    $corpusChristi  = $this->getCorpusChristi($this->_time);

    return $this->_isInDay($corpusChristi, $this->_time);
  }


  /**
   * Returns the current Fête de l'indépendance
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getIndependance($time = null) {
    $this->_getTime($time);
    $independance = strtotime(date('Y-06-23', $this->_time));

    return $independance;
  }


  /**
   * Checks if given time corresponds to Fête de l'indépendance
   *
   * @param null $time
   *
   * @return bool
   */
  public function isIndependance($time = null) {
    $this->_getTime($time);
    $independance = $this->getIndependance($this->_time);

    return $this->_isInDay($independance, $this->_time);
  }


  /**
   * Returns the current Saint Peter and Paul
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getPeterPaul($time = null) {
    $this->_getTime($time);
    $peterPaul  = strtotime(date('Y-06-29', $this->_time));

    return $peterPaul;
  }


  /**
   * Checks if given time corresponds to Saint Peter and Paul
   *
   * @param null $time
   *
   * @return bool
   */
  public function isPeterPaul($time = null) {
    $this->_getTime($time);
    $peterPaul  = $this->getPeterPaul($this->_time);

    return $this->_isInDay($peterPaul, $this->_time);
  }


  /**
   * Returns the current National day
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getNational($time = null) {
    $this->_getTime($time);
    $national = strtotime(date('Y-08-01', $this->_time));

    return $national;
  }


  /**
   * Checks if given time corresponds to national day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isNational($time = null) {
    $this->_getTime($time);
    $national = $this->getNational($this->_time);

    return $this->_isInDay($national, $this->_time);
  }


  /**
   * Returns the current Assumption
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getAssumption($time = null) {
    $this->_getTime($time);
    $assumption = strtotime(date('Y-08-15', $this->_time));

    return $assumption;
  }


  /**
   * Checks if given time corresponds to assumption
   *
   * @param null $time
   *
   * @return bool
   */
  public function isAssumption($time = null) {
    $this->_getTime($time);
    $assumption = $this->getAssumption($this->_time);

    return $this->_isInDay($assumption, $this->_time);
  }


  /**
   * Returns the current Jeune Genevois
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getJeuneGenevois($time = null) {
    $this->_getTime($time);
    $firstSundaySeptember = $this->_firstSunday(strtotime(date('Y', $this->_time) . '-09-01'));
    $jeune                = $firstSundaySeptember + (4*24*3600);

    return $jeune;
  }


  /**
   * Checks if given time corresponds to jeune genevois
   *
   * @param null $time
   *
   * @return bool
   */
  public function isJeuneGenevois($time = null) {
    $this->_getTime($time);
    $jeune  = $this->getJeuneGenevois($this->_time);
    $this->_getTime($time);

    return $this->_isInDay($jeune, $this->_time);
  }


  /**
   * Returns the current Thanksgiving
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getThanksgiving($time = null) {
    $this->_getTime($time);
    $firstSundaySeptember = $this->_firstSunday(strtotime(date('Y', $this->_time) . '-09-01'));
    $thanksgiving         = $firstSundaySeptember + (2*7*24*3600);

    return $thanksgiving;
  }


  /**
   * Checks if given time corresponds to Thanksgiving
   *
   * @param null $time
   *
   * @return bool
   */
  public function isThanksgiving($time = null) {
    $this->_getTime($time);
    $thanksgiving = $this->getThanksgiving($this->_time);
    $this->_getTime($time);

    return $this->_isInDay($thanksgiving, $this->_time);
  }


  /**
   * Returns the current Lundi du Jeune
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getJeune($time = null) {
    $this->_getTime($time);
    $jeune  = $this->getThanksgiving($time) + (1*24*3600);

    return $jeune;
  }


  /**
   * Checks if given time corresponds to Lundi du Jeune
   *
   * @param null $time
   *
   * @return bool
   */
  public function isJeune($time = null) {
    $this->_getTime($time);
    $jeune  = $this->getJeune($this->_time);
    $this->_getTime($time);

    return $this->_isInDay($jeune, $this->_time);
  }


  /**
   * Returns the current Saint Nicolas Flue
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getNicolasFlue($time = null) {
    $this->_getTime($time);
    $nicolas  = strtotime(date('Y-09-25', $this->_time));

    return $nicolas;
  }


  /**
   * Checks if given time corresponds to Saint Nicolas Flue
   *
   * @param null $time
   *
   * @return bool
   */
  public function isNicolasFlue($time = null) {
    $this->_getTime($time);
    $nicolas  = $this->getNicolasFlue($this->_time);

    return $this->_isInDay($nicolas, $this->_time);
  }


  /**
   * Returns the current All Saint Day
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getAllSaint($time = null) {
    $this->_getTime($time);
    $allSaint = strtotime(date('Y-10-01', $this->_time));

    return $allSaint;
  }


  /**
   * Checks if given time corresponds to All Saint Day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isAllSaint($time = null) {
    $this->_getTime($time);
    $allSaint = $this->getAllSaint($this->_time);

    return $this->_isInDay($allSaint, $this->_time);
  }


  /**
   * Returns the current Immaculate
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getImmaculate($time = null) {
    $this->_getTime($time);
    $immaculate = strtotime(date('Y-12-08', $this->_time));

    return $immaculate;
  }


  /**
   * Checks if given time corresponds to Immaculate
   *
   * @param null $time
   *
   * @return bool
   */
  public function isImmaculate($time = null) {
    $this->_getTime($time);
    $immaculate = $this->getImmaculate($this->_time);

    return $this->_isInDay($immaculate, $this->_time);
  }


  /**
   * Returns the current Saint Stephen's Day
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getStephen($time = null) {
    $this->_getTime($time);
    $stephen  = strtotime(date('Y-12-26', $this->_time));

    return $stephen;
  }


  /**
   * Checks if given time corresponds to Saint Stephen's Day
   *
   * @param null $time
   *
   * @return bool
   */
  public function isStephen($time = null) {
    $this->_getTime($time);
    $stephen  = $this->getStephen($this->_time);

    return $this->_isInDay($stephen, $this->_time);
  }


  /**
   * Returns the current Restoration de la république
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getRestoration($time = null) {
    $this->_getTime($time);
    $restoration = strtotime(date('Y-12-31', $this->_time));

    return $restoration;
  }


  /**
   * Checks if given time corresponds to Restoration de la Republique
   *
   * @param null $time
   *
   * @return bool
   */
  public function isRestoration($time = null) {
    $this->_getTime($time);
    $restoration  = $this->getRestoration($this->_time);

    return $this->_isInDay($restoration, $this->_time);
  }


  /**
   * Returns the current New Eve
   *
   * @param null $time
   *
   * @return false|int
   */
  public function getNewEve($time = null) {
    $this->_getTime($time);
    $newEve = strtotime(date('Y-12-31', $this->_time)) + (12*3600);

    return $newEve;
  }


  /**
   * Checks if given time corresponds to Restoration de la Republique
   *
   * @param null $time
   *
   * @return bool
   */
  public function isNewEve($time = null) {
    $this->_getTime($time);
    $newEve = $this->getNewEve($this->_time);
    $this->_getTime($time);

    return $this->_isInAfternoon($newEve, $this->_time);
  }

}