<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

         $gate->define('operation-cp', function ($user) 
		 {
			 // >1 si classe est supérieur au CP
			 // veut dire meme chsose: 
             // return $user->userInfos->class_user_infos > 1;
             return $user->userInfos->class_user_infos == \App\UserInfos2::CP;
         });
		 $gate->define('operation-ce1', function ($user) 
		 {
             return $user->userInfos->class_user_infos == \App\UserInfos2::CE1;
         });
		 $gate->define('operation-upper-ce2', function ($user) 
		 {
             return $user->userInfos->class_user_infos >= \App\UserInfos2::CE2;
         });
		 // habilities ADMIN 
		 // pour afficher ICON ADMIN sur la barre NAV
		 $gate->define('admin', function ($user) 
		 {
             // return $user->userInfos->age_user_infos == 10;
             return $user->isAdmin();
         });
    }
}
