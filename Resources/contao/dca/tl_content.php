<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 27.09.2017
 * Time: 16:33
 */

namespace Home\KiteeBundle\Resources\contao\dca;

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;


try{
    $tl_content = new Helper\DcaHelper('tl_content');

    #-- a content base definition; can be copied for each content element ---------------------
    $tl_content
        ->mergeFieldSettings('start','eval', array('tl_class' => 'w50 clr'))
        ->addPaletteGroup('type', array('type'), 'hm_kitee_content_base')
        ->addPaletteGroup('protected', array('protected'), 'hm_kitee_content_base')
        ->addPaletteGroup('invisible', array('invisible', 'guests', 'start', 'stop'), 'hm_kitee_content_base')
    ;

    #-- hm_content_container_start --------------------------------------------
    $tl_content
        ->addField('select', 'hm_design', array(
            'options' => array(),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_tile_item_big', array(
            'options_callback'  => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getItemBigOptions'),
            'reference'         => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->mergeFieldSettings('singleSRC', 'eval', array('mandatory'=>false))
    ;

    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_content_container_start')
        ->addPaletteGroup('image', array('singleSRC'), 'hm_content_container_start', 2)
        ->addPaletteGroup('layout', array('inColumn', 'hm_design'), 'hm_content_container_start', 3)
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'hm_content_container_start', 4)
    ;

    #-- hm_layout --------------------------------------------
    $tl_content
        ->addField('select', 'hm_design_dyn', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getDynOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
                'options_field' => 'design'
            ),
        ))
        ->addField('select', 'hm_layout_dyn', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getDynOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
                'options_field' => 'layout'
            ),
        ))
        ->addField('select', 'hm_step_inner_top_dyn', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getDynOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
                'options_field' => 'step_inner_top'
            ),
        ))
        ->addField('select', 'hm_step_inner_bottom_dyn', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getDynOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
                'options_field' => 'step_inner_bottom'
            ),
        ))
        ->copyPalette('hm_kitee_content_base', 'hm_layout_container_start')
        ->addPaletteGroup('layout',
            array('hm_design_dyn', 'hm_layout_dyn', 'hm_step_inner_top_dyn', 'hm_step_inner_bottom_dyn'),
            'hm_layout_container_start', 2
        )
    ;

    #-- hm_grid --------------------------------------------
    $tl_content
        ->addField('select', 'hm_grid_size', array(
            'options' => array(
                'uk-grid-small',
                'uk-grid-medium',
                'uk-grid-large',
                'uk-grid-collapse'
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_divider', array(
            'options' => array(
                'uk-grid-divider',
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_match', array(
            'options' => array(
                'uk-grid-match',
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_masonry', array(
            'options' => array(
                'uk-grid-masonry',
            ),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_width', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getGridWidthOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_width_s', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getGridWidthOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_width_m', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getGridWidthOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_width_l', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getGridWidthOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))
        ->addField('select', 'hm_grid_width_xl', array(
            'options_callback' => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getGridWidthOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50',
                'includeBlankOption' => true,
            ),
        ))

        ->copyPalette('hm_kitee_content_base', 'hm_grid_container_start')
        ->addPaletteGroup('layout',
            array('hm_grid_size', 'hm_grid_divider', 'hm_grid_match', 'hm_grid_masonry', 'hm_grid_width',
                'hm_grid_width_s', 'hm_grid_width_m', 'hm_grid_width_l', 'hm_grid_width_xl'),
            'hm_grid_container_start', 2
        )

        ->copyPalette('hm_kitee_content_base', 'hm_grid_container_column')
        ->addPaletteGroup('layout',
            array('hm_grid_width', 'hm_grid_width_s', 'hm_grid_width_m', 'hm_grid_width_l', 'hm_grid_width_xl',),
            'hm_grid_container_column', 2
        )
    ;

    #-- hm_slider
    $tl_content
        ->addField('checkbox','hm_slider_autoplay', array(
            'default' => 0,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('integer','hm_slider_autoplay_interval', array(
            'default' => 7000,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_center', array(
            'default' => 0,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_draggable', array(
            'default' => 1,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_infinite', array(
            'default' => 1,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_pause', array(
            'default' => 1,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_sets', array(
            'default' => 0,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('integer','hm_slider_velocity', array(
            'default' => 1,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('text', 'hm_slider_easing', array(
            'default' => 'ease',
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('integer','hm_slider_index', array(
            'default' => 0,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_nav_hide_hover', array(
            'default' => 1,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->addField('checkbox','hm_slider_nav_outside', array(
            'default' => 0,
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ))
        ->copyPalette('hm_kitee_content_base', 'hm_slider')
        ->addPaletteGroup('image', array('multiSRC','size','sortBy'), 'hm_slider', 2)
        ->addPaletteGroup('slider',
            array('hm_slider_autoplay', 'hm_slider_autoplay_interval', 'hm_slider_center', 'hm_slider_draggable',
                'hm_slider_infinite', 'hm_slider_pause', 'hm_slider_sets', 'hm_slider_velocity', 'hm_slider_easing',
                'hm_slider_index', 'hm_slider_nav_hide_hover', 'hm_slider_nav_outside'),
            'hm_slider', 3
        )
        ->addPaletteGroup('layout',
            array('hm_grid_size',
                'hm_grid_width', 'hm_grid_width_s', 'hm_grid_width_m', 'hm_grid_width_l', 'hm_grid_width_xl',),
            'hm_slider', 4
        )
    ;

    #-- add column layout to text element --------------------------------------------
    $tl_content
        ->addPaletteGroup('layout', array('hm_grid_width', 'hm_grid_width_s', 'hm_grid_width_m',
            'hm_grid_width_l', 'hm_grid_width_xl'), 'text', 3
        )
    ;

    #-- hm_anchor --------------------------------------------
    $tl_content
        ->addField('text', 'hm_anchor_id', array(
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
    ;

    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_anchor')
        ->addPaletteGroup('anchor', array('type', 'hm_anchor_id'), 'hm_anchor', 2)
        ->addPaletteGroup('layout', array('inColumn', 'hm_step_outer_top', 'hm_step_outer_bottom'), 'hm_anchor', 3)
    ;

    #-- hm_hr --------------------------------------------
    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_hr')
        ->addPaletteGroup('layout', array('hm_step_outer_top', 'hm_step_outer_bottom'), 'hm_hr', 2)
    ;

    #-- hm_hero_container_start --------------------------------------------
    $tl_content
        ->addField('select', 'hm_layout', array(
            'options' => array(
                'hm-layout-limited',
                'hm-layout-limited-m',
                'hm-layout-limited-s'
            ),
            'default' => 'limited',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
    ;

    #-- news select ------------------------------------------------
    $tl_content
        ->addField('select', 'hm_news_select', array(
            'options_callback'  => array('Home\KiteeBundle\Resources\contao\dca\tl_content', 'getNewsSelectOptions'),
            'eval' => array(
                'tl_class' => 'w50 clr',
                'chosen' => true,
                'includeBlankOption' => true,
                'mandatory' => true,
            ),
        ))
        ->addField('select_template', 'hm_template', array(
            'tempPrefix' => 'news_',
        ))
        ->copyPalette('hm_kitee_content_base', 'hm_news_select')
        ->addPaletteGroup('hm_news_select', array('hm_news_select', 'hm_template', 'hm_design', 'url'), 'hm_news_select', 2)
    ;

    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_hero_container_start')
        ->addPaletteGroup('image', array('singleSRC', 'size'), 'hm_hero_container_start', 2)
    ;

    #-- hm_piteli_box --------------------------------------------
    $tl_content
        ->addField('text', 'hm_title', array(
            'eval' => array(
                'tl_class' => 'w50'
            ),
        ))
        ->addField('select', 'hm_display', array(
            'options' => array(
                'img_top',
                'img_bottom',
                'img_left',
                'img_right'
            ),
            'default' => 'ce_tile_img_top',
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
        ))
        ->mergeFieldSettings('text', 'eval', array('mandatory'=>false, 'tl_class'=>'clr'))
        ->mergeFieldSettings('url', 'eval', array('mandatory'=>false))
    ;
    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_piteli_box')
        ->addPaletteGroup('image', array('multiSRC','size','sortBy'), 'hm_piteli_box', 2)
        ->addPaletteGroup('text', array('text'), 'hm_piteli_box', 3)
        ->addPaletteGroup('link', array('url','linkTitle'), 'hm_piteli_box', 4)
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'hm_piteli_box', 5)
        ->addPaletteGroup('display', array('hm_display'), 'hm_piteli_box', 6)
    ;

    #-- hm_icteli_box --------------------------------------------
    $tl_content
        ->addField('text', 'hm_icon', array(
            'eval' => array(
                'decodeEntities' => true,
                'tl_class' => 'w50'
            ),
        ))
        ->mergeFieldSettings('text', 'eval', array('mandatory'=>false, 'tl_class'=>'clr'))
        ->mergeFieldSettings('url', 'eval', array('mandatory'=>false))
    ;
    $tl_content
        ->copyPalette('hm_kitee_content_base', 'hm_icteli_box')
        ->addPaletteGroup('icon', array('hm_icon'), 'hm_icteli_box', 2)
        ->addPaletteGroup('text', array('text'), 'hm_icteli_box', 3)
        ->addPaletteGroup('link', array('url','linkTitle'), 'hm_icteli_box', 4)
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'hm_icteli_box', 5)
        ->addPaletteGroup('display', array('hm_display'), 'hm_icteli_box', 6)
    ;

    #-- vorhandene Content Elemente erweitern
    $tl_content
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'text', 4)
        ->addPaletteGroup('tiles', array('hm_tile_item_big'), 'image', 4)
    ;

}catch(\Exception $e){
    var_dump($e);
}


/**
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_content extends \Backend
{
    public function getGridWidthOptions(\Contao\DataContainer $dc)
    {
        return array(
            'auto',
            'expand',
            '1-1',
            '1-2',
            '1-3',
            '2-3',
            '1-4',
            '2-4',
            '3-4',
            '1-5',
            '2-5',
            '3-5',
            '4-5',
            '1-6',
            '2-6',
            '3-6',
            '4-6',
            '5-6',
        );
    }

    public function getDynOptions(\Contao\DataContainer $dc)
    {
        $arrData = $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field];
        $container = \System::getContainer();

        if ($container === null) {
            return [];
        }

        if ($container->hasParameter('home_digital') && \is_array($params = $container->getParameter('home_digital'))) {
            if (isset($arrData['eval']['options_field']) && isset($params[$arrData['eval']['options_field']])) {
                return $params[$arrData['eval']['options_field']];
            }
        }
        return [];
    }

    public function getNewsSelectOptions(\Contao\DataContainer $dc){
        $return = array();

        #-- get all news elements
        $news = \Contao\NewsModel::findAll()->fetchAll();

        foreach ($news as $row){
            $return[$row['id']] = $row['headline'];
        }

        #-- sort news elements by
        asort($return);

        return $return;
    }

    public function getItemBigOptions($element)
    {
        $tileOptions = array(
            'hm-tiles-1col-item',
            'hm-tiles-2col-item',
            'hm-tiles-3col-item'
        );

        $rowOptions = array(
            'flex-100'
        );

        $ce = \ContentModel::findById($element->id);
        if ($ce) {
            if ($ce->pid > 0 && $ce->ptable == 'tl_article') {
                $article = \ArticleModel::findById($ce->pid);
                if($article) {
                    return ($article->hm_tile_rows == 'tiles') ? $tileOptions : $rowOptions;
                }
            }
        }

        return '';
    }
}
