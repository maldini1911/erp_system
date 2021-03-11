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
//Auth::routes();
Route::pattern('id', '[0-9]+');
Route::get('/', 'Admin\AuthAdmin@login');
Route::post('login', 'Admin\AuthAdmin@login_post');
Route::get('programming/projects/preview/{id}', 'Admin\Programming\ProjectProgrammingController@preview_project');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function()
{
    Route::get('dashboard', 'DashboradController@index');
    Route::get('dashboard/chart/sales/cateogry', 'DashboradController@chart_project_category');
    Route::get('dashboard/chart/sales/packege', 'DashboradController@chart_project_package');
    Route::get('logout', 'AuthAdmin@logout');

    //====> Start Route Admins
    Route::resource('admins', 'Admins\AdminController');
    Route::get('admins/profile/{id}', 'Admins\AdminController@profile');
    Route::put('admins/profile/edit/{id}', 'Admins\AdminController@edit_profile');
    Route::post('admins/attachments/admin', 'Admins\AdminController@attchments');
    Route::get('admins/attachments/show/{id}', 'Admins\AdminController@attchments_show');
    Route::put('admins/attachments/edit/{id}', 'Admins\AdminController@attchment_edit');
    Route::any('admins/attachments/delete/{id}', 'Admins\AdminController@attchment_delete');
    Route::any('admins/delete/{id}', 'Admins\AdminController@destroy');

    //===> ||Start Bounse & Discount||
    Route::get('admins/bounses/discounts/all/{id}', 'Admins\BounseDiscountController@index');
    Route::get('admins/bounses/discounts/{id}', 'Admins\BounseDiscountController@show');
    Route::get('admins/bounses/create/{id}', 'Admins\BounseDiscountController@create_bounse');
    Route::get('admins/discount/create/{id}', 'Admins\BounseDiscountController@create_discount');
    Route::post('admins/bounses/store', 'Admins\BounseDiscountController@store_bounse');
    Route::post('admins/discounts/store', 'Admins\BounseDiscountController@store_discount');
    Route::get('admins/bounses/edit/{id}', 'Admins\BounseDiscountController@edit_bounse');
    Route::post('admins/bounses/update/{id}', 'Admins\BounseDiscountController@update_bounse');
    Route::get('admins/discount/edit/{id}', 'Admins\BounseDiscountController@edit_discount');
    Route::post('admins/discount/update/{id}', 'Admins\BounseDiscountController@update_discount');
    Route::any('admins/bounses/discount/delete/{id}', 'Admins\BounseDiscountController@delete');
    //===> End Bounse & Discount

    //===> || Start Commissions & Target
    Route::get('commissions', 'Admins\CommissionsTargetController@commissions');
    Route::get('target', 'Admins\CommissionsTargetController@targets');
    //====> End Route Admins

    //====> Start Route Telesales
    //==( Route Clients )
    Route::resource('clients','Telesales\ClientsController');
    Route::any('clients/delete/{id}','Telesales\ClientsController@delete');
    Route::any('clients/notes/delete/{id}','Telesales\ClientsController@delete_notes');
    Route::get('notifcations/clients/all','Telesales\ClientsController@notifications');
    Route::any('notifcations/clients/delete/{client}','Telesales\ClientsController@delete_notifications');
    Route::get('filter/clients/sales/{search}', 'Telesales\ClientsController@show_clients');
    Route::get('marketers/client', 'Telesales\ClientsController@clients_marketers');
    //===
    Route::get('notifications/telesales/data/all','Telesales\ClientsController@notifications_telesales_data');
    Route::any('notifcations/telesales/data/delete/{client}','Telesales\ClientsController@delete_notifications_telesales_data');

    //==( Route Projects )
    Route::resource('projects','Telesales\ProjectsController');
    Route::patch('projects/{project}/finish','Telesales\ProjectsController@finish')->name('finish_project');
    Route::any('projects/delete/{id}','Telesales\ProjectsController@delete');
    //==( Route Settings Telesales )
    Route::get('settings','Telesales\SettingsController@index')->name('settings');
    Route::patch('settings','Telesales\SettingsController@update')->name('settings_update');
    //====> End Route Telesales


    //==( Route Digital Marketing )
    //=====
    Route::resource('facebook/coustmer/campaign','Marketing\FacebookCoustmerCampaignController');
    Route::any('facebook/coustmer/campaign/delete/{id}','Marketing\FacebookCoustmerCampaignController@delete');
    //====
    Route::resource('facebook/our/campaign','Marketing\FacebookOurCampaignController');
    Route::any('facebook/our/campaign/delete/{id}','Marketing\FacebookOurCampaignController@delete');
    //=====
    Route::resource('google/coustmer/campaign','Marketing\GoogleCoustmerCampaignController');
    Route::any('google/coustmer/campaign/delete/{id}','Marketing\GoogleCoustmerCampaignController@delete');
    //====
    Route::resource('google/our/campaign','Marketing\GoogleOurCampaignController');
    Route::any('google/our/campaign/delete/{id}','Marketing\GoogleOurCampaignController@delete');
    //====
    Route::resource('telesales/data','Marketing\TelesalesDataController');
    Route::post('telesales/excel','Marketing\ImportExcelController@importTelesalesData');
    //====
    Route::resource('marketing/order/requests','Marketing\OrderRequestsMarketingController');
    //===
    Route::get('filter/clients/marketing/{search}', 'Marketing\OrderRequestsMarketingController@filter_clients');
    //===
    Route::any('campaign/telesales/delete/{id}', 'Marketing\TelesalesDataController@delete');
    //====> || End Digital Marketing ||

    //====> Start Programming
    Route::resource('programming/clients','Programming\ClientProgrammingController');
    Route::resource('programming/projects','Programming\ProjectProgrammingController');
    Route::any('programming/projects/delete/{id}','Programming\ProjectProgrammingController@delete');
    Route::get("filter/clients/programming/{search}", 'Programming\ClientProgrammingController@filter_clients');

    //=====>
    Route::get('programming/tasks','Programming\TasksController@index');
    Route::get('programming/tasks/{project}/{user}','Programming\TasksController@show');
    Route::get('programming/tasks/create/{project}/{user}','Programming\TasksController@create');
    Route::post('programming/tasks/store','Programming\TasksController@store');
    Route::any('complate/task/programmer/{id}', 'Programming\TasksController@complate_task_programmer');
    Route::any('complate/task/teaster/{id}', 'Programming\TasksController@complate_task_teaster');
    Route::get('projects/tasks/edit/{id}','Programming\TasksController@edit');
    Route::put('projects/tasks/update/{id}','Programming\TasksController@update');
    Route::any('projects/tasks/delete/{id}','Programming\TasksController@delete');
    //=====>
    Route::get('projects/programmers/{id}', 'Programming\ProjectsProgrammersController@index');
    Route::get('projects/programmers/create/{id}', 'Programming\ProjectsProgrammersController@create');
    Route::post('projects/programmers/store', 'Programming\ProjectsProgrammersController@store');
    Route::get('projects/programmers/edit/{id}', 'Programming\ProjectsProgrammersController@edit');
    Route::put('projects/programmers/update/{id}', 'Programming\ProjectsProgrammersController@update');
    Route::any('projects/programmers/delete/{id}', 'Programming\ProjectsProgrammersController@delete');
    Route::get('projects/programmers/preview/{id}', 'Programming\ProjectsProgrammersController@preview_project');
    //====> End Programming

    //====||  Route HR ||
    Route::resource('manage/clients','Hr\ManageClientController');
    Route::get('manage/clients/create/{id}','Hr\ManageClientController@create');
    Route::any('manage/clients/delete/{id}','Hr\ManageClientController@delete');
    Route::get('filter/users/{search}', 'Hr\ManageClientController@show_users_marketing');
    //====
    Route::resource('requests/marketing', 'Hr\RequestsMarketingController');
    Route::any('requests/marketing/delete/{id}', 'Hr\RequestsMarketingController@delete');
    Route::resource('requests/programming', 'Hr\RequestsProgrammingController');
    Route::any('requests/programming/delete/{id}', 'Hr\RequestsProgrammingController@delete');

    //===|| Notes ||
    Route::any('notes/delete/{id}', 'NotesOrederRequests@delete');
});



