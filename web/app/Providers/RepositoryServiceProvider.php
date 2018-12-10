<?php

namespace OdontoInn\Providers;

use OdontoInn\Models\Privilege;
use OdontoInn\Models\Role;
use OdontoInn\Models\User;
use OdontoInn\Repositories\Privilege\PrivilegeMongodbRepository;
use OdontoInn\Repositories\Privilege\PrivilegeRepositoryInterface;
use OdontoInn\Repositories\Role\RoleMongodbRepository;
use OdontoInn\Repositories\Role\RoleRepositoryInterface;
use OdontoInn\Repositories\User\UserMongodbRepository;
use OdontoInn\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {   

        $this->app->bind(PrivilegeRepositoryInterface::class, function () {
            return new PrivilegeMongodbRepository(new Privilege());
        });

        $this->app->bind(RoleRepositoryInterface::class, function () {
            return new RoleMongodbRepository(new Role());
        });

        $this->app->bind(UserRepositoryInterface::class, function () {
            return new UserMongodbRepository(new User());
        });  

    }

}
