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
                'name'=> 'Jesse',
                'age'=> 29
                ];
                
            echo "Setting Value! $key | ";
            $redis->lpush($list, json_encode($fake_fata));
        }
    }

$data = $redis->lrange($list, 0, 1);
print_r($data);
?>