<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\CustomizeeBundle\Resources\contao\elements;

use Home\LibrareeBundle\Resources\contao\elements\RecipeeDetailElement;
use Home\LibrareeSearchBundle\Resources\contao\elements\SearchResultElement;
use Home\PearlsBundle\Resources\contao\Helper as Helper;

class ContainerEndElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'cte_container_end';

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

    }

}