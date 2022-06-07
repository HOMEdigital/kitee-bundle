<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources\contao\elements;

use Home\KiteeBundle\Resources\HomeKiteeHelper;

class LayoutStartElement extends \ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'cte_container_layout_start';

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
            $this->Template->wildcard   = 'Layout: <b>' . $GLOBALS['TL_LANG']['tl_content'][$this->hm_layout_dyn] .
                '</b> | Innen-Abstand oben (padding): <b>' . $GLOBALS['TL_LANG']['tl_content'][$this->hm_step_inner_top_dyn] .
                '</b> | Innen-Abstand unten (padding): <b>' . $GLOBALS['TL_LANG']['tl_content'][$this->hm_step_inner_bottom_dyn] . '</b>';
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
        if (is_array($this->objModel->classes)) {
            $this->objModel->classes = array_unique(array_merge($this->objModel->classes, HomeKiteeHelper::getLayoutClasses(array(
                'design' => $this->hm_design_dyn,
                'layout' => $this->hm_layout_dyn,
                'stepInnerTop' => $this->hm_step_inner_top_dyn,
                'stepInnerBottom' => $this->hm_step_inner_bottom_dyn,
            ))));
        } else {
            $this->objModel->classes = array_unique(HomeKiteeHelper::getLayoutClasses(array(
                'design' => $this->hm_design_dyn,
                'layout' => $this->hm_layout_dyn,
                'stepInnerTop' => $this->hm_step_inner_top_dyn,
                'stepInnerBottom' => $this->hm_step_inner_bottom_dyn,
            )));

        }

        #-- store the wrapper start; will be closed in end element
        $GLOBALS['kitee']['container'] = 'containerTile';
    }

}
