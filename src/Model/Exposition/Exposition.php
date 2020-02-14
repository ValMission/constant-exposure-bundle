<?php

namespace ConstantExposureBundle\Model\Exposition;

class Exposition
{
    /**
     * @var array<mixed>
     */
    protected $class = [];

    /**
     * @var array<mixed>
     */
    protected $parameter = [];

    /**
     * @return array<mixed>
     */
    public function getClass(): array
    {
        return $this->class;
    }

    /**
     * @param array<mixed> $class
     */
    public function setClass(array $class): self
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getParameter(): array
    {
        return $this->parameter;
    }

    /**
     * @param array<mixed> $parameter
     */
    public function setParameter(array $parameter): Exposition
    {
        $this->parameter = $parameter;

        return $this;
    }
}
