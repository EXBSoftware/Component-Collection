<?php
/**
 * EXB R5 - Business suite
 * Copyright (C) EXB Software 2019 - All Rights Reserved
 *
 * This file is part of EXB R5.
 *
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * @author emiel <e.goor@exb-software.com>
 */
declare(strict_types=1);

namespace EXB\Collection;

use EXB\Collection\Exceptions\InvalidElementTypeException;

abstract class AbstractCollection implements CollectionInterface, \JsonSerializable
{
    /**
     * @param $element
     * @return bool
     */
    abstract protected function validateType($element): bool;

    /**
     * @var array[mixed]
     */
    private $elements = [];

    /**
     * CollectionInterface constructor.
     * @param array[mixed] $elements
     * @throws InvalidElementTypeException
     */
    public function __construct(array $elements = [])
    {
        $this->validateTypes($elements);

        $this->elements = $elements;
    }


    /**
     * @param mixed $element
     * @return int the element index
     * @throws InvalidElementTypeException
     */
    public function add($element /**,..*/): int
    {
        if (is_scalar($element) || is_object($element)) {
            $this->validateTypes(func_get_args());

            $this->elements = array_merge($this->elements, func_get_args());
        } else if (is_array($element)) {
            $this->validateTypes($element);

            $this->elements = array_merge($this->elements, $element);
        }

        return key($this->elements);
    }

    /**
     * @param FilterInterface $filterFn
     */
    public function filter(FilterInterface $filter): void {
        $this->elements = $filter->apply($this);
    }

    /**
     * Removes element by its index
     * @param int $index
     * @return mixed
     */
    public function remove(int $index): void
    {
        unset($this->elements[$index]);
    }

    /**
     * Returns all
     * @return array
     */
    public function all(): array {
        return $this->elements;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->elements;
    }

    /**
     * Validates if the given elements are of the correct type
     * @param array $elements
     * @return bool
     * @throws InvalidElementTypeException
     */
    private function validateTypes(array $elements): bool
    {
        $errors = array_filter($elements, function($element) {
            return $this->validateType($element) != true;
        });

        if(sizeof($errors) !== 0)  {
            throw new InvalidElementTypeException;
        }

        return true;
    }
}