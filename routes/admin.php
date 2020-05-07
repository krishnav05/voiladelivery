<?php

    Route::GET('/home', 'AdminController@index')->name('admin.home');
    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', 'AdminController@changePassword');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');
    Route::get('/me', 'AdminController@me')->name('admin.me');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

    // active status
    Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
    Route::delete('activation/{admin}', 'ActivationController@deactivate');
    Route::resource('permission', 'PermissionController');

    Route::fallback(function () {
        return abort(404);
    });

    Route::get('dashboard','\App\Http\Controllers\Admin\DashboardController@fetch')->middleware('auth:admin')->middleware('role:super;restaturaa');

    Route::get('update/{id}/{status}','\App\Http\Controllers\Admin\DashboardController@update')->middleware('auth:admin')->middleware('role:super;restaturaa');

    Route::get('upload','\App\Http\Controllers\Admin\UploadController@index')->middleware('auth:admin')->middleware('role:super;restaturaa');
    
    Route::post('uploadCategory', '\App\Http\Controllers\Admin\UploadController@uploadCategory')->middleware('auth:admin')->middleware('role:super;restaturaa');

    Route::post('uploadCategoryItem', '\App\Http\Controllers\Admin\UploadController@uploadCategoryItem')->middleware('auth:admin')->middleware('role:super;restaturaa');

    Route::post('uploadHindiCategory', '\App\Http\Controllers\Admin\UploadController@uploadHindiCategory')->middleware('auth:admin')->middleware('role:super;restaturaa');

    Route::post('uploadHindiCategoryItems', '\App\Http\Controllers\Admin\UploadController@uploadHindiCategoryItems')->middleware('auth:admin')->middleware('role:super;restaturaa');