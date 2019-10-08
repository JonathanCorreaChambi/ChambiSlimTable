<?php

namespace Chambi_Slim_Table\Collection\Groups;

use Chambi_Slim_Table\Collection\AbstractCollection;
use Chambi_Slim_Table\Collection\CollectionInterface;
use Chambi_Slim_Table\Settings\AttributeSetting;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
class Head extends AbstractCollection implements CollectionInterface
{
    use AttributeSetting;

    /**
     * Display Cell
     *
     * @return string
     */
    public function display() : string
    {
        return '<thead '.$this->getAttributes().'>'.$this->getCollections().'</thead>';
    }
}
