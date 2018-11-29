<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 13:34
 */

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;

$moduleName = 'tl_article';

try{
    $tl_article = new Helper\DcaHelper($moduleName);

    #-- container Felder -----------------------------------------------------------------------------------------------------
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
                'tl_class' => 'w50'
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
                'tl_class' => 'w50'
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
                'tl_class' => 'w50'
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
        ->addField('select', 'hm_design', array(
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
    ;

    #-- Container paletten -----------------------------------------------------------------------------------------------------
    $tl_article
        ->addPaletteGroup('layout', array('inColumn','hm_layout', 'hm_step_inner_top', 'hm_step_inner_bottom', 'hm_step_outer_top', 'hm_step_outer_bottom'), 'default', 2)
    ;


}catch(\Exception $e){
    var_dump($e);
}