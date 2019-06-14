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

Route::get('/lang/{locale}', ['as' => 'site.lang', 'uses' => 'LangController@postIndex']);
Route::get('/chartdata', function(){
    return ['value' => rand(50,100)];
})->name('chartdata');
Route::get('/markAsRead', function(){
    Auth::guard('admins')->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'Auth\AuthController@getIndex');
    Route::get('/login', 'Auth\AuthController@getIndex');
    Route::post('/login', ['as' => 'site.login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('/logout', ['as' => 'site.logout', 'uses' => 'Auth\AuthController@logout']);

    Route::group(['middleware' => 'auth.site'], function () {
        // Route::get('/phone', ['as' => 'member.phone', 'uses' => 'Auth\AuthController@phone']);
        // Route::Post('/verify', ['as' => 'phone.verify', 'uses' => 'Auth\AuthController@verify']);
        Route::get('/error', ['as' => 'site.error', 'uses' => 'HomeController@error']);

        Route::get('/', ['as' => 'site.home', 'uses' => 'HomeController@getIndex']);
        Route::get('/profile', ['as' => 'site.profile', 'uses' => 'HomeController@profile']);
        Route::post('/profile', ['as' => 'site.profile.edit', 'uses' => 'HomeController@editProfile']);
        Route::post('/profileimg', ['as' => 'site.profile.image', 'uses' => 'HomeController@editProfileImage']);
        Route::get('/lock', ['as' => 'site.lock', 'uses' => 'HomeController@lock']);
        Route::post('/lock', ['as' => 'site.back', 'uses' => 'HomeController@back']);

        Route::get('/ajax-course', ['uses' => 'HomeController@getCourse']);
        Route::get('/ajax-student', ['uses' => 'HomeController@getStudent']);
        Route::get('/ajax-material', ['uses' => 'HomeController@getMaterial']);
        Route::get('/ajax-percent', ['uses' => 'HomeController@getPercent']);
        Route::post('/addGrade', ['as' => 'site.grades.add', 'uses' => 'HomeController@grades']);
        Route::get('/ajax-courses', ['uses' => 'HomeController@getCourses']);
        Route::get('/ajax-students', ['uses' => 'HomeController@getStudents']);
        Route::get('/ajax-materials', ['uses' => 'HomeController@getMaterials']);
        Route::get('/ajax-percents', ['uses' => 'HomeController@getPercents']);
        Route::get('/ajax-smaterial', ['uses' => 'HomeController@getSMaterial']);
        Route::get('/ajax-spercent', ['uses' => 'HomeController@getSPercent']);
        Route::get('/ajax-from', ['uses' => 'HomeController@getFrom']);
        Route::get('/ajax-to', ['uses' => 'HomeController@getTo']);
        Route::get('/ajax-student', ['uses' => 'HomeController@getStud']);
        Route::get('/ajax-group', ['uses' => 'HomeController@getGroups']);
        Route::post('/addAbsent', ['as' => 'site.absent.add', 'uses' => 'HomeController@absent']);
        Route::get('/ajax-dto', ['uses' => 'HomeController@dto']);
        Route::get('/ajax-dfrom', ['uses' => 'HomeController@dfrom']);
        Route::get('/ajax-dates', ['uses' => 'HomeController@dates']);
        Route::get('/ajax-studs', ['uses' => 'HomeController@studs']);
        Route::get('/ajax-pcourse', ['uses' => 'HomeController@getPayCourse']);
        Route::get('/ajax-pstudent', ['uses' => 'HomeController@getPayStudent']);
        Route::get('/ajax-materialprice', ['uses' => 'HomeController@getMaterialPrice']);
        Route::get('/ajax-date', ['uses' => 'HomeController@date']);
        Route::get('/ajax-process', ['uses' => 'HomeController@process']);
        Route::get('/ajax-month', ['uses' => 'HomeController@month']);
        Route::post('/pay', ['as' => 'site.payms.add', 'uses' => 'HomeController@payms']);
    });
    
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);
        Route::get('/store', ['as' => 'admin.store', 'uses' => 'ReportsController@store']);
        Route::get('/error', ['as' => 'site.error', 'uses' => 'HomeController@getIndex']);
        Route::get('/lock', ['as' => 'admin.lock', 'uses' => 'HomeController@lock']);
        Route::post('/lock', ['as' => 'admin.back', 'uses' => 'HomeController@back']);
        Route::post('/edit', ['as' => 'admin.org.edit', 'uses' => 'HomeController@postEdit']);
        Route::get('/data', ['as' => 'admin.data', 'uses' => 'DataController@getData']);
        Route::post('/add', ['as' => 'admin.doc.add', 'uses' => 'DataController@add']);
        Route::get('/delete/{id}', ['as' => 'admin.doc.delete', 'uses' => 'DataController@delete']);
        Route::get('/ajax-course', ['uses' => 'HomeController@getCourse']);
        Route::get('/ajax-student', ['uses' => 'HomeController@getStudent']);
        Route::get('/ajax-material', ['uses' => 'HomeController@getMaterial']);
        Route::get('/ajax-percent', ['uses' => 'HomeController@getPercent']);
        Route::post('/addGrade', ['as' => 'admin.grades.add', 'uses' => 'HomeController@grades']);
        Route::get('/ajax-courses', ['uses' => 'HomeController@getCourses']);
        Route::get('/ajax-students', ['uses' => 'HomeController@getStudents']);
        Route::get('/ajax-materials', ['uses' => 'HomeController@getMaterials']);
        Route::get('/ajax-percents', ['uses' => 'HomeController@getPercents']);
        Route::get('/ajax-smaterial', ['uses' => 'HomeController@getSMaterial']);
        Route::get('/ajax-spercent', ['uses' => 'HomeController@getSPercent']);
        Route::get('/ajax-from', ['uses' => 'HomeController@getFrom']);
        Route::get('/ajax-to', ['uses' => 'HomeController@getTo']);
        Route::get('/ajax-student', ['uses' => 'HomeController@getStud']);
        Route::get('/ajax-group', ['uses' => 'HomeController@getGroups']);
        Route::post('/addAbsent', ['as' => 'admin.absent.add', 'uses' => 'HomeController@absent']);
        Route::get('/ajax-dto', ['uses' => 'HomeController@dto']);
        Route::get('/ajax-dfrom', ['uses' => 'HomeController@dfrom']);
        Route::get('/ajax-dates', ['uses' => 'HomeController@dates']);
        Route::get('/ajax-studs', ['uses' => 'HomeController@studs']);
        Route::get('/ajax-pcourse', ['uses' => 'HomeController@getPayCourse']);
        Route::get('/ajax-pstudent', ['uses' => 'HomeController@getPayStudent']);
        Route::get('/ajax-materialprice', ['uses' => 'HomeController@getMaterialPrice']);
        Route::get('/ajax-date', ['uses' => 'HomeController@date']);
        Route::get('/ajax-process', ['uses' => 'HomeController@process']);
        Route::get('/ajax-month', ['uses' => 'HomeController@month']);
        Route::post('/pay', ['as' => 'admin.payms.add', 'uses' => 'HomeController@payms']);
        Route::get('/ajax-salary', ['uses' => 'TeachersController@getAjaxSalary']);
        Route::get('/ajax-days', ['uses' => 'TeachersController@getAjaxDays']);
        Route::get('/ajax-attendSalary', ['uses' => 'TeachersController@attendSalary']);
        Route::get('/ajax-timeSalary', ['uses' => 'TeachersController@timeSalary']);
        Route::get('/ajax-parts', ['uses' => 'TeachersController@getAjaxParts']);
        Route::post('/addSalary', ['as' => 'admin.salaries.add', 'uses' => 'TeachersController@insertSalary']);

        Route::group(['prefix' => 'org'], function () {
            Route::get('/', ['as' => 'admin.org', 'uses' => 'OrgController@getIndex']);
            Route::post('/add', ['as' => 'admin.org.edit', 'uses' => 'OrgController@postEdit']);
        });

        Route::group(['prefix' => 'centers'], function () {
            Route::get('/', ['as' => 'admin.centers', 'uses' => 'CentersController@getIndex']);
            Route::get('/add', ['as' => 'admin.centers.add', 'uses' => 'CentersController@getAdd']);
            Route::post('/add', ['as' => 'admin.centers.add', 'uses' => 'CentersController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.centers.edit', 'uses' => 'CentersController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.centers.edit', 'uses' => 'CentersController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.centers.delete', 'uses' => 'CentersController@delete']);
            //Route::get('/files', ['as' => 'admin.centers.files', 'uses' => 'CentersController@files']);
        });

        Route::group(['prefix' => 'guardians'], function () {
            Route::get('/', ['as' => 'admin.guardians', 'uses' => 'GuardiansController@getIndex']);
            Route::get('/add', ['as' => 'admin.guardians.add', 'uses' => 'GuardiansController@getAdd']);
            Route::post('/add', ['as' => 'admin.guardians.add', 'uses' => 'GuardiansController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.guardians.edit', 'uses' => 'GuardiansController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.guardians.edit', 'uses' => 'GuardiansController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.guardians.delete', 'uses' => 'GuardiansController@delete']);
        });

        Route::group(['prefix' => 'students'], function () {
            Route::get('/', ['as' => 'admin.students', 'uses' => 'StudentsController@getIndex']);
            Route::get('/count/{id}', ['as' => 'admin.students.count', 'uses' => 'StudentsController@count']);
            Route::get('/add', ['as' => 'admin.students.add', 'uses' => 'StudentsController@getAdd']);
            Route::post('/add', ['as' => 'admin.students.add', 'uses' => 'StudentsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.students.edit', 'uses' => 'StudentsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.students.edit', 'uses' => 'StudentsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.students.delete', 'uses' => 'StudentsController@delete']);
            Route::post('/addDoc', ['as' => 'admin.studentDoc.add', 'uses' => 'StudentsController@addDoc']);
            Route::get('/deleteDoc/{id}', ['as' => 'admin.studentDoc.delete', 'uses' => 'StudentsController@deleteDoc']);
            Route::post('/pay', ['as' => 'admin.students.pay', 'uses' => 'StudentsController@pay']);
            Route::get('/mdelete/{id}', ['as' => 'admin.smaterial.delete', 'uses' => 'StudentsController@mdelete']);
            Route::get('/cdelete/{id}', ['as' => 'admin.scourse.delete', 'uses' => 'StudentsController@cdelete']);
            Route::get('/absent', ['as' => 'admin.students.absent', 'uses' => 'StudentsController@getAbsent']);
            Route::get('/attend', ['as' => 'admin.students.attend', 'uses' => 'StudentsController@attend']);
            Route::get('/files', ['as' => 'admin.students.files', 'uses' => 'StudentsController@files']);
            Route::get('/payment', ['as' => 'admin.students.payment', 'uses' => 'StudentsController@payment']);
            Route::get('/report', ['as' => 'admin.students.report', 'uses' => 'StudentsController@report']);
        });

        Route::group(['prefix' => 'transportations'], function () {
            Route::get('/', ['as' => 'admin.transportations', 'uses' => 'TransportationsController@getIndex']);
            Route::get('/add', ['as' => 'admin.transportations.add', 'uses' => 'TransportationsController@getAdd']);
            Route::post('/add', ['as' => 'admin.transportations.add', 'uses' => 'TransportationsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.transportations.edit', 'uses' => 'TransportationsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.transportations.edit', 'uses' => 'TransportationsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.transportations.delete', 'uses' => 'TransportationsController@delete']);
        });

        Route::group(['prefix' => 'reports'], function () {
            Route::get('/absent', ['as' => 'admin.reports.absent', 'uses' => 'ReportsController@absent']);
            Route::get('/counts', ['as' => 'admin.reports.counts', 'uses' => 'ReportsController@counts']);
            Route::get('/grades', ['as' => 'admin.reports.grades', 'uses' => 'ReportsController@grades']);
            Route::get('/attend', ['as' => 'admin.reports.attend', 'uses' => 'ReportsController@attend']);
            Route::get('/salaries', ['as' => 'admin.reports.salaries', 'uses' => 'ReportsController@salariesReport']);
        });

        Route::group(['prefix' => 'teachers'], function () {
            Route::get('/', ['as' => 'admin.teachers', 'uses' => 'TeachersController@getIndex']);
            Route::get('/add', ['as' => 'admin.teachers.add', 'uses' => 'TeachersController@getAdd']);
            Route::post('/add', ['as' => 'admin.teachers.add', 'uses' => 'TeachersController@insert']);
            Route::get('/files', ['as' => 'admin.teachers.files', 'uses' => 'TeachersController@getFile']);
            Route::get('/edit/{id}', ['as' => 'admin.teachers.edit', 'uses' => 'TeachersController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.teachers.edit', 'uses' => 'TeachersController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.teachers.delete', 'uses' => 'TeachersController@delete']);
            Route::post('/addDoc', ['as' => 'admin.teacherDoc.add', 'uses' => 'TeachersController@addDoc']);
            Route::get('/deleteDoc/{id}', ['as' => 'admin.teacherDoc.delete', 'uses' => 'TeachersController@deleteDoc']);
            Route::get('/tdelete/{id}', ['as' => 'admin.tmaterial.delete', 'uses' => 'TeachersController@tdelete']);
            Route::get('/attend', ['as' => 'admin.teachers.attend', 'uses' => 'TeachersController@attend']);
            Route::get('/leave', ['as' => 'admin.teachers.leave', 'uses' => 'TeachersController@leave']);
            Route::post('/attend', ['as' => 'admin.teachers.attend', 'uses' => 'TeachersController@postattend']);
            Route::post('/leave', ['as' => 'admin.teachers.leave', 'uses' => 'TeachersController@postleave']);
            Route::get('/jobs', ['as' => 'admin.jobs', 'uses' => 'TeachersController@jobs']);
            Route::get('/jobAdd', ['as' => 'admin.jobs.add', 'uses' => 'TeachersController@getAddJob']);
            Route::post('/jobAdd', ['as' => 'admin.jobs.add', 'uses' => 'TeachersController@addJob']);
            Route::get('/jobEdit/{id}', ['as' => 'admin.jobs.edit', 'uses' => 'TeachersController@jobEdit']);
            Route::post('/jobEdit/{id}', ['as' => 'admin.jobs.edit', 'uses' => 'TeachersController@postJobEdit']);
            Route::get('/jobDelete/{id}', ['as' => 'admin.jobs.delete', 'uses' => 'TeachersController@jobDelete']);
            Route::get('/time/{id}', ['as' => 'admin.teachers.time', 'uses' => 'TeachersController@time']);
            Route::post('/addtime', ['as' => 'admin.teachers.addtime', 'uses' => 'TeachersController@insertTime']);
            Route::get('/salary', ['as' => 'admin.salary.add', 'uses' => 'TeachersController@getSalary']);
            Route::post('/part', ['as' => 'admin.part.add', 'uses' => 'TeachersController@insertPart']);
            Route::get('/salaries/{id}', ['as' => 'admin.teachers.salaries', 'uses' => 'TeachersController@salaries']);
            Route::get('/code/{id}', ['as' => 'admin.teachers.code', 'uses' => 'TeachersController@code']);
        });

        Route::group(['prefix' => 'materials'], function () {
            Route::get('/', ['as' => 'admin.materials', 'uses' => 'MaterialsController@getIndex']);
            Route::get('/add', ['as' => 'admin.materials.add', 'uses' => 'MaterialsController@getAdd']);
            Route::post('/add', ['as' => 'admin.materials.add', 'uses' => 'MaterialsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.materials.edit', 'uses' => 'MaterialsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.materials.edit', 'uses' => 'MaterialsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.materials.delete', 'uses' => 'MaterialsController@delete']);
            Route::post('/addDoc', ['as' => 'admin.materialDoc.add', 'uses' => 'MaterialsController@addDoc']);
            Route::get('/deleteDoc/{id}', ['as' => 'admin.materialDoc.delete', 'uses' => 'MaterialsController@deleteDoc']);
            Route::post('/addP', ['as' => 'admin.percent.add', 'uses' => 'MaterialsController@addPercent']);
            Route::get('/deleteP/{id}', ['as' => 'admin.percent.delete', 'uses' => 'MaterialsController@deletePercent']);
            Route::get('/cdelete/{id}', ['as' => 'admin.mcourse.delete', 'uses' => 'MaterialsController@cdelete']);
            Route::get('/tdelete/{id}', ['as' => 'admin.tcourse.delete', 'uses' => 'MaterialsController@tdelete']);
            Route::get('/files', ['as' => 'admin.materials.files', 'uses' => 'MaterialsController@files']);
            Route::get('/grades', ['as' => 'admin.materials.grades', 'uses' => 'MaterialsController@grades']);
        });

        Route::group(['prefix' => 'courses'], function () {
            Route::get('/', ['as' => 'admin.courses', 'uses' => 'CoursesController@getIndex']);
            Route::get('/add', ['as' => 'admin.courses.add', 'uses' => 'CoursesController@getAdd']);
            Route::post('/add', ['as' => 'admin.courses.add', 'uses' => 'CoursesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.courses.edit', 'uses' => 'CoursesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.courses.edit', 'uses' => 'CoursesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.courses.delete', 'uses' => 'CoursesController@delete']);
            Route::get('/mdelete/{id}', ['as' => 'admin.coursematerial.delete', 'uses' => 'CoursesController@mdelete']);
        });

        Route::group(['prefix' => 'levels'], function () {
            Route::get('/', ['as' => 'admin.levels', 'uses' => 'LevelsController@getIndex']);
            Route::get('/add', ['as' => 'admin.levels.add', 'uses' => 'LevelsController@getAdd']);
            Route::post('/add', ['as' => 'admin.levels.add', 'uses' => 'LevelsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.levels.edit', 'uses' => 'LevelsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.levels.edit', 'uses' => 'LevelsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.levels.delete', 'uses' => 'LevelsController@delete']);
        });


        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/index', ['as' => 'admin.subscribers', 'uses' => 'SubscribersController@getIndex']);
            Route::get('/send/{id}', ['as' => 'admin.subscriber.send', 'uses' => 'SubscribersController@getEmail']);
            Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'SubscribersController@sendEmail']);
            Route::get('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@getAll']);
            Route::post('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@sendAll']);
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'admin.users', 'uses' => 'UsersController@getIndex']);
            Route::get('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@getAdd']);
            Route::post('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@insertUser']);
            Route::get('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@getUser']);
            Route::post('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@updateUser']);
            Route::get('/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UsersController@deleteU']);
            Route::post('/active', ['as' => 'admin.user.active', 'uses' => 'UsersController@postActive']);
            Route::post('/disActive', ['as' => 'admin.user.disActive', 'uses' => 'UsersController@postDisActive']);
            Route::post('/block', ['as' => 'admin.user.block', 'uses' => 'UsersController@postBlock']);
        });
        Route::get('/message', ['as' => 'admin.message', 'uses' => 'MessageController@getIndex']);
        Route::get('/profile', ['as' => 'admin.profile', 'uses' => 'UsersController@profile']);
        Route::post('/profile', ['as' => 'admin.profile.edit', 'uses' => 'UsersController@editProfile']);
        Route::post('/profileimg', ['as' => 'admin.profile.image', 'uses' => 'UsersController@editProfileImage']);
        Route::post('/profilepass', ['as' => 'admin.profile.pass', 'uses' => 'UsersController@editProfilePass']);
        Route::get('/order', ['as' => 'admin.order', 'uses' => 'MessageController@order']);
        Route::post('/upload', ['as' => 'admin.upload.post', 'uses' => 'UploadController@getPost']);
        Route::post('/uploadIcon', ['as' => 'admin.upload.icon', 'uses' => 'UploadController@getPost2']);
        Route::post('/uploadImage', ['as' => 'admin.upload.image', 'uses' => 'UploadController@getPost3']);
        Route::post('/uploads', 'DataController@dropzoneStore')->name('admin.dropzoneStore');
        Route::post('/upload/images', ['as' => 'admin.upload.images', 'uses' => 'CatsController@getPostImages']);
    });
});