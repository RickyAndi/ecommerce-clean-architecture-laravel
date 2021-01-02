<?php


namespace ECommerce\Services\Password;


use ECommerce\ObjectValues\Password;
use ECommerce\ObjectValues\PlainPassword;

interface PasswordServiceInterface
{
    public function hashPassword(PlainPassword  $plainPassword): Password;

    public function checkPassword(PlainPassword $plainPassword, Password $password): bool;
}
