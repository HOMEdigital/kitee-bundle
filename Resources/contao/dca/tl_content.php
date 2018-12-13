<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 27.09.2017
 * Time: 16:33
 */

namespace Home\KiteeBundle\Resources\contao\dca;

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;


try{
    $tl_content = new Helper\DcaHelper('tl_content');

    #-- a content base definition; can be copied for each content element ---------------------
    $tl_content
        ->mergeFieldSettings('start','eval', array('tl_class' => 'w50 clr'))
        ->addPaletteGroup('type', array('type'), 'hm_kitee_content_base')
        ->addPaletteGroup('protected', array('protected'), 'hm_kitee_content_base')
        ->addPaletteGroup('invisible', array('invisible', 'guests', 'start', 'stop'), 'hm_kitee_content_base')
    ;

    #-- tile container --------------------------------------------
    $tl_content
        ->addField('select', 'hm_design', array(
            'options' => array(),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_tile_item_big', array(
            'options_callback'  => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getItemBigOptions'),
            'reference'         => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->mergeFieldSettings('singleSRC', 'eval', array('mandatory'=>false))
    ;

    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_tile_container_start')
        ->addPaletteGroup('image', array('singleSRC'), 'hm_tile_container_start', 2)
        ->addPaletteGroup('layout', array('inColumn', 'hm_design'), 'hm_tile_container_start', 3)
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'hm_tile_container_start', 4)
    ;

    // -- Feld in andere content elemente integrieren
    $tl_content
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'text', 4)
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'image', 4)
    ;

    #-- anchor --------------------------------------------
    $tl_content
        ->addField('text', 'hm_anchor_id', array(
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
    ;

    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_anchor')
        ->addPaletteGroup('type_legend', array('type', 'hm_anchor_id'), 'hm_anchor', 2)
        ->addPaletteGroup('layout', array('inColumn', 'hm_step_outer_top', 'hm_step_outer_bottom'), 'hm_anchor', 3)
    ;

    #-- hr --------------------------------------------
    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_hr')
        ->addPaletteGroup('layout', array('hm_step_outer_top', 'hm_step_outer_bottom'), 'hm_hr', 2)
    ;

    #-- hero container --------------------------------------------
    $tl_content
        ->addField('select', 'hm_layout', array(
            'options' => array(
                'hm-layout-limited',
                'hm-layout-limited-m',
                'hm-layout-limited-s'
            ),
            'default' => 'limited',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->addField('select', 'hm_step_outer_top', array(
            'options' => array(
                'hm-step-outer-top-no',
                'hm-step-outer-top-l',
                'hm-step-outer-top-m',
                'hm-step-outer-top-s'
            ),
            'default' => 'step-outer-top-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->addField('select', 'hm_step_outer_bottom', array(
            'options' => array(
                'hm-step-outer-bottom-no',
                'hm-step-outer-bottom-l',
                'hm-step-outer-bottom-m',
                'hm-step-outer-bottom-s'
            ),
            'default' => 'step-outer-bottom-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
    ;

    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_hero_container_start')
        ->addPaletteGroup('image', array('singleSRC'), 'hm_hero_container_start', 2)
        ->addPaletteGroup('layout', array('inColumn', 'hm_step_outer_top', 'hm_step_outer_bottom'), 'hm_hero_container_start', 3)
    ;

    #-- tile --------------------------------------------
    $tl_content
        ->addField('text', 'hm_title', array(
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->mergeFieldSettings('text', 'eval', array('mandatory'=>false, 'tl_class'=>'clr'))
        ->mergeFieldSettings('url', 'eval', array('mandatory'=>false))
    ;
    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_tile')
        ->addPaletteGroup('image', array('multiSRC','sortBy'), 'hm_tile', 2)
        ->addPaletteGroup('text', array('hm_title', 'text'), 'hm_tile', 3)
        ->addPaletteGroup('link', array('url','linkTitle'), 'hm_tile', 4)
    ;

}catch(\Exception $e){
    var_dump($e);
}


/**
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_content extends \Backend
{
    public function getItemBigOptions($element)
    {
        $tileOptions = array(
            'hm-tiles-1col-item',
            'hm-tiles-2col-item',
            'hm-tiles-3col-item'
        );

        $rowOptions = array(
            'flex-100'
        );

        $ce = \ContentModel::findById($element->id);
        if ($ce) {
            if ($ce->pid > 0 && $ce->ptable == 'tl_article') {
                $article = \ArticleModel::findById($ce->pid);
                if($article) {
                    return ($article->hm_tile_rows == 'tiles') ? $tileOptions : $rowOptions;
                }
            }
        }

        return '';
    }
}