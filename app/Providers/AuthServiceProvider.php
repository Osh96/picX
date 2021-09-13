<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //action-access
        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });  

        //action-access
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        //route-access
        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin','officer']);
        });        
        
        //action-access
        Gate::define('delete-packages', function($user){
            return $user->hasRole('officer');
        });
        //action-access
        Gate::define('edit-packages', function($user){
            return $user->hasRole('officer');
        }); 

        //action-access
        Gate::define('add-packages', function($user){
            return $user->hasRole('officer');
        });

        //route-access
        Gate::define('manage-packages', function($user){
            return $user->hasAnyRoles(['admin','officer']);
        });   

        //action-access
        Gate::define('add-vehicles', function($user){
            return $user->hasRole('admin');
        });

          //action-access
          Gate::define('delete-vehicles', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('edit-vehicles', function($user){
            return $user->hasRole('admin');
        });  

        //route-access
        Gate::define('manage-vehicles', function($user){
            return $user->hasAnyRoles(['admin','officer']);
        }); 
        
        // //route-access
        // Gate::define('view-menus', function($user){
        //     return $user->hasAnyRoles(['driver']);
        // });
    }
}
