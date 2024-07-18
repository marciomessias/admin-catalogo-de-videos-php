<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Validation\DomainValidation;

class Category
{
    use MethodsMagicsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = ''): void
    {
        $this->name = $name;
        $this->description = $description;

        $this->validate();
    }

    public function validate(): void
    {
        DomainValidation::strMaxLength($this->name, 255, 'Name length not should be greater than 255');
        DomainValidation::strMinLength($this->name, 2, 'Name length not should be less than 2');
        DomainValidation::strCanNullAndMaxLength($this->description, 255, 'Description length not should be greater than 255');
    }
}