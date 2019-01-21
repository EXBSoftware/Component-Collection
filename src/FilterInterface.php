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
 * Interface FilterInterface
 * @package EXB
 */
interface FilterInterface
{
    /**
     * @param AbstractCollection $collection
     * @return array[mixed]
     */
    public function apply(AbstractCollection $collection);
}