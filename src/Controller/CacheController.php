<?php
namespace App\Controller;

use App\Cache\CacheComputation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Response;

class CacheController extends AbstractController
{
    #[Route('/cache', name: 'cache')]
    public function index(CacheInterface $asyncCache): Response
    {
        // pass to the cache the service method that refreshes the item
        $cachedValue = $asyncCache->get('my_value', [CacheComputation::class, 'compute']);

        return $this->json([
            'cached_value' => $cachedValue,
        ], 200);
    }
}