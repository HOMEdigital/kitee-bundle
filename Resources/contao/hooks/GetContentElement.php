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
                    $classes = array(); // Klassen des ContentElments
                    $tile_classes = array(); // die Klassen werden dem umschliessenden Div zugewiesen

                    #-- die folgenden Style-Klassen dürfen nur bei ContentElmenten hinzugefügt werden, die auf der ersten Eben stehen, also nicht
                    #-- nicht von einem Wrapper (hm_tile_container_start) umschlossen sind. Denn die Spalten- bzw. Kachel-Funktion wird nur auf die Elmente der ersten Ebene
                    #-- angewendet. Content-Elemente die innerhalb eines Wrappers stehen gehören ja alle in die gleiche
                    #-- Kachel bzw. Spalte. Da dürfen die Style-Klassen nicht verwendet werden.
                    if (($GLOBALS['kitee']['container'] == "" || $objRow->type == 'hm_content_container_start') && $objRow->type !== 'hm_content_container_end') {

                        #-- hole die dem CE zugewiesenen Style-Klassen
                        $classes = is_array($objRow->__get('classes')) ? $objRow->__get('classes') : array();

                        #-- hole die Style-Klassen aufgrund der CE Einstellungen
                        $tile_classes[] = $objRow->__get('hm_tile_item_big');

                        #-- speichere die Nummer des CEs. Also das wievielte Element es in diesem Artikel ist. Wird bei den Spalten benötigt,
                        #-- um die richtigen Klassen zuzuweisen
                        $GLOBALS['kitee']['ce_number'] = (in_array('first', $classes) === true) ? 1 : $GLOBALS['kitee']['ce_number'] + 1;

                        #-- Zuweisen der entsprechenden row&tile Klassen, je nach dem, was im Artikel ausgewählt wurde
                        $tile_classes = array_merge($tile_classes, HomeKiteeHelper::getRowTilesClasses($article, $objRow->__get('hm_tile_item_big')));

                        if ($article->hm_tile_rows == 'tiles_isotope' && $objRow->__get('hm_tile_item_big')) {
                            $classes[] = $objRow->__get('hm_tile_item_big');
                        }

                        #-- set ce additional data
                        $tileOrRowClass = ($article->hm_tile_rows == 'tiles' || $article->hm_tile_rows == 'tiles_isotope') ? 'hm-tile' : 'hm-row';
                        $tile_classes[] = $tileOrRowClass;
                        $addToHtmlStart = '<div class="' . implode(' ', $tile_classes) . '"><div class="' . $tileOrRowClass . '-inside">';


                        #-- wenn dem Bild eine Grösse zugewiesen worden ist, dann darf es nicht mit cover (also ausfüllend) angezeigt werden
                        #-- sondern mit der angegebenen Grösse
                        if ($objRow->type == 'image' || $objRow->type == 'hyperlink') {
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
                        if ($objRow->type != 'hm_content_container_end') {
                            $strBuffer = $addToHtmlStart . $strBuffer;

                            #-- bei den Container Elementen darf das schliessende Div natürlich auch erst beim schliessenden Container-Element hinzugefügt werden.
                            if ($objRow->type != 'hm_content_container_start') {
                                $strBuffer .= $addToHtmlEnd;
                            }
                        }

                        #-- füge notwendige divs hinzu
                        if ($classes[0] == 'first' && $article->hm_tile_rows == 'tiles_isotope') {
                            $strBuffer = '<div class="hm-tiles-sizer"></div><div class="hm-tiles-gutter-sizer"></div>' . $strBuffer;
                        }

                    } else if ($objRow->type == 'hm_content_container_end') {
                        #-- fügt die schliessenden Div's hinzu
                        $strBuffer .= $addToHtmlEnd;
                    }

                }
            }
        }

        return $strBuffer;
    }


}