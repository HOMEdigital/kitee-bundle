<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources\contao\elements;

use Home\KiteeBundle\Resources\HomeKiteeHelper;

class GridColumnElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'cte_container_grid_column';

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
        }
    }

}
