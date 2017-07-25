<?php

class Collection implements IteratorAggregate
{
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
class User
{
    public $username;

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($name)
    {
        $this->username = $name;
        return $this;
    }
}

$user1 = new User;
$user1->setUsername('User1 Name');
$user2 = new User;
$user2->setUsername('User2 Name');

$users = new Collection([$user1, $user2]);

foreach ($users as $user) {
    echo $user->getUsername() . '<br>';
}
