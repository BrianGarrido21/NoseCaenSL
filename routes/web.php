<?php

use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\CurrenciesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\GlobalFeeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\mailprueba;
use App\Http\Controllers\MyAuth\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Prueba;
use App\Http\Controllers\Prueba2;
use App\Http\Controllers\UserTaskController;
use Illuminate\Auth\Middleware\Authorize;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::middleware('guest')->group(function () {
    Route::inertia('/', 'HomePage')->name('home');
    Route::get('/task', [UserTaskController::class, 'create'])->name('create');
    Route::post('/task', [UserTaskController::class, 'store'])->name('store');
    Route::inertia('/success', 'Tasks/TaskSuccess')->name('success');
});

require __DIR__ . '/auth.php';



Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login.form');
Route::post('/employee/login', [EmployeeAuthController::class, 'login'])->name('employee.login');

Route::get('/auth/redirect', [SocialAuthController::class, 'redirectToProvider'])->name('google_login');
Route::get('/auth/callback', [SocialAuthController::class, 'handleCallback']);

Route::get('/paypal/pay/{fee}', [PaymentController::class, 'payWithPayPal'])->name('paypal.pay');
Route::get('/paypal/status', [PaymentController::class, 'payPalStatus'])->name('paypal.status');

Route::get('/paypal/success', function () {
    return view('paypal.success');
})->name('paypal.success');

Route::get('/paypal/failed', function () {
    return view('paypal.failed');
})->name('paypal.failed');
Route::middleware('auth.employee')->group(function () {
    Route::post('/employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

    Route::get('/employee/profile', [ProfileController::class, 'edit'])->name('profile.form');
    Route::patch('/employee/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::view('/employee', 'employee.dashboard')->name('employee.dashboard');

    Route::resource('employee/task', TaskController::class);
    Route::get('employee/task/complete/{task}', [CompleteController::class, 'show'])->name('task.complete.form');
    Route::put('employee/task/complete/{task}', [CompleteController::class, 'store'])->name('task.complete');

    Route::resource('employee/employee', EmployeeController::class);
    Route::resource('employee/status', StatusController::class);
    Route::resource('employee/role', RoleController::class);
    Route::resource('employee/user', UserController::class);

    Route::resource('fee', FeeController::class);
    Route::post('global-fee', [GlobalFeeController::class, '__invoke'])->name('global.fee');
    Route::get('/fee/{fee}/download-pdf', [PDFController::class, 'downloadFeePDF'])->name('fee.download');
    Route::get('/fee/{fee}/resend-pdf', [PDFController::class, 'resendFeePDF'])->name('fee.resend');
});
