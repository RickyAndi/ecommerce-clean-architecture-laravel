<?php


namespace ECommerce\ObjectValues;


class PlainPassword
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $plainPassword): self
    {
        return new self($plainPassword);
    }
}
