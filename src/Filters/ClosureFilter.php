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

namespace EXB\Collection\Filters;

use EXB\Collection\AbstractCollection;
use EXB\Collection\FilterInterface;

class ClosureFilter implements FilterInterface
{
    /**
     * @var \Closure
     */
    private $callback;

    /**
     * ClosureFilter constructor.
     * @param \Closure $callback
     */
    public function __construct(\Closure $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param AbstractCollection $collection
     * @return array[mixed]
     */
    public function apply(AbstractCollection $collection): array
    {
        return array_values(array_filter($collection->all(), $this->callback));
    }
}