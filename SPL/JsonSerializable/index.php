<?php

abstract class Model
{
    //
}

class Collection implements IteratorAggregate, JsonSerializable
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
    public function JsonSerialize()
    {
        return array_map(function($item) {
          if ($item instanceof Model) {
              return $item->toArray();
          }
          return $item;
        }, $this->items);
    }
    public function __toString()
    {
        return json_encode($this->JsonSerialize());
    }
}
class User extends Model
{
    protected $attributes = [];

    public function __set($attributes, $value)
    {
        $this->attributes[$attributes] = $value;
    }
    public function toArray()
    {
        return $this->attributes;
    }
    public function __toString()
    {
        return json_encode($this->toArray());
    }
}

$user1 = new User;
$user1->name = 'User1 Name';
$user1->email = 'user1@user1.com';
$user2 = new User;
$user2->name = 'User2 Name';
$user2->email = 'user2@user2.com';

$users = new Collection([$user1, $user2, 'string']);

echo json_encode($users).'<br>';
echo $user1.'<br>';
echo $users.'<br>';
