<?php


namespace ECommerce\ObjectValues;


class Email
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

    public static function fromString(string $email): self
    {
        return new self($email);
    }
}
