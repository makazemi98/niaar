<?php

namespace App\Providers;

use App\Interfaces\Repositories\InquiryRepositoryInterface;
use App\Models\PermissionsInquiries;
use App\Models\User;
use App\Repositories\InquiryRepository;
use Illuminate\Support\Facades\Route;
// use App\Services\ProfitCalculator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class InquiryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind(InquiryRepositoryInterface::class, InquiryRepository::class);
        // App::bind('ProfitCalculator', function () {
        //     return new ProfitCalculator();
        // });
        // view()->composer(['*'], function ($view) {
        //     $current_params = Route::current()->parameters();
        //     if (array_key_exists('inquiry', $current_params)) {
        //         $inquiry_id = $current_params['inquiry']->id;
        //         $user_id = Auth::id();
        //         $permissionsInquiries = PermissionsInquiries::where('inquiry_id', $inquiry_id)->where('user_id', $user_id)->first();
        //         dd($inquiry_id,$permissionsInquiries);
        //     }
        // });

        // Blade::if('permissioncontrol', function (string $value) {
        //     $current_params = Route::current()->parameters();
        //     if (array_key_exists('inquiry', $current_params)) {
        //         $inquiry_id = $current_params['inquiry']->id;
        //         $user_id = Auth::id();

        //         $permissionsInquiries = PermissionsInquiries::whereHas('permissions', function ($q) use ($value) {
        //             $q->where('name', $value);
        //         })->where('inquiry_id', $inquiry_id)->where('user_id', $user_id)->first();

        //         return !empty($permissionsInquiries);
        //     }
        //     return false;
        // });
    }
}
