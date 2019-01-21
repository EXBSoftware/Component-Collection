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

use EXB\Collection\AbstractCollection;
use EXB\Collection\Filters\ClosureFilter;

use EXB\Collection\ScalarCollection;
use PHPUnit\Framework\TestCase;

class ClosureTest extends TestCase
{
    public function testClosure() {
        $collection = new ScalarCollection([1, 2, 3]);

        // Removes the value 2
        $filter = new ClosureFilter(function($element) {
            return $element != 2;
        });

        $collection->filter($filter);

        $this->assertEquals(sizeof($collection->all()), 2);
    }
}