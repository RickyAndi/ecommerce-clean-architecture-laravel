<?php


namespace ECommerce\Persistence;

use ECommerce\Entities\UserInterface;

interface UserPersistenceInterface
{
    public function save(UserInterface  $user): void;

    public function delete(UserInterface $user): void;

    public function update(UserInterface $user): void;
}
