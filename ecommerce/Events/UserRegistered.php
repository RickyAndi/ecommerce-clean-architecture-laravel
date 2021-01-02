<?php

namespace ECommerce\Events;

use ECommerce\Entities\UserInterface;

class UserRegistered implements EventInterface
{
    const EVENT_HANDLER = [

    ];

    /**
     * @var UserInterface
     */
    private $user;

    public function __construct(UserInterface $user)
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

    public function getName(): string
    {
        return 'user_registered';
    }
}
