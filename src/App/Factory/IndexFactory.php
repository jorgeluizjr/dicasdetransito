<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use App\Action\IndexAction;

class IndexFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        return new IndexAction($container);
    }

}