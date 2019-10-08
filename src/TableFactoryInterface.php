<?php

namespace Chambi_Slim_Table;

use Chambi_Slim_Table\Collection\CollectionInterface;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
interface TableFactoryInterface
{
    /**
     * Create a table
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createTable(CollectionInterface ...$collections) : CollectionInterface;

    /**
     * Create a header
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createHead(CollectionInterface ...$collections) : CollectionInterface;

    /**
     * Create a foot
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createFoot(CollectionInterface ...$collections) : CollectionInterface;

    /**
     * Create a body
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createBody(CollectionInterface ...$collections) : CollectionInterface;

    /**
     * Create a row
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function createRow(CollectionInterface ...$collections) : CollectionInterface;

    /**
     * Create a cell
     *
     * @param string $content
     * @param bool   $isHead
     *
     * @return CollectionInterface
     */
    public function createCell(string $content = null, bool $isHead = false) : CollectionInterface;
}
