<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources;

class HomeKiteeHelper 
{
    /**
     * creates an array with class names out of an given array
     *
     * @param $settings
     * @return array|mixed
     */
    public static function getLayoutClasses($settings)
    {
        $classes = array();
        if (!is_array($settings) && count($settings) < 1) {
            return $classes;
        }

        if (array_key_exists('layout', $settings)) {
            $classes[] = $settings['layout'];
        }
        if (array_key_exists('design', $settings)) {
            $classes[] = $settings['design'];
        }
        if (array_key_exists('stepInnerTop', $settings) && strpos($settings['stepInnerTop'], '-no') === false) {
            $classes[] = $settings['stepInnerTop'];
        }
        if (array_key_exists('stepInnerBottom', $settings) && strpos($settings['stepInnerBottom'], '-no') === false) {
            $classes[] = $settings['stepInnerBottom'];
        }
        if (array_key_exists('stepOuterTop', $settings) && strpos($settings['stepOuterTop'], '-no') === false) {
            $classes[] = $settings['stepOuterTop'];
        }
        if (array_key_exists('stepOuterBottom', $settings) && strpos($settings['stepOuterBottom'], '-no') === false) {
            $classes[] = $settings['stepOuterBottom'];
        }

        return $classes;
    }
}