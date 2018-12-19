<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 13.12.2017
 * Time: 13:56
 */

$moduleName = 'tl_article';

#-- layout

$GLOBALS['TL_LANG'][$moduleName]['layout_legend']       = 'Layoutbereich';

$GLOBALS['TL_LANG'][$moduleName]['hm_layout']               = array('Layout', 'Definiert die Breite des Artikels');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_inner_top']       = array('Innen-Abstand oben (padding)', 'Definiert einen inneren, oberen vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_inner_bottom']    = array('Innen-Abstand unten (padding)', 'Definiert einen inneren, unteren vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_outer_top']       = array('Aussen-Abstand oben (margin)', 'Definiert einen äusseren, oberen vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_step_outer_bottom']    = array('Aussen-Abstand unten (margin)', 'Definiert einen äusseren, unteren vertikalen Abstand');
$GLOBALS['TL_LANG'][$moduleName]['hm_design']               = array('Design', 'Definiert das Aussehen');

$GLOBALS['TL_LANG'][$moduleName]['hm-layout-limited']           = 'Begrenzte Breite';
$GLOBALS['TL_LANG'][$moduleName]['hm-layout-limited-m']         = 'Begrenzte Breite - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-layout-limited-s']         = 'Begrenzte Breite - small';
$GLOBALS['TL_LANG'][$moduleName]['hm-layout-full-limited']      = 'Gesamte Breite - Inhalte begrenzt';
$GLOBALS['TL_LANG'][$moduleName]['hm-layout-full-limited-m']    = 'Gesamte Breite - Inhalte begrenzt - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-layout-full-limited-s']    = 'Gesamte Breite - Inhalte begrenzt - small';
$GLOBALS['TL_LANG'][$moduleName]['hm-layout-full']              = 'Gesamte Breite';

$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-top-no']        = 'Kein Abstand';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-top-l']         = 'Abstand oben - large';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-top-m']         = 'Abstand oben - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-top-s']         = 'Abstand oben - small';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-bottom-no']     = 'Kein Abstand';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-bottom-l']      = 'Abstand unten - large';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-bottom-m']      = 'Abstand unten - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-bottom-s']      = 'Abstand unten - small';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-l']             = 'Abstand oben & unten - large';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-m']             = 'Abstand oben & unten - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-inner-s']             = 'Abstand oben & unten - small';

$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-top-no']        = 'Kein Abstand';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-top-l']         = 'Abstand oben - large';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-top-m']         = 'Abstand oben - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-top-s']         = 'Abstand oben - small';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-bottom-no']     = 'Kein Abstand';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-bottom-l']      = 'Abstand unten - large';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-bottom-m']      = 'Abstand unten - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-bottom-s']      = 'Abstand unten - small';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-l']             = 'Abstand oben & unten - large';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-m']             = 'Abstand oben & unten - medium';
$GLOBALS['TL_LANG'][$moduleName]['hm-step-outer-s']             = 'Abstand oben & unten - small';


#-- tiles

$GLOBALS['TL_LANG'][$moduleName]['tile_legend']     = 'Spalten & Kacheln';

$GLOBALS['TL_LANG'][$moduleName]['hm_tile_rows']        = array('Spalten & Kacheln', 'Angabe, wie die Kindelemente des Artikels ausgegeben werden sollen.');
$GLOBALS['TL_LANG'][$moduleName]['rows']                = "Spalten";
$GLOBALS['TL_LANG'][$moduleName]['tiles']               = "Kacheln";

$GLOBALS['TL_LANG'][$moduleName]['hm_rows_screensize'] = array('Bildschrimgrösse', 'Ab welcher Bildschirmgrösse sollen die Spalten angewendet werden');
$GLOBALS['TL_LANG'][$moduleName]['layout-row']         = 'Immer Spalten';
$GLOBALS['TL_LANG'][$moduleName]['layout-gt-xs-row']   = 'Spalten > xs';
$GLOBALS['TL_LANG'][$moduleName]['layout-gt-sm-row']   = 'Spalten > sm';
$GLOBALS['TL_LANG'][$moduleName]['layout-gt-md-row']   = 'Spalten > md';

$GLOBALS['TL_LANG'][$moduleName]['hm_rows_size']    = array('Spaltenaufteilung', 'Wie sollen die Spalten aufgeteilt werden');
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-flex']    = 'Alle Spalten sind gleich gross';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-10-90']   = '10:90';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-20-80']   = '20:80';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-30-70']   = '30:70';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-40-60']   = '40:60';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-50-50']   = '50:50';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-60-40']   = '60:40';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-70-30']   = '70:30';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-80-20']   = '80:20';
$GLOBALS['TL_LANG'][$moduleName]['hm-rows-90-10']   = '90:10';

$GLOBALS['TL_LANG'][$moduleName]['hm_tile_cols']        = array('Spaltenanzahl', 'Wie viele Spalten sollen verwendet werden. Die Anzahl der Spalten bezieht sich auf eine MD-Auflösung');
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-2cols']      = '2-spaltig';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-3cols']      = '3-spaltig';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-3cols-full'] = '3-spaltig + gesamte Breite';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-4cols']      = '4-spaltig';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-4cols-full'] = '4-spaltig + gesamte Breite';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-5cols']      = '5-spaltig';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-6cols']      = '6-spaltig';

$GLOBALS['TL_LANG'][$moduleName]['hm_tile_height']              = array('Kachelhöhe', 'Definiert die Höhe der Kacheln');
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-height-different']   = 'Höhe je nach Inhalt';
$GLOBALS['TL_LANG'][$moduleName]['hm-tiles-height-same']        = 'Kacheln haben gleiche Höhe';
