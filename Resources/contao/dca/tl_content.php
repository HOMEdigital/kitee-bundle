<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 27.09.2017
 * Time: 16:33
 */

namespace Home\CustomizeeBundle\Resources\contao\dca;

use Home\LibrareeBundle\Resources\contao\models\CollectionsModel;
use Home\LibrareeBundle\Resources\contao\models\MagazineModel;
use Home\LibrareeBundle\Resources\contao\models\PromoterModel;
use Home\LibrareeBundle\Resources\contao\models\RecipeePinModel;
use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;
use Home\TaxonomeeBundle\Resources\contao\models\TaxonomeeModel;

$tl_content = new Helper\DcaHelper('tl_content');

try{
    #-- container felder --------------------------------------------
    $tl_content
        ->addField('select', 'hm_step_inner', array(
            'options' => array('step-inner-no', 'step-inner-top', 'step-inner-bottom', 'step-inner'),
            'default' => 'step-inner-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_gap_inner', array(
            'options' => array('gap-inner-no', 'gap-inner'),
            'default' => 'gap-inner-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_step_outer', array(
            'options' => array('step-outer-no', 'step-outer-top', 'step-outer-bottom', 'step-outer'),
            'default' => 'step-outer-no',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50'
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
    ;

    #-- container paletten --------------------------------------------
    $tl_content
        ->copyPalette('hm_kitee_contentbase','hm_container_start')
        ->addPaletteGroup('layout', array('inColumn','hm_layout', 'hm_step_inner', 'hm_step_outer', 'hm_gap_inner'), 'hm_container_start', 2)
    ;
}catch(\Exception $e){
    var_dump($e);
}