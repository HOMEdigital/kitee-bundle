<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 13:34
 */

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;

try{
    $moduleName = 'tl_article';
    $tl_article = new Helper\DcaHelper($moduleName);

    #-- layout -----------------------------------------------------------------------------------------------------
    $tl_article
        ->addField('select', 'hm_layout', array(
            'options' => array(
                'hm-layout-limited',
                'hm-layout-limited-m',
                'hm-layout-limited-s',
                'hm-layout-full-limited',
                'hm-layout-full-limited-m',
                'hm-layout-full-limited-s',
                'hm-layout-full'
            ),
            'default' => 'limited',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->addField('select', 'hm_design', array(
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_step_inner_top', array(
            'options' => array(
                'hm-step-inner-top-no',
                'hm-step-inner-top-l',
                'hm-step-inner-top-m',
                'hm-step-inner-top-s'
            ),
            'default' => 'step-inner-top-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->addField('select', 'hm_step_inner_bottom', array(
            'options' => array(
                'hm-step-inner-bottom-no',
                'hm-step-inner-bottom-l',
                'hm-step-inner-bottom-m',
                'hm-step-inner-bottom-s'
            ),
            'default' => 'step-inner-bottom-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
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
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
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
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
    ;

    $tl_article
        ->addPaletteGroup('layout', array('inColumn', 'hm_layout', 'hm_step_inner_top', 'hm_step_inner_bottom', 'hm_step_outer_top', 'hm_step_outer_bottom'), 'default', 2)
    ;

    // +-- tiles ------------------------------------------------------------------------
    $tl_article
        ->addField('select', 'hm_tile_rows', array(
            'options' => array(
                'rows',
                'tiles'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => true,
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_rows_screensize', array(
            'options' => array(
                'layout-row',
                'layout-gt-xs-row',
                'layout-gt-sm-row',
                'layout-gt-md-row'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'includeBlankOption' => true,
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_rows_size', array(
            'options' => array(
                'hm-rows-flex',
                'hm-rows-10-90',
                'hm-rows-20-80',
                'hm-rows-30-70',
                'hm-rows-40-60',
                'hm-rows-50-50',
                'hm-rows-60-40',
                'hm-rows-70-30',
                'hm-rows-80-20',
                'hm-rows-90-10'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'includeBlankOption' => true,
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_tile_cols', array(
            'options' => array(
                'hm-tiles-2cols',
                'hm-tiles-3cols',
                'hm-tiles-3cols-full',
                'hm-tiles-4cols',
                'hm-tiles-4cols-full'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'includeBlankOption' => true,
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_tile_height', array(
            'options' => array(
                'hm-tiles-height-different',
                'hm-tiles-height-fixed',
                'hm-tiles-height-1-1',
                'hm-tiles-height-16-9',
                'hm-tiles-height-4-3',
                'hm-tiles-height-3-2',
                'hm-tiles-height-8-5'
            ),
            'default' => 'hm-tiles-height-different',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
    ;

    $tl_article
        ->addPaletteGroup('tile', array('hm_tile_rows'), 'default', 3)
    ;


    #-- define subpalettes
    $GLOBALS['TL_DCA'][$moduleName]['palettes']['__selector__'][] = 'hm_tile_rows';
    $GLOBALS['TL_DCA'][$moduleName]['subpalettes']['hm_tile_rows_rows'] = 'hm_rows_screensize, hm_rows_size';
    $GLOBALS['TL_DCA'][$moduleName]['subpalettes']['hm_tile_rows_tiles'] = 'hm_tile_cols';

}catch(\Exception $e){
    var_dump($e);
}