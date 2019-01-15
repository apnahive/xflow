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
//Route::get('import-user', 'HomeController@importExport');
//Route::post('importuser', ['as' => 'importuser', 'uses' => 'HomeController@importExcel']);
//Route::post('importuser',array('as'=>'importuser','uses'=>'HomeController@importExcel'));
//Route::resource('importuser', 'User_importController');

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::resource('profile', 'ProfileController');
//Route::get('download-document/{userid}/{formid}', 'ProfileController@download')->name('profile.download');
Route::resource('userroles', 'UserController');
Route::resource('users', 'UserxController');
Route::get('users/sort/{feild}/{type}', 'UserxController@sort')->name('users.sort'); //for sorting
Route::get('users/approve/{id}', 'UserxController@approve')->name('users.approve');
Route::get('users/reject/{id}', 'UserxController@reject')->name('users.reject');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('projects', 'ProjectController');
Route::get('projects/sort/{feild}/{type}', 'ProjectController@sort')->name('projects.sort'); //for sorting
Route::resource('tasks', 'TaskController');
Route::get('tasks/sort/{feild}/{type}', 'TaskController@sort')->name('tasks.sort'); //for sorting
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
Route::post('taskss/allcopy', 'TaskController@deleteCopies')->name('tasks.deletecopy');


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









//job routes

Route::resource('jobs', 'JobController');
//Route::get('shortlisted/{id}/{records}', 'JobController@shortlisted')->name('jobs.shortlisted');
Route::resource('interviewed', 'Interview_scheduleController');
Route::resource('profiles', 'Candidate_profileController');
Route::resource('candidate_detail', 'Candidate_detailController');
Route::resource('client_profiles', 'Client_profileController');

Route::resource('shortlisted', 'Job_shortlistedController');
Route::get('shortlist/{id}', 'Job_shortlistedController@shortlist')->name('shortlisted.shortlist');
