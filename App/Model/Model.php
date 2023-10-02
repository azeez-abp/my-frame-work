<?php

declare(strict_types=1);

namespace App\Model;

use Generator;

class Model
{

    public function lazyLoad(array $data): Generator
    {
        foreach ($data as $value) {
            yield $value;
        }
    }
}
