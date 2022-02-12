<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\app;

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
/*
Route::get('/', function () {
    return view('homepage');
});*/ //şu yandaki işlemi aşağıda aynısı
//Route::view('/','homepage',['ad' => 'First']);//ayrıca parametre de atayabiliyoz

Route::get('/',[app::class,'get_table'])->name('homepage');

Route::get('/new_user',[app::class, 'newUser']); //bu şekilde url deki adlandırmadan controlle a geçiş

Route::post('/create_user',[app::class, 'create_user'])->name('create_user');

Route::get('/delete_user/{id}',[app::class, 'delete_user'])->name('delete_user');

Route::get('/edit_user/{sid}',[app::class, 'edit_user'])->name('edit_user');

Route::post('/do_edit',[app::class, 'do_edit'])->name('do_edit');

Route::get('/search',[app::class, 'search'])->name('search');



