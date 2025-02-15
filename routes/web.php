<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\AdminOperation;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupportEmail ;
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserForgetController ;
use App\Http\Controllers\Company\ForgetPassword ; 
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RequestPriceController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Mail;



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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/company/register', function () {
//     return view('company.register');
// });


// Admin
Route::group(['middleware' => ['Admin']], function () {

    Route::get('admin',[AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/dashboard',[AdminController::class, 'adminDashboard'])->name('admin.dashbord');
    Route::get('admin/customers_profiles_list',[AdminController::class, 'customerList'])->name('admin.customers_profile');
    Route::get('admin/businesses_profiles_list',[AdminController::class, 'BusinessList'])->name('admin.businesses_profile');
    Route::get('admin/reviews_list_active',[AdminController::class, 'allReviews'])->name('admin.reviews.active');
    Route::get('admin/reviews_list_pending',[AdminController::class, 'allReviews'])->name('admin.reviews.pending');
    Route::get('admin/reviews_list_publish',[AdminController::class, 'allReviews'])->name('admin.reviews.publish');
    Route::get('admin/reviews_list_active_search',[AdminController::class, 'searchReviews']);
    Route::get('admin/reviews_list_pending_search',[AdminController::class, 'searchReviews']);
    Route::get('admin/reviews_list_publish_search',[AdminController::class, 'searchReviews']);
    // Chat
    Route::get('admin/chat/businesses',[AdminChatController::class, 'chats']);
    Route::get('admin/chat/customers',[AdminChatController::class, 'chats']);
    Route::post('admin/chat/businesses/view-chat',[AdminChatController::class, 'viewChats'])->name('admin.view.chat');
    Route::post('admin/chat/customers/view-chat',[AdminChatController::class, 'viewChats'])->name('admin.view.chat');
    
    // Route::get('admin/search_reviews_list',[AdminController::class, 'searchReviewsListPublish'])->name('admin.SearchPublishReviews');
    Route::get('admin/customer_view_profile/{id}',[AdminController::class, 'viewProfile'])->name('admin.customerViewProfile');
    Route::get('admin/edit_business_profile/{id}',[AdminController::class, 'editBusinessProfile'])->name('admin.EditUserReview');

    Route::post('admin/logout',[AdminAuth::class, 'logout'])->name('admin.logout');
    Route::get('admin/edit_user_Reviews/{review_id}',[AdminController::class, 'editBusinessProfile'])->name('admin.editBusinessProfile');
    // Admin Operations
    Route::get('admin/approved_requestPrice/{id}',[AdminOperation::class, 'reqPriceApproved'])->name('admin.approved');
    Route::get('admin/deactive_review/{id}',[AdminOperation::class, 'onReviews'])->name('admin.deactiveUserReview');
    Route::get('admin/deactive_business/{id}',[AdminOperation::class, 'onBussinessProfile'])->name('admin.deactiveBusiness');
    Route::get('admin/deactive_AllReviews/{id}',[AdminOperation::class, 'onAllReviews'])->name('admin.deactiveReview');
    Route::post('admin/edit_customer_review/{review_id}',[AdminOperation::class, 'editCustomerReview'])->name('admin.edit_customer_review');
    Route::get('admin/view_business_profile/{id}',[AdminOperation::class, 'viewBusinessReview'])->name('admin.viewBusinessProfile');
    // Route::get('admin/view_request_price',[RequestPriceController::class, 'index'])->name('admin.viewRequestPrice');
    
    // Add Category
    Route::get('admin/add_category',[CategoryController::class, 'index'])->name('admin.addCategory');
    Route::get('admin/get_category',[CategoryController::class, 'getCate'])->name('admin.getCategory');
    Route::get('admin/del_category',[CategoryController::class, 'delCate'])->name('admin.delCategory');
    Route::get('admin/del_subcategory',[CategoryController::class, 'delSubCate'])->name('admin.delSubCategory');
    Route::post('admin/submit_category',[CategoryController::class, 'addCategory'])->name('admin.submitCategory');
    Route::post('admin/edit_category',[CategoryController::class, 'editCategory'])->name('admin.editCategory');
    
    // Add SubCategories
    Route::post('admin/add_subcategory',[CategoryController::class, 'AddSubCate'])->name('admin.addSubCategory');
    
    // Email Support
    Route::get('admin/email_list',[SupportEmail::class, 'getEmails'])->name('admin.getEmails');
    Route::get('admin/view_email/{id}',[SupportEmail::class, 'viewEmail'])->name('admin.view.email');
    Route::get('admin/reply_mail/',[SupportEmail::class, 'rpyEmail'])->name('admin.reply.email');
    
});

Route::get('admin/login',[AdminAuth::class, 'login'])->name('admin.login');
Route::post('admin/loginsubmit',[AdminAuth::class, 'loginsubmit'])->name('admin.loginSubmit');
Route::post('admin/forget_password',[AdminAuth::class, 'forgetView'])->name('admin.forgetPassword');

// Customer Route
Route::group(['middleware' => ['Customer']], function () {

    Route::get('user/profile',[UserController::class, 'userProfile'])->name('user.profile');
    Route::put('user/profile',[UserController::class, 'userEditProfile'])->name('user.edit.profileSubmit');
    Route::post('user/logout',[UserController::class, 'userLogout'])->name('user_logout');
    Route::get('user',[UserController::class, 'index']);
    Route::post('review/add',[ReviewController::class,'addReview'])->name('review.add');
    Route::post('user/request_price_from',[RequestPriceController::class, 'addRequestPrice'])->name('user.addRequestPrice');
    Route::post('user/addImages',[UserController::class, 'addImage'])->name('user.addImages');
    Route::get('user/change_password/view',[UserForgetController::class,'viewForm'])->name('user.changeForget.view');
    Route::post('user/change-password',[UserForgetController::class,'submitCustomerForgetPassword'])->name('user.change.password');
    Route::get('/user/view_chat_page', [ChatController::class, 'userChatInterface'])->name('user.view.chat');
    Route::post('/user/send-msg', [ChatController::class, 'userSendMsg'])->name('user.send.msg');
Route::post('user/get_chat', [ChatController::class, 'getUserChat'])->name('user.get.chat');
});

Route::get('user/register',[UserController::class, 'registerView'])->name('user.register');
Route::post('user/registerSubmit',[UserController::class, 'registerSubmit'])->name('user.register.submit');
Route::get('user/login',[UserController::class, 'loginView'])->name('user.login');
Route::post('user/loginSubmit',[UserController::class, 'loginSubmit'])->name('user.login.submit');
Route::get('user/forget_password',[UserForgetController::class, 'userForgetView'])->name('user.forgetPassword');
Route::get('verify-email/{token}', [UserController::class, 'verifyEmail'])->name('verify.email');
Route::get('email-verification', [UserController::class, 'email_verification_view'])->name('email.verification');
Route::post('resend-verification/{customer}', [UserController::class, 'resendVerification'])->name('resend.verification');


Route::get('register/confirm', function () {
    return view('auth.register-confirm');
})->name('register.confirm');

// Business Routes
Route::group(['middleware' => ['Business']], function () {
    Route::get('company',[CompanyController::class, 'index'])->name('company.index');
    Route::get('company/editProfile/{id}',[CompanyController::class, 'editView'])->name('company.editProfile');
    Route::get('company/editProfile/remove_hours/{id}',[CompanyController::class, 'removeHours'])->name('editProfile.remove.hours');
    Route::get('company/editProfile/remove_sub_cate/{id}',[CompanyController::class, 'removeSubCate'])->name('editProfile.remove.subcate');
    Route::put('company/updateProfile/{id}',[CompanyController::class, 'updateSubmit'])->name('company.updateSubmit');
    Route::get('company/profile',[CompanyController::class, 'profile'])->name('company.profile');
    Route::post('company/logout',[CompanyController::class, 'logout'])->name('company.logout');
    Route::post('/reply/{id}',[ReviewController::class,'reply'])->name('review.reply');
    Route::post('/add-images',[ImagesController::class,'addImages'])->name('addImages');
    Route::post('/background-images',[ImagesController::class,'addBackgroundImages'])->name('addBackgroundImages');
    Route::get('company/change_password/view',[UserForgetController::class,'viewForm'])->name('company.changeForget.view');
    Route::post('company/change-password',[ForgetPassword::class,'submitCompanyForgetPassword'])->name('company.change.password');
    Route::get('/getcategory',[CompanyController::class,'categoryList']);
    Route::get('/getsubcategory',[CompanyController::class,'subcategoryList']);
    Route::post('/company-change-button-name',[CompanyController::class,'changeBtnName'])->name('change.button.name');
    
    Route::get('/business/view_chat_page', [ChatController::class, 'businessChatInterface'])->name('business.view.chat');
    Route::post('business/get_chat', [ChatController::class, 'getBusinessChat'])->name('business.get.chat');
     Route::post('/company/send-msg', [ChatController::class, 'businessSendMsg'])->name('business.send.msg');


});
Route::get('company/login',[CompanyController::class, 'loginView'])->name('company.login');
Route::post('company/loginSubmit',[CompanyController::class, 'loginSubmit'])->name('company.login.submit');
Route::get('company/register',[CompanyController::class, 'registerView'])->name('company.register');
Route::post('company/registerSubmit',[CompanyController::class, 'registerSubmit'])->name('company.register.submit');
Route::get('company/forget_password',[ForgetPassword::class, 'companyForgetView'])->name('company.forgetPassword');
Route::get('company/verify-email/{token}', [CompanyController::class, 'verifyEmail'])->name('company.verify.email');
Route::get('company/email-verification', [CompanyController::class, 'email_verification_view'])->name('company.email.verification');
Route::post('company/resend-verification/{companyId}', [CompanyController::class, 'resendVerification'])->name('company.resend.verification');

// HomeController
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/all-companies',[HomeController::class,'allCompanies'])->name('all.companies');
Route::get('company/profile/{id}',[HomeController::class,'companyProfile'])->name('company.show');
Route::post('company/profile/searchSS',[HomeController::class,'companyProfile2'])->name('company.show.search');
Route::get('company/profile/review/{id}',[HomeController::class,'companyReviewProfile'])->name('company.show.review.page');
Route::get('company/search/profile',[HomeController::class,'SearchProfile'])->name('company.search.show');
Route::get('privacy_policy',[HomeController::class,'privacyPolicy'])->name('privacy.policy');
Route::get('term_condition',[HomeController::class,'termCondition'])->name('term.condition');
Route::get('all_categories',[HomeController::class,'viewAllCate'])->name('view.all.categories');
Route::get('/contect-us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::post('/submit-contect-us', [HomeController::class, 'submitContactUs'])->name('submit.contact.us');
Route::get('write-a-review',[HomeController::class,'writeReview'])->name('view.write.Review');

// Search
Route::get('/search-any-thing',[HomeController::class,'searchCompanies'])->name('autocompleteSearch');
Route::get('/search-all-companies-thing',[HomeController::class,'searchAllCompanies'])->name('searchAllCompanies');
Route::get('/search-customer-name',[AdminController::class,'searchCustomerList'])->name('customer.search');

// Images
// Route::post('add-images',[ImagesController::class,'addImages'])->name('addImages');
Route::get('/search-with-rating',[HomeController::class,'searchWithRating']);
Route::get('/like_review/{rev_id}',[ReviewController::class,'likeReview'])->name('user.likeReview');
Route::get('/riviews/histroy',[UserController::class,'riviewHistory'])->name('user.review_histroy');

// Notification
Route::post('/getNoti',[RequestPriceController::class,'getNoti']);
Route::post('/viewNoti',[RequestPriceController::class,'viewNoti']);
Route::get('/view_all_notification',[RequestPriceController::class,'viewNotification']);

// Socialite
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Check Email
Route::post('user/email_verify',[UserForgetController::class,'emailVerify'])->name('user.cheak.email');
Route::get('user/reset-password/{token}', [UserForgetController::class, 'showResetPasswordForm'])->name('user.reset.password.get');
Route::post('company/email_verify',[ForgetPassword::class,'emailVerify'])->name('company.cheak.email');
Route::get('company/reset-password/{token}', [ForgetPassword::class, 'showResetPasswordForm'])->name('company.reset.password.get');

// Contact_us
// Route::get('sendemail',[SendEmailController::class, 'send_email'])->name('contactus.email');

// Recover Password

Route::post('company/reset-password', [ForgetPassword::class, 'submitResetPasswordForm'])->name('company.reset.password.post');
Route::post('user/reset-password', [UserForgetController::class, 'submitResetsPasswordForm'])->name('user.reset.password.post');

// Company By Category
Route::get('/company_search_by_cate_id/{cate_id}', [HomeController::class, 'CompByCateId']);
Route::post('/get-companies-cate-id', [HomeController::class, 'GetCompByCateId'])->name('get.comp.byId');
Route::get('/search_by_comp', [HomeController::class, 'SearchByComp']);
Route::get('/search_by_cate', [HomeController::class, 'SearchByCate']);

// Find City State Postal
Route::post('/getValue', [HomeController::class, 'getValue'])->name('getvalue');

// Chat Links

Route::get('mail/design', function () {
    return view('emails.verify');
});

