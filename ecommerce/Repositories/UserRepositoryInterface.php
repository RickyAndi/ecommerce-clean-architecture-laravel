<?php

namespace ECommerce\Repositories;

use ECommerce\Entities\UserInterface;
use ECommerce\ObjectValues\Email;

interface UserRepositoryInterface
{
    public function getByEmail(Email $email): ?UserInterface;
}
