<?php

namespace Chambi_Slim_Table\Settings;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
trait AttributeSetting
{
    /**
     * Add attributes
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Add attributes as array
     *
     * @param array $attributes
     *
     * @return void
     */
    private function addAttributes(array $attributes) : void
    {
        $this->attributes = $attributes;
    }

    /**
     * Return attributes as string
     *
     * @return string
     */
    protected function getAttributes() : string
    {
        $content = '';
        foreach ($this->attributes as $key => $value) {
            $content .= $key.'="'.$value.'" ';
        }

        return trim($content);
    }

    /**
     * Return child class from CollectionInterface instance
     *
     * @param string $method
     * @param array  $attributes
     *
     * @throws InvalidArgumentException
     *
     * @return CollectionInterface
     */
    public function __call(string $method, array $attributes)
    {
        if (!method_exists($this, $method)) {
            throw new \InvalidArgumentException('Method not exist');
        } elseif (!$attributes) {
            throw new \InvalidArgumentException('addAttributes() expects exactly 1 parameter, 0 given in');
        }

        $this->addAttributes($attributes[0]);

        return $this;
    }
}
