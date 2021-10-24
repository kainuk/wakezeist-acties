<?php
/*
Plugin Name: WakeZeist Acties
Plugin URI: https://github.com/kainuk/wakezeist-acties
Description: Specifieke functionaliteit voor wakezeist.nl
Version: 5.10.2
Author: Klaas Eikelboom
Author URI: https://www.eikelboom.com
*/
require_once __DIR__.'/includes/WakeZeistHelper.php';

add_shortcode('volgende_wake', function(){
  return WakeZeistHelper::instance()->volgendeWake();
});

add_shortcode('vorige_jaren', function (){
  $output = '';
  for($year=2013;$year<=2021;$year++){
    $output .= "<li>$year</li>";
  }
  return "<ul>$output</ul>";
});
add_shortcode('jaarindex', function ($atts){
  $args = shortcode_atts(['jaar'=>2021],$atts);
  return WakeZeistHelper::instance()->jaarIndex($args['jaar']);
});

