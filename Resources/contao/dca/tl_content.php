<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 27.09.2017
 * Time: 16:33
 */

namespace Home\CustomizeeBundle\Resources\contao\dca;

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;


try{
    $tl_content = new Helper\DcaHelper('tl_content');

    #-- a content base definition; can be copied for each content element ---------------------
    $tl_content
        ->addPaletteGroup('type', array('type'), 'hm_kitee_content_base')
        ->addPaletteGroup('protected', array('protected'), 'hm_kitee_content_base')
        ->addPaletteGroup('invisible', array('invisible', 'guests', 'start', 'stop'), 'hm_kitee_content_base')
    ;

    #-- container felder --------------------------------------------
    $tl_content
        ->addField('select', 'hm_layout', array(
            'options' => array(
                'hm-layout-limited',
                'hm-layout-limited-m',
                'hm-layout-limited-s'
            ),
            'default' => 'limited',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->addField('select', 'hm_design', array(
            'options' => array(),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_step_inner_top', array(
            'options' => array(
                'options' => array(
                    'hm-step-inner-top-no',
                    'hm-step-inner-top-l',
                    'hm-step-inner-top-m',
                    'hm-step-inner-top-s'
                ),
            ),
            'default' => 'step-inner-top-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->addField('select', 'hm_step_inner_bottom', array(
            'options' => array(
                'options' => array(
                    'hm-step-inner-bottom-no',
                    'hm-step-inner-bottom-l',
                    'hm-step-inner-bottom-m',
                    'hm-step-inner-bottom-s'
                ),
            ),
            'default' => 'step-inner-bottom-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
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
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_gap_inner', array(
            'options' => array(
                'hm-gap-inner-no',
                'hm-gap-inner-l',
                'hm-gap-inner-m',
                'hm-gap-inner-s',
            ),
            'default' => 'hm-gap-inner-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))

    ;

    #-- container paletten --------------------------------------------
    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_container_start')
        ->addPaletteGroup('image', array('singleSRC'), 'hm_container_start', 2)
        ->addPaletteGroup('layout', array('inColumn','hm_layout', 'hm_step_inner_top', 'hm_step_inner_bottom', 'hm_step_outer_top', 'hm_step_outer_bottom', 'hm_gap_inner'), 'hm_container_start', 3)
    ;
}catch(\Exception $e){
    var_dump($e);
}