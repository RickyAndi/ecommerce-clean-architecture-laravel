<?php


namespace App\Providers;


use App\Adapters\Repositories\UserRepository;
use App\Adapters\Services\DatabaseService\DatabaseService;
use App\Adapters\Services\EventDispatcher\EventDispatcher;
use App\Adapters\Services\PasswordService\PasswordService;
use ECommerce\Repositories\UserRepositoryInterface;
use ECommerce\Services\DatabaseService\DatabaseServiceInterface;
use ECommerce\Services\EventDispatcher\EventDispatcherInterface;
use ECommerce\Services\Password\PasswordServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ECommerceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(PasswordServiceInterface::class, PasswordService::class);
        $this->app->bind(EventDispatcherInterface::class, EventDispatcher::class);
        $this->app->bind(DatabaseServiceInterface::class, DatabaseService::class);
    }
}
