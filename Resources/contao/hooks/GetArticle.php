<?php
/**
 * The getArticle allows you to override the configuration of an article prior to rendering. It does not expect a return value.
 *
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:47
 */

namespace Home\CustomizeeBundle\Resources\contao\hooks;
use \Contao\ArticleModel;


class GetArticle
{
    /**
     * @param \Contao\ArticleModel $objRow
     */
    public function setLayoutClasses(ArticleModel $objRow)
    {
        $classes = $objRow->__get('classes');

        $hmLayout = $objRow->__get('hm_layout');
        $hmDesign = $objRow->__get('hm_design');
        $hmStepInnerTop = $objRow->__get('hm_step_inner_top');
        $hmStepInnerBottom = $objRow->__get('hm_step_inner_bottom');
        $hmStepOuterTop = $objRow->__get('hm_step_outer_top');
        $hmStepOuterBottom = $objRow->__get('hm_step_outer_bottom');

        if($hmLayout){
            $classes[] = $hmLayout;
        }
        if($hmDesign){
            $classes[] = $hmDesign;
        }
        if($hmStepInnerTop && strpos($hmStepInnerTop, '-no') === false){
            $classes[] = $hmStepInnerTop;
        }
        if($hmStepInnerBottom && strpos($hmStepInnerBottom, '-no') === false){
            $classes[] = $hmStepInnerBottom;
        }
        if($hmStepOuterTop && strpos($hmStepOuterTop, '-no') === false){
            $classes[] = $hmStepOuterTop;
        }
        if($hmStepOuterBottom && strpos($hmStepOuterBottom, '-no') === false){
            $classes[] = $hmStepOuterBottom;
        }

        $objRow->__set('classes', $classes);
    }
}