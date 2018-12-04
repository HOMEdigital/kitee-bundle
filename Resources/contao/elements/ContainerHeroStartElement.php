<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources\contao\elements;

use Home\KiteeBundle\Resources\HomeKiteeHelper;

class ContainerHeroStartElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'cte_container_start';

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
        } else {
            $this->generateFrontend();
        }
    }

    /**
     * generate frontend for module
     */
    private function generateFrontend()
    {
        #-- add classes
        $this->objModel->classes = array_merge($this->objModel->classes, HomeKiteeHelper::getLayoutClasses(array(
            'stepOuterTop' => $this->hm_step_outer_top,
            'stepOuterBottom' => $this->hm_step_outer_bottom
        )));
/*
        $this->Template->contentClasses = "";
        if ($this->hm_layout) {
            $this->Template->contentClasses .= " " . $this->hm_layout;
        }
*/

        #-- store the wrapper start; will be closed in end element
        $GLOBALS['kitee']['container'] = 'containerHero';
    }

}