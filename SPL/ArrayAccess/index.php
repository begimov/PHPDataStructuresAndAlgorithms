<?php

class Container implements ArrayAccess
{
    protected $entries = [];

    public function add($key, callable $item)
    {
        $this->entries[$key] = $item;
    }
    public function has($key)
    {
        return isset($this->entries[$key]);
    }
    public function get($key)
    {
        if (!$this->has($key)) {
            return null;
        }
        $this->entries[$key] = $this->entries[$key]();
        return $this->entries[$key];
    }
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }
    public function offsetSet($offset, $value)
    {
        return $this->add($offset, $value);
    }
    public function offsetUnset($offset)
    {
        if (!$this->has($offset)) {
            return null;
        }
        unset($this->entries[$offset]);
    }
}

$container = new Container;
// $container->add('config', function () {
//     return [
//         'db_host' => '127.0.0.1',
//         'db_user' => 'root',
//         'db_password' => 'root',
//     ];
// });
$container['config'] = function () {
    return [
        'db_host' => '127.0.0.1',
        'db_user' => 'root',
        'db_password' => 'root',
    ];
};

var_dump($container['config']);
