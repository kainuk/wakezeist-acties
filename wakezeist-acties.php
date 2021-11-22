<?php
/*
Plugin Name: WakeZeist Acties
Plugin URI: https://github.com/kainuk/wakezeist-acties
Description: Specifieke functionaliteit voor wakezeist.nl
Version: 1.0
Author: Klaas Eikelboom
Author URI: https://www.eikelboom.com
*/
// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}
require_once __DIR__ . '/includes/WakeZeistHelper.php';

add_shortcode('volgende_wake', function () {
  return WakeZeistHelper::instance()->volgendeWake();
});

add_shortcode('jaarindex', function ($atts) {
  $args = shortcode_atts(['jaar' => 2021], $atts);
  return WakeZeistHelper::instance()->jaarIndex($args['jaar']);
});

