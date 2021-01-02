<?php


namespace ECommerce\UseCases\Register;


use ECommerce\Events\UserRegistered;
use ECommerce\Factories\UserFactoryInterface;
use ECommerce\Persistence\UserPersistenceInterface;
use ECommerce\Repositories\UserRepositoryInterface;
use ECommerce\Services\EventDispatcher\EventDispatcherInterface;
use ECommerce\Services\Password\PasswordServiceInterface;

class RegisterUseCase
{
    private $userPersistence;
    private $userRepository;
    private $userFactory;
    private $passwordService;
    private $eventDispatcher;

    public function __construct(
        UserFactoryInterface $userFactory,
        UserPersistenceInterface  $userPersistence,
        UserRepositoryInterface  $userRepository,
        PasswordServiceInterface $passwordService,
        EventDispatcherInterface  $eventDispatcher
    )
    {
        $this->userPersistence = $userPersistence;
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->passwordService = $passwordService;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(RegisterUseCaseRequest  $request)
    {
        $email = $request->getEmail();
        $plainPassword = $request->getPlainPassword();

        $user = $this->userRepository->getByEmail($email);

        if (!is_null($user)) {
            throw new EmailHasBeenUsedException('Email has been used exception');
        }

        $password = $this->passwordService->hashPassword($plainPassword);
        $user = $this->userFactory
            ->create($email, $password);

        $this->userPersistence->save($user);

        $this->eventDispatcher->dispatch(new UserRegistered($user));
    }
}
