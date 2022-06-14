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

class PiTeLiBoxElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'ce_piteli_box_img';

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
            $this->Template             = new \BackendTemplate('list_image_title');
            $this->Template->title      = $this->text;
            $this->Template->image      = DataHelper::getMultiImgObjs($this->multiSRC, array('120', '120'))[0];
        } else {
            $this->generateFrontend();
        }
    }

    /**
     * generate frontend for module
     */
    private function generateFrontend()
    {
        if ($this->multiSRC) {
            $this->Template->multiImages = DataHelper::getMultiImgObjs($this->multiSRC, deserialize($this->size));
        }

        #-- add classes
        if (is_array($this->objModel->classes)) {
            $this->objModel->classes = array_unique(array_merge($this->objModel->classes, HomeKiteeHelper::getLayoutClasses(array(
                'design' => $this->hm_design
            ))));
        } else {
            $this->objModel->classes = array_unique(HomeKiteeHelper::getLayoutClasses(array(
                'design' => $this->hm_design
            )));

        }
    }
}