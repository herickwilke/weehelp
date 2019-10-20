<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Chamados
    Route::post('chamados/media', 'ChamadoApiController@storeMedia')->name('chamados.storeMedia');
    Route::apiResource('chamados', 'ChamadoApiController');

    // Setors
    Route::apiResource('setors', 'SetorApiController');

    // Time Work Types
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Projects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Time Reports
    Route::apiResource('time-reports', 'TimeReportApiController');

    // Status Chamados
    Route::apiResource('status-chamados', 'StatusChamadoApiController');

    // Prioridade Chamados
    Route::apiResource('prioridade-chamados', 'PrioridadeChamadoApiController');
});
