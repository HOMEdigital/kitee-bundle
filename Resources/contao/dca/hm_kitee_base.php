<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 13:34
 */

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;

$moduleName = 'hm_kitee_base';

try{
    $hm_kitee_contentbase = new Helper\DcaHelper($moduleName);

    #-- basis Paletten Gruppe mit contao Standard-Feldern, die für alle kitee Content-Elemente herangezogen wird -----------------------------------------
    $hm_kitee_contentbase->mergeFieldSettings('guests',  'eval', array('tl_class' => ''));
    $hm_kitee_contentbase
        ->addPaletteGroup('type', array('type'), 'hm_kitee_contentbase')
        ->addPaletteGroup('protected', array('protected'), 'hm_kitee_contentbase')
        ->addPaletteGroup('invisible', array('invisible', 'guests', 'start', 'stop'), 'hm_kitee_contentbase')
    ;
}catch(\Exception $e){
    var_dump($e);
}