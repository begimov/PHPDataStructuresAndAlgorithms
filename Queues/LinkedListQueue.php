<?php

class LinkedListQueue implements IQueue
{
    private $limit;
    private $queue;

    public function __construct($limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList;
    }

    public function dequeue(): string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        } else {
            $lastItem = $this->peek();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }

    public function enqueue(string $item)
    {
        if (count($this->queue) < $this->limit) {
            $this->queue->insert($item);
        } else {
            throw new OverflowException('Queue is full');
        }
    }

    public function peek(): string
    {
        return $this->queue->getNthNode(1)->data;
    }

    public function isEmpty(): bool
    {
        return $this->queue->getSize() == 0;
    }
}
