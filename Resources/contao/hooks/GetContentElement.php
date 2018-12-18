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

                if ($article->hm_tile_rows == 'tiles') {
                    // $classes[] = 'flex';
                    // $classes[] = 'hm-tile';
                    $tile_classes = array();

                    // +-- 2 spaltig
                    if ($article->hm_tile_cols == 'hm-tiles-2cols') {
                        if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-1col-item') {
                            $tile_classes[] = 'flex-100';
                        } else {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-gt-xs-50'));
                        }
                    }

                    // +-- 3 spaltig
                    if ($article->hm_tile_cols == 'hm-tiles-3cols') {
                        if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-1col-item') {
                            $tile_classes[] = 'flex-100';
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-2col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-66'));
                        } else {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-50', 'flex-gt-sm-33'));
                        }
                    }

                    // +-- 3 spaltig - volle Breite
                    if ($article->hm_tile_cols == 'hm-tiles-3cols-full') {
                        if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-1col-item') {
                            $tile_classes[] = 'flex-100';
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-2col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-100', 'flex-md-66', 'flex-lg-50', 'flex-gt-lg-40'));
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-3col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-100', 'flex-md-75', 'flex-gt-md-60'));
                        } else {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-50', 'flex-md-33', 'flex-lg-25', 'flex-gt-lg-20'));
                        }
                    }

                    // +-- 4 spaltig
                    if ($article->hm_tile_cols == 'hm-tiles-4cols') {
                        if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-1col-item') {
                            $tile_classes[] = 'flex-100';
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-2col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-66', 'flex-gt-sm-50'));
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-3col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-75'));
                        } else {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-50', 'flex-sm-33', 'flex-gt-sm-25'));
                        }
                    }

                    // +-- 4 spaltig + volle Breite
                    if ($article->hm_tile_cols == 'hm-tiles-4cols-full') {
                        if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-1col-item') {
                            $tile_classes[] = 'flex-100';
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-2col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-66', 'flex-md-50', 'flex-gt-md-40'));
                        } else if ($objRow->__get('hm_tile_item_big') == 'hm-tiles-3col-item') {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-100', 'flex-sm-100', 'flex-md-75', 'flex-gt-md-60'));
                        } else {
                            $tile_classes = array_merge($tile_classes, array('flex-xs-50', 'flex-sm-33', 'flex-md-25', 'flex-gt-md-20'));
                        }
                    }

                    $tile_classes[] = $objRow->__get('hm_tile_item_big');
                }


                $objRow->__set('classes', $classes);

                // #-- generate a new strBuffer from objRow
                /* Achtung: ein neues generieren des objElement schlägt beim ContentImage fehl. Daher muss ein komplett neues objElement erzeugt werden */
                $strClass = \ContentElement::findClass($objRow->type);
                $objElement = new $strClass($objRow);
                $strBuffer = $objElement->generate();

                #-- füge notwendige divs hinzu
                if ($article->hm_tile_rows == 'tiles') {
                    if ($objRow->type != 'hm_tile_container_end') {
                        $strBuffer = '<div class="hm-tile ' . implode(' ', $tile_classes) . '"><div class="hm-tile-inside">' . $strBuffer;
                        /* bei den Container Elementen darf das schliessende Div natürlich auch erst beim schliessenden Container-Element hinzugefügt werden. */
                        if ($objRow->type != 'hm_tile_container_start') {
                            $strBuffer .= '</div></div>';
                        }
                    }
                    if ($article->hm_tile_rows == 'tiles' && $objRow->type == 'hm_tile_container_end') {
                        $strBuffer .= '</div></div>';
                    }
                }
            }
        }

        return $strBuffer;
    }
}