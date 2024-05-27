<?php
// src/MessageHandler/UserCreatedEventHandler.php

namespace App\MessageHandler;

use App\Message\UserCreatedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserCreatedEventHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UserCreatedEvent $event)
    {
        $this->logger->info('User created: ' . $event->getEmail());
    }
}
