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

use EXB\Collection\ScalarCollection;

class SetTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @expectedException \EXB\Collection\Exceptions\InvalidElementTypeException
     */
    public function testSetWrongElementType() {
        new ScalarCollection([4, new \stdClass, 1, 2]);
    }

    public function testTestIndexExists() {
        $collection = new ScalarCollection;
        $index = $collection->add(1);

        $this->assertIsArray($collection->all());
        $this->assertArrayHasKey($index, $collection->all());
    }

    public function testSetMultipleValues() {
        $collection = new ScalarCollection;

        $collection->add(10, 20, 30);

        $this->assertEquals(sizeof($collection->all()), 3);
    }

    public function testSetMultipleArrayValues() {
        $collection = new ScalarCollection;

        $collection->add([10, 20, 30, 40, 99]);

        $this->assertEquals(sizeof($collection->all()), 5);
    }

    public function testRemoveValue() {
        $collection = new ScalarCollection(['a', 'b', 'c']);

        $collection->remove(2);

        $this->assertEquals(sizeof($collection->all()), 2);
    }
}