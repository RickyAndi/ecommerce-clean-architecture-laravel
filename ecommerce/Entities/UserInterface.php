<?php

namespace ECommerce\Entities;

use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\Id;
use ECommerce\ObjectValues\Password;

interface UserInterface
{
    public function getId(): Id;

    public function getEmail(): Email;

    public function getPassword(): Password;

    public function setId(Id $id): void;

    public function setPassword(Password $password): void;

    public function setEmail(Email $email): void;
}
