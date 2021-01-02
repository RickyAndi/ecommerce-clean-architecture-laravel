<?php


namespace ECommerce\UseCases\Login;


use ECommerce\Entities\UserInterface;

class LoginUseCaseResult
{
    /**
     * @var UserInterface
     */
    private $user;

    public function setUser(UserInterface  $user): void
    {
        $this->user = $user;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }
}
