<?php

namespace Chambi_Slim_Table\Collection\Groups;

use Chambi_Slim_Table\Collection\AbstractCollection;
use Chambi_Slim_Table\Collection\CollectionInterface;
use Chambi_Slim_Table\Settings\AttributeSetting;

/**
 * @author Jonathan Correa Chambi <jonathancorrea@gmx.de>
 */
class Cell implements CollectionInterface
{
    use AttributeSetting;

    /**
     * Cell content
     *
     * @var string
     */
    private $content;

    /**
     * Is cell inside a head
     *
     * @var bool
     */
    private $isHead;

    /**
     * Initializes the Cell
     *
     * @param string $content
     * @param bool   $isHead
     *
     * @return void
     */
    public function __construct(string $content = null, bool $isHead = false)
    {
        $this->content = $content;
        $this->isHead = $isHead;
    }

    /**
     * Display Cell
     *
     * @return string
     */
    public function display() : string
    {
        $content = '<td '.($this->getAttributes() != null ? $this->getAttributes() : ' ').'>'.$this->content.'</td>';
        if ($this->isHead) {
            $content = preg_replace("/<td\s(.+?)>(.+?)<\/td>/is", "<th $1>$2</th>", $content);
        }
        return $content;
    }
}
