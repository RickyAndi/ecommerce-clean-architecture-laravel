<?php


namespace ECommerce\Factories;

use ECommerce\Entities\UserInterface;
use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\Password;

interface UserFactoryInterface
{
    public function create(Email $email, Password $password): UserInterface;
}
