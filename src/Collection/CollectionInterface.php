<?php

namespace Chambi_Slim_Table\Collection;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
interface CollectionInterface
{
    /**
     * Display a collection
     *
     * @return string
     */
    public function display() : string;
}
