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
    return redirect('home');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reset_password', 'Admin\DashboardController@reset_password')->name('reset_password');
Route::post('/passwordsubmit', 'Admin\DashboardController@resetpasswordsubmit')->name('passwordsubmit');


Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {
	Route::get('/', function(){
    	return redirect('admin/pages');
  	})->middleware(['role:admin|editor|deptadmin']);
  	Route::get('/dashboard', 'Admin\DashboardController@index')->middleware(['role:admin|editor|deptadmin'])->name('dashboard');

    //Change Password
    Route::get('/changepassword', 'Admin\DashboardController@changepassword')->middleware(['role:admin|editor|deptadmin'])->name('changepassword');
    Route::post('/changepassword/store', 'Admin\DashboardController@resetpassword')->middleware(['role:admin|editor|deptadmin'])->name('resetpassword');

    //Reset Password
    

  	//Pages
  	Route::get('/pages', 'Admin\PagesController@index')->middleware(['role:admin|editor|deptadmin'])->name('pages');

  	Route::get('/addpages', 'Admin\PagesController@addpages')->middleware(['role:admin|editor|deptadmin'])->name('pages.addpages');

    Route::post('/pages/store', 'Admin\PagesController@storepages')->middleware(['role:admin|editor|deptadmin'])->name('pages.storepages');

    Route::get('/pages/edit/{id}', 'Admin\PagesController@editpages')->middleware(['role:admin|editor|deptadmin'])->name('pages.editpages');

    Route::patch('/pages/update/{id}', 'Admin\PagesController@updatepages')->middleware(['role:admin|editor|deptadmin'])->name('pages.update');

    Route::get('/pages/delete/{id}', 'Admin\PagesController@deletepages')->middleware(['role:admin|editor|deptadmin'])->name('pages.delete');

    Route::get('/pages/array/', 'Admin\PagesController@Arraypages')->middleware(['role:admin|editor|deptadmin'])->name('pages.array');

    Route::get('/pages/status/{id}/{status}', 'Admin\PagesController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('pages.changestatus');

    // Users
    Route::get('/users', 'Admin\UserController@index')->middleware(['role:admin|editor|deptadmin'])->name('users');
    Route::get('/users/add', 'Admin\UserController@adduser')->middleware(['role:admin|editor|deptadmin'])->name('users.addusers');
    Route::post('/users/store', 'Admin\UserController@storeuser')->middleware(['role:admin|editor|deptadmin'])->name('users.storeusers');
    Route::get('/users/edit/{id}', 'Admin\UserController@edituser')->middleware(['role:admin|editor|deptadmin'])->name('users.editusers');
    Route::patch('/users/update/{id}', 'Admin\UserController@updateuser')->middleware(['role:admin|editor|deptadmin'])->name('users.update');
    Route::get('/users/delete/{id}', 'Admin\UserController@deleteuser')->middleware(['role:admin|editor|deptadmin'])->name('users.delete');
    Route::get('/users/array/', 'Admin\UserController@arrayUsers')->middleware(['role:admin|editor|deptadmin'])->name('users.array');

    // Roles
    Route::get('/roles', 'Admin\RoleController@index')->middleware(['role:admin|editor|deptadmin'])->name('roles');
    Route::get('/roles/add', 'Admin\RoleController@addroles')->middleware(['role:admin|editor|deptadmin'])->name('roles.addroles');
    Route::post('/roles/store', 'Admin\RoleController@storeroles')->middleware(['role:admin|editor|deptadmin'])->name('roles.storeroles');
    Route::get('/roles/edit/{id}', 'Admin\RoleController@editroles')->middleware(['role:admin|editor|deptadmin'])->name('roles.editroles');
    Route::patch('/roles/update/{id}', 'Admin\RoleController@updateroles')->middleware(['role:admin|editor|deptadmin'])->name('roles.update');
    Route::get('/roles/delete/{id}', 'Admin\RoleController@deleteroles')->middleware(['role:admin|editor|deptadmin'])->name('roles.delete');
    Route::get('/roles/array/', 'Admin\RoleController@arrayRoles')->middleware(['role:admin|editor|deptadmin'])->name('roles.array');

    // Permissions
    Route::get('/permissions', 'Admin\PermissionController@index')->middleware(['role:admin|editor|deptadmin'])->name('permissions');
    Route::get('/permissions/add', 'Admin\PermissionController@addpermission')->middleware(['role:admin|editor|deptadmin'])->name('permissions.addpermissions');
    Route::post('/permissions/store', 'Admin\PermissionController@storepermission')->middleware(['role:admin|editor|deptadmin'])->name('permissions.storepermissions');
    Route::get('/permissions/edit/{id}', 'Admin\PermissionController@editpermission')->middleware(['role:admin|editor|deptadmin'])->name('permissions.editpermissions');
    Route::patch('/permissions/update/{id}', 'Admin\PermissionController@updatepermission')->middleware(['role:admin|editor|deptadmin'])->name('permissions.update');
    Route::get('/permissions/delete/{id}', 'Admin\PermissionController@deletepermission')->middleware(['role:admin|editor|deptadmin'])->name('permissions.delete');
    Route::get('/permissions/array/', 'Admin\PermissionController@arrayPermission')->middleware(['role:admin|editor|deptadmin'])->name('permissions.array');

  	// Menus
  	Route::get('/menu', 'Admin\MenuController@index')->middleware(['role:admin|editor|deptadmin'])->name('menu');
  	Route::get('/menu/add', 'Admin\MenuController@addmenu')->middleware(['role:admin|editor|deptadmin'])->name('menu.addmenu');
  	Route::post('/menu/store', 'Admin\MenuController@storemenu')->middleware(['role:admin|editor|deptadmin'])->name('menu.storemenu');
  	Route::get('/menu/edit/{id}', 'Admin\MenuController@editmenu')->middleware(['role:admin|editor|deptadmin'])->name('menu.editmenu');
  	Route::patch('/menu/update/{id}', 'Admin\MenuController@updatemenu')->middleware(['role:admin|editor|deptadmin'])->name('menu.update');
  	Route::get('/menu/delete/{id}', 'Admin\MenuController@deletemenu')->middleware(['role:admin|editor|deptadmin'])->name('menu.delete');
  	Route::get('/menu/array/', 'Admin\MenuController@arrayMenu')->middleware(['role:admin|editor|deptadmin'])->name('menu.array');

    //Slider
    Route::get('/slider', 'Admin\SliderController@index')->middleware(['role:admin|editor|deptadmin'])->name('slider');
    Route::get('/slider/add', 'Admin\SliderController@addslider')->middleware(['role:admin|editor|deptadmin'])->name('slider.addslider');
    Route::post('/slider/store', 'Admin\SliderController@storeslider')->middleware(['role:admin|editor|deptadmin'])->name('slider.storeslider');
    Route::get('/slider/edit/{id}', 'Admin\SliderController@editslider')->middleware(['role:admin|editor|deptadmin'])->name('slider.editslider');
    Route::patch('/slider/update/{id}', 'Admin\SliderController@updateslider')->middleware(['role:admin|editor|deptadmin'])->name('slider.update');
    Route::get('/slider/delete/{id}', 'Admin\SliderController@deleteslider')->middleware(['role:admin|editor|deptadmin'])->name('slider.delete');
    Route::get('/slider/array/', 'Admin\SliderController@arraySlider')->middleware(['role:admin|editor|deptadmin'])->name('slider.array');
    Route::get('/slider/status/{id}/{status}', 'Admin\SliderController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('slider.changestatus');

    //Gallery
    Route::get('/gallery', 'Admin\GalleryController@index')->middleware(['role:admin|editor|deptadmin'])->name('gallery');
    Route::get('/gallery/add', 'Admin\GalleryController@addslider')->middleware(['role:admin|editor|deptadmin'])->name('gallery.addgallery');
    Route::post('/gallery/store', 'Admin\GalleryController@storeslider')->middleware(['role:admin|editor|deptadmin'])->name('gallery.storegallery');
    Route::get('/gallery/edit/{id}', 'Admin\GalleryController@editslider')->middleware(['role:admin|editor|deptadmin'])->name('gallery.editgallery');
    Route::patch('/gallery/update/{id}', 'Admin\GalleryController@updateslider')->middleware(['role:admin|editor|deptadmin'])->name('gallery.update');
    Route::get('/gallery/delete/{id}', 'Admin\GalleryController@deleteslider')->middleware(['role:admin|editor|deptadmin'])->name('gallery.delete');
    Route::get('/gallery/array/', 'Admin\GalleryController@arraySlider')->middleware(['role:admin|editor|deptadmin'])->name('gallery.array');
    Route::get('/gallery/status/{id}/{status}', 'Admin\GalleryController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('gallery.changestatus');

    //PartnersLogo
    Route::get('/partners', 'Admin\PartnersController@index')->middleware(['role:admin|editor|deptadmin'])->name('partners');
    Route::get('/partners/add', 'Admin\PartnersController@addpartners')->middleware(['role:admin|editor|deptadmin'])->name('partners.addpartners');
    Route::post('/partners/store', 'Admin\PartnersController@storepartners')->middleware(['role:admin|editor|deptadmin'])->name('partners.storepartners');
    Route::get('/partners/edit/{id}', 'Admin\PartnersController@editpartners')->middleware(['role:admin|editor|deptadmin'])->name('partners.editpartners');
    Route::patch('/partners/update/{id}', 'Admin\PartnersController@updatepartners')->middleware(['role:admin|editor|deptadmin'])->name('partners.update');
    Route::get('/partners/delete/{id}', 'Admin\PartnersController@deletepartners')->middleware(['role:admin|editor|deptadmin'])->name('partners.delete');
    Route::get('/partners/array/', 'Admin\PartnersController@arrayPartners')->middleware(['role:admin|editor|deptadmin'])->name('partners.array');
    Route::get('/partners/status/{id}/{status}', 'Admin\PartnersController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('partners.changestatus');

    //Profile
    Route::get('/profile', 'Admin\ProfileController@index')->name('profile');
    Route::get('/profile/add', 'Admin\ProfileController@addprofile')->name('profile.addprofile');
    Route::post('/profile/store', 'Admin\ProfileController@storeprofile')->name('profile.storeprofile');
    Route::get('/profile/edit/{id}', 'Admin\ProfileController@editprofile')->name('profile.editprofile');
    Route::patch('/profile/update/{id}', 'Admin\ProfileController@updateprofile')->name('profile.update');
    Route::get('/profile/delete/{id}', 'Admin\ProfileController@deleteprofile')->name('profile.delete');
    Route::get('/profile/array/', 'Admin\ProfileController@arrayProfile')->name('profile.array');
    Route::get('/profile/status/{id}/{status}', 'Admin\ProfileController@changestatus')->name('profile.changestatus');

    //Header
    Route::get('/header', 'Admin\DetailsController@index')->name('header');
    Route::get('/header/add', 'Admin\DetailsController@addheader')->name('header.addheader');
    Route::post('/header/store', 'Admin\DetailsController@storeheader')->name('header.storeheader');
    Route::get('/header/edit/{id}', 'Admin\DetailsController@editheader')->name('header.editheader');
    Route::patch('/header/update/{id}', 'Admin\DetailsController@updateheader')->name('header.update');
    Route::get('/header/delete/{id}', 'Admin\DetailsController@deleteheader')->name('header.delete');
    Route::get('/header/array/', 'Admin\DetailsController@arrayHeader')->name('header.array');
    Route::get('/header/status/{id}/{status}', 'Admin\DetailsController@changestatus')->name('header.changestatus');

  	// Sub-Menu
  	Route::get('/submenu', 'Admin\SubMenuController@index')->middleware(['role:admin|editor|deptadmin'])->name('submenu');
  	Route::get('/addsubmenu', 'Admin\SubMenuController@addsubmenu')->middleware(['role:admin|editor|deptadmin'])->middleware(['role:admin|editor|deptadmin'])->name('submenu.addsubmenu');
  	Route::post('/submenu/store', 'Admin\SubMenuController@storesubmenu')->middleware(['role:admin|editor|deptadmin'])->name('submenu.storemenu');
  	Route::get('/submenu/edit/{id}', 'Admin\SubMenuController@editsubmenu')->middleware(['role:admin|editor|deptadmin'])->name('submenu.editmenu');
  	Route::patch('/submenu/update/{id}', 'Admin\SubMenuController@updatesubmenu')->middleware(['role:admin|editor|deptadmin'])->name('submenu.update');
  	Route::get('/submenu/delete/{id}', 'Admin\SubMenuController@deletesubmenu')->middleware(['role:admin|editor|deptadmin'])->name('submenu.delete');
  	Route::get('/submenu/array/', 'Admin\SubMenuController@arraysubmenu')->middleware(['role:admin|editor|deptadmin'])->name('submenu.array');
    Route::get('/submenu/byPage/{page_id}', 'Admin\SubMenuController@menuByPage')->middleware(['role:admin|editor|deptadmin'])->name('submenu.bypage');

  	// News
  	Route::get('/news', 'Admin\NewsController@index')->middleware(['role:admin|editor|deptadmin'])->name('news');
  	Route::get('/news/add', 'Admin\NewsController@addnews')->middleware(['role:admin|editor|deptadmin'])->name('news.addnews');
  	Route::post('/news/store', 'Admin\NewsController@storenews')->middleware(['role:admin|editor|deptadmin'])->name('news.storenews');
  	Route::get('/news/edit/{id}', 'Admin\NewsController@editnews')->middleware(['role:admin|editor|deptadmin'])->name('news.editnews');
  	Route::patch('/news/update/{id}', 'Admin\NewsController@updatenews')->middleware(['role:admin|editor|deptadmin'])->name('news.update');
  	Route::get('/news/delete/{id}', 'Admin\NewsController@deletenews')->middleware(['role:admin|editor|deptadmin'])->name('news.delete');
  	Route::get('/news/array/', 'Admin\NewsController@arrayNews')->middleware(['role:admin|editor|deptadmin'])->name('news.array');
  	Route::get('/news/status/{id}/{status}', 'Admin\NewsController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('news.changestatus');

  	// Events
  	Route::get('/events', 'Admin\EventsController@index')->name('events');
  	Route::get('/events/add', 'Admin\EventsController@addevent')->name('events.addevents');
  	Route::post('/events/store', 'Admin\EventsController@storeevent')->name('events.storeevents');
  	Route::get('/events/edit/{id}', 'Admin\EventsController@editevent')->name('events.editevents');
  	Route::patch('/events/update/{id}', 'Admin\EventsController@updateevent')->name('events.update');
  	Route::get('/events/delete/{id}', 'Admin\EventsController@deleteevent')->name('events.delete');
  	Route::get('/events/array/', 'Admin\EventsController@arrayevent')->name('events.array');
  	Route::get('/events/status/{id}/{status}', 'Admin\EventsController@changestatus')->name('events.changestatus');

  	// Settings
  	Route::get('/setting', 'Admin\SettingsController@index')->middleware(['role:admin|editor|deptadmin'])->name('setting');
  	Route::get('/setting/add', 'Admin\SettingsController@addsetting')->middleware(['role:admin|editor|deptadmin'])->name('setting.addsetting');
  	Route::post('/setting/store', 'Admin\SettingsController@storesetting')->middleware(['role:admin|editor|deptadmin'])->name('setting.storesetting');
  	Route::get('/setting/edit/{id}', 'Admin\SettingsController@editsetting')->middleware(['role:admin|editor|deptadmin'])->name('setting.editsetting');
  	Route::patch('/setting/update/{id}', 'Admin\SettingsController@updatesetting')->middleware(['role:admin|editor|deptadmin'])->name('setting.update');
  	Route::get('/setting/delete/{id}', 'Admin\SettingsController@deletesetting')->middleware(['role:admin|editor|deptadmin'])->name('setting.delete');
  	Route::get('/setting/array/', 'Admin\SettingsController@arraysetting')->middleware(['role:admin|editor|deptadmin'])->name('setting.array');

    // Contacts
    Route::get('/contacts', 'Admin\ContactController@index')->middleware(['role:admin|editor|deptadmin'])->name('contacts');
    Route::get('/contacts/array/', 'Admin\ContactController@Arraycontacts')->middleware(['role:admin|editor|deptadmin'])->name('contacts.array');

    // Whatsnew
    Route::get('/whatsnew', 'Admin\ContactController@whatsnewindex')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew');
    Route::get('/whatsnew/add', 'Admin\ContactController@addwhatsnew')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew.addwhatsnew');
    Route::post('/whatsnew/store', 'Admin\ContactController@storewhatsnew')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew.storewhatsnew');
    Route::get('/whatsnew/edit/{id}', 'Admin\ContactController@editwhatsnew')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew.editwhatsnew');
    Route::patch('/whatsnew/update/{id}', 'Admin\ContactController@update')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew.update');
    Route::get('/whatsnew/delete/{id}', 'Admin\ContactController@delete')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew.delete');
    Route::get('/whatsnew/array/', 'Admin\ContactController@arraywhatsnew')->middleware(['role:admin|editor|deptadmin'])->name('whatsnew.array');
    Route::get('/whatsnew/status/{id}/{status}', 'Admin\ContactController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('events.changestatus');

    // File
    Route::get('/files', 'Admin\FilesController@index')->middleware(['role:admin|editor|deptadmin'])->name('files');
    Route::get('/files/add', 'Admin\FilesController@addfiles')->middleware(['role:admin|editor|deptadmin'])->name('files.addfiles');
    Route::post('/files/store', 'Admin\FilesController@storefiles')->middleware(['role:admin|editor|deptadmin'])->name('files.storefiles');
    Route::get('/files/edit/{id}', 'Admin\FilesController@editfiles')->middleware(['role:admin|editor|deptadmin'])->name('files.editfiles');
    Route::patch('/files/update/{id}', 'Admin\FilesController@update')->middleware(['role:admin|editor|deptadmin'])->name('files.update');
    Route::get('/files/delete/{id}', 'Admin\FilesController@delete')->middleware(['role:admin|editor|deptadmin'])->name('files.delete');
    Route::get('/files/array/', 'Admin\FilesController@arrayfiles')->middleware(['role:admin|editor|deptadmin'])->name('files.array');
    Route::get('/files/status/{id}/{status}', 'Admin\FilesController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('files.changestatus');

    // Logs
    Route::get('/logs', 'Admin\DashboardController@log_index')->middleware(['role:admin|editor|deptadmin'])->name('logs');
    Route::get('/logs/array/', 'Admin\DashboardController@log_array')->middleware(['role:admin|editor|deptadmin'])->name('logs.array');

    //Category
    Route::get('/category', 'Admin\CategoryController@index')->middleware(['role:admin|editor|deptadmin'])->name('category');
    Route::get('/category/add', 'Admin\CategoryController@addCategory')->middleware(['role:admin|editor|deptadmin'])->name('category.addcategory');
    Route::post('/category/store', 'Admin\CategoryController@storeCategory')->middleware(['role:admin|editor|deptadmin'])->name('category.storecategory');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@editCategory')->middleware(['role:admin|editor|deptadmin'])->name('category.editcategory');
    Route::patch('/category/update/{id}', 'Admin\CategoryController@updateCategory')->middleware(['role:admin|editor|deptadmin'])->name('category.update');
    Route::get('/category/delete/{id}', 'Admin\CategoryController@deleteCategory')->middleware(['role:admin|editor|deptadmin'])->name('category.delete');
    Route::get('/category/array/', 'Admin\CategoryController@arrayCategory')->middleware(['role:admin|editor|deptadmin'])->name('category.array');
    Route::get('/category/status/{id}/{status}', 'Admin\CategoryController@changestatus')->middleware(['role:admin|editor|deptadmin'])->name('category.changestatus');
  	
});
Route::get('/screenreader','Front\HomeController@screenreader')->name('screenreader');

Route::get('/{page_name}','Front\HomeController@homeindex')->name('homeindex');

Route::post('/my-form','Front\HomeController@myformPost')->name('contactform');
Route::get('refreshcaptcha', 'Front\HomeController@refreshCaptcha');
Route::get('/logout', function () {
	if (Auth::check())
        {
             return redirect('admin/dashboard');
        } 
        else
        { 
          return view('auth.login');
        }
    
})->name('index');

// Route::get('home/tamil','Front\HomeController@tamil')->name('language');

// Route::get('home/english','Front\HomeController@english')->name('language');
Route::get('/gallery/details','Front\HomeController@categorywisegallery')->name('gallerydetail');
Route::get('/category/images/{id}','Front\HomeController@images')->name('gallerydetail');
Route::get('/user/lang','Front\HomeController@session')->name('lang');
Route::get('/user/color','Front\HomeController@color_session')->name('color');
