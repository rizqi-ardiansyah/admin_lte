<?php

use App\Http\Controllers\Api\TechnicianController as ApiTechnicianController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TechnicianController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\PermissionController;
use App\Http\Controllers\Admins\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/indexTeknisi', function () {
    return view('teknisi.technician');
})->name('teknisi.index');
// });

Route::prefix('/')->group(function () {
    Route::get('login-page', function () {
        return view('auth.login', ['title' => 'Login']);
    })->name('login.auth');


    Route::get('register-page', function () {
        return view('auth.register', ['title' => 'Register']);
    })->name('register.auth');

    Route::get('', function () {
        return view('index', [
            'title' => 'Home'
        ]);
    })->name('index.home');

    Route::get('service', function () {
        return view('service', [
            'title' => 'Service'
        ]);
    })->name('service.home');

    Route::get('contact', function () {
        return view('contact', [
            'title' => 'Contact'
        ]);
    })->name('contact.home');

    Route::get('about', function () {
        return view('about', [
            'title' => 'About'
        ]);
    })->name('about.home');

    Route::get('techs', function () {
        return view('teknisi.technician', [
            'title' => 'Teknisi'
        ]);
    });
    Route::get('form-transc', function () {
        return view('transactionForm', [
            'title' => 'Transaksi Form',
        ]);
    });

    Route::get('profile', function () {
        return view('profile', [
            'title' => 'Profile'
        ]);
    });

    Route::get('notif-user', function () {
        return view('notif-user', [
            'title' => 'notif-user'
        ]);
    });

    Route::get('/tech', [ApiTechnicianController::class, 'showAll'])->name('tech.show');
    

    // Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');

    // Route::group(['middleware' => ['auth:admin']], function() {
    // Route::middleware(['auth:admin', 'verified'])->get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    //     // Route::get('/admin', [AdminController::class, 'index']);
    //   })->name('dashboard');
    
    // Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified', 'role:admin|user'])->group(function() {
    // Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'role:admin|user'])->group(function() {
    //     Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    
    //     Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'update']);
    //     Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
    //     Route::resource('permissions', PermissionController::class)->except(['create', 'show', 'edit']);
    //     Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
    // });
    // Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'role:admin|user'])
    // Route::prefix('admin')->middleware(['auth', 'auth:student'])->group(function () {
    //     Route::get('home', 'DashboardController@display')->name('admin.home');
    // });

    // Route::middleware(['auth:admin', 'verified'])->get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');
    
    // Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'role:admin|user'])->group(function() {
    //     Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    
    //     Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'update']);
    //     Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
    //     Route::resource('permissions', PermissionController::class)->except(['create', 'show', 'edit']);
    //     Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
    // });
  

});

// Route::prefix('/login-page')->middleware(['auth', 'auth:web'])->group(function () {
Route::middleware(['auth:web'])->group(function () {
    // Route::prefix('admin')->group(function () {
// Route::group(['middleware' => 'auth:web'], function () {
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/inbox', [MessageController::class, 'index'])->name('inbox.index');
    // Route::get('/inbox/{id}', [MessageController::class, 'show'])->name('inbox.show');

    Route::get('/cdteknisi', [TechnicianController::class, 'ubahdata'])->name('inbox.cdt');
    Route::get('/statisiktch', [TechnicianController::class, 'statistik'])->name('inbox.statisik');
    Route::get('/detailOrder', function () {
        return view(
            'teknisi.detailOrder',
            ['title' => 'Order Detail']
        );
    })->name('teknisi.detailOrder');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
// Route::middleware(['auth:admin', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'role:admin|user'])->group(function() {
//     Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

//     Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'update']);
//     Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
//     Route::resource('permissions', PermissionController::class)->except(['create', 'show', 'edit']);
//     Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
// });


// Route::get('/dashboard', function() {
//     return view('admin');
//   })->middleware('auth:admin');
// Route::prefix('/dashboard')->middleware(['auth:admin', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');



// Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'role:admin|user'])->group(function() {
//     Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

//     Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'update']);
//     Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
//     Route::resource('permissions', PermissionController::class)->except(['create', 'show', 'edit']);
//     Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
// });


// Route::middleware(['auth:admin'])->group(function () {
// });

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);


// Route::middleware(['auth:web'])->group(function () {
//     Route::prefix('admin')->group(function () {
//         Route::name('api.admin.')->group(function () {

//             ////////////////////////////////////////////////////////////
//             /// PLACE ADMIN API ROUTES HERE ////////////////////////////
//             ////////////////////////////////////////////////////////////
//             Route::apiResource('test','App\Http\Controllers\API\MyController');
//             ////////////////////////////////////////////////////////////
//         });
//     });
// });

// Route::middleware(['auth:api'])->group(function () {
//     Route::name('api.')->group(function () {
//         ////////////////////////////////////////////////////////////
//         /// PLACE PUBLIC API ROUTES HERE ///////////////////////////
//         ////////////////////////////////////////////////////////////
//         Route::apiResource('test', 'App\Http\Controllers\API\MyController');
//         ////////////////////////////////////////////////////////////
//     });
// });

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

// hanya untuk tamu yg belum auth
Route::get('/loginn', [LoginAdminController::class, 'getLogin'])->middleware('guest');
Route::post('/loginn', [LoginAdminController::class, 'postLogin']);
Route::get('/logout', [LoginAdminController::class, 'logout']);

// Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified', 'role:admin|user'])->group(function() {
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified'])->group(function() {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'update']);
    Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
    Route::resource('permissions', PermissionController::class)->except(['create', 'show', 'edit']);
    Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
});
// Route::get('/admin', function() {
//     return view('auth.register', ['title' => 'Login Admin']);
// })->middleware('auth:admin');

// Route::get('/user', function() {
//   return view('user');
// })->middleware('auth:user');