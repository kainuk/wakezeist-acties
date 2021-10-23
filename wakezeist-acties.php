<?php
/*
Plugin Name: WakeZeist Acties
Plugin URI: https://github.com/kainuk/wakezeist-acties
Description: Specifieke functionaliteit voor wakezeist.nl
Version: 5.10.2
Author: Klaas Eikelboom
Author URI: https://www.eikelboom.com
*/
add_shortcode('volgende_wake', function(){
  $date = new DateTime();
  $interval = DateInterval::createFromDateString('first sunday of next month');
  $date->add($interval);
  $fmt = new \IntlDateFormatter('nl_NL', NULL, NULL);
  $fmt->setPattern('d MMMM yyyy');
  return $fmt->format($date);
});
