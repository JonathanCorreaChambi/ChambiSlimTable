<?php

namespace Chambi_Slim_Table\Collection\Groups;

use Chambi_Slim_Table\Collection\AbstractCollection;
use Chambi_Slim_Table\Collection\CollectionInterface;
use Chambi_Slim_Table\Settings\AttributeSetting;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
class Row extends AbstractCollection implements CollectionInterface
{
    use AttributeSetting;

    /**
     * Display Row
     *
     * @return string
     */
    public function display() : string
    {
        return '<tr '.$this->getAttributes().'>'.$this->getCollections().'</tr>';
    }
}
