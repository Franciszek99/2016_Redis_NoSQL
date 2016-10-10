<?php
    require 'vendor/autoload.php';
    
    $redis = new Predis\Client([
        'scheme' => 'tcp',
        'host' => '127.0.0.1',
        'port' => 6379
        ]);
        
        
    $range = range(1, 5000);
    
    $redis->flushall();
    
    $list = 'users';
    if (!$redis->exists($list))
    {
        foreach ($range as $key => $value)
        {
            $fake_data=[
                'name'=> 'Ted',
                'age'=> 29
                ];
                
            echo "Setting Value! $key | ";
            $redis->lpush($list, json_encode($fake_data));
        }
    }

$data = $redis->lrange($list, 0, -1);

foreach ($data as $key => $value) {
    $stuff = json_decode($value);
    echo $key . ' : ';
    echo $stuff->name;
    echo $stuff->age;
    echo "\n";
}

//print_r($data);
?>