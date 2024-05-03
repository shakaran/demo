<?php
namespace App\Cache;

use Symfony\Contracts\Cache\ItemInterface;

class CacheComputation
{
    public function compute(ItemInterface $item): string
    {
        $item->expiresAfter(5);

        // this is just a random example; here you must do your own calculation
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}