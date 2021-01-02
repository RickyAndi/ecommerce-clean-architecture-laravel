<?php


namespace App\Adapters\Services\PasswordService;

use ECommerce\ObjectValues\Password;
use ECommerce\ObjectValues\PlainPassword;
use ECommerce\Services\Password\PasswordServiceInterface;

class PasswordService implements PasswordServiceInterface
{
    public function hashPassword(PlainPassword $plainPassword): Password
    {
        // TODO: Implement hashPassword() method.
    }

    public function checkPassword(PlainPassword $plainPassword, Password $password): bool
    {
        // TODO: Implement checkPassword() method.
    }
}
