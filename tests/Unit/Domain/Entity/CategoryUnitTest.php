<?php

namespace Tests\Unit\Domain\Entity;

use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;

class CategoryUnitTest extends TestCase
{
  public function testAttribubes()
  {
    $category = new Category(
      id: 'asfdsa',
      name: 'New Cat',
      description: 'New desc',
      isActive: true
    );

    $this->assertEquals('New Cat', $category->name);
    $this->assertEquals('New desc', $category->description);
    $this->assertTrue(true, $category->isActive);
  }
}