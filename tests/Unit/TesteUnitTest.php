<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Core\Teste;

class TesteUnitTest extends TestCase
{
  public function test_call_method_foo()
  {
    $teste = new Teste();
    $res = $teste->foo();

    $this->assertEquals('foo', $res);
  }
}