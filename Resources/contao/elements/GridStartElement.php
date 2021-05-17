<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources\contao\elements;

use Home\KiteeBundle\Resources\HomeKiteeHelper;

class GridStartElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'cte_container_grid_start';

    /**
     * @return string
     */
    public function generate()
    {
        return parent::generate();
    }

    /**
     * generate module
     */
    protected function compile()
    {
        if (TL_MODE == 'BE') {
            $this->strTemplate          = 'be_wildcard';
            $this->Template             = new \BackendTemplate($this->strTemplate);
            $this->Template->title      = $this->headline;
            $this->Template->wildcard   = 'Alle: '.$this->hm_grid_width.' | S: '.$this->hm_grid_width_s.' | M: '.$this->hm_grid_width_m.' | L: '.$this->hm_grid_width_l.' | XL: '.$this->hm_grid_width_xl;
        } else {
            $GLOBALS['TL_CSS'][] = 'bundles/homekitee/uikit-3.6.21/css/uikit.min.css';
            $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/homekitee/uikit-3.6.21/js/uikit.min.js';
            $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/homekitee/uikit-3.6.21/js/uikit-icons.min.js';

            $this->generateFrontend();
        }
    }

    /**
     * generate frontend for module
     */
    private function generateFrontend()
    {
        #-- store the wrapper start; will be closed in end element
        $GLOBALS['kitee']['container'] = 'containerTile';
    }

}
