<?php

/**
 * tl_content language file
 * DE Deutsch
 *
 * @copyright  HOME - HolsteinMedia
 * @author     Dirk Holstein <dh@holsteinmedia.com>
 *
 */

$moduleName = 'tl_content';

$GLOBALS['TL_LANG'][$moduleName]['layout_legend']       = 'Layoutbereich';
$GLOBALS['TL_LANG'][$moduleName]['text_column_layout_legend'] = 'Spalten-Layoutbereich';
$GLOBALS['TL_LANG'][$moduleName]['background_attachment_layout_legend'] = 'Background-Layoutbereich';

$GLOBALS['TL_LANG'][$moduleName]['anchor'] = array('Anker-Name', 'Name des Ankers, auf den gesprungen werden soll');
$GLOBALS['TL_LANG'][$moduleName]['search_parameter'] = array('Such-Parameter', 'Parameter für die Suche');

$GLOBALS['TL_LANG'][$moduleName]['bkg-']                = 'Rand';
$GLOBALS['TL_LANG'][$moduleName]['bkg-light-grey']      = 'Hellgrau';
$GLOBALS['TL_LANG'][$moduleName]['bkg-dark-grey']       = 'Dunkelgrau';

#-- container element --------------------------------------------------------

$GLOBALS['TL_LANG'][$moduleName]['hm_layout']               = array('Layout', 'Definiert die Breite des Artikels');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_inner_top']       = array('Innen-Abstand oben (padding)', 'Definiert einen inneren, oberen vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_inner_bottom']    = array('Innen-Abstand unten (padding)', 'Definiert einen inneren, unteren vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_design']               = array('Design', 'Definiert das Aussehen');

#-- background attachment
$GLOBALS['TL_LANG'][$moduleName]['hm_position'] = array('Position', 'Definiert die Position. Unnötig wenn Größe angegeben.');
$GLOBALS['TL_LANG'][$moduleName]['hm_size'] = array('Größe', 'Definiert die Größe');
$GLOBALS['TL_LANG'][$moduleName]['hm_height'] = array('Höhe', 'Definiert die Höhe (S: 150px; M: 300px; L: 450px; XL: 600px; 2XL: 750px;)');
$GLOBALS['TL_LANG'][$moduleName]['hm_width_s'] = array('Breite S', 'Definiert die Breite bei Bildschrimen mit 640px und mehr');
$GLOBALS['TL_LANG'][$moduleName]['hm_width_m'] = array('Breite M', 'Definiert die Breite bei Bildschrimen mit 960px und mehr');
$GLOBALS['TL_LANG'][$moduleName]['hm_width_l'] = array('Breite L', 'Definiert die Breite bei Bildschrimen mit 1200px und mehr');
$GLOBALS['TL_LANG'][$moduleName]['hm_width_xl'] = array('Breite XL', 'Definiert die Breite bei Bildschrimen mit 1600px und mehr');

#-- layout
$GLOBALS['TL_LANG'][$moduleName]['hm_design_dyn'] = array('Design', 'Definiert das Aussehen');
$GLOBALS['TL_LANG'][$moduleName]['hm_layout_dyn'] = array('Layout', 'Definiert die Breite des Artikels');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_inner_top_dyn'] = array('Innen-Abstand oben (padding)', 'Definiert einen inneren, oberen vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_inner_bottom_dyn'] = array('Innen-Abstand unten (padding)', 'Definiert einen inneren, unteren vertikalen Abstand');

$GLOBALS['TL_LANG'][$moduleName]['layout-limited']          = 'Begrenzte Breite';
$GLOBALS['TL_LANG'][$moduleName]['layout-limited-m']        = 'Begrenzte Breite M';
$GLOBALS['TL_LANG'][$moduleName]['layout-limited-s']        = 'Begrenzte Breite S';
$GLOBALS['TL_LANG'][$moduleName]['layout-full']             = 'Gesamte Breite';
$GLOBALS['TL_LANG'][$moduleName]['layout-full-limited']     = 'Gesamte Breite - Inhalte begrenzt';
$GLOBALS['TL_LANG'][$moduleName]['layout-full-limited-m']   = 'Gesamte Breite - Inhalte begrenzt M';
$GLOBALS['TL_LANG'][$moduleName]['layout-full-limited-s']   = 'Gesamte Breite - Inhalte begrenzt S';

#-- grid
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_size'] = array('Spalten Abstand', 'Definiert den Abstand zwiechen den Spalten');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_divider'] = array('Spalten Trenner', 'Definiert ob ein Trennstrich zwischen den Spalten angezeigt werden soll');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_match'] = array('Gleiche Höhe für alle Elemente', 'Definiert ob alle Kind-Elemente die gleiche Höhe haben sollen');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_masonry'] = array('Masonry', 'Definiert ob die Kind-Elemente nach dem Masonry-Layout angeordnert werden sollen');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_width'] = array('Spaltenenbreite', 'Definiert die Breite der Spalte für alle Bildschrimgrößen');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_width_s'] = array('Spaltenenbreite S', 'Definiert die Breite der Spalte bei Bildschrimen mit 640px und mehr');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_width_m'] = array('Spaltenenbreite M', 'Definiert die Breite der Spalte bei Bildschrimen mit 960px und mehr');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_width_l'] = array('Spaltenenbreite L', 'Definiert die Breite der Spalte bei Bildschrimen mit 1200px und mehr');
$GLOBALS['TL_LANG'][$moduleName]['hm_grid_width_xl'] = array('Spaltenenbreite XL', 'Definiert die Breite der Spalte bei Bildschrimen mit 1600px und mehr');

#-- slider
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_autoplay'] = array('Autoplay', 'Definiert ob Autoplay verwendet werden soll');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_autoplay_interval'] = array('Autoplay Intervall', 'Definiert den Autoplay Intervall in Millisekunden');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_center'] = array('Center', 'Definiert ob der Aktive-Slide zentriert angeordnet werden soll');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_draggable'] = array('Draggable', 'Definiert ob die Slides mit dem Mauszeiger gezogen werden können');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_infinite'] = array('Infinite', 'Definiert ob die Slides in einer Endlosschleife laufen sollen');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_pause'] = array('Pause-on-Hover', 'Definiert ob das Autoplay angehalten werden soll wenn sich der Mauszeiger auf einen Slide befindet');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_sets'] = array('Gruppieren', 'Definiert ob die Slides einzeln oder als Gruppe gescrollt werden sollen');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_velocity'] = array('Geschwindigkeit', 'Definiert die Geschwindigkeit der Animation in Pixel/ms');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_easing'] = array('Animation', 'Definiert die Animation des Slide-wechsel');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_index'] = array('Index', 'Definiert welches Slider Element als erstes angezeigt werden soll');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_nav_outside'] = array('Navigation Außerhalb', 'Definiert ob die Navigations-Elemente außerhalb der Slides angezeigt werden sollen');
$GLOBALS['TL_LANG'][$moduleName]['hm_slider_nav_hide_hover'] = array('Navigation Verbergen', 'Definiert ob die Navigations-Elemente nur angezeigt werden sollen wenn der Mauszeiger sich auf den Slides befindet');


$GLOBALS['TL_LANG'][$moduleName]['step-inner-top-no']        = 'Kein Abstand';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-top-xl']        = 'Abstand oben XL';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-top-l']         = 'Abstand oben L';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-top-m']         = 'Abstand oben M';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-top-s']         = 'Abstand oben S';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-bottom-no']     = 'Kein Abstand';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-bottom-xl']     = 'Abstand unten XL';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-bottom-l']      = 'Abstand unten L';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-bottom-m']      = 'Abstand unten M';
$GLOBALS['TL_LANG'][$moduleName]['step-inner-bottom-s']      = 'Abstand unten S';

$GLOBALS['TL_LANG'][$moduleName]['auto']     = 'Auto - nimmt die Breite des Kindelements ein';
$GLOBALS['TL_LANG'][$moduleName]['expand']   = 'Expand - nimmt restlichen Platz ein';
$GLOBALS['TL_LANG'][$moduleName]['1-1']      = 'Breite 1-1 | 100%';
$GLOBALS['TL_LANG'][$moduleName]['1-2']      = 'Breite 1-2 | 50%';
$GLOBALS['TL_LANG'][$moduleName]['1-3']      = 'Breite 1-3 | 33%';
$GLOBALS['TL_LANG'][$moduleName]['2-3']      = 'Breite 2-3 | 66%';
$GLOBALS['TL_LANG'][$moduleName]['1-4']      = 'Breite 1-4 | 25%';
$GLOBALS['TL_LANG'][$moduleName]['2-4']      = 'Breite 2-4 | 50%';
$GLOBALS['TL_LANG'][$moduleName]['3-4']      = 'Breite 3-4 | 75%';
$GLOBALS['TL_LANG'][$moduleName]['1-5']      = 'Breite 1-5 | 20%';
$GLOBALS['TL_LANG'][$moduleName]['2-5']      = 'Breite 2-5 | 40%';
$GLOBALS['TL_LANG'][$moduleName]['3-5']      = 'Breite 3-5 | 60%';
$GLOBALS['TL_LANG'][$moduleName]['4-5']      = 'Breite 4-5 | 80%';
$GLOBALS['TL_LANG'][$moduleName]['1-6']      = 'Breite 1-6 | 16%';
$GLOBALS['TL_LANG'][$moduleName]['2-6']      = 'Breite 2-6 | 33%';
$GLOBALS['TL_LANG'][$moduleName]['3-6']      = 'Breite 3-6 | 50%';
$GLOBALS['TL_LANG'][$moduleName]['4-6']      = 'Breite 4-6 | 66%';
$GLOBALS['TL_LANG'][$moduleName]['5-6']      = 'Breite 5-6 | 83%';

$GLOBALS['TL_LANG'][$moduleName]['uk-grid-small']     = 'Abstand S';
$GLOBALS['TL_LANG'][$moduleName]['uk-grid-medium']    = 'Abstand M';
$GLOBALS['TL_LANG'][$moduleName]['uk-grid-large']     = 'Abstand L';
$GLOBALS['TL_LANG'][$moduleName]['uk-grid-collapse']  = 'Kein Abstand';

$GLOBALS['TL_LANG'][$moduleName]['uk-grid-divider']  = 'Mit Trennelement';

$GLOBALS['TL_LANG'][$moduleName]['uk-grid-match']  = 'Gleiche Höhe';

$GLOBALS['TL_LANG'][$moduleName]['uk-grid-masonry']  = 'Masonry anwenden';

#-- tile field -----------------------------
$GLOBALS['TL_LANG'][$moduleName]['tiles_legend']            = 'Einstellungen für Kacheln & Spalten';
$GLOBALS['TL_LANG'][$moduleName]['hm_tile_item_big']        = array('Spalten übergreifend', 'Das Element soll über mehrere Spalten angezeigt werden');
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-1col-item']      = 'Alle Spalten';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-2col-item']      = '2-spaltig';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-3col-item']      = '3-spaltig';
$GLOBALS['TL_LANG'][$moduleName]['flex-100']                = 'Alle Spalten';

#-- piteli-Box ----------------------------------------
$GLOBALS['TL_LANG'][$moduleName]['hm_title']        = array('Überschrift', 'Überschrift der Kachel');

$GLOBALS['TL_LANG'][$moduleName]['display_legend']      = 'Darstellung';
$GLOBALS['TL_LANG'][$moduleName]['hm_display']          = array('Darstellung', 'Darstellungsarten der Kachel');
$GLOBALS['TL_LANG'][$moduleName]['img_top']             = 'Bild/Icon oben';
$GLOBALS['TL_LANG'][$moduleName]['img_bottom']          = 'Bild/Icon unten';
$GLOBALS['TL_LANG'][$moduleName]['img_left']            = 'Bild/Icon links';
$GLOBALS['TL_LANG'][$moduleName]['img_right']           = 'Bild/Icon rechts';

#-- icteli-Box ----------------------------------------
$GLOBALS['TL_LANG'][$moduleName]['icon_legend'] = 'Icon';
$GLOBALS['TL_LANG'][$moduleName]['hm_icon']     = array('Icon', 'Geben Sie den Wert an um auf das Icon zuzugreifen. Bei FontAwesome bitte davor noch &#x setzen! ');

#-- anchor ----------------------------------------
$GLOBALS['TL_LANG'][$moduleName]['hm_anchor_id']        = array('Anker-Id', 'ID des Ankers, wird benötigt, damit man zu diesem Anker springen kann');
$GLOBALS['TL_LANG'][$moduleName]['anchor_legend']       = 'Anker Einstellungen';

#-- news_select
$GLOBALS['TL_LANG'][$moduleName]['hm_news_select_legend'] = 'News Auswahl';
$GLOBALS['TL_LANG'][$moduleName]['hm_news_select'] = array('News', 'Auswahl welches News Element angezeigt werden soll.');
$GLOBALS['TL_LANG'][$moduleName]['hm_template'] = array('Template', 'Auswahl des Templates zur Anzeige des Elements.');
