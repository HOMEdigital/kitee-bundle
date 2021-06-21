<?php


namespace Home\KiteeBundle\Resources\contao\hooks;

use Contao\ContentText;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\ContentElement;
use Contao\ContentModel;
use Home\KiteeBundle\Resources\HomeKiteeHelper;

/**
 * @Hook("getContentElement")
 */
class GetContentElementListener
{
    public function __invoke(ContentModel $contentModel, string $buffer, ContentElement $element): string
    {
        // Modify or create new $buffer here …

        if($element instanceof ContentText){
            $buffer = $this->addTextColumnClasses($contentModel, $buffer, $element);
        }

        return $buffer;
    }

    /**
     *
     * @param ContentModel $contentModel
     * @param string $buffer
     * @param ContentElement $element
     * @return string
     */
    private function addTextColumnClasses(ContentModel $contentModel, string $buffer, ContentElement $element)
    {
        if($contentModel->hm_grid_width || $contentModel->hm_grid_width_s || $contentModel->hm_grid_width_m ||
            $contentModel->hm_grid_width_l || $contentModel->hm_grid_width_xl
        ){
            if(!$contentModel->classes){
                $contentModel->classes = array();
            }
            $contentModel->classes = array_unique(array_merge($contentModel->classes, HomeKiteeHelper::getUkColumnClasses(
                $contentModel->hm_grid_width, $contentModel->hm_grid_width_s, $contentModel->hm_grid_width_m,
                $contentModel->hm_grid_width_l, $contentModel->hm_grid_width_xl)
            ));

            $buffer = $element->generate();
        }

        return $buffer;
    }
}
