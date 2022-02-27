<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


/**
 * AUTHENTICATION - manual
 */

// Route::get('/register', [ RegisterController::class, 'index' ])->name('register');
// Route::post('/register', [ RegisterController::class, 'store' ])->name('register-store');

// Route::get('/login', [ LoginController::class, 'index' ])->name('login');
// Route::post('/login', [ LoginController::class, 'store' ])->name('login-store');

// logout
// Route::post('/logout', [ LogoutController::class, 'store' ])->name('logout');

// Dashboard - protected - only auth user can access
Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('dashboard')->middleware('auth');

/**
 * Books Controller
 */

Route::get('/book/create', [ BookController::class, 'create' ])->name('book-create');

// show one book based on id
Route::get('/book/{id}', [ BookController::class, 'show' ])->name('book-single');

// edit one book based on id
Route::get('/book/{id}/edit', [ BookController::class, 'edit' ])->name('book-edit');

// delete one book based on id
Route::delete('/book/{id}', [ BookController::class, 'destroy' ])->name('book-destroy');

// update one book based on id
Route::post('/book/{id}', [ BookController::class, 'update' ])->name('book-update');

// get all books
Route::get('/books', [ BookController::class, 'index' ])->name('book-listing');

// create new book
Route::post('/book', [ BookController::class, 'store' ])->name('book-store');

Route::get('/authors', [ BookController::class, 'authors' ])->name('author-listing');

Route::get('/author/{id}', [ BookController::class, 'author' ])->name('author-single');



Route::get('/test', [ DashboardController::class, 'test' ]);

// Email view
Route::get('/email/welcome', function(){
    return new App\Mail\WelcomeEmail();
});



/*  redirect topic.
    302 - temp redirect
    301 - permanent redirect
    Ex1 - Route::redirect('/nasuha', '/', 302); 
*/

Route::redirect('/nasuha', '/');

// view
Route::view('/pelajar', 'pelajar', 
    [
        'nama' => 'Nasuha'
    ]);

/**
 * GET
 * POST  - terima dan simpan data
 * PUT   - edit/save data
 * PATCH - edit/save data
 * DELETE
 * OPTION
 */

Route::get('/kelas', function(){
    return view('go');
});

Route::post('/kelas', function(){
    echo "<h1>POST -- Kelas Programming</h1>";
});

/**
 * /welcome - keluar saudara/saudari as default
 * /welcome/nasuha - keluar nasuha
 */
Route::get('/welcome/{nama?}', function($nama = 'Saudara/Saudari'){
    echo "<h1>Selamat Datang $nama</h1>";
});

// controller
// no parameter
// Route::get('/jadual', [JadualController::class, 'index']);

// with parameter
// Route::get('/jadual/{subjek}', 
//     [
//         JadualController::class, 'index'
//     ]);

// model binding
/**
 * model users ada table users
 */
// http://aplikasi.test/teachers/1
// use App\Models\Teacher;
// Route::get('/teachers/{teacher}', function(Teacher $teavher){
//     echo $teacher->name;
// });

// naming the route
// Route::get('/login', [
//     AuthController::class,
//     'login'
// ])->name('login');

// ni kat view
// {{ route('login) }}
// redirect('login)

/**
 * middleware - to check either user dah login ke tak
 * hanya yg dah login je boleh access url tu semua
 */
// Route::prefix('admin')->name('admin')->middleware('auth')->group(function(){
//     // name: admin.index
//     // url: admin/user
//     Route::get('/user', UserController::class, 'index')->name('index');
//     Route::get('user/{id}', UserController::class, 'show');
//     Route::post('user', UserController::class, 'create');
//     Route::get('user/{id}/edit', UserController::class, 'edit');
//     Route::post('user{id}', UserController::class, 'update');
// });

// resource router
// auto create semua routes utk controller tu
// Route::resource('user', UserController::class);