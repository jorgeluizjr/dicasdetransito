<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use App\Action\WebhookAction;

class WebhookFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        return new WebhookAction($container);
    }

}