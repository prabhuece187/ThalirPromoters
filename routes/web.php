<?php
// ------------ admin controller ---------------
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\RoofController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PurposeController;
use App\Http\Controllers\Admin\KnowusController;
use App\Http\Controllers\Admin\NeedController;
use App\Http\Controllers\Admin\MediatorController;
use App\Http\Controllers\Admin\AboController;
use App\Http\Controllers\Admin\AspController;
use App\Http\Controllers\Admin\ProSiteController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoadController;
use App\Http\Controllers\Admin\OldBuyerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ReferController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\AboAssignController;
use App\Http\Controllers\Admin\MediatorAssignController;
use App\Http\Controllers\Admin\UserDataController;
use App\Http\Controllers\Admin\AspDataController;


// ------------ user controller---------------
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserPropertyController;
use App\Http\Controllers\user\UserRentController;
use App\Http\Controllers\user\UserPromoterController;
use App\Http\Controllers\user\BuyerController;


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

// ======================== USER ROUTES =========================
Route::get('views/{page}', function ($page) {
	    return view($page);
});

Route::view('/contact', 'user.contact');
Route::view('/about', 'user.about');
Route::view('/commission', 'user.commission');
Route::view('/help', 'user.help');
Route::view('/support', 'user.support');
Route::view('/adminuserlogin', 'user.adminlogin');

// ======================= ADMIN ROUTES ============================

Route::get('/admin-login', [LoginController::class, 'getLogin']);
Route::post('/admin-login', [LoginController::class, 'postLogin']);
Route::get('/register', [LoginController::class, 'getRegister']);
Route::post('/register', [LoginController::class, 'postRegister']);
Route::post('/mediatorregister', [LoginController::class, 'postMediatorRegister']);

Route::resource('role',  RoleController::class);
Route::get('/userregister', [LoginController::class, 'UserGetRegister']);

Route::post('/adminuserlogin', [UserController::class, 'postAdminUserLogin']);
Route::post('/clientdataregister', [UserController::class, 'ClientDataRegister']);
Route::get('/sign_out', [UserController::class, 'SignOut']);


// ========================= USER ROUTES =====================================

// ================== buyer ===============
Route::get('/', [UserController::class, 'index']);
Route::get('/index', [UserController::class, 'index']);

Route::post('/buyercomment', [BuyerController::class, 'BuyerComment']);
Route::get('/buyerrequest', [BuyerController::class, 'BuyerRequest']);
Route::post('/buyerrequest', [BuyerController::class, 'BuyerRequestSend']);
Route::get('buyersellproduct',[BuyerController::class,'BuyerSellPage']);
Route::get('buyerrentproduct',[BuyerController::class,'BuyerRentPage']);

// ================= property ===================

Route::get('propertydetail/{prodid}/{needid}',[UserPropertyController::class,'PropertyDetail']);
Route::get('/propertyproduct', [UserPropertyController::class, 'PropertyPage']);

// ================= promoter ===================

Route::get('promoterproductdetail/{prodid}',[UserPromoterController::class,'PromoterDetail']);
Route::get('/promoterproduct',[UserPromoterController::class,'PromoterPage']);
Route::get('promoterproductdetail/promotersingleflat/{id}',[UserPromoterController::class,'PromoterFlatNo']);


// ================= forget password ===================

Route::get('forgot_password', [ForgotPasswordController::class, 'getEmail']);
Route::post('forgot_password', [ForgotPasswordController::class, 'postEmail']);
Route::post('emaillink', [ForgotPasswordController::class, 'EmailLinkSend']);
Route::post('passwordupdate', [ForgotPasswordController::class, 'PasswordUpdate']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('Dashboard', [DashboardController::class, 'index']);
    Route::get('new-come-property', [DashboardController::class, 'NewComeProperty']);
    Route::get('new-come-userstatus', [DashboardController::class, 'NewUserStatus']);
    Route::get('new-prop-comments', [DashboardController::class, 'NewPropComments']);
	Route::get('new-prom-comments', [DashboardController::class, 'NewPromComments']);

    // --------------- role Data ---------------------

    Route::get('roleget',[RoleController::class,'RoleGet']);
    Route::get('rolevalueget',[RoleController::class,'RoleValueGet']);

    // --------------- user Data ---------------------

    Route::get('users_data',[UserDataController::class,'UserDataGet']);
    Route::put('users_data/{id}', [UserDataController::class, 'UserDataUpdate']);

    //---------------- client data -----------------------

    Route::get('clientdata',[DashboardController::class,'ClientDataGet']);
    Route::put('clientstatusupdate/{id}', [DashboardController::class, 'ClientStatusUpdate']);

    // --------------- promoter Data ---------------------

    Route::resource('sitemap', ProSiteController::class);
    Route::get('sitemapdetail/{id}', [ProSiteController::class, 'PromoterSiteDetail']);
    Route::put('sitestatus/{id}', [ProSiteController::class, 'PromoterSiteStatus']);
	Route::post('sitemapupdate/{id}', [ProSiteController::class, 'PromoterSiteUpdate']);

    Route::resource('promoter',  ProSiteController::class);
    Route::get('promoterget', [ProSiteController::class, 'PromoterSiteGet']);

   // --------------- promoter Data ---------------------

    Route::get('promoterimageget/{id}', [ProSiteController::class, 'PromoterImageGet']);
    Route::post('promoterimage', [ProSiteController::class, 'PromoterImageAdd']);
    Route::post('galleryimageupdate/{id}', [ProSiteController::class, 'PromoterImageUpdate']);

    Route::put('promoterstatusupdate/{id}', [ProSiteController::class, 'PromoterStatusUpdate']);

   // --------------- refer Data ---------------------
    Route::resource('refer', ReferController::class);
    Route::get('referimageget/{id}', [ReferController::class, 'ReferImageGet']);
    Route::post('referupdate/{id}', [ReferController::class, 'ReferUpdate']);
    Route::delete('referdelete/{id}', [ReferController::class, 'ReferDelete']);

    Route::put('referstatusupdate/{id}', [ReferController::class, 'ReferStatusUpdate']);

    // --------------- Asp Data Data ---------------------
    Route::resource('aspdata', AspDataController::class);
    Route::post('aspdataupdate/{id}', [AspDataController::class, 'AspDataUpdate']);
    Route::delete('aspdatadelete/{id}', [AspDataController::class, 'AspDataDelete']);

    Route::put('aspdatastatusupdate/{id}', [AspDataController::class, 'AspDataStatusUpdate']);

    // ---------- type,area,roof,floor,purpose,knowus,oldbuyer master ---------------

    Route::resource('type',  TypeController::class);
    Route::resource('area',  AreaController::class);
    Route::resource('roof',  roofController::class);
    Route::resource('floor',  FloorController::class);
    Route::resource('purpose',  PurposeController::class);
    Route::resource('knowus',  KnowusController::class);
    Route::resource('need',  NeedController::class);
    Route::resource('road',  RoadController::class);
    Route::resource('oldbuyer',  OldBuyerController::class);
    Route::resource('mediator',  MediatorController::class);
    Route::resource('abo',  AboController::class);
    Route::resource('asp',  AspController::class);

    // --------------- propertydocument Data ---------------------

    Route::get('propertydocumentget/{id}', [PropertyController::class, 'PropertyDocumentGet']);

    // --------------- property Data ---------------------

    Route::resource('property',  PropertyController::class);
    // Route::get('propertyimageget/{id}', [PropertyController::class, 'PropertyImageGet']);
    Route::get('propertyedit/{id}', [PropertyController::class, 'PropertyDataGet']);
    Route::post('propertyupdate/{id}', [PropertyController::class, 'PropertyUpdate']);
    Route::get('propertyget/{id}', [PropertyController::class, 'PropertyGet']);
    Route::get('propertyfollow/{id}', [PropertyController::class, 'PropertyFollowGet']);
    Route::get('propertysearch', [PropertyController::class, 'PropertySearch']);
    Route::get('propertygetdatas', [PropertyController::class, 'PropertyGetDatas']);

    // --------------- propertyimage Data ---------------------

    Route::get('sellerimage', [PropertyController::class, 'PropertyImageGet']);
    Route::post('sellerimage/{id}', [PropertyController::class, 'PropertyImageAdd']);
    Route::post('sellerimageupdate/{id}', [PropertyController::class, 'PropertyImageUpdate']);

    // --------------- propertyfollow Data ---------------------

    Route::get('propertyfollowget/{id}', [PropertyController::class, 'PropertyFollowValGet']);
    Route::post('propertyfollow', [PropertyController::class, 'PropertyFollowAdd']);
    Route::put('propertyfollowupdate/{id}', [PropertyController::class, 'PropertyFollowUpdate']);

    Route::get('propertypersonget/{id}', [PropertyController::class, 'PropertyPersonValGet']);
    Route::post('propertyperson', [PropertyController::class, 'PropertyPersonAdd']);
    Route::put('propertypersonupdate/{id}', [PropertyController::class, 'PropertyPersonUpdate']);

    Route::put('propertystatusupdate/{id}', [PropertyController::class, 'PropertyStatusUpdate']);
    Route::put('propertyuserstatusupdate/{id}', [PropertyController::class, 'PropertyUserStatusUpdate']);

    Route::get('property_follow_status',[DashboardController::class,'PropertyFollowStatusGet']);

    Route::put('pro_fol_sta_update/{id}', [DashboardController::class, 'PropertyFollowStatusUpdate']);



    // --------------- mediatorassign Data ---------------------

    Route::get('mediator_assign',[MediatorAssignController::class,'MediatorAssign']);
    Route::post('mediator_assign', [MediatorAssignController::class, 'MediatorAssignAdd']);
    Route::put('mediator_assignupdate/{id}', [MediatorAssignController::class, 'MediatorAssignUpdate']);

    Route::delete('mediator_assign_delete/{id}', [MediatorAssignController::class, 'MediatorAssignDelete']);

    // --------------- aboassign Data ---------------------

    Route::get('abo_assign',[AboAssignController::class,'AboAssign']);
    Route::post('abo_assign', [AboAssignController::class, 'AboAssignAdd']);
    Route::put('abo_assignupdate/{id}', [AboAssignController::class, 'AboAssignUpdate']);

    Route::delete('abo_assign_delete/{id}', [AboAssignController::class, 'AboAssignDelete']);

    Route::get('abo_assigned_values/{id}',[AboAssignController::class,'AboAssignedValuesGet']);


    // --------------- mediatorfollow Data ---------------------

    Route::get('mediator_follow/{mid}/{pid}',[MediatorAssignController::class,'MediatorFollowGet']);
    Route::post('mediator_follow', [MediatorAssignController::class, 'MediatorFollowAdd']);
    Route::get('mediator_follow_get/{mid}/{pid}',[MediatorAssignController::class,'MediatorFollowValGet']);
    Route::put('mediator_follow_update/{id}', [MediatorAssignController::class, 'MediatorFollowUpdate']);

    Route::get('mediator_buyer_get/{mid}/{pid}', [MediatorAssignController::class, 'MediatorBuyerValGet']);
    Route::post('mediator_buyer', [MediatorAssignController::class, 'MediatorBuyerAdd']);
    Route::put('mediator_buyer_update/{id}', [MediatorAssignController::class, 'MediatorBuyerUpdate']);

    Route::put('assign_status_update/{id}', [MediatorAssignController::class, 'AssignStatusUpdate']);

    Route::get('mediator_assign_per/{id}',[MediatorAssignController::class,'MediatorAssignPerson']);

    Route::get('mediator_follow_status',[DashboardController::class,'MediatorFollowStatusGet']);

    Route::put('med_fol_sta_update/{id}', [DashboardController::class, 'MediatorFollowStatusUpdate']);

    // --------------- rent Data ---------------------


    // --------------- rentfollow Data ---------------------


    // --------------- rentimage Data ---------------------


    // --------------- rentamenities Data ---------------------


    //-------------------buyer----------------------------------------
    Route::get('/buyercommentpropertyget/{proid}', [BuyerController::class, 'BuyerCommentGet']);
    Route::get('/buyercommentpromoterget/{id}', [BuyerController::class, 'BuyerCommentPromoterGet']);
    Route::get('/buyercommentrentget/{typeid}/{cateid}/{rentid}', [BuyerController::class, 'BuyerCommentRentGet']);

    Route::put('buyerstatusupdate/{id}', [BuyerController::class, 'BuyerStatusUpdate']);

    Route::get('sellerrequest', [BuyerController::class, 'BuyerSellerGet']);
    Route::put('sellerrequest/{id}', [BuyerController::class, 'BuyerSellerUpdate']);
    Route::post('sellerrequest', [BuyerController::class, 'BuyerSellerAdd']);

    Route::get('rentrequest', [BuyerController::class, 'BuyerRentGet']);
    Route::put('rentrequest/{id}', [BuyerController::class, 'BuyerRentUpdate']);
    Route::post('rentrequest', [BuyerController::class, 'BuyerRentAdd']);

   // -------------------- reports --------------------------
    Route::get('adminpropertylist', [ReportController::class, 'AdminProp']);
    Route::get('otherpropertylist', [ReportController::class, 'OtherProp']);
    Route::get('completedproplist', [ReportController::class, 'CompletedProp']);
    Route::get('allproperty', [ReportController::class, 'AllProp']);
    Route::post('roughreport', [ReportController::class, 'RoughReport']);

    Route::post('mediator_follow_report ', [ReportController::class, 'MediatorFollowReport']);

    Route::get('propertybuyer/{id}', [PropertyController::class, 'PropertyBuyerDataGet']);

    Route::post('customer_follow_report ', [ReportController::class, 'CustomerFollowReport']);
    Route::get('mediator_assign_report/{data}',[MediatorAssignController::class,'MediatorAssignDataGet']);


	Route::get('logout', [LoginController::class, 'getLogout']);

    Route::get('views/{page}', function ($page) {
        return view($page);
    });
});
