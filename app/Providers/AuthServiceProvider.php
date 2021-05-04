<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //profile not updated
        Gate::define('update-profile',function($user){
            if ($user->profileupdated==0) {
                return true;
            }

            return false;
        });
        
        //profile updated
        Gate::define('profile-updated',function($user){
            if ($user->profileupdated==1) {
                return true;
            }

            return false;
        });

        //registering appraisal policies
        $this->registerAppraisalPolicies();
    }

    public function registerAppraisalPolicies(){
        Gate::define('create-appraisal',function($user){
            $user->hasAccess(['create-appraisal']);
        });
    }
}
