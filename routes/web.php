<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\Admin\indxControllerAdmin;
use App\Http\Controllers\Admin\UsersControllerAdmin;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes;
use App\Http\Controllers\Admin\OrdersControllerAdmin;
use App\Http\Controllers\Admin\TicketsControllerAdmin;
use App\Http\Controllers\Admin\ProductsControllerAdmin;
use App\Http\Controllers\languageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/autodownload', function () {
    $filePath = public_path('socialhub.apk');

    return response()->streamDownload(function () use ($filePath) {
        $file = fopen($filePath, 'rb');
        fpassthru($file);
    }, 'socialhub.apk', ['Content-Type' => 'application/vnd.android.package-archive']);
});



//  'verified'

Route::get('lang/en', [languageController::class, 'setEnglish'])->name('lang.en');
Route::get('lang/ar', [languageController::class, 'setArabic'])->name('lang.ar');

Route::get('/get-session-locale', function () {
    return response()->json(['locale' => session('locale')]);
});

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [OrdersController::class, 'index'])->name('main');
    Route::get('orders', [OrdersController::class, 'ordersview'])->name('orders');
    Route::post('neworder', [OrdersController::class, 'order'])->name('neworder');
    Route::get('services', [OrdersController::class, 'services'])->name('services');
    Route::get('orders/search', [OrdersController::class, 'search'])->name('orders.search');
    Route::get('orders/{status}', [OrdersController::class, 'orderbystatus'])->name('orderbystatus');


    Route::get('tickets', [TicketsController::class, 'tickets'])->name('tickets');
    Route::get('viewticket/{id}', [TicketsController::class, 'viewticket'])->name('viewticket');
    Route::post('tickets', [TicketsController::class, 'createticket'])->name('createticket');
    Route::post('addmessge', [TicketsController::class, 'addmessage'])->name('ticket.addmessge');
    Route::get('ticket/search', [TicketsController::class, 'search'])->name('ticket.search');

    Route::get('payment', function () {
        return view("payment");
    })->name("payment");
});






Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [indxControllerAdmin::class, 'login'])->name('admin.login');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [indxControllerAdmin::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/orders', [OrdersControllerAdmin::class, 'index'])->name('admin.orders');
    Route::get('/admin/orders/search', [OrdersControllerAdmin::class, 'search'])->name('admin.orders.search');

    Route::get('/admin/users', [UsersControllerAdmin::class, 'index'])->name('admin.users');
    Route::post('/admin/user/update/{id}', [UsersControllerAdmin::class, 'updateuser'])->name('admin.user.update');
    Route::post('admin/user/addbalance', [UsersControllerAdmin::class, 'addbalance'])->name('admin.user.addbalance');

    Route::get('/admin/products', [ProductsControllerAdmin::class, 'index'])->name('admin.products');
    Route::get('/admin/products/search', [ProductsControllerAdmin::class, 'search'])->name('admin.product.search');
    Route::get('/admin/products#demo-modal', [ProductsControllerAdmin::class, 'index'])->name('admin.products2');
    Route::post('/admin/product/create', [ProductsControllerAdmin::class, 'createproduct'])->name('admin.product.create');
    Route::put('/admin/product/update/{id}', [ProductsControllerAdmin::class, 'updateproduct'])->name('admin.product.update');


    Route::get('admin/tickets', [TicketsControllerAdmin::class, 'index'])->name('admin-ticket');
    Route::get('/get-messages/{id}', [TicketsControllerAdmin::class, 'getMessages'])->name('get-messages');
    Route::get('admin/tickets/search', [TicketsControllerAdmin::class, 'search'])->name('admin.ticket.search');
    Route::post('/ticket/update', [TicketsControllerAdmin::class, 'update'])->name('ticket.update');
    Route::post('admin/replay', [TicketsControllerAdmin::class, 'create'])->name('ticket.create.admin');
});



require __DIR__ . '/auth.php';
