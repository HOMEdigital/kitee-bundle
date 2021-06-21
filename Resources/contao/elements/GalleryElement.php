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

class GalleryElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'cte_gallery';

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
            $this->Template->title      = $this->headline;
            $this->Template->image      = DataHelper::getMultiImgObjs($this->galleryOrder, array('120', '120'))[0];
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
        if ($this->galleryOrder) {
            $this->Template->multiImages = DataHelper::getMultiImgObjs($this->galleryOrder, deserialize($this->size));
        }

        //$options =

        #-- add classes
        if (is_array($this->objModel->classes)) {
            $this->objModel->classes = array_unique(array_merge($this->objModel->classes, HomeKiteeHelper::getLayoutClasses(array(
                'design' => $this->hm_design
            ))));
        }
    }
}
