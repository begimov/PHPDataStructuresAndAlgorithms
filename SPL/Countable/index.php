<?php

class Collection implements Countable
{
    protected $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function count()
    {
        return count($this->items);
    }
}

$col = new Collection([1,2,3,null,4]);
echo count($col);
echo $col->count();
