<?php

namespace Tests\Unit\Domain\Entity;

use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;

class CategoryUnitTest extends TestCase
{
  public function testAttribubes()
  {
    $category = new Category(
      name: 'New Cat',
      description: 'New desc',
      isActive: true
    );

    $this->assertEquals('New Cat', $category->name);
    $this->assertEquals('New desc', $category->description);
    $this->assertTrue(true, $category->isActive);
  }

  public function testActivate()
  {
    $category = new Category(
      name: 'New Cat',
      isActive: false
    );

    $this->assertFalse($category->isActive);

    $category->activate();

    $this->assertTrue($category->isActive);
  }

  public function testeDisabled()
  {
    $category = new Category(
      name: 'New Cat',
    );

    $this->assertTrue($category->isActive);

    $category->disable();

    $this->assertFalse($category->isActive);
  }
}