<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminMemberController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminEmailController;
use App\Http\Controllers\Admin\AdminToDoController;
use App\Http\Controllers\Admin\AdminEventCalendarController;
use App\Http\Controllers\Admin\AdminTimeOffController;
use App\Http\Controllers\Admin\AdminWorkingHourController;
use App\Http\Controllers\Admin\AdminHomepageContentController ;
use App\Http\Controllers\Admin\AdminHomepageTestimonialController ;
use App\Http\Controllers\Admin\AdminEmailSettingController;
use App\Http\Controllers\Admin\AdminEventController;


// ==============================================================================
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\MemberPastReservationController;
use App\Http\Controllers\Member\MemberBlogController;
use App\Http\Controllers\Member\MemberEventController;

// ==============================================================================
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeTimeOffController;
use App\Http\Controllers\Employee\EmployeeReservationController;
use App\Http\Controllers\Employee\EmployeeEmailSettingController;
use App\Http\Controllers\Employee\EmployeeEmailController;
use App\Http\Controllers\Employee\EmployeeBlogController;
use App\Http\Controllers\Employee\EmployeeEventController;

use Auth;

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/clear-cache', function () {
    // Clear the application cache
    Artisan::call('cache:clear');
    // Clear the route cache
    Artisan::call('route:clear');
    // Optimize the application
    Artisan::call('optimize');
    Artisan::call('config:cache');
    
    // Output a message indicating that the cache is cleared
    return "Cache is cleared";
});



// //Coming Soon Mode
// Route::get('/ComingSoon', function () {
//     return 'Coming Soon!';
// });
// Route::get('/{*}', function () {
//     return redirect(url('/ComingSoon'));
// });
// Route::get('/', function () {
//     return redirect(url('/ComingSoon'));
// });


    
    
    Route::controller(OtherController::class)->group(function () {
        
        
        Route::get('/coming', 'coming')->name('coming'); 
        Route::post('/subscribe-newsletter',  'subscribe')->name('subscribe.newsletter');
    });


Route::middleware(['comingSoon'])->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index'); 
        Route::get('/home', 'index')->name('home'); 
        Route::get('/index', 'index')->name('index2'); 
        Route::get('/logouts', 'logouts')->name('logouts'); 
    });    

    Route::controller(HomeController::class)->group(function () {
        Route::get('/about-us', 'about')->name('about-us'); 
        Route::get('/contact-us', 'contact')->name('contact-us'); 
        Route::get('/resort-search','resort_search')->name('resort_search');
    });
    
    Route::controller(LocationController::class)->group(function () {
        Route::get('/locations', 'locations')->name('locations'); 
        Route::get('/location-detail/{slug}', 'location_detail')->name('location-detail'); 
        Route::post('/review_store', 'review_store')->name('review_store');
        Route::get('/check-availability', 'checkAvailability')->name('check.availability');
    });
    
    Route::controller(LongController::class)->group(function () {
        Route::get('/long-term-parking', 'index')->name('long-term-parking'); 
    });
    
    Route::controller(OtherController::class)->group(function () {
        Route::get('/coming-soon', 'coming_soon')->name('coming-soon'); 
        Route::get('/coming-soon-detail/{id}', 'coming_soon_detail')->name('coming_soon_detail'); 
        Route::post('/comments',  'comment_store')->name('comments.store');
        Route::get('/coming-soon/cat/{id}', 'coming_soon_cat')->name('coming-soon-cat'); 
        Route::get('/coming-soon/tag/{id}', 'coming_soon_tag')->name('coming-soon-tag');
       
        Route::get('/amenities', 'amenities')->name('amenities'); 
        Route::get('/events', 'events')->name('events'); 
        Route::get('/event-detail/{id}', 'event_detail')->name('event_detail'); 
        Route::post('event/comment/store',  'eventstore' )->name('event.comment.store');
        
    });
    
    Route::controller(ContactController::class)->group(function () {
        Route::post('/contact-store', 'store')->name('contact-store'); 
    });
    
    Route::controller(ReservationController::class)->group(function () {
        Route::get('/checkout', 'checkout')->name('checkout'); 
        Route::post('/reserved-validation', 'reserved_validation')->name('reserved-validation'); 
        Route::post('/reserved-location', 'reserved_location')->name('reserved-location'); 
        Route::post('/reserved-pay', 'reserved_pay')->name('reserved-pay'); 
        Route::post('/apply-coupon', 'applyCoupon')->name('apply.coupon'); 
        Route::get('/confirmation', 'confirmation')->name('confirmation'); 
    
    });
});


Route::post('stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);


// =================================== all admin routes =================================== 
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::controller(AdminController::class)->group(function () {
        // Route::get('/admin', function(){
        //     return redirect()->route('admin.dashboard');
        // })->name('admin'); 
        Route::get('/admin/dashboard', 'index')->name('admin'); 
        Route::get('/admin/profile',  'profile')->name('admin.profile');
        Route::post('/admin/profile_update',  'profile_update')->name('admin.profile_update');
        Route::post('/admin/updatePassword',  'updatePassword')->name('admin.updatePassword');

        // new route add
        Route::get('admin/setting', 'setting')->name('admin.setting');
        Route::post('admin/setting', 'setting_do')->name('admin.setting.do');
        Route::get('/admin/reservation/graph', 'reservation_graph')->name('reservation.graph');
        Route::get('/admin/member/graph', 'member_graph')->name('member.graph');
    });

    Route::controller(AdminLocationController::class)->group(function () {
        Route::get('/admin/location/index', 'index')->name('admin.location.list'); 
        Route::get('/admin/location/create', 'create')->name('admin.location.create'); 
        Route::post('/admin/location/store', 'store')->name('admin.location.store'); 
        Route::get('/admin/location/edit/{id}', 'edit')->name('admin.location.edit'); 
        Route::put('/admin/location/update/{id}', 'update')->name('admin.location.update'); 
        Route::delete('/admin/location/destroy/{id}', 'destroy')->name('admin.location.destroy'); 
    });

    Route::controller(AdminContactController::class)->group(function () {
        Route::get('/admin/contact/index', 'index')->name('admin.contact.list'); 
        Route::delete('/admin/contact/destroy/{id}', 'destroy')->name('admin.contact.destroy'); 
    });

    Route::controller(AdminReviewController::class)->group(function () {
        Route::get('/admin/review/index', 'index')->name('admin.review.list'); 
        Route::delete('/admin/review/destroy/{id}', 'destroy')->name('admin.review.destroy');  
        Route::post('/admin/review/{id}/approve', 'approve')->name('admin.review.approve'); 
        Route::post('/admin/review/{id}/disapprove', 'disapprove')->name('admin.review.disapprove'); 
    });

    Route::controller(AdminReservationController::class)->group(function () {
        Route::get('/admin/reservation/index', 'index')->name('admin.reservation.list'); 
        Route::get('/admin/reservation/show/{id}', 'show')->name('admin.reservation.show'); 
        Route::delete('/admin/reservation/destroy/{id}', 'destroy')->name('admin.reservation.destroy'); 
    });

    Route::controller(AdminEmployeeController::class)->group(function () {
        Route::get('/admin/employee/index', 'index')->name('admin.employee.list'); 
        Route::post('/admin/employee/store', 'store')->name('admin.employee.store'); 
        Route::get('/admin/employee/edit/{id}', 'edit')->name('admin.employee.edit'); 
        Route::put('/admin/employee/update/{id}', 'update')->name('admin.employee.update'); 
        Route::delete('/admin/employee/destroy/{id}', 'destroy')->name('admin.employee.destroy'); 
    });

    Route::controller(AdminMemberController::class)->group(function () {
        Route::get('/admin/member/index', 'index')->name('admin.member.list'); 
        Route::delete('/admin/member/destroy/{id}', 'destroy')->name('admin.member.destroy'); 
    });


    Route::controller(AdminCouponController::class)->group(function () {
        Route::get('/admin/coupons/index', 'index')->name('admin.coupons.list'); 
        Route::post('/admin/coupons/store', 'store')->name('admin.coupons.store'); 
        Route::get('/admin/coupons/edit/{id}', 'edit')->name('admin.coupons.edit'); 
        Route::put('/admin/coupons/update/{id}', 'update')->name('admin.coupons.update'); 
        Route::delete('/admin/coupons/destroy/{id}', 'destroy')->name('admin.coupons.destroy'); 
    });

    
    Route::controller(AdminTimeOffController::class)->group(function () {
        Route::get('/admin/time-off/index', 'index')->name('admin.time-off.list'); 
        Route::get('/admin/time-off/approve/{id}',  'approveTimeOff')->name('admin.time-off.approveTimeOff');
        Route::get('/admin/time-off/decline/{id}',  'declineTimeOff')->name('admin.time-off.declineTimeOff');
    });

    Route::controller(AdminWorkingHourController::class)->group(function () {
        Route::get('/admin/working-hour/index/{id}', 'index')->name('admin.working-hour.list'); 
        Route::post('/admin/working-hour/store', 'store')->name('admin.working-hour.store'); 
        Route::get('/admin/working-hour/edit/{id}', 'edit')->name('admin.working-hour.edit'); 
        Route::put('/admin/working-hour/update/{id}', 'update')->name('admin.working-hour.update'); 
        Route::delete('/admin/working-hour/destroy/{id}', 'destroy')->name('admin.working-hour.destroy'); 
    });


    Route::controller(AdminEmailController::class)->group(function () {
        Route::get('/admin/email/index', 'index')->name('admin.email.list'); 
        Route::get('/admin/email/show/{uid}', 'show')->name('admin.email.show'); 

        Route::get('/admin/email/compose', 'compose')->name('admin.email.compose'); 
        Route::post('/admin/email/store', 'store')->name('admin.email.store'); 

        Route::get('/admin/email/draft', 'draft')->name('admin.email.draft'); 
        Route::get('/admin/email/trash', 'trash')->name('admin.email.trash'); 
        Route::get('/admin/email/sent', 'sent')->name('admin.email.sent');
        Route::get('/admin/email/view/{id}', 'view')->name('admin.email.view'); 

        Route::delete('/admin/email/destroy/{id}', 'destroy')->name('admin.email.destroy'); 
    });

    Route::controller(AdminToDoController::class)->group(function () {
        Route::get('/admin/to-do/index', 'index')->name('admin.to-do.list'); 

        Route::get('/admin/to-do-card/fetch', 'fetchToDoCards')->name('admin.to-do-card.fetch'); 
        Route::post('/admin/to-do-card/store', 'card_store')->name('admin.to-do-card.store'); 
        Route::post('/admin/to-do-card/completed/{id}', 'card_completed')->name('admin.to-do-card.completed'); 
        Route::delete('/admin/to-do-card/destroy/{id}', 'card_destroy')->name('admin.to-do-card.destroy'); 
        Route::delete('/admin/to-do-card/destroy_all', 'card_destroy_all')->name('admin.to-do-card.destroy_all'); 
        

        Route::get('/admin/to-do-list/fetch', 'fetchToDoLists')->name('admin.to-do-list.fetch'); 
        Route::post('/admin/to-do-list/store', 'list_store')->name('admin.to-do-list.store'); 
        Route::post('/admin/to-do-list/completed/{id}', 'list_completed')->name('admin.to-do-list.completed'); 
        Route::delete('/admin/to-do-list/destroy/{id}', 'list_destroy')->name('admin.to-do-list.destroy'); 
        Route::delete('/admin/to-do-list/destroy_all', 'list_destroy_all')->name('admin.to-do-list.destroy_all'); 
    });

    Route::controller(AdminEventCalendarController::class)->group(function () {
        Route::get('/admin/event-calendar/index', 'index')->name('admin.event-calendar.list'); 
        Route::post('/admin/event-calendar/store', 'store')->name('admin.event-calendar.store'); 
        Route::get('/admin/event-calendar/edit/{id}', 'edit')->name('admin.event-calendar.edit'); 
        Route::put('/admin/event-calendar/update/{id}', 'update')->name('admin.event-calendar.update'); 
        Route::delete('/admin/event-calendar/destroy/{id}', 'destroy')->name('admin.event-calendar.destroy'); 
    });
    
    Route::controller(AdminBlogController::class)->group(function () {
        Route::get('/admin/blogs/index', 'index')->name('admin.blogs.list'); 
        Route::get('/admin/blogs/create', 'create')->name('admin.blogs.create'); 
        Route::post('/admin/blogs/store', 'store')->name('admin.blogs.store'); 
        Route::get('/admin/blogs/edit/{id}', 'edit')->name('admin.blogs.edit'); 
        Route::put('/admin/blogs/update/{id}', 'update')->name('admin.blogs.update'); 
        Route::delete('/admin/blogs/destroy/{id}', 'destroy')->name('admin.blogs.destroy'); 
    });

    
    Route::controller(AdminHomepageContentController::class)->group(function () {
        Route::get('/admin/home-page-content/index', 'index')->name('admin.homepage_content.list'); 
        Route::get('/admin/home-page-content/create', 'create')->name('admin.homepage_content.create'); 
        Route::post('/admin/home-page-content/store', 'store')->name('admin.homepage_content.store'); 
        Route::get('/admin/home-page-content/edit/{id}', 'edit')->name('admin.homepage_content.edit'); 
        Route::put('/admin/home-page-content/update/{id}', 'update')->name('admin.homepage_content.update'); 
        Route::delete('/admin/home-page-content/destroy/{id}', 'destroy')->name('admin.homepage_content.destroy'); 
    });

    Route::controller(AdminHomepageTestimonialController::class)->group(function () {
        Route::get('/admin/home-page-testimonial/index', 'index')->name('admin.homepage_testimonial.list'); 
        Route::get('/admin/home-page-testimonial/create', 'create')->name('admin.homepage_testimonial.create'); 
        Route::post('/admin/home-page-testimonial/store', 'store')->name('admin.homepage_testimonial.store'); 
        Route::get('/admin/home-page-testimonial/edit/{id}', 'edit')->name('admin.homepage_testimonial.edit'); 
        Route::put('/admin/home-page-testimonial/update/{id}', 'update')->name('admin.homepage_testimonial.update'); 
        Route::delete('/admin/home-page-testimonial/destroy/{id}', 'destroy')->name('admin.homepage_testimonial.destroy'); 
    });

    
    Route::controller(AdminEmailSettingController::class)->group(function () {
        Route::get('/admin/email_settings/index', 'index')->name('admin.email_settings.list'); 
        Route::get('/admin/email_settings/create', 'create')->name('admin.email_settings.create'); 
        Route::post('/admin/email_settings/store', 'store')->name('admin.email_settings.store'); 
        Route::get('/admin/email_settings/edit/{id}', 'edit')->name('admin.email_settings.edit'); 
        Route::put('/admin/email_settings/update/{id}', 'update')->name('admin.email_settings.update'); 
        Route::delete('/admin/email_settings/destroy/{id}', 'destroy')->name('admin.email_settings.destroy'); 
    });

    Route::controller(AdminEventController::class)->group(function () {
        Route::get('/admin/event/index', 'index')->name('admin.event.list'); 
        Route::get('/admin/event/create', 'create')->name('admin.event.create'); 
        Route::post('/admin/event/store', 'store')->name('admin.event.store'); 
        Route::get('/admin/event/edit/{id}', 'edit')->name('admin.event.edit'); 
        Route::put('/admin/event/update/{id}', 'update')->name('admin.event.update'); 
        Route::delete('/admin/event/destroy/{id}', 'destroy')->name('admin.event.destroy'); 
    });

});

// ====================================================================== 


 // =================================== all member routes =================================== 
Route::group(['middleware' => ['auth', 'member']], function () {

    Route::controller(MemberController::class)->group(function () {
        Route::get('/member/dashboard', 'index')->name('member'); 

        Route::get('/member/profile',  'profile')->name('member.profile');
        Route::post('/member/profile_update',  'profile_update')->name('member.profile_update');
        Route::post('/member/updatePassword',  'updatePassword')->name('member.updatePassword');        
        Route::get('/member/reservation/graph', 'reservation_graph')->name('member.reservation.graph');

    });

    Route::controller(MemberPastReservationController::class)->group(function () {
        Route::get('/member/past-reservation/index', 'index')->name('member.past-reservation'); 
        Route::get('/member/reservation/show/{id}', 'show')->name('member.reservation.show'); 
    });

    Route::controller(MemberBlogController::class)->group(function () {
        Route::get('/member/blogs/index', 'index')->name('member.blogs.list'); 
        Route::get('/member/blogs/show/{id}', 'show')->name('member.blogs.show'); 
    });
    
    Route::controller(MemberEventController::class)->group(function () {
        Route::get('/member/events/index', 'index')->name('member.events.list'); 
        Route::get('/member/events/show/{id}', 'show')->name('member.events.show'); 
    });

});


 // =================================== all employee routes =================================== 

 Route::group(['middleware' => ['auth', 'employee']], function () {

    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee/dashboard', 'index')->name('employee'); 
        Route::get('/employee/profile',  'profile')->name('employee.profile');
        Route::post('/employee/profile_update',  'profile_update')->name('employee.profile_update');
        Route::post('/employee/updatePassword',  'updatePassword')->name('employee.updatePassword');
        Route::get('/employee/reservation/graph', 'reservation_graph')->name('employee.reservation.graph');
    });

    
    Route::controller(EmployeeReservationController::class)->group(function () {
        Route::get('/employee/reservation/index', 'index')->name('employee.reservation.list'); 
        Route::get('/employee/reservation/show/{id}', 'show')->name('employee.reservation.show'); 
    });
    
    Route::controller(EmployeeTimeOffController::class)->group(function () {
        Route::get('/employee/time-off/index', 'index')->name('employee.time-off.list'); 
        Route::post('/employee/time-off/requestTimeOff', 'requestTimeOff')->name('employee.requestTimeOff'); 
        Route::get('/employee/working-hours', 'workingHours')->name('employee.working-hours'); 
    });


      
    Route::controller(EmployeeEmailSettingController::class)->group(function () {
        Route::get('/employee/email_settings/index', 'index')->name('employee.email_settings.list'); 
        Route::get('/employee/email_settings/create', 'create')->name('employee.email_settings.create'); 
        Route::post('/employee/email_settings/store', 'store')->name('employee.email_settings.store'); 
        Route::get('/employee/email_settings/edit/{id}', 'edit')->name('employee.email_settings.edit'); 
        Route::put('/employee/email_settings/update/{id}', 'update')->name('employee.email_settings.update'); 
        Route::delete('/employee/email_settings/destroy/{id}', 'destroy')->name('employee.email_settings.destroy'); 
    });
   
    
    Route::controller(EmployeeEmailController::class)->group(function () {
        Route::get('/employee/email/index', 'index')->name('employee.email.list'); 
        Route::get('/employee/email/show/{id}', 'show')->name('employee.email.show'); 
        Route::get('/employee/email/compose', 'compose')->name('employee.email.compose'); 
        Route::post('/employee/email/store', 'store')->name('employee.email.store'); 
        Route::get('/employee/email/draft', 'draft')->name('employee.email.draft'); 
        Route::get('/employee/email/trash', 'trash')->name('employee.email.trash'); 
        Route::get('/employee/email/sent', 'sent')->name('employee.email.sent');
        Route::get('/employee/email/view/{id}', 'view')->name('employee.email.view'); 
        Route::delete('/employee/email/destroy/{id}', 'destroy')->name('employee.email.destroy'); 
    });

    Route::controller(EmployeeBlogController::class)->group(function () {
        Route::get('/employee/blogs/index', 'index')->name('employee.blogs.list'); 
        Route::get('/employee/blogs/show/{id}', 'show')->name('employee.blogs.show'); 
    });

    Route::controller(EmployeeEventController::class)->group(function () {
        Route::get('/employee/events/index', 'index')->name('employee.events.list'); 
        Route::get('/employee/events/show/{id}', 'show')->name('employee.events.show'); 
    });
 
});