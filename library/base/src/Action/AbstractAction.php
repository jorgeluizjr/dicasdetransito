<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 06/07/16
 * Time: 16:53
 */

namespace Base\Action;

use Interop\Container\ContainerInterface;

abstract class AbstractAction
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     * @return AbstractAction
     */
    public function setContainer($container)
    {
        $this->container = $container;
        return $this;
    }
    
    
}