<?php

interface IQueue
{
    public function enqueue(string $item);

    public function dequeue();

    public function peek();

    public function isEmpty();
}
