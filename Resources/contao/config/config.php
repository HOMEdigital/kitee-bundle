<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:50
 */

#-- hooks --------------------------------------------------------------------------------------------------------------
$GLOBALS['TL_HOOKS']['getArticle'][] = array('Home\CustomizeeBundle\Resources\contao\hooks\GetArticle', 'setCustomClasses');
