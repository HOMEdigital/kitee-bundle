<?php


namespace Home\KiteeBundle\Resources\contao\elements;

use \Contao\ContentElement;
use Home\PearlsBundle\Resources\contao\Helper\DataHelper;
use Home\KiteeBundle\Resources\HomeKiteeHelper;


class NewsSelectElement extends ContentElement
{
    /**
     * @var string
     */
    protected $strTemplate = 'ce_news_select';

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
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \Contao\BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
            $objArticle = \Contao\NewsModel::findById($this->hm_news_select);
            if($objArticle && $objArticle instanceof \Contao\NewsModel){
                $this->Template->wildcard = 'News-Element: ' . $objArticle->headline;
            }else{
                $this->Template->wildcard = 'News-Element: -';
            }
        } else {
            if($this->hm_template){
                $this->Template = new \Contao\FrontendTemplate($this->hm_template);
            }
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
                'design' => $this->hm_design
            ))));
        }

        #-- get the news item
        $objArticle = \Contao\NewsModel::findById($this->hm_news_select);
        if($objArticle instanceof  \Contao\NewsModel){
            $arrArticle = DataHelper::convertValue($objArticle->row());
            $this->Template->article = $arrArticle;
        }
    }
}
