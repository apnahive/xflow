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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::resource('profile', 'ProfileController');
//Route::resource('users', 'UserController');
Route::resource('users', 'UserxController');
Route::get('users/approve/{id}', 'UserxController@approve')->name('users.approve');
Route::get('users/reject/{id}', 'UserxController@reject')->name('users.reject');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('projects', 'ProjectController');
Route::resource('tasks', 'TaskController');
Route::resource('task_templates', 'Task_templateController');
Route::resource('task_for_templates', 'Task_for_templateController');

Route::resource('add_task', 'Add_taskController');
Route::get('add_task/{projectId}/add/', 'Add_taskController@pro')->name('addtemp');
Route::get('add_task/{projectId}/add/{templateId}', 'Add_taskController@add')->name('addtemppro');

Route::resource('project_users', 'Project_userController');
Route::resource('assign_tasks', 'Assign_taskController');

Route::resource('attestations', 'AttestationController');
Route::resource('project_forms', 'Project_formController');
Route::get('project_form/{id}', 'Project_formController@createf')->name('project_forms.createf');
Route::resource('form_sections', 'Form_sectionController');
Route::get('form_sections/{id}/add', 'Form_sectionController@add')->name('form_sections.add');
Route::resource('form_sign', 'Form_signController');


Route::resource('start_task', 'Start_taskController');

Route::post('taskss/search', 'TaskController@search')->name('tasks.search');


Route::resource('fileupload', 'FileUploadController');
Route::resource('calender', 'CalenderController');
Route::resource('checklists', 'ChecklistController');
Route::resource('checklist_templates', 'Checklist_templateController');
Route::resource('checklist_for_templates', 'Checklist_for_templateController');


Route::get('images/{slug}', [
    'as' => 'images.show',
    'uses' => 'ImageController@show',
    'middleware' => 'auth',
]);


Route::post('search', 'SearchController@search')->name('search');