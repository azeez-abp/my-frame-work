<?php

namespace Testing\Unit;

use \PHPUnit\Framework\TestCase;
use App\Dependency\DB;

use function PHPUnit\Framework\assertEquals;

/*
  The name in phpunit.xml  is Db 
  the file name and class must be DbTest
  the Test is the one read by the command so run command php vendor/bin/phpunit  || php vendor/bin/phpunit--testdox

  run php vendor/bin/phpunit UnitTesting to tun all the test in this directory UnitTesting
*/

class DbTest extends TestCase
{

	public function testDb()
	{
		//var_dump(get_class_methods($this));
		//$db  = new App\Dependency\DB();
		$t   = DB::table('user');

		//$this->assertEquals('object',$t);
		$this->assertIsObject($t);
	}

	function testcheckisDone()
	{ ///method name must start with test
		$this->assertEquals("2", "2");
	}
	function testRoute()
	{  //assert get response
		//$this->post()
		$this->assertEquals('api/user/login', 'api/user/login');
	}
}

// $db   = new DbTest();
// $db->testDb();
