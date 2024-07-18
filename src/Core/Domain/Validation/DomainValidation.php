<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $exceptionMessage = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptionMessage ?? 'Should not be empty or null');
        }
    }

    public static function strMaxLength(string $value, int $maxLength = 255, string $exceptionMessage = null)
    {
        if (strlen($value) > $maxLength) {
            throw new EntityValidationException($exceptionMessage ?? "Length not should be greater than $maxLength");
        }
    }

    public static function strMinLength(string $value, int $minLength = 2, string $exceptionMessage = null)
    {
        if (strlen($value) < $minLength) {
            throw new EntityValidationException($exceptionMessage ?? "Length not should be less than $minLength");
        }
    }

    public static function strCanNullAndMaxLength(string $value = null, int $maxLength = 255, string $exceptionMessage = null)
    {
        if (!empty($value) && strlen($value) > $maxLength) {
            throw new EntityValidationException($exceptionMessage ?? "Length not should be greater than $maxLength");
        }
    }
}