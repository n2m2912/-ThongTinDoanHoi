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
use App\Type;

Route::get('/', 'HomeController@index');

Route::get('/getdata', 'HomeController@getData');

Route::get('/detail/{id}', 'HomeController@detail');

Route::get('/news-type/{id}', 'HomeController@newsType');

Route::get('/news-type/{id}', 'HomeController@newsType');

Route::get('/login', 'HomeController@login');

Route::post('/login', 'HomeController@postLogin');

Route::get('/library/image', 'HomeController@imageLibrary');

Route::get('/library/video', 'HomeController@videoLibrary');

Route::get('/library/file', 'HomeController@fileLibrary');

Route::post('/library/search', 'HomeController@search')->name('search');

Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin', 'AdminController@adminPage' );

    Route::get('/admin/users', 'UserController@listUsers');

    Route::get('/admin/users/add', 'UserController@addUserForm');
    
    Route::post('/admin/users/add', 'UserController@addUser')->name('addUser');

    Route::get('/admin/users/edit/{id}', 'UserController@editUserForm');

    Route::post('/admin/users/edit', 'UserController@editUser')->name('editUser');

    Route::get('/admin/users/reset/{id}', 'UserController@resetPass');
    
    Route::get('/admin/users/delete/{id}', 'UserController@deleteUser');

    Route::get('/admin/slide', 'SlideController@getListSlide' );

    Route::post('/admin/slide/add', 'SlideController@addSlide')->name('addSlide');

    Route::get('/admin/slide/add', 'SlideController@addSlideForm');

    Route::get('/admin/slide/edit/{id}', 'SlideController@editSlideForm');

    Route::post('/admin/slide/edit', 'SlideController@editSlide')->name('editSlide');

    Route::get('/admin/slide/delete/{id}', 'SlideController@deleteSlide');
    
    Route::get('/admin/type', 'TypeController@getListType' );

    Route::get('/admin/type/add', 'TypeController@addTypeForm');

    Route::post('/admin/type/add', 'TypeController@addTypeNew')->name('addTypeNew');

    Route::get('/admin/type/edit/{id}', 'TypeController@editTypeForm');

    Route::post('/admin/type/edit', 'TypeController@editType')->name('editType');

    Route::get('/admin/type/delete/{id}', 'TypeController@deleteType');

    Route::get('/admin/news', 'NewController@getListNew');

    Route::get('/admin/news/add', 'NewController@addNewForm');

    Route::post('/admin/news/add', 'NewController@addNew')->name('addNew');

    Route::get('/admin/news/edit/{id}', 'NewController@editNewForm');

    Route::post('/admin/news/edit', 'NewController@editNew')->name('editNew');
    
    Route::get('/admin/news/delete/{id}', 'NewController@deleteNew');

    Route::get('/admin/files', 'FileController@getListFile');
    
    Route::get('/admin/files/add', 'FileController@addFileForm');

    Route::post('/admin/files/add', 'FileController@addFile')->name('addFile');

    Route::get('/admin/files/edit/{id}', 'FileController@editFileForm');

    Route::post('/admin/files/edit', 'FileController@editFile')->name('editFile');
    
    Route::get('/admin/files/delete/{id}', 'FileController@deleteFile');

    Route::get('/admin/roles', 'RoleController@getListRole');
    
    Route::get('/admin/roles/add', 'RoleController@addRoleForm');

    Route::post('/admin/roles/add', 'RoleController@addRole')->name('addRole');

    Route::get('/admin/roles/edit/{id}', 'RoleController@editRoleForm');

    Route::post('/admin/roles/edit', 'RoleController@editRole')->name('editRole');
    
    Route::get('/admin/roles/delete/{id}', 'RoleController@deleteRole');

    Route::get('/admin/libraries', 'LibraryController@getListLibrary');
    
    Route::get('/admin/libraries/add', 'LibraryController@addLibraryForm');

    Route::post('/admin/libraries/add', 'LibraryController@addLibrary')->name('addLibrary');

    Route::get('/admin/libraries/edit/{id}', 'LibraryController@editLibraryForm');

    Route::post('/admin/libraries/edit', 'LibraryController@editLibrary')->name('editLibrary');
    
    Route::get('/admin/libraries/delete/{id}', 'LibraryController@deleteLibrary');

    Route::get('/admin/info/edit', 'AdminController@editInfoForm');

    Route::post('/admin/info/edit', 'AdminController@editInfo')->name('editInfo');
});

Route::group(['middleware' => ['user']], function () {

    Route::get('/user', 'CTVController@userPage' );

    Route::get('/user/news', 'CTVController@getListNew');

    Route::get('/user/news/add', 'CTVController@addNewForm');

    Route::post('/user/news/add', 'CTVController@addNew')->name('useraddNew');

    Route::get('/user/news/edit/{id}', 'CTVController@editNewForm');

    Route::post('/user/news/edit', 'CTVController@editNew')->name('usereditNew');
    
    Route::get('/user/news/delete/{id}', 'CTVController@deleteNew');

    Route::get('/user/files', 'CTVController@getListFile');
    
    Route::get('/user/files/add', 'CTVController@addFileForm');

    Route::post('/user/files/add', 'CTVController@addFile')->name('useraddFile');

    Route::get('/user/files/edit/{id}', 'CTVController@editFileForm');

    Route::post('/user/files/edit', 'CTVController@editFile')->name('usereditFile');
    
    Route::get('/user/files/delete/{id}', 'CTVController@deleteFile');

    Route::get('/user/info/edit', 'CTVController@editInfoForm');

    Route::post('/user/info/edit', 'CTVController@editInfo')->name('usereditInfo');
});

Route::get('logout', 'HomeController@logout');

Route::get('get', function () {
    $t = Type::find(1);
    foreach($t->newsByType as $n){
        echo $n->new_title;
    }
});

