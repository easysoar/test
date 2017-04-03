<?php
$redis = new \Redis();

$redis->connect("127.0.0.1",6379);


//string

$redis->delete("s1");
$redis->set("s1","vol1");
$vol=$redis->get("s1");
print_r($vol);
echo "\r\n";

$redis->set("s1",3);
$redis->incr("s1",2);
$vol=$redis->get("s1");
var_dump($vol);


//list

$redis->delete("l1");

$redis->LPush("l1","a");
$redis->LPush("l1","b");
$redis->LPush("l1","c");

$val=$redis->rPop("l1");

echo $val."\r\n";

//set
$redis->delete("s1");

$redis->sAdd("s1","A");
$redis->sAdd("s1","B");
$redis->sAdd("s1","C");
$redis->sAdd("s1","C");

$val= $redis->sCard("s1");
var_dump($val);

$val=$redis->sMembers("s1");
var_dump($val);

//hash
$redis->delete("d1");

$redis->hSet("d1","name","liming");
$redis->hSet("d1","age", 33);
$redis->hSet("d1","gender",1);
$val=$redis->hGet("d1",'name');
var_dump($val);

$val=$redis->hMGet("d1",array("name","age"));
var_dump($val);

//sort set

$redis->delete("z1");

$redis->zAdd("z1",100,"xiaoming");
$redis->zAdd("z1",80,"xiaog");
$redis->zAdd("z1",90,"xiaowang");

$val= $redis->zRange("z1",0,-1);
var_dump($val);

$val=$redis->zRevRange("z1",0,-1);
var_dump($val);










