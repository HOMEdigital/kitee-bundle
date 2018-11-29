<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:50
 */

#-- hooks --------------------------------------------------------------------------------------------------------------
$GLOBALS['TL_HOOKS']['getArticle'][] = array('Home\CustomizeeBundle\Resources\contao\hooks\GetArticle', 'setLayoutClasses');


#-- content elements -----------------------------------------------------------------------------------------------
array_insert($GLOBALS['TL_CTE'], 2, array
(
    'hm_container' => array(
        'hm_container_start'       => 'Home\CustomizeeBundle\Resources\contao\elements\ContainerStartElement',
        'hm_container_end'         => 'Home\CustomizeeBundle\Resources\contao\elements\ContainerEndElement',
    )
));

$GLOBALS['TL_WRAPPERS']['start'][] = 'hm_container_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'hm_container_end';