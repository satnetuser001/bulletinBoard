<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Bbs;
use App\Policies\BbsPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
        //'App\Models\Model' => 'App\Policies\ModelPolicy',
        //'App\Models\Bbs' => 'App\Policies\BbsPolicy',//другая форма записи
        Bbs::class => BbsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
