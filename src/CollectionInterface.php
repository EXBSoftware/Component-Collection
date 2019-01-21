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

/**
 * Interface CollectionInterface
 * @package EXB\Collection
 */
interface CollectionInterface
{
    /**
     * CollectionInterface constructor.
     * @param array[mixed] $elements
     */
    public function __construct(array $elements);
    /**
     * @param mixed $element
     * @return int the element index
     */
    public function add($element): int;
    /**
     * Removes element by its index
     * @param int $index
     * @return mixed
     */
    public function remove(int $index): void;
}