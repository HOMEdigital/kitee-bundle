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
        #-- hook soll nur im Frontend greifen
        if (strpos($_SERVER['REQUEST_URI'], '/contao?' ) === false) {

            #-- get article
            if ($objRow->pid > 0 && $objRow->ptable == 'tl_article') {
                $article = ArticleModel::findById($objRow->pid);

                #-- greift nur, wenn im artikel Spalten oder Kacheln ausgewählt wurde
                if ($article->hm_tile_rows != '') {
                    $addToHtmlStart = '';
                    $addToHtmlEnd = '</div></div>';
                    $html = "";
                    $classes = array(); // Klassen des ContentElments
                    $tile_classes = array(); // die Klassen werden dem umschliessenden Div zugewiesen

                    #-- die folgenden Style-Klassen dürfen nur bei ContentElmenten hinzugefügt werden, die auf der ersten Eben stehen, also nicht
                    #-- nicht von einem Wrapper (hm_tile_container_start) umschlossen sind. Denn die Spalten- bzw. Kachel-Funktion wird nur auf die Elmente der ersten Ebene
                    #-- angewendet. Content-Elemente die innerhalb eines Wrappers stehen gehören ja alle in die gleiche
                    #-- Kachel bzw. Spalte. Da dürfen die Style-Klassen nicht verwendet werden.
                    if (($GLOBALS['kitee']['container'] == "" || $objRow->type == 'hm_tile_container_start') && $objRow->type !== 'hm_tile_container_end') {

                        #-- hole die dem CE zugewiesenen Style-Klassen
                        $classes = is_array($objRow->__get('classes')) ? $objRow->__get('classes') : array();

                        #-- hole die Style-Klassen aufgrund der CE Einstellungen
                        $tile_classes[] = $objRow->__get('hm_tile_item_big');

                        #-- speichere die Nummer des CEs. Also das wievielte Element es in diesem Artikel ist. Wird bei den Spalten benötigt,
                        #-- um die richtigen Klassen zuzuweisen
                        $GLOBALS['kitee']['ce_number'] = (in_array('first', $classes) === true) ? 1 : $GLOBALS['kitee']['ce_number'] + 1;

                        #-- Zuweisen der entsprechenden Klassen, je nach dem, was im Artikel ausgewählt wurde
                        if ($article->hm_tile_rows == 'tiles') {
                            switch ($article->hm_tile_cols) {
                                case 'hm-tiles-2cols':
                                    $tile_classes = array_merge($tile_classes, self::get2ColTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                                case 'hm-tiles-3cols':
                                    $tile_classes = array_merge($tile_classes, self::get3ColTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                                case 'hm-tiles-3cols-full':
                                    $tile_classes = array_merge($tile_classes, self::get3ColFullTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                                case 'hm-tiles-4cols':
                                    $tile_classes = array_merge($tile_classes, self::get4ColTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                                case 'hm-tiles-4cols-full':
                                    $tile_classes = array_merge($tile_classes, self::get4ColFullTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                                case 'hm-tiles-5cols':
                                    $tile_classes = array_merge($tile_classes, self::get5ColTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                                case 'hm-tiles-6cols':
                                    $tile_classes = array_merge($tile_classes, self::get6ColTileClasses($objRow->__get('hm_tile_item_big')));
                                    break;
                            }
                        } else if ($article->hm_tile_rows == 'tiles_isotope') {
                            if ($objRow->__get('hm_tile_item_big')) {
                                $classes[] = $objRow->__get('hm_tile_item_big');
                            }
                            $htmlSizerGutter = '<div class="hm-tiles-sizer"></div><div class="hm-tiles-gutter-sizer"></div>';
                        } else if ($article->hm_tile_rows == 'rows') {
                            #-- ermittle ab welcher Bildschirmgrösse die Spalten eingesetzt werden sollen
                            switch ($article->hm_rows_screensize) {
                                case 'layout-gt-xs-row':
                                    $rowStart = 'gt-xs-';
                                    break;
                                case 'layout-gt-sm-row':
                                    $rowStart = 'gt-sm-';
                                    break;
                                case 'layout-gt-md-row':
                                    $rowStart = 'gt-md-';
                                    break;
                                default:
                                    $rowStart = '';
                            }

                            #-- weise die entsprechenden Style-Klassen dem CE zu
                            if ($objRow->__get('hm_tile_item_big')) {
                                $tile_classes[] = 'flex-' . $rowStart . '100';
                            } else {
                                $rowSize = explode('-', $article->hm_rows_size);
                                if ($GLOBALS['kitee']['ce_number'] % 2 == 0) {
                                    $tile_classes[] = 'flex-' . $rowStart . $rowSize[3];
                                } else {
                                    $tile_classes[] = 'flex-' . $rowStart . $rowSize[2];
                                }
                            }
                        }

                        #-- set ce additional data
                        $tileOrRowClass = ($article->hm_tile_rows == 'tiles' || $article->hm_tile_rows == 'tiles_isotope') ? 'hm-tile' : 'hm-row';
                        $tile_classes[] = $tileOrRowClass;
                        $addToHtmlStart = '<div class="' . implode(' ', $tile_classes) . '"><div class="' . $tileOrRowClass . '-inside">';

                        #-- wenn dem Bild eine Grösse zugewiesen worden ist, dann darf es nicht mit cover (also ausfüllend) angezeigt werden
                        #-- sondern mit der angegebenen Grösse
                        if ($objRow->type == 'image') {
                            $size = deserialize($objRow->size);
                            if ($size[2] == '') {
                                $classes[] = 'container-img-cover';
                            } else {
                                $classes[] = 'container-img-contain';
                            }
                        }

                        $objRow->__set('classes', $classes);
                        $objRow->__set('htmlStart', $addToHtmlStart);
                        $objRow->__set('htmlEnd', $addToHtmlEnd);

                        #-- generate a new strBuffer from objRow
                        #-- Achtung: ein neues generieren des objElement schlägt beim ContentImage fehl. Daher muss ein komplett neues objElement erzeugt werden
                        $strClass = \ContentElement::findClass($objRow->type);
                        $objElement = new $strClass($objRow);
                        $strBuffer = $objElement->generate();

                        #-- füge umschliessendes html hinzu
                        if ($objRow->type != 'hm_tile_container_end') {
                            $strBuffer = $addToHtmlStart . $strBuffer;

                            #-- bei den Container Elementen darf das schliessende Div natürlich auch erst beim schliessenden Container-Element hinzugefügt werden.
                            if ($objRow->type != 'hm_tile_container_start') {
                                $strBuffer .= $addToHtmlEnd;
                            }
                        }

                        #-- füge notwendige divs hinzu
                        if ($classes[0] == 'first' && $article->hm_tile_rows == 'tiles_isotope') {
                            $strBuffer = $htmlSizerGutter . $strBuffer;
                        }

                    } else if ($objRow->type == 'hm_tile_container_end') {
                        #-- fügt die schliessenden Div's hinzu
                        $strBuffer .= $addToHtmlEnd;
                    }

                }
            }
        }

        return $strBuffer;
    }

    /**
     * get classes for 2 columns
     */
    private function get2ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item" :
                return array('flex-100');
                break;
            default:
                return array('flex-xs-100', 'flex-gt-xs-50');
        }
    }

    /**
     * get classes for 3 columns
     */
    private function get3ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":
                return array('flex-100');
                break;
            case "hm-tiles-2col-item":
                return array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-66');
                break;
            default:
                return array('flex-xs-100', 'flex-sm-50', 'flex-gt-sm-33');
        }
    }

    /**
     * get classes for 3 columns full width
     */
    private function get3ColFullTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":
                return array('flex-100');
                break;
            case "hm-tiles-2col-item":
                return array('flex-xs-100', 'flex-sm-100', 'flex-md-66', 'flex-lg-50', 'flex-gt-lg-40');
                break;
            default:
                return array('flex-xs-100', 'flex-sm-50', 'flex-md-33', 'flex-lg-25', 'flex-gt-lg-20');
        }
    }

    /**
     * get classes for 4 columns
     */
    private function get4ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":
                return array('flex-100');
                break;
            case "hm-tiles-2col-item":
                return array('flex-xs-100', 'flex-sm-66', 'flex-gt-sm-50');
                break;
            case "hm-tiles-3col-item":
                return array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-75');
                break;
            default:
                return array('flex-xs-50', 'flex-sm-33', 'flex-gt-sm-25');
        }
    }

    /**
     * get classes for 4 columns full width
     */
    private function get4ColFullTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":
                return array('flex-100');
                break;
            case "hm-tiles-2col-item":
                return array('flex-xs-100', 'flex-sm-66', 'flex-md-50', 'flex-gt-md-40');
                break;
            case "hm-tiles-3col-item":
                return array('flex-xs-100', 'flex-sm-100', 'flex-md-75', 'flex-gt-md-60');
                break;
            default:
                return array('flex-xs-50', 'flex-sm-33', 'flex-md-25', 'flex-gt-md-20');
        }
    }

    /**
     * get classes for 5 columns
     */
    private function get5ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":
                return array('flex-100');
                break;
            case "hm-tiles-2col-item":
                return array('flex-xs-100', 'flex-sm-80', 'flex-gt-sm-40');
                break;
            case "hm-tiles-3col-item":
                return array('flex-xs-100', 'flex-sm-100', 'flex-gt-sm-60');
                break;
            default:
                return array('flex-xs-50', 'flex-sm-40', 'flex-gt-sm-20');
        }
    }

    /**
     * get classes for 6 columns
     */
    private function get6ColTileClasses($itemBig)
    {
        switch ($itemBig) {
            case "hm-tiles-1col-item":
                return array('flex-100');
                break;
            case "hm-tiles-2col-item":
                return array('flex-xs-100', 'flex-sm-50', 'flex-gt-sm-25');
                break;
            default:
                return array('flex-xs-50', 'flex-sm-30', 'flex-16');
        }
    }
}