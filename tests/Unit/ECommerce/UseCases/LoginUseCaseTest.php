<?php


namespace Tests\Unit\ECommerce\UseCases;

use ECommerce\Entities\UserInterface;
use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\Id;
use ECommerce\ObjectValues\PlainPassword;
use ECommerce\Repositories\UserRepositoryInterface;
use ECommerce\Services\Password\PasswordServiceInterface;
use ECommerce\UseCases\Login\LoginUseCase;
use ECommerce\UseCases\Login\LoginUseCaseRequest;
use ECommerce\UseCases\Login\PasswordDoesNotMatchException;
use ECommerce\UseCases\Login\UserNotFoundException;
use Tests\TestCase;
use \Mockery as M;

class LoginUseCaseTest extends TestCase
{
    public function testShouldThrowErrorWhenUserIsNotFound()
    {
        $this->expectException(UserNotFoundException::class);

        $userRepository = M::mock(UserRepositoryInterface::class);
        $userRepository
            ->shouldReceive('getByEmail')
            ->andReturn(null);

        $passwordService = M::mock(PasswordServiceInterface::class);

        $loginUseCase = new LoginUseCase(
            $userRepository,
            $passwordService,
        );

        $request = new LoginUseCaseRequest();
        $request->setEmail(Email::fromString("test@email.com"));
        $request->setPlainPassword(PlainPassword::fromString("password"));

        $result = $loginUseCase->handle($request);
    }

    public function testShouldThrowErrorIfPasswordDoesNotMatch()
    {
        $this->expectException(PasswordDoesNotMatchException::class);

        $user = M::mock(UserInterface::class);
        $user->shouldReceive('getPassword');

        $userRepository = M::mock(UserRepositoryInterface::class);
        $userRepository
            ->shouldReceive('getByEmail')
            ->andReturn($user);

        $passwordService = M::mock(PasswordServiceInterface::class);
        $passwordService
            ->shouldReceive('checkPassword')
            ->andReturn(false);

        $loginUseCase = new LoginUseCase(
            $userRepository,
            $passwordService,
        );

        $request = new LoginUseCaseRequest();
        $request->setEmail(Email::fromString("test@email.com"));
        $request->setPlainPassword(PlainPassword::fromString("password"));

        $result = $loginUseCase->handle($request);
    }

    public function testShouldPassIfPasswordMatch()
    {
        $user = M::mock(UserInterface::class);
        $user->shouldReceive('getPassword');
        $user->shouldReceive('getId')->andReturn(Id::fromInt(1));

        $userRepository = M::mock(UserRepositoryInterface::class);
        $userRepository
            ->shouldReceive('getByEmail')
            ->andReturn($user);

        $passwordService = M::mock(PasswordServiceInterface::class);
        $passwordService
            ->shouldReceive('checkPassword')
            ->andReturn(true);

        $loginUseCase = new LoginUseCase(
            $userRepository,
            $passwordService,
        );

        $request = new LoginUseCaseRequest();
        $request->setEmail(Email::fromString("test@email.com"));
        $request->setPlainPassword(PlainPassword::fromString("password"));

        $result = $loginUseCase->handle($request);

        $this->assertEquals($result->getUser()->getId(), $user->getId());
    }
}
