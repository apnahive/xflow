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
use Illuminate\Http\Request;
use App\City;
use App\State;
use App\Checklist_item;
use App\Sublist;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('import-user', 'HomeController@importExport');
//Route::post('importuser', ['as' => 'importuser', 'uses' => 'HomeController@importExcel']);
//Route::post('importuser',array('as'=>'importuser','uses'=>'HomeController@importExcel'));
//Route::resource('importuser', 'User_importController');



//x-flow routes

Route::resource('projects', 'ProjectController');
Route::get('projects/sort/{feild}/{type}', 'ProjectController@sort')->name('projects.sort'); //for sorting
Route::resource('tasks', 'TaskController');
Route::get('tasks/sort/{feild}/{type}', 'TaskController@sort')->name('tasks.sort'); //for sorting
Route::resource('task_templates', 'Task_templateController');
Route::get('task_templates/sort/{feild}/{type}', 'Task_templateController@sort')->name('task_templates.sort'); //for sorting
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
Route::get('calender_xflow', 'CalenderController@xflow_index')->name('xflow.calender');
Route::get('calender_xflow/{id}', 'CalenderController@xflow_show')->name('xflow.calender_date');



Route::get('images/{slug}', [
    'as' => 'images.show',
    'uses' => 'ImageController@show',
    'middleware' => 'auth',
]);


Route::post('search', 'SearchController@search')->name('search');

//team
Route::resource('teams', 'TeamController');
Route::get('teams/sort/{feild}/{type}', 'TeamController@sort')->name('teams.sort'); 
Route::resource('teammembers', 'TeamMemberController');
Route::get('add_members/{id}', 'TeamMemberController@add')->name('teammembers.add');
//xflow
Route::resource('xflows', 'XflowController');
Route::get('xflows/sort/{feild}/{type}', 'XflowController@sort')->name('xflows.sort'); 
Route::get('xflow_status/{id}', 'XflowController@status')->name('xflows.status');

//Work_order
Route::resource('work_orders', 'WorkOrderController');
Route::get('work_orders/report/{id}', 'WorkOrderController@report')->name('work_orders.report');
Route::post('work_orders/report_download', 'WorkOrderController@report_download')->name('work_orders.report_download');
Route::get('work_orders/sort/{feild}/{type}', 'WorkOrderController@sort')->name('work_orders.sort');
Route::get('assign_user/{id}', 'WorkOrderAssignedController@assign')->name('work_orders.assign');
Route::resource('work_order_assign', 'WorkOrderAssignedController');
Route::resource('work_order_hour', 'WorkOrderHourController');
Route::get('work_order_hour/showhours/{work_order_id}/{user_id}', 'WorkOrderHourController@showhours')->name('work_order_hour.showhours');
Route::post('work_order_assign/search', 'WorkOrderHourController@search')->name('work_order_assign.search');
Route::get('work_order_hour/approve/{id}', 'WorkOrderHourController@approve')->name('work_order_hour.approve');
Route::get('work_order_hour/reject/{id}', 'WorkOrderHourController@reject')->name('work_order_hour.reject');
Route::post('work_order_hour/comment', 'WorkOrderHourController@comment')->name('work_order_hour.comment');
Route::post('work_order_hour/approveMany', 'WorkOrderHourController@approveMany')->name('work_order_hour.approvemany');

//checklist 

Route::resource('checklists', 'ChecklistController');
Route::get('checklists/sort/{feild}/{type}', 'ChecklistController@sort')->name('checklists.sort'); 
Route::resource('checklist_items', 'Checklist_itemController');
Route::get('checklist_item/{id}', 'Checklist_itemController@add')->name('checklist_item.add');
Route::get('add_checklist/{id}', 'ChecklistController@add')->name('checklists.add');
Route::resource('checklist_templates', 'Checklist_templateController');
Route::get('checklist_templates/sort/{feild}/{type}', 'Checklist_templateController@sort')->name('checklist_templates.sort'); 
Route::resource('checklist_for_templates', 'Checklist_for_templateController');
Route::get('checklist_for_template/{id}', 'Checklist_for_templateController@add')->name('checklist_for_template.add');

Route::resource('assign_checklist', 'Assign_checklistController');

Route::resource('sublists', 'SublistController');
Route::get('sublist/{id}', 'SublistController@add')->name('sublists.add');
Route::resource('checklist_item_notes', 'Checklist_item_noteController');
Route::get('checklist_item_note/{id}', 'Checklist_item_noteController@add')->name('checklist_item_notes.add');



//Users routes

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::resource('profile', 'ProfileController');

//Route::get('download-document/{userid}/{formid}', 'ProfileController@download')->name('profile.download');
Route::resource('userroles', 'UserController');
Route::resource('users', 'UserxController');
Route::post('users/search', 'UserxController@search')->name('users.search');
Route::get('users/sort/{feild}/{type}', 'UserxController@sort')->name('users.sort'); //for sorting
Route::get('users/approve/{id}', 'UserxController@approve')->name('users.approve');
Route::get('users/reject/{id}', 'UserxController@reject')->name('users.reject');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');






//job routes

Route::resource('jobs', 'JobController');
Route::get('jobs/sort/{feild}/{type}', 'JobController@sort')->name('jobs.sort'); 
//Route::get('shortlisted/{id}/{records}', 'JobController@shortlisted')->name('jobs.shortlisted');
Route::resource('interviewed', 'Interview_scheduleController');
Route::resource('profiles', 'Candidate_profileController');
Route::get('profiles/sort/{feild}/{type}', 'Candidate_profileController@sort')->name('profiles.sort'); 
Route::resource('candidate_detail', 'Candidate_detailController');
Route::resource('candidate_experiences', 'Candidate_experienceController');
Route::resource('client_profiles', 'Client_profileController');
Route::get('client_profiles/sort/{feild}/{type}', 'Client_profileController@sort')->name('client_profiles.sort'); 

Route::resource('shortlisted', 'Job_shortlistedController');
Route::get('shortlist/{id}', 'Job_shortlistedController@shortlist')->name('shortlisted.shortlist');
Route::resource('job_notes', 'Job_notesController');
Route::post('job_award', 'JobController@award')->name('jobs.award');





//state city routes

Route::get('/information/create/ajax-state',function(Request $request)
{
	//$request = Request
    $state = $request->state_id;
    $state_id = State::where('state', $state)->first();
    $subcategories = City::where('state_code','=',$state_id->state_code)->get();
    return $subcategories;

});

// Star checklist items route
 
Route::get('/information/unstar/ajax-state',function(Request $request)
{
	//$request = Request
    $item_id = $request->item_id;
    $ids = explode('-', $item_id);
    //dd($item_id);
    $item = Checklist_item::find($ids[1]);
    $item->star = 0;
    $item->save();
    
    return $item;
});

Route::get('/information/star/ajax-state',function(Request $request)
{
	//$request = Request
    $item_id = $request->item_id;
    $ids = explode('-', $item_id);
    //dd($item_id);
    $item = Checklist_item::find($ids[1]);
    $item->star = 1;
    $item->save();
    
    return $item;
});

//checklist item complete route 

Route::get('/information/checklist_item/ajax-state',function(Request $request)
{
	//$request = Request
    $item_id = $request->item_id;
    $ids = explode('-', $item_id);
    //dd($item_id);
    $item = Checklist_item::find($ids[1]);
    $item->status = 1;
    $item->save();
    
    return $item;
});

//sublist item complete

Route::get('/information/sublist_item/ajax-state',function(Request $request)
{
    //$request = Request
    $item_id = $request->item_id;
    $ids = explode('-', $item_id);
    //dd($item_id);
    $item = Sublist::find($ids[1]);
    $item->status = 1;
    $item->save();
    
    return $item;
});