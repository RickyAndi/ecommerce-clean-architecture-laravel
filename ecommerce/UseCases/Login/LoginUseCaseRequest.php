<?php


namespace ECommerce\UseCases\Login;

use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\PlainPassword;

class LoginUseCaseRequest
{
    /**
     * @var Email
     */
    private $email;

    /**
     * @var PlainPassword
     */
    private $plainPassword;

    /**
     * @param PlainPassword $plainPassword
     */
    public function setPlainPassword(PlainPassword $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return PlainPassword
     */
    public function getPlainPassword(): PlainPassword
    {
        return $this->plainPassword;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }
}
