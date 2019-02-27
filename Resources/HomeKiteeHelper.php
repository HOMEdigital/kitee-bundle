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

    /**
     * return the tile_classes for row&tiles
     *
     * @param $article - das Artikel-Objekt
     * @param $itemBig (null) - Einstellung im Backend
     * @return array
     */
    public static function getRowTilesClasses($article, $itemBig = null)
    {
        if ($article->hm_tile_rows == 'tiles') {
            switch ($article->hm_tile_cols) {
                case 'hm-tiles-2cols':      return self::get2ColTileClasses($itemBig); break;
                case 'hm-tiles-3cols':      return self::get3ColTileClasses($itemBig); break;
                case 'hm-tiles-3cols-full': return self::get3ColFullTileClasses($itemBig); break;
                case 'hm-tiles-4cols':      return self::get4ColTileClasses($itemBig); break;
                case 'hm-tiles-4cols-full': return self::get4ColFullTileClasses($itemBig); break;
                case 'hm-tiles-5cols':      return self::get5ColTileClasses($itemBig); break;
                case 'hm-tiles-6cols':      return self::get6ColTileClasses($itemBig); break;
            }
        } else if ($article->hm_tile_rows == 'rows') {
            return self::getRowClasses($article->hm_rows_screensize, $article->hm_rows_size, $itemBig);
        }
    }

    /**
     * return the classes for the row
     *
     * @param $screensize - Einstellung im Backend
     * @param $rowsize - Einstellung im Backend
     * @param $itemBig (false) - Einstellung im Backend
     * @return array
     */
    static function getRowClasses($screensize, $rowsize, $itemBig = false) {
        #-- ermittle ab welcher Bildschirmgrösse die Spalten eingesetzt werden sollen
        switch ($screensize) {
            case 'layout-gt-xs-row':
                $rowStart = 'gt-xs-';
                break;
            case 'layout-gt-sm-row':
                $rowStart = 'gt-sm-';
                break;
            case 'layout-gt-md-row':
                $rowStart = 'gt-md-';
                break;
            default:
                $rowStart = '';
        }

        #-- wenn Spalte eine grosse Spalte ist
        if ($itemBig) {
            return array('flex-' . $rowStart . '100');
        }

        #-- wenn alle Spalten gleich gross
        if ($rowsize == 'hm-rows-flex') {
            return array('flex');
        }

        $rowSize = explode('-', $rowsize);

        #-- else
        if (count($rowSize) == 4) { /* +-- zweispaltig - hm-rows-30-70 */
            if ($GLOBALS['kitee']['ce_number'] % 2 == 0) {
                return array('flex-' . $rowStart . $rowSize[3]);
            } else {
                return array('flex-' . $rowStart . $rowSize[2]);
            }
        }
        if (count($rowSize) > 4) { /* +-- drei- und mehrspaltig - hm-rows-33-33-33 */
            return array('flex-' . $rowStart . $rowSize[2]);
        }
    }

    /**
     * return classes for 2 columns tiles
     */
    static function get2ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item" : return array('flex-100'); break;
            default:                    return array('flex-xs-100', 'flex-gt-xs-50');
        }
    }

    /**
     * return classes for 3 columns tiles
     */
    static function get3ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":  return array('flex-100'); break;
            case "hm-tiles-2col-item":  return array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-66'); break;
            default:                    return array('flex-xs-100', 'flex-sm-50', 'flex-gt-sm-33');
        }
    }

    /**
     * return classes for 3 columns full width tiles
     */
    static function get3ColFullTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":  return array('flex-100'); break;
            case "hm-tiles-2col-item":  return array('flex-xs-100', 'flex-sm-100', 'flex-md-66', 'flex-lg-50', 'flex-gt-lg-40'); break;
            default:                    return array('flex-xs-100', 'flex-sm-50', 'flex-md-33', 'flex-lg-25', 'flex-gt-lg-20');
        }
    }

    /**
     * return classes for 4 columns tiles
     */
    static function get4ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":  return array('flex-100'); break;
            case "hm-tiles-2col-item":  return array('flex-xs-100', 'flex-sm-66', 'flex-gt-sm-50'); break;
            case "hm-tiles-3col-item":  return array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-75'); break;
            default:                    return array('flex-xs-50', 'flex-sm-33', 'flex-gt-sm-25');
        }
    }

    /**
     * return classes for 4 columns full width tiles
     */
    static function get4ColFullTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":  return array('flex-100'); break;
            case "hm-tiles-2col-item":  return array('flex-xs-100', 'flex-sm-66', 'flex-md-50', 'flex-gt-md-40'); break;
            case "hm-tiles-3col-item":  return array('flex-xs-100', 'flex-sm-100', 'flex-md-75', 'flex-gt-md-60'); break;
            default:                    return array('flex-xs-50', 'flex-sm-33', 'flex-md-25', 'flex-gt-md-20');
        }
    }

    /**
     * return classes for 5 columns tiles
     */
    static function get5ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":  return array('flex-100'); break;
            case "hm-tiles-2col-item":  return array('flex-xs-100', 'flex-sm-80', 'flex-gt-sm-40'); break;
            case "hm-tiles-3col-item":  return array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-60'); break;
            default:                    return array('flex-xs-50', 'flex-sm-33', 'flex-gt-sm-20');
        }
    }

    /**
     * return classes for 6 columns tiles
     */
    static function get6ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":  return array('flex-100'); break;
            case "hm-tiles-2col-item":  return array('flex-xs-100', 'flex-sm-50', 'flex-gt-sm-25'); break;
            default:                    return array('flex-xs-33', 'flex-sm-25', 'flex-gt-sm-16');
        }
    }
}