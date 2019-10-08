<?php

namespace Chambi_Slim_Table\Collection;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
abstract class AbstractCollection
{
    /**
     * Store collections
     *
     * @var array
     */
    private $storage = [];

    /**
     * Add A Collection
     *
     * @param CollectionInterface $collection
     *
     * @return void
     */
    public function addCollection(CollectionInterface $collection) : void
    {
        $this->storage[] = $collection;
    }

    /**
     * Return collections from display method
     *
     * @return string
     */
    public function getCollections() : string
    {
        $content = '';
        foreach ($this->storage as $object) {
            $content .= $object->display();
        }

        return $content;
    }

    /**
     * Display a collection
     *
     * @return string
     */
    abstract public function display() : string;
}
