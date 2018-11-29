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
    public function setCustomClasses(ArticleModel $objRow)
    {
        $classes = $objRow->__get('classes');

        $hmLayout = $objRow->__get('hm_layout');
        $hmDesign = $objRow->__get('hm_design');
        $hmStepInner = $objRow->__get('hm_step_inner');
        $hmStepOuter = $objRow->__get('hm_step_outer');

        if($hmLayout){
            $classes[] = $hmLayout;
        }
        if($hmDesign){
            $classes[] = $hmDesign;
        }
        if($hmStepInner){
            $classes[] = $hmStepInner;
        }
        if($hmStepOuter){
            $classes[] = $hmStepOuter;
        }

        $objRow->__set('classes', $classes);
    }
}