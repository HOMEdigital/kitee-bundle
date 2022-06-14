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
    protected $strTemplate = 'news_slick';

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
        } else {
            $this->objModel->classes = array_unique(HomeKiteeHelper::getLayoutClasses(array(
                'design' => $this->hm_design
            )));

        }

        #-- get the news item
        $objArticle = \Contao\NewsModel::findById($this->hm_news_select);
        if($objArticle instanceof  \Contao\NewsModel){
            $arrArticle = DataHelper::convertValue($objArticle->row());

            $link = str_replace('.html', '/' .$arrArticle['alias'] . '.html', \Contao\Controller::replaceInsertTags($this->url));

            $this->Template->article = $arrArticle;
            $this->Template->headline = $arrArticle['headline'];
            $this->Template->linkHeadline = $arrArticle['headline'];
            $this->Template->date = date('d.m.Y h:i',$arrArticle['date']);
            $this->Template->datetime = date('Y-m-d\TH:i:sP', $arrArticle['date']);
            $this->Template->newstext = $arrArticle['newstext'];
            $this->Template->gallery = $arrArticle['gallery'];
            $this->Template->link = $link;
            $this->Template->hasTeaser = true;
            $this->Template->hasMetaFields = true;
            $this->Template->more = '<a href="' . $link . '">mehr</a>';

            #-- teaser
            $maxTeaserLength = 115;
            if (strlen($arrArticle['newstext']) > $maxTeaserLength) {
                #-- kürze teaser string
                $teaser = \StringUtil::substrHtml($arrArticle['newstext'], $maxTeaserLength);
                #-- füge '...' hinzu
                // +-- wenn ein </p> am Schluss steht, muss das '...' davor eingefügt werden.
                if (strlen($teaser) == strrpos($teaser, '</p>') + 4) {
                    $teaser = substr($teaser, 0, strlen($teaser) - 4) . '&nbsp;...</p>';
                } else {
                    $teaser .= '&nbsp;...';
                }
            } else {
                if ($arrArticle['newstext'] != "") {
                    $this->Template->link = null;
                    $this->Template->more = false;
                }
                $teaser = $arrArticle['newstext'];
            }

            $this->Template->teaser = $teaser;
        }
    }
}
