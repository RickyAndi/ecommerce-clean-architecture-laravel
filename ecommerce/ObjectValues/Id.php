<?php


namespace ECommerce\ObjectValues;


class Id
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public static function fromInt(int $id): self
    {
        return new self($id);
    }
}
