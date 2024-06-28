<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait;
use Core\Domain\Exception\EntityValidationException;

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
        if (empty($this->name) && (strlen($this->name) <= 2 || strlen($this->name) > 255)) {
            throw new EntityValidationException('nome inválido');
        }

        if ($this->description == '' && (strlen($this->description) < 3 || strlen($this->description) > 255)) {
            throw new EntityValidationException('descricão inválida');
        }
    }
}