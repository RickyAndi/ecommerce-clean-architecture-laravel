<?php


namespace App\Http\Controllers\Register;


use App\Http\Controllers\Controller;
use ECommerce\UseCases\Register\RegisterUseCase;

class ShowLoginFormAction extends Controller
{
    public function __invoke()
    {
        return view('auth.register');
    }
}
