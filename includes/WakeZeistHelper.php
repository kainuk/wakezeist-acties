<?php
/*
 * CopyRight
 * @author Klaas Eikelboom
 * @date 24-Oct-2021
 * @license  AGPL-3.0
 */

class WakeZeistHelper {

  /** @var WakeZeistHelper  */
  static $helper = null;
  /** @var \IntlDateFormatter|null  */
  var $nlFormatter = NULL;

  public function __construct() {
    // de datums worden in het nederlands getoond.
    $this->nlFormatter = new \IntlDateFormatter('nl_NL', NULL, NULL);
    $this->nlFormatter-> setPattern('d MMMM yyyy');
  }

  /**
   * implementatie van het singleton pattern.
   * @return \WakeZeistHelper|null
   */
  static public function instance() {
    if (empty(self::$helper)) {
      self::$helper = new WakeZeistHelper();
    }
    return self::$helper;
  }

  /**
   * @return false|string
   */
  public function volgendeWake(){
    $date = new DateTime();
    $interval = DateInterval::createFromDateString('first sunday of next month');
    $date->add($interval);
    return  $this->nlFormatter->format($date);
  }

  /**
   * @param $jaar
   *
   * @return string
   * @throws \Exception
   */
  public function jaarIndex($jaar){
    /** @var WP_Query $the_query */
    $the_query = new WP_Query([
      'date_query' => ['year'  => $jaar],
      'order' => 'ASC',
      'orderby' => 'date',
      'category_name' => 'wake-verslag'
    ]);
    $output   = '';
    while ($the_query->have_posts()) {
      $the_query->the_post();
      $output .= wp_sprintf("<li>%s - <a href='%s'>%s</a></li>", get_the_date(), get_the_permalink(), get_the_title());
    }
    return "<ul>$output</ul>";
  }
}
