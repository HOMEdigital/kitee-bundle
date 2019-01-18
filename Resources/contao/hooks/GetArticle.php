<?php
/**
 * The getArticle allows you to override the configuration of an article prior to rendering. It does not expect a return value.
 *
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:47
 */

namespace Home\KiteeBundle\Resources\contao\hooks;

use Home\KiteeBundle\Resources\HomeKiteeHelper;
use \Contao\ArticleModel;


class GetArticle
{
    /**
     * @param \Contao\ArticleModel $objRow
     */
    public function setLayoutClasses(ArticleModel $objRow)
    {
        $insideClasses = array();
        $rowClasses = is_array($objRow->__get('classes'))  ? $objRow->__get('classes') : array();

        #-- add classes
        $classes = array_merge($rowClasses, HomeKiteeHelper::getLayoutClasses(array(
            'layout'            => $objRow->__get('hm_layout'),
            'design'            => $objRow->__get('hm_design'),
            'stepInnerTop'      => $objRow->__get('hm_step_inner_top'),
            'stepInnerBottom'   => $objRow->__get('hm_step_inner_bottom')
        )));

        #-- rows
        if($objRow->__get('hm_tile_rows') == 'rows') {
            $insideClasses[] = 'hm-layout-rows';
            $insideClasses[] = $objRow->__get('hm_rows_screensize');
            $insideClasses[] = $objRow->__get('hm_rows_size');
        }

        #-- tiles
        if($objRow->__get('hm_tile_rows') == 'tiles') {
            $insideClasses[] = $objRow->__get('hm_tile_cols');
            $insideClasses[] = 'hm-layout-tiles';
            $insideClasses[] = 'layout-row';
        }

        #-- tiles isotope
        if($objRow->__get('hm_tile_rows') == 'tiles_isotope') {
            $insideClasses[] = $objRow->__get('hm_tile_cols');
            $insideClasses[] =  'hm-layout-isotiles';
        }

        $objRow->__set('classes', $classes);
        $objRow->__set('insideClasses', implode(' ', $insideClasses));
    }
}