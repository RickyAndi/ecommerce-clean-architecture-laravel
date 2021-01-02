<?php


namespace ECommerce\UseCases\Login;


use ECommerce\Repositories\UserRepositoryInterface;
use ECommerce\Services\Password\PasswordServiceInterface;

class LoginUseCase
{
    private $userRepository;
    private $passwordService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PasswordServiceInterface $passwordService
    )
    {
        $this->userRepository = $userRepository;
        $this->passwordService = $passwordService;
    }

    public function handle(LoginUseCaseRequest $request): LoginUseCaseResult
    {
        $user = $this->userRepository->getByEmail($request->getEmail());

        if (is_null($user)) {
            throw new UserNotFoundException('user is not found');
        }

        $plainPassword = $request->getPlainPassword();
        $doesPasswordMatch = $this->passwordService->checkPassword($plainPassword, $user->getPassword());

        if (!$doesPasswordMatch) {
            throw new PasswordDoesNotMatchException('password does not match');
        }

        $result = new LoginUseCaseResult();
        $result->setUser($user);

        return $result;
    }
}
