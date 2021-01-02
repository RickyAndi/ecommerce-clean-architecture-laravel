<?php


namespace ECommerce\UseCases\Register;


use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\PlainPassword;

class RegisterUseCaseRequest
{
    /**
     * @var Email
     */
    private $email;

    /**
     * @var PlainPassword
     */
    private $password;

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

    /**
     * @param PlainPassword $password
     */
    public function setPlainPassword(PlainPassword $password): void
    {
        $this->password = $password;
    }

    /**
     * @return PlainPassword
     */
    public function getPlainPassword(): PlainPassword
    {
        return $this->password;
    }
}
