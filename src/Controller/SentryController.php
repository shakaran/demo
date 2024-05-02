<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;

#[Route(path: '/sentry')]
final class SentryController extends AbstractController
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    #[Route(name: 'sentry_test', path: '/test', methods: ['GET', 'POST'])]
    public function testLog()
    {
      // the following code will test if monolog integration logs to sentry
      $this->logger->error('My custom logged error.');

      // the following code will test if an uncaught exception logs to sentry
      throw new \RuntimeException('Example exception.');
    }
}