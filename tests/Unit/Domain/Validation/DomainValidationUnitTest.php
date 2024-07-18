<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;

class DomainValidationUnitTest extends TestCase
{
    public function testNotNull()
    {
        try {
            $value = '';
            DomainValidation::notNull($value);

            $this->assertTrue(false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testNotNullCustomerMessageException()
    {
        try {
            $value = '';
            DomainValidation::notNull($value, 'custom message error');

            $this->assertTrue(false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
            $this->assertEquals('custom message error', $th->getMessage());
        }
    }

    public function testStrMaxLength()
    {
        try {
            $value = 'testtesttesttest';
            DomainValidation::strMaxLength($value, 12);

            $this->assertTrue(false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
            $this->assertEquals('Length not should be greater than 12', $th->getMessage());
        }
    }

    public function testStrMinLength()
    {
        try {
            $value = 'test';
            DomainValidation::strMinLength($value, 5);

            $this->assertTrue(false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
            $this->assertEquals('Length not should be less than 5', $th->getMessage());
        }
    }

    public function testStrCanNullAndMaxLength()
    {
        try {
            $value = 'testtesttesttest';
            DomainValidation::strCanNullAndMaxLength($value, 12);

            $this->assertTrue(false);
        } catch (\Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
            $this->assertEquals('Length not should be greater than 12', $th->getMessage());
        }
    }
}