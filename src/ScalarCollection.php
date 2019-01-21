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

class ScalarCollection extends AbstractCollection
{
    /**
     * {@inheritdoc}
     */
    protected function validateType($element): bool
    {
        return is_scalar($element);
    }
}