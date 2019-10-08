<?php

namespace Chambi_Slim_Table;

use Chambi_Slim_Table\Collection\CollectionInterface;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
final class TableProxyFactory
{
    private $tableFactory;

    public function __construct(TableFactoryInterface $tableFactory)
    {
        $this->tableFactory = $tableFactory;
    }

    /**
     * Return class from CollectionInterface instance
     *
     * @param string $method
     * @param array  $attributes
     *
     * @throws InvalidArgumentException
     *
     * @return CollectionInterface
     */
    public function __call(string $method, array $arguments) : CollectionInterface
    {
        if (!method_exists($this->tableFactory, $method)) {
            throw new \InvalidArgumentException('Method not exist');
        }

        return $this->tableFactory->$method(...($arguments[0] ?? $arguments));
    }
}
