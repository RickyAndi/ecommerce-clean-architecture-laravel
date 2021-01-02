<?php

namespace App\Models;

use ECommerce\Entities\UserInterface;
use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\Id;
use ECommerce\ObjectValues\Password;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User  extends Authenticatable implements UserInterface
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setEmail(Email $email): void
    {
        $this->email = $email->getValue();
    }

    public function getEmail(): Email
    {
        return Email::fromString($this->email);
    }

    public function setPassword(Password $password): void
    {
        $this->password = $password->getValue();
    }

    public function getPassword(): Password
    {
        return Password::fromString($this->password);
    }

    public function setId(Id $id): void
    {
       $this->id = $id->getValue();
    }

    public function getId(): Id
    {
        return Id::fromInt($this->id);
    }
}
