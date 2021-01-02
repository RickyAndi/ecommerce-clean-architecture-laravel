<?php


namespace App\Http\Controllers\Register;


use App\Http\Controllers\Controller;
use ECommerce\ObjectValues\Email;
use ECommerce\ObjectValues\PlainPassword;
use ECommerce\UseCases\Register\EmailHasBeenUsedException;
use ECommerce\UseCases\Register\RegisterUseCase;
use ECommerce\UseCases\Register\RegisterUseCaseRequest;
use Illuminate\Http\Request;

class RegisterAction extends Controller
{
    private $useCase;

    public function __construct(RegisterUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(Request $request)
    {
        try {
            $useCaseRequest = new RegisterUseCaseRequest();
            $useCaseRequest->setEmail(Email::fromString($request->input('email')));
            $useCaseRequest->setPlainPassword(PlainPassword::fromString($request->input('password')));

            $this->useCase->handle($useCaseRequest);

        } catch (EmailHasBeenUsedException $e) {
            return redirect()
                ->back();
        } catch (\Exception $e) {
            return redirect()
                ->back();
        }
    }
}
