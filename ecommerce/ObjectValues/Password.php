<?php


namespace ECommerce\ObjectValues;


class Password
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function fromString(string $password): self
    {
        return new self($password);
    }
}
