<?php

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

// Route::group(['middleware' => 'auth'], function () {
//     //    Route::get('/link1', function ()    {
// //        // Uses Auth Middleware
// //    });

//     //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
//     #adminlte_routes
// });

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
 });
// Route untuk user yang baru register
Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
    Route::get('/', function(){
        $data['role'] = \App\UserRole::whereUserId(Auth::id())->get();
        return view('home', $data);
    });
    Route::post('upgrade', function(Request $request){
        if($request->ajax()){
            $msg['success'] = 'false';
            $user = \App\User::find($request->id);
            if($user)
                $user->putRole($request->level);
                $msg['success'] = 'true';

            return response()
                ->json($msg);
        }
    });
});
// Route untuk user yang admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:Admin']], function(){
    Route::get('/', function(){
        $data['users'] = \App\User::whereDoesntHave('roles')->get();
        return view('admin', $data);
    });
});
// Route untuk user yang member
Route::group(['prefix' => 'member', 'middleware' => ['auth','role:Member']], function(){
    Route::get('/', function(){
        return view('member');
    });
});
Auth::routes();

Route::get('user/profile', 'UserProfileController@profile')->name('user.profile');
Route::post('user/profile', 'UserProfileController@update');

// data buku
Route::get('/book/index', 'BookController@index')->name('book.index');
Route::get('/book/create', 'BookController@create')->name('book.create');
Route::post('/book/store', 'BookController@store')->name('book.store');
Route::get('/book/{book}/edit', 'BookController@edit')->name('book.edit');
Route::patch('/book/{book}/edit', 'BookController@update')->name('book.update');
Route::delete('/book/{book}/delete', 'BookController@destroy')->name('book.destroy');
Route::get('/book/export', 'BookController@bookExport')->name('book.export');
// Route::post('/book/create', 'BookController@image')->name('book.image');


// data anggota

Route::get('/member/index', 'MemberController@index')->name('member.index');
Route::get('/member/create', 'MemberController@create')->name('member.create');
Route::post('/member/store', 'MemberController@store')->name('member.store');
Route::get('/member/{member}/edit', 'MemberController@edit')->name('member.edit');
Route::patch('/member/{member}/edit', 'MemberController@update')->name('member.update');
Route::delete('/member/{member}/delete', 'MemberController@destroy')->name('member.destroy');
Route::post('/member/memberStore', 'MemberController@memberStore')->name('memberStore');
Route::get('/member/member-list', 'MemberController@member')->name('member.member');
Route::get('/member/book-list', 'BookController@memberBook')->name('member.book');
Route::get('/member/export', 'MemberController@memberExport')->name('member.export');
// data Pengarang
Route::get('/pengarang/index', 'PengarangController@index')->name('pengarang.index');
Route::get('/pengarang/create', 'PengarangController@create')->name('pengarang.create');
Route::post('/pengarang/store', 'PengarangController@store')->name('pengarang.store');
Route::get('/pengarang/{pengarang}/edit', 'PengarangController@edit')->name('pengarang.edit');
Route::patch('/pengarang/{pengarang}/update', 'PengarangController@update')->name('pengarang.update');
Route::delete('/pengarang/{pengarang}/delete', 'PengarangController@destroy')->name('pengarang.destroy');
Route::get('/pengarang/export', 'PengarangController@pengarangExport')->name('pengarang.export');
// Route::get('/search', function(Request $request){
//     $result = App\Pengarang::search($request->search)->get();

//     return view('pengarang.result', compact('result'));
// });

// route penerbit

Route::get('/penerbit/index', 'PenerbitController@index')->name('penerbit.index');
Route::get('/penerbit/create', 'PenerbitController@create')->name('penerbit.create');
Route::post('/penerbit/store', 'PenerbitController@store')->name('penerbit.store');
Route::get('/penerbit/{penerbit}/edit', 'PenerbitController@edit')->name('penerbit.edit');
Route::patch('/penerbit/{penerbit}/update', 'PenerbitController@update')->name('penerbit.update');
Route::delete('/penerbit/{penerbit}/delete', 'PenerbitController@destroy')->name('penerbit.destroy');
Route::get('/export', 'PenerbitController@penerbitExport')->name('penerbit.export');
// Route::get('/penerbit/printPreview', 'PenerbitController@printPreview')->name('penerbit.printPreview');


//route pinjam

Route::get('/borrow/index', 'BorrowController@index')->name('borrow.index');
Route::get('/borrow/create', 'BorrowController@create')->name('borrow.create');
Route::post('/borrow/store', 'BorrowController@store')->name('borrow.store');
Route::get('/borrow/{borrow}/edit', 'BorrowController@edit')->name('borrow.edit');
Route::patch('/borrow/{borrow}/edit', 'BorrowController@update')->name('borrow.update');
Route::delete('/borrow/{borrow}/delete', 'BorrowController@destroy')->name('borrow.destroy');
Route::get('/borrow/return', 'BorrowController@returnTrash')->name('borrow.return');

//route pengunjung

Route::get('/visitor/index', 'VisitorController@index')->name('visitor.index');
Route::get('/visitor/chart', 'VisitorController@chart')->name('visitor.chart');
// Route::get('/', function () {
//     return view('visitor');
//  });

