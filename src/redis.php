<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
try {
    echo($redis->ping());
} catch (RedisException $e) {
}
$redis->set('key', 'value');