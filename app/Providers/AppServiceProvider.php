<?php

namespace App\Providers;

use App\Models\User;
use App\Models\orders;
use App\Models\tickets;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $orderscount = orders::count();
            $userscount = User::count();
            $userbalancesum = User::sum('balance');

            $ticketpending = tickets::where('status', 'answered')
                ->count();
            $ticketpendingforadmin = tickets::where('status', 'pending')
                ->count();
            $totalpriceformypayment = 0;

            if (auth()->check()) {
                $orderssss = orders::where("user_id", auth()->user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
                $totalpriceformypayment = 0;

                // Initialize total cost variable

                // Loop through each order and add its cost to the total
                foreach ($orderssss as $order) {
                    $totalpriceformypayment += $order->price;
                }
            } else {
                $orderssss = null; // Or any default value you want
            }


            $view->with('orderscount', $orderscount)->with('userbalancesum', $userbalancesum)
                ->with('userscount', $userscount)
                ->with('ticketpending', $ticketpending)
                ->with('orderssss', $orderssss)
                ->with('totalpriceformypayment', $totalpriceformypayment)
                ->with('ticketpendingforadmin', $ticketpendingforadmin);
        });
    }
}
