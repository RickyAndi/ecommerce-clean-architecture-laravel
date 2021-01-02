<?php


namespace App\Adapters\Repositories;

use App\Models\User;
use ECommerce\Entities\UserInterface;
use ECommerce\ObjectValues\Email;
use ECommerce\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getByEmail(Email $email): ?UserInterface
    {
        return $this->model->where('email', $email->getValue())->first();
    }
}
