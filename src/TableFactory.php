<?php

namespace Chambi_Slim_Table;

use Chambi_Slim_Table\Collection\CollectionInterface;
use Chambi_Slim_Table\Collection\Groups\Body;
use Chambi_Slim_Table\Collection\Groups\Foot;
use Chambi_Slim_Table\Collection\Groups\Head;
use Chambi_Slim_Table\Collection\Groups\Table;
use Chambi_Slim_Table\Collection\Groups\Cell;
use Chambi_Slim_Table\Collection\Groups\Row;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
final class TableFactory implements TableFactoryInterface
{
    /**
     * Create a table
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createTable(CollectionInterface ...$collections) : CollectionInterface
    {
        $table = $this->addCollections(new Table(), $collections);

        return $table;
    }

    /**
     * Create a header
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createHead(CollectionInterface ...$collections) : CollectionInterface
    {
        $head = $this->addCollections(new Head(), $collections);

        return $head;
    }

    /**
     * Create a foot
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createFoot(CollectionInterface ...$collections) : CollectionInterface
    {
        $head = $this->addCollections(new Foot(), $collections);

        return $head;
    }

    /**
     * Create a body
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createBody(CollectionInterface ...$collections) : CollectionInterface
    {
        $body = $this->addCollections(new Body(), $collections);

        return $body;
    }

    /**
     * Create a row
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createRow(CollectionInterface ...$collections) : CollectionInterface
    {
        $row = $this->addCollections(new Row(), $collections);

        return $row;
    }

    /**
     * Create a cell
     *
     * @param string $content
     * @param bool   $isHead
     *
     * @return CollectionInterface
     */
    public function createCell(string $content = null, bool $isHead = false) : CollectionInterface
    {
        $cell = new Cell($content, $isHead);

        return $cell;
    }

    /**
     * Add collections in a collection
     *
     * @param CollectionInterface $collectionInstance
     * @param array               $colletions
     *
     * @return CollectionInterface
     */
    private function addCollections(CollectionInterface $collectionInstance, array $collections) : CollectionInterface
    {
        foreach ($collections as $collection) {
            $collectionInstance->addCollection($collection);
        }

        return $collectionInstance;
    }
}
