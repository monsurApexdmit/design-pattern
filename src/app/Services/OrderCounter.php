<?php

namespace App\Services;

class OrderCounter
{
    public static $instance = null;
    public $count = 0;

    // Private constructor — অন্য কেউ new করতে পারবে না
    public function __construct() {}

    // Public static method — instance ফেরত দেয়
//    public static function getInstance(): OrderCounter
//    {
//        if (self::$instance === null) {
//            self::$instance = new OrderCounter();
//        }
//        return self::$instance;
//    }

    public function increment()
    {
        $this->count++;
        return $this->count;
    }

    public function getCount()
    {
        return $this->count;
    }
}
