<?php

class LinkedListStack implements IStack
{
    private $stack;

    public function __construct(int $limit = 50)
    {
        $this->stack = new LinkedList();
    }

    public function pop(): string
    {
        if (isEmpty($this->stack)) {
            throw new UnderflowException('Stack is empty');
        } else {
          $lastItem = $this->top();
          $this->stack->deleteLast();
          return $lastItem;
        }
    }

    public function push(string $newItem)
    {
        $this->stack->insert($newItem);
    }

    public function top(): string
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    public function isEmpty(): bool
    {
        return $this->stack->getSize() == 0;
    }
}
