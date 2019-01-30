<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources\contao\elements;

use Home\PearlsBundle\Resources\contao\Helper\DataHelper;
use Home\KiteeBundle\Resources\HomeKiteeHelper;

class TileElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'ce_tile_img_top';

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
            $this->strTemplate          = 'list_image_title';
            $this->Template             = new \BackendTemplate($this->strTemplate);
            $this->Template->title      = $this->hm_title;
            $this->Template->image      = DataHelper::getMultiImgObjs($this->multiSRC, array('120', '120'))[0];
        } else {
            if ($this->hm_display != '' && $this->hm_display != 'ce_tile_img_top') {
                $this->Template     = new \FrontendTemplate($this->hm_display);
                $this->Template->setData($this->arrData);
            }
            $this->generateFrontend();
        }
    }

    /**
     * generate frontend for module
     */
    private function generateFrontend()
    {
        if ($this->multiSRC) {
            $this->Template->multiImages = DataHelper::getMultiImgObjs($this->multiSRC, array(null, null, ''));
        }

        #-- add classes
        $this->objModel->classes = array_unique(array_merge($this->objModel->classes, HomeKiteeHelper::getLayoutClasses(array(
            'design' => $this->hm_design
        ))));
    }
}