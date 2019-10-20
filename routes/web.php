<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Chamados
    Route::delete('chamados/destroy', 'ChamadoController@massDestroy')->name('chamados.massDestroy');
    Route::post('chamados/media', 'ChamadoController@storeMedia')->name('chamados.storeMedia');
    Route::resource('chamados', 'ChamadoController');

    // Setors
    Route::delete('setors/destroy', 'SetorController@massDestroy')->name('setors.massDestroy');
    Route::resource('setors', 'SetorController');

    // Finalizados
    Route::resource('finalizados', 'FinalizadosController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Time Work Types
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Projects
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entries
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Reports
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Status Chamados
    Route::delete('status-chamados/destroy', 'StatusChamadoController@massDestroy')->name('status-chamados.massDestroy');
    Route::resource('status-chamados', 'StatusChamadoController');

    // Prioridade Chamados
    Route::delete('prioridade-chamados/destroy', 'PrioridadeChamadoController@massDestroy')->name('prioridade-chamados.massDestroy');
    Route::resource('prioridade-chamados', 'PrioridadeChamadoController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
