<?php

$startMemory = memory_get_usage();
$array = new SplFixedArray(100000);

for ($i=0; $i < 100000; $i++) {
    $array[$i] = $i;
}

$endMemory = memory_get_usage();

echo($endMemory - $startMemory) . "bytes";
echo "<br>";

$startMemory = memory_get_usage();
$array = range(1,100000);
$endMemory = memory_get_usage();
echo($endMemory - $startMemory) . "bytes";
echo "<br>";

$array = [1 => 10, 2 => 100, 3 => 1000, 4 => 10000];
$splArray = SplFixedArray::fromArray($array, false);
var_dump($splArray);

echo "<br>";

$items = 5;
$array = new SplFixedArray($items);
for ($i = 0; $i < $items; $i++) {
    $array[$i] = $i * 10;
}
$array->setSize(10);
foreach ($array as $key => $value) {
    $array[$key] = $value * 10;
}
$newArray = $array->toArray();
print_r($newArray);

echo "<br><br>";

$array = new SplFixedArray(10);
for ($i=0; $i < 10; $i++) {
    $array[$i] = new SplFixedArray(2);
}
var_dump($array);
