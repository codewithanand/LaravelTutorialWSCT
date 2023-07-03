<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CustomerController;


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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/demo/{name?}', function ($name=NULL) {
//     $data = compact('name');
//     return view('demo') -> with($data);
// });

// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/', [DemoController::class, 'index']);

// Route::get('/about', 'App\Http\Controllers\DemoController@about');

// Route::get('/courses', SingleActionController::class);

// Route::resource('photo', PhotoController::class);

// Route::get('/', function () {
//     return view('form');
// });

Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);

// Route::get('/customer', function(){
//     $customers = Customer::all();
//     echo '<pre>';
//     print_r($customers->toArray());
//     echo '</pre>';
// });

Route::get('/', function () {
    return view('home');
});

Route::group(["prefix"=>"customer"], function(){
    Route::get('/', [CustomerController::class, 'index'])->name('customer.create');
    Route::post('/', [CustomerController::class, 'store']);
    Route::get('/view', [CustomerController::class, 'view']);
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/trash', [CustomerController::class, 'trash']);
    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('/forceDelete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.forceDelete');
});


Route::get('/get-all-session', function(){
    $session = session()->all();
    array_formatted_data($session);
});

Route::get('/set-session', function(Request $request){
    $request->session()->put('user_id', '1');
    $request->session()->put('user_name', 'Anand Kumar');
    return redirect('/get-all-session');
});

Route::get('destroy-session', function(){
    // session()->forget('user_id');
    // session()->forget('user_name');
    session()->forget(['user_id', 'user_name']);
    return redirect('/get-all-session');
});

Route::get('/upload', function(){
    return view('upload');
});
Route::post('/upload', function(Request $request){
    // echo '<pre>';
    // print_r($request->all());
    // echo '</pre>';

    // $request->file('image')->store('uploads'); // default upload with random name

    // $filename = 'fh-'.time().'.'.$request->file('image')->getClientOriginalExtension(); // with original extension
    $filename = 'fh-'.time().'.jpg'; // with specific extension
    $request->file('image')->storeAs('uploads/img', $filename);

    return redirect('/upload');
});
