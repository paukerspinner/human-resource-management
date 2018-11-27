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

use App\Applicant;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::any('/register', function() {
	abort(403);
});

Route::get('/error', function () {
    return view('error');
})->name('error');

Route::get('/home', 'HomeController@index')->name('home');
Route::Post('/slackbot', 'AttendanceController@slackbot')->name('slackbot');

//Route::group(['middleware' => 'auth'], function (){
Route::group(['middleware' => 'allowed_permission'], function (){
	//dashboard

	Route::get('/dashboard',[
		'uses' => 'DashboardController@index',
		'as' => 'admin.dashboard'
	]);

    //	Help
    Route::get('/help',[
        'uses' => 'DashboardController@help',
        'as' => 'admin.help'
    ]);
	
	Route::resources([
	    'branch' => 'BranchesController',
	]);

	Route::resources([
        'job' => 'JobsController',
    ]);


	Route::Get('/applicant/create',[
		'uses' =>'ApplicantController@create',
		'as' => 'applicant.create'
	]);
	Route::Get('/applicant/index',[
		'uses' =>'ApplicantController@index',
		'as' => 'applicants'
	]);
	Route::Get('/applicant/single_Cat_Job/{id}',[
		'uses' => 'ApplicantController@single_Cat_Job',
		'as' => 'single_cat_jobs'
	]);
	Route::Get('/applicant/single/{id}',[
		'uses' =>'ApplicantController@singleApplicant',
		'as' => 'applicant.single'
	]);
	Route::Get('/applicant/delete/{id}',[
		'uses'=> 'ApplicantController@destroy',
		'as'=> 'applicant.delete' 
	]);

	Route::Get('/applicant/trashed',[
		'uses' => 'ApplicantController@trashed',
		'as' => 'applicant.trashed'
	]);

	Route::Get('/applicant/kill/{id}',[
		'uses' => 'ApplicantController@kill',
		'as' => 'applicant.kill'
	]);
	Route::Get('/applicant/restore/{id}',[
		'uses' => 'ApplicantController@restore',
		'as' => 'applicant.restore'
	]);
	Route::Get('/applicant/hire/{id}',[
		'uses' => 'ApplicantController@hire',
		'as' => 'applicant.hire'
	]);
	Route::Get('/applicant/retire/{id}',[
		'uses' => 'ApplicantController@retire',
		'as' => 'applicant.retire'
	]);
	
	Route::Get('/applicants/hired',[
		'uses' => 'ApplicantController@hiredApplicants',
		'as' => 'applicants.hired'
	]);
	//Department
    Route::Get('/departments',[
        'uses' => 'DepartmentController@index',
        'as' => 'departments.index'
    ]);
    Route::post('/department/create',[
        'uses' => 'DepartmentController@create',
        'as' => 'department.create'
    ]);
    Route::post('/department/update/{id}',[
        'uses' => 'DepartmentController@update',
        'as' => 'department.update'
    ]);

    Route::post('/department/delete/{id}',[
        'uses' => 'DepartmentController@delete',
        'as' => 'department.delete'
    ]);
//Vendors
    Route::Get('/vendors',[
        'uses' => 'VendorController@index',
        'as' => 'vendors.index'
    ]);
    Route::get('/vendor/create',[
        'uses' => 'VendorController@create',
        'as' => 'vendor.create'
    ]);
    Route::post('/vendor/store',[
        'uses' => 'VendorController@store',
        'as' => 'vendor.store'
    ]);
    Route::get('/vendor/edit/{id}',[
        'uses' => 'VendorController@edit',
        'as' => 'vendor.edit'
    ]);
    Route::post('/vendor/update/{id}',[
        'uses' => 'VendorController@update',
        'as' => 'vendor.update'
    ]);
    Route::post('/vendor/delete/{id}',[
        'uses' => 'VendorController@delete',
        'as' => 'vendor.delete'
    ]);
    //Vendor Category
    Route::Get('/vendors/category',[
        'uses' => 'VendorCategoryController@index',
        'as' => 'vendor_category.index'
    ]);
    Route::post('/vendor/category/create',[
        'uses' => 'VendorCategoryController@create',
        'as' => 'vendor_category.create'
    ]);
    Route::post('/vendor/category/update/{id}',[
        'uses' => 'VendorCategoryController@update',
        'as' => 'vendor_category.update'
    ]);

    Route::post('/vendor/category/delete/{id}',[
        'uses' => 'VendorCategoryController@delete',
        'as' => 'vendor_category.delete'
    ]);

    //Teams
    Route::Get('/teams',[
        'uses' => 'TeamController@index',
        'as' => 'teams.index'
    ]);
    Route::post('/team/create',[
        'uses' => 'TeamController@create',
        'as' => 'team.create'
    ]);
    Route::post('/team/update/{id}',[
        'uses' => 'TeamController@update',
        'as' => 'team.update'
    ]);

    Route::post('/team/delete/{id}',[
        'uses' => 'TeamController@delete',
        'as' => 'team.delete'
    ]);

    //Team Members
    Route::Get('/team_members',[
        'uses' => 'TeamMembersController@index',
        'as' => 'team_members.index'
    ]);
    Route::post('/team_member/add/',[
        'uses' => 'TeamMembersController@create',
        'as' => 'team_member.add'
    ]);
    Route::get('/team_member/edit/{id}',[
        'uses' => 'TeamMembersController@edit',
        'as' => 'team_member.edit'
    ]);
    Route::post('/team_member/delete/{id}',[
        'uses' => 'TeamMembersController@delete',
        'as' => 'team_member.delete'
    ]);

    //Designations
    Route::Get('/designations',[
        'uses' => 'DesignationController@index',
        'as' => 'designations.index'
    ]);
    Route::post('/designation/create',[
        'uses' => 'DesignationController@create',
        'as' => 'designation.create'
    ]);
    Route::post('/designation/update/{id}',[
        'uses' => 'DesignationController@update',
        'as' => 'designation.update'
    ]);

    Route::post('/designation/delete/{id}',[
        'uses' => 'DesignationController@delete',
        'as' => 'designation.delete'
    ]);
    //Profile Update
    Route::Get('/profile/index',[
        'uses' => 'ProfileController@index',
        'as' => 'profile.index'
    ]);
    Route::Post('/profile/update',[
        'uses' => 'ProfileController@update',
        'as' => 'password.update'
    ]);
    Route::Post('/profile_update/update',[
        'uses' => 'ProfileController@updatePic',
        'as' => 'profile_pic.update'
    ]);


    //Leave Types

    Route::Get('/leave_types',[
        'uses' => 'LeaveTypeController@index',
        'as' => 'leave_type.index'
    ]);
    Route::post('/leave_type/create',[
        'uses' => 'LeaveTypeController@create',
        'as' => 'leave_type.create'
    ]);
    Route::post('/leave_type/update/{id}',[
        'uses' => 'LeaveTypeController@update',
        'as' => 'leave_type.update'
    ]);

    Route::post('/leave_type/delete/{id}',[
        'uses' => 'LeaveTypeController@delete',
        'as' => 'leave_type.delete'
    ]);



    //	Route::Get('/user/create',[
//		'uses' => 'UsersController@create',
//		'as' => ''
//	]);
//	Route::Get('/users',[
//		'uses' => 'UsersController@index',
//		'as' => 'users'
//	]);
//	Route::Post('/user/store',[
//		'uses' => 'UsersController@store',
//		'as' => 'user.store'
//	]);
//	Route::post('/user/delete/{id}',[
//		'uses' => 'UsersController@delete',
//		'as' => 'user.delete'
//	]);
//	Route::Get('/user/admin/{id}',[
//		'uses' => 'UsersController@admin',
//		'as' => 'user.admin'
//	]);
//
//	Route::Get('/user/edit/{id}',[
//		'uses' => 'UsersController@edit',
//		'as' => 'user.edit'
//	]);
//	Route::Post('/user/update/{id}',[
//		'uses' => 'UsersController@update',
//		'as' => 'user.update'
//	]);
//
//	Route::Get('/user/not_admin/{id}',[
//		'uses' => 'UsersController@Not_Admin',
//		'as' => 'user.not_admin'
//	]);

	Route::resources([
	    'organization_hierarchy' => 'OrganizationHierarchyController',
	]);

	Route::Get('/rolespermissions',[
		'uses' => 'RolePermissionsController@index',
		'as' => 'roles_permissions'
	]);
	Route::Get('/rolespermissions/create',[
		'uses' => 'RolePermissionsController@create',
		'as' => 'roles_permissions.create'
	]);
	Route::Post('/rolespermissions/store',[
		'uses' => 'RolePermissionsController@store',
		'as' => 'roles_permissions.store'
	]);
	Route::Get('/rolespermissions/applyrole',[
		'uses' => 'RolePermissionsController@applyRole',
		'as' => 'roles_permissions.applyrole'
	]);
	Route::Post('/rolespermissions/applyrolepost',[
		'uses' => 'RolePermissionsController@applyRolePost',
		'as' => 'roles_permissions.applyrolepost'
	]);
	Route::Get('/rolespermissions/getPermissionsFromRole/{id}/{employee_id}',[
		'uses' => 'RolePermissionsController@getPermissionsFromRole',
		'as' => 'roles_permissions.getPermissionsFromRole'
	]);
	Route::Get('/rolespermissions/edit/{id}',[
		'uses' => 'RolePermissionsController@edit',
		'as' => 'roles_permissions.edit'
	]);
	Route::Post('/rolespermissions/update/{id}',[
		'uses' => 'RolePermissionsController@update',
		'as' => 'roles_permissions.update'
	]);

	Route::Post('/rolespermissions/delete/{id}',[
		'uses' => 'RolePermissionsController@destroy',
		'as' => 'roles_permissions.delete'
	]);

	Route::Get('/employees',[
		'uses' => 'EmployeeController@index',
		'as' => 'employees'
	]);
	Route::Get('/employee/create',[
		'uses' => 'EmployeeController@create',
		'as' => 'employee.create'
	]);
	Route::Post('/employee/store',[
		'uses' => 'EmployeeController@store',
		'as' => 'employee.store'
	]);
	//edit
	Route::get('/employee/edit/{id}',[
		'uses' => 'EmployeeController@edit',
		'as' => 'employee.edit'
	]);
	
	Route::get('/profile',[
		'uses' => 'EmployeeController@profile',
		'as' => 'employee.profile'
	]);

	//update
	Route::Post('/employee/update/{id}',[
		'uses' => 'EmployeeController@update',
		'as' => 'employee.update'
	]);

	//trash
	Route::Get('/employee/trashed',[
		'uses' => 'EmployeeController@trashed',
		'as' => 'employee.trashed'
	]);

	Route::Get('/employee/kill/{id}',[
		'uses' => 'EmployeeController@kill',
		'as' => 'employee.kill'
	]);
	Route::Get('/employee/restore/{id}',[
		'uses' => 'EmployeeController@restore',
		'as' => 'employee.restore'
	]);

	
	//Delete Employee
	Route::Post('/employee/delete/{id}',[
		'uses' => 'EmployeeController@destroy',
		'as' => 'employee.destroy'
	]);

	//attendance
	Route::Get('/attendance/show/{id?}',[
		'uses' => 'AttendanceController@showAttendance', //show Attendance
		'as' => 'attendance'
	]);
	//attendance
	Route::Get('/attendance/timeline/{id?}',[
		'uses' => 'AttendanceController@showTimeline', //show Attendance
		'as' => 'timeline'
	]);

	Route::Get('/attendance/today_timeline/{id?}',[
		'uses' => 'AttendanceController@todayTimeline', //show Attendance
		'as' => 'today_timeline'
	]);

	// Route::Resource('attendance','AttendanceController');
	
	Route::Get('/attendance/sheet/{id}',[
		'uses' => 'AttendanceController@sheet', //show Attendance sheet
		'as' => 'attendance.sheet'
	]);
	
	Route::Get('/attendance/create/{id?}/{date?}/',[
		'uses' => 'AttendanceController@create', //show Attendance
		'as' => 'attendance.create'
	]);

	Route::Get('/attendance/createByAjax/{id?}/{date?}/',[
		'uses' => 'AttendanceController@createByAjax', //show Attendance
		'as' => 'attendance.createByAjax'
	]);

	//Attendance and leave check for ajax for shown in update form
	Route::Get('/attendance/getbyAjax',[
		'uses' => 'AttendanceController@getbyAjax',
		'as' => 'attendance.showByAjax'
	]);

	Route::Get('/attendance/edit/{id}',[
		'uses' => 'AttendanceController@edit',
		'as' => 'attendance.edit'
	]);
	Route::Post('/attendance/storeAttendanceSummaryToday',[
		'uses' => 'AttendanceController@storeAttendanceSummaryToday',
		'as' => 'attendance.storeAttendanceSummaryToday'
	]);
	
	Route::Post('/attendance/store',[
		'uses' => 'AttendanceController@store',
		'as' => 'attendance.store'
	]);
	

	Route::Get('/attendance/show/{id}',[
		'uses' => 'AttendanceController@index',
		'as' => 'attendance.show'
	]);
	Route::Post('/attendance/delete',[
		'uses' => 'AttendanceController@destroy',
		'as' => 'attendance.destroy'
	]);
	
	Route::Post('/attendance/deletechecktime',[
		'uses' => 'AttendanceController@deleteChecktime',
		'as' => 'attendance.deletechecktime'
	]);

	Route::Post('/attendance/update',[
		'uses' => 'AttendanceController@update',
		'as' => 'attendance.update'
	]);

	Route::GET('/attendance/export',[
		'uses' => 'AttendanceController@showExport',
		'as' => 'attendance.export.show'
	]);

	Route::Post('/attendance/export',[
		'uses' => 'AttendanceController@exportAttendance',
		'as' => 'attendance.export'
	]);

	//Salary Show

	Route::Get('/salary',[
		'uses' => 'SalariesController@index',
		'as' => 'salary.show'
	]);

	//add Bonus
		Route::Post('/salary/addBonus/{id}',[
			'uses' => 'SalariesController@addBonus',
			'as' => 'salary.bonus'
		]);
	//proccessed
	
	Route::Post('/salary/process',[
		'uses' => 'SalariesController@processSalary',
		'as' => 'salary.processed'
	]);

	//export
	Route::Get('/salary/export',[
		'uses' => 'SalariesController@index',
		'as' => 'salary.index'
	]);

	Route::Get('/salary/export',[
		'uses' => 'SalariesController@index',
		'as' => 'salary.index'
	]);

	Route::Post('/salary/export',[
		'uses' => 'SalariesController@export',
		'as' => 'salary.export'
	]);

	//Leaves
	Route::Get('/leave/create',[
		'uses' => 'LeaveController@create',
		'as' => 'leaves'
	]);

	Route::Post('/leave/store',[
		'uses' => 'LeaveController@store',
		'as' => 'leaves.store'
	]);

	Route::Get('/leaves',[
		'uses' => 'LeaveController@index',
		'as' => 'leave.index'
	]);

	Route::Get('/employee_leaves',[
		'uses' => 'LeaveController@employeeleaves',
		'as' => 'employeeleaves'
	]);

    Route::Get('/leave/edit/{id}',[
		'uses' => 'LeaveController@edit',
		'as' => 'leave.edit'
	]);

	Route::Get('/leave/show/{id}',[
		'uses' => 'LeaveController@show',
		'as' => 'leave.show'
	]);

	Route::Post('/leave/update/{id}',[
		'uses' => 'LeaveController@update',
		'as' => 'leave.update'
	]);

	Route::Get('/leave/updateStatus/{id}/{status}',[
		'uses' => 'LeaveController@updateStatus',
		'as' => 'leave.updateStatus'
	]);

	Route::Post('/leave/delete/{id}',[
		'uses' => 'LeaveController@destroy',
		'as' => 'leave.destroy'
	]);

	//upload Docs
	Route::get('/documents/index',[
		'as' => 'documents',
		'uses' => 'DocumentsController@index'
	]);

	Route::get('/documents/create',[
		'as' => 'documents.create',
		'uses' => 'DocumentsController@createDocs'
	]);

	Route::post('/documents/upload',[
		'as' => 'documents.upload',
		'uses' => 'DocumentsController@uploadDocs'
	]);

	Route::post('/documents/delete/{id}',[
		'as' => 'documents.delete',
		'uses' => 'DocumentsController@deleteDocument'
	]);

	Route::get('/documents/edit/{id}',[
		'as' => 'documents.edit',
		'uses' => 'DocumentsController@editDocument'
	]);

	Route::post('/documents/update/{id}',[
		'as' => 'documents.update',
		'uses' => 'DocumentsController@update'
	]);
});

Route::Get('/applicant/apply',[
	'uses' => 'ApplicantController@create',
	'as' => 'applicant.apply'
]);

Route::Post('/applicant/store',[
	'uses' => 'ApplicantController@store',
	'as' => 'applicant.store'
]);

Route::get('/findjob','ApplicantController@findjob');

//Route::get('sendmail', 'SendMailController@sendMail');

//Route::get('/ajax-job',function(){
//		$cat_id = Input::get('cat_id');
//	$jobs = Jobs::where('job_position_id', '=',$cat_id)->get();
//	return Response::json($jobs);
// });
	
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $applicant = Applicant::where('city','LIKE','%'.$q.'%')->get();
    if(count($applicant) > 0)
        return view('searchview')->withDetails($applicant)->withQuery ( $q );
    else return view ('searchview')->withMessage('No Details found. Try to search again !');
});
// Route::get('welcome-mail','@welcomeMail');