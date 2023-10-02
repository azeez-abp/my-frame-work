<?Php

use \PHPUnit\Framework\TestCase;
use Des\Structural\Adapter;
use Des\Structural\Car;
use Des\Structural\Gen;
//C:\xampp\htdocs\code\PatternUnitTesting\AdapterTesting.php:13
//./vendor/bin/phpunit  PatternUnitTesting/AdapterTesting.php
class AdapterTesting extends TestCase
{
	public function testAdapter()
	{
		//var_dump(get_class_methods($this));
		//$db  = new App\Dependency\DB();
		$t   = new Adapter(new  Car());
		$t->gets()->move();
		//var_dump($t->gets()->move());
		$this->assertEquals('Car is moving', $t->gets()->move());
		//$this->assertString($t);
	}

	public function testGen()
	{
		$gen  = new Gen();
		$this->assertIsObject($gen);
	}
}
