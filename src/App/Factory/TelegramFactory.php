<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use App\Action\TelegramAction;

class TelegramFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        return new IndexAction($container);
    }

}