<?php

namespace Base\Container;

trait ContainerTrait
{
    private $container;

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