<?php

namespace App\Template;

abstract class DbTemplate
{
  public static abstract function  table(string $name);
  public  abstract function select(string ...$fields);
  protected abstract function testDataType(int $val);
}
