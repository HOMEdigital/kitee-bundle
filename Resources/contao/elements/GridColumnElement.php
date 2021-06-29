<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 18.09.2017
 * Time: 15:22
 */

namespace Home\KiteeBundle\Resources\contao\elements;

class GridColumnElement extends GridStartElement
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

}
