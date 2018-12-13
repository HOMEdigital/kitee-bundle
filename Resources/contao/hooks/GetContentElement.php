<?php
/**
 * The getArticle allows you to override the configuration of an article prior to rendering. It does not expect a return value.
 *
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 14:47
 */

namespace Home\KiteeBundle\Resources\contao\hooks;

use Home\KiteeBundle\Resources\HomeKiteeHelper;
use \Contao\ArticleModel;


class GetContentElement
{
    /**
     * @param \Contao\ArticleModel $objRow
     */
    public function setLayoutClasses(\ContentModel $objRow, $strBuffer, $objElement)
    {
        #-- get article
        if ($objRow->pid > 0 && $objRow->ptable == 'tl_article') {
            $article = ArticleModel::findById($objRow->pid);
            #-- die klassen dürfen nur bei content elementen hinzugefügt werden, die nicht in einem container stehen.
            if ($article->hm_tile_rows != '' && ($GLOBALS['kitee']['container'] == "" || $objRow->type == 'hm_tile_container_start')) {
                $html = "";
                $classes = is_array($objRow->__get('classes'))  ? $objRow->__get('classes') : array();
                if ($objRow->__get('hm_tile_item_big')) {
                    $classes[] = $objRow->__get('hm_tile_item_big');
                }
                if ($article->hm_tile_rows == 'tiles') {
                    // $classes[] = 'flex';
                    $classes[] = 'hm-tile';
                    $html = '<div class="hm-tiles-sizer"></div><div class="hm-tiles-gutter-sizer"></div>';
                }
                $objRow->__set('classes', $classes);

                // #-- generate a new strBuffer from objRow
                /* Achtung: ein neues generieren des objElement schlägt beim ContentImage fehl. Daher muss ein komplett neues objElement erzeugt werden */
                $strClass = \ContentElement::findClass($objRow->type);
                $objElement = new $strClass($objRow);
                $strBuffer = $objElement->generate();

                #-- füge notwendige divs hinzu
                if ($classes[0] == 'first' && $article->hm_tile_rows == 'tiles') {
                    $strBuffer = $html.$strBuffer;
                }

            }
        }

        return $strBuffer;
    }
}