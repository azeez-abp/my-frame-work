<?php

declare(strict_types=1);

namespace App\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Throwable;

class Container extends Exception implements ContainerInterface, ContainerExceptionInterface
{
    private array $list = [];

    function has(string $id): bool
    {
        return true;
    }

    function get(string $id): object
    {
        return $this->list[$id]();
    }

    function set(string $id, callable $callback): void
    {
        $this->list[$id] = $callback;
    }

    // function getMessage(): string
    // {
    //     return "";
    // }

    // function getCode()
    // {
    // }

    // function getFile(): string
    // {
    //     return "FileName";
    // }
    // function getLine(): int
    // {
    //     return 0;
    // }

    // function getTrace(): array
    // {
    //     return [];
    // }

    // function getTraceAsString(): string
    // {
    //     return '';
    // }

    // function __toString()
    // {
    //     return "Name";
    // }

    // function getPrevious(): Throwable|null
    // {
    //     return $this;
    // }
}
