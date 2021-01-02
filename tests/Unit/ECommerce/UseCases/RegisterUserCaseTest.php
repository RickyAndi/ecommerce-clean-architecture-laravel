<?php


namespace Tests\Unit\ECommerce\UseCases;

use ECommerce\Services\EventDispatcher\EventDispatcherInterface;
use \Mockery as M;
use ECommerce\Entities\UserInterface;
use ECommerce\Factories\UserFactoryInterface;
use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\Password;
use ECommerce\ObjectValues\PlainPassword;
use ECommerce\Persistence\UserPersistenceInterface;
use ECommerce\Repositories\UserRepositoryInterface;
use ECommerce\Services\Password\PasswordServiceInterface;
use ECommerce\UseCases\Register\EmailHasBeenUsedException;
use ECommerce\UseCases\Register\RegisterUseCase;
use ECommerce\UseCases\Register\RegisterUseCaseRequest;
use Tests\TestCase;

class RegisterUserCaseTest extends TestCase
{
    public function testShouldPassIfEmailIsNotUsed()
    {
        $userFactory = \Mockery::mock(UserFactoryInterface::class);
        $userFactory->shouldReceive('create')
            ->andReturn(\Mockery::mock(UserInterface::class));

        $userPersistence = \Mockery::mock(UserPersistenceInterface::class);
        $userPersistence->shouldReceive('save');

        $userRepository = \Mockery::mock(UserRepositoryInterface::class);
        $userRepository
            ->shouldReceive('getByEmail')
            ->andReturn(null);

        $passwordService = \Mockery::mock(PasswordServiceInterface::class);
        $passwordService
            ->shouldReceive('hashPassword')
            ->andReturn(Password::fromString("password"));

        $eventDispatcher = M::mock(EventDispatcherInterface::class);
        $eventDispatcher->shouldReceive('dispatch');

        $registerUseCase = new RegisterUseCase(
            $userFactory,
            $userPersistence,
            $userRepository,
            $passwordService,
            $eventDispatcher
        );

        $registerUseCaseRequest = new RegisterUseCaseRequest();
        $registerUseCaseRequest->setEmail(Email::fromString("test@email.com"));
        $registerUseCaseRequest->setPlainPassword(PlainPassword::fromString("password"));

        $registerUseCase->handle($registerUseCaseRequest);

        $this->assertTrue(true);
    }

    public function testShouldThrowErrorIfEmailHasBeenUsed()
    {
        $this->expectException(EmailHasBeenUsedException::class);

        $userFactory = \Mockery::mock(UserFactoryInterface::class);
        $userPersistence = \Mockery::mock(UserPersistenceInterface::class);
        $userRepository = \Mockery::mock(UserRepositoryInterface::class);
        $userRepository
            ->shouldReceive('getByEmail')
            ->andReturn(\Mockery::mock(UserInterface::class));
        $passwordService = \Mockery::mock(PasswordServiceInterface::class);

        $eventDispatcher = M::mock(EventDispatcherInterface::class);
        $eventDispatcher->shouldReceive('dispatch');

        $registerUseCase = new RegisterUseCase(
            $userFactory,
            $userPersistence,
            $userRepository,
            $passwordService,
            $eventDispatcher
        );

        $registerUseCaseRequest = new RegisterUseCaseRequest();
        $registerUseCaseRequest->setEmail(Email::fromString("test@email.com"));
        $registerUseCaseRequest->setPlainPassword(PlainPassword::fromString("password"));

        $registerUseCase->handle($registerUseCaseRequest);
    }
}
