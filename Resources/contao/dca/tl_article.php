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
    $tl_article
        #-- fields -----------------------------------------------------------------------------------------------------
        ->addField('select', 'hm_layout', array(
            'options' => array('limited', 'limited-small', 'full-limited', 'full-limited-small', 'full-width'),
            'default' => 'limited',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_step_inner', array(
            'options' => array('step-inner-no', 'step-inner-top', 'step-inner-bottom', 'step-inner'),
            'default' => 'step-inner-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_step_outer', array(
            'options' => array('step-outer-no', 'step-outer-top', 'step-outer-bottom', 'step-outer'),
            'default' => 'step-outer-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_design', array(
            'options' => array(
                'bkg-light-grey',
                'bkg-dark-grey'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_article'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        #-- palettes ---------------------------------------------------------------------------------------------------
        ->addPaletteGroup('new_layout', array('inColumn','hm_layout', 'hm_step_inner', 'hm_step_outer'), 'default', 2)
        ->addPaletteGroup('meta', array('keywords'), 'default', 3, true)
    ;
}catch(\Exception $e){
    var_dump($e);
}