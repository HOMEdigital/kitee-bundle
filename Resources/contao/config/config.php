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
    'hm_hero_container' => array(
        'hm_hero_container_start'   => 'Home\KiteeBundle\Resources\contao\elements\ContainerHeroStartElement',
        'hm_hero_container_end'     => 'Home\KiteeBundle\Resources\contao\elements\ContainerEndElement',
    ),
    'hm_tile_container' => array(
        'hm_tile_container_start'   => 'Home\KiteeBundle\Resources\contao\elements\ContainerTileStartElement',
        'hm_tile_container_end'     => 'Home\KiteeBundle\Resources\contao\elements\ContainerEndElement',
    ),
    'hm_kitee' => array(
        'hm_hr'     => 'Home\KiteeBundle\Resources\contao\elements\HrElement',
    )
));

$GLOBALS['TL_WRAPPERS']['start'][]  = 'hm_hero_container_start';
$GLOBALS['TL_WRAPPERS']['stop'][]   = 'hm_hero_container_end';
$GLOBALS['TL_WRAPPERS']['start'][]  = 'hm_tile_container_start';
$GLOBALS['TL_WRAPPERS']['stop'][]   = 'hm_tile_container_end';