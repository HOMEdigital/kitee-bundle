<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:50
 */

#-- hooks --------------------------------------------------------------------------------------------------------------
$GLOBALS['TL_HOOKS']['getArticle'][] = array('Home\KiteeBundle\Resources\contao\hooks\GetArticle', 'setLayoutClasses');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('Home\KiteeBundle\Resources\contao\hooks\GetContentElement', 'setLayoutClasses');


#-- content elements -----------------------------------------------------------------------------------------------
array_insert($GLOBALS['TL_CTE'], 2, array
(
    'hm_kitee' => array(
        'hm_content_container_start'    => 'Home\KiteeBundle\Resources\contao\elements\ContainerContentStartElement',
        'hm_content_container_end'      => 'Home\KiteeBundle\Resources\contao\elements\ContainerEndElement',
        'hm_piteli_box'                 => 'Home\KiteeBundle\Resources\contao\elements\PiTeLiBoxElement',
        'hm_hero_container_start'       => 'Home\KiteeBundle\Resources\contao\elements\ContainerHeroStartElement',
        'hm_hero_container_end'         => 'Home\KiteeBundle\Resources\contao\elements\ContainerEndElement',
        'hm_hr'                         => 'Home\KiteeBundle\Resources\contao\elements\HrElement',
        'hm_anchor'                     => 'Home\KiteeBundle\Resources\contao\elements\AnchorElement',
    )
));

$GLOBALS['TL_WRAPPERS']['start'][]  = 'hm_hero_container_start';
$GLOBALS['TL_WRAPPERS']['stop'][]   = 'hm_hero_container_end';
$GLOBALS['TL_WRAPPERS']['start'][]  = 'hm_content_container_start';
$GLOBALS['TL_WRAPPERS']['stop'][]   = 'hm_content_container_end';