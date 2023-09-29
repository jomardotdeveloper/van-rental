<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\SmsController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// get user location
Route::get('/get-Van-Display',[HomeController::class,'getVanCredentials'])->name('van.credentials');
Route::group(['middleware' => 'guest'], function () {
    
    // client
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    // driver
    Route::get('/register-driver', [AuthController::class, 'registerDriver'])->name('register.driver');
    Route::post('/register-driver', [AuthController::class, 'registerDriverPost'])->name('register.driver');

    // verify email
    Route::post('/verify-email',[AuthController::class, 'verifyEmail'])->name('register-email.driver');
    Route::post('/verify-email-post',[AuthController::class, 'verifyEmailPost'])->name('verify.post');

    // email verified
    Route::get('/email-verified/{email}',[AuthController::class, 'emailVerified'])->name("email.verified");

    // temp uploads
    Route::post('/tmp-upload',[AuthController::class, 'tmpUpload']);
    Route::delete('/tmp-delete',[AuthController::class, 'tmpDelete']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::post('/check-otp', [AuthController::class, 'loginPostOtp'])->name('login.otp');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', [HomeController::class, 'index']);
    // Route::get('/client-dashboard', [HomeController::class, 'client'])->name('client-dash');
    // Route::get('/about',[HomeController::class, 'about'])->name('about');
    // Route::get('/inquiry',[HomeController::class, 'inquiry'])->name('inquiry');



    Route::get('/driver-dashboard', [HomeController::class, 'driver'])->name('driver.home');
    Route::get('/admin-dashboard', [HomeController::class, 'admin']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    // register vehicle
    Route::get('/register-vehicle',[HomeController::class,'registerVehicle'])->name("register.vehicle");
    Route::post('/register-vehicle',[HomeController::class,'registerVehiclePost'])->name("register.vehicle");

    // edit vehicle registration
    Route::post('/register-edit',[RequestController::class, 'editRegistration'])->name('register.edit');

    // temp uploads
    Route::post('/tmp-UploadLicensed',[RequestController::class, 'tmpUploadLicensed']);
    Route::delete('/tmp-deleteLicensed',[RequestController::class, 'tmpDeleteLicensed']);

    Route::post('/tmp-UploadVehicleProfile',[RequestController::class, 'tmpUploadVehicleProfile']);
    Route::delete('/tmp-deleteVehicleProfile',[RequestController::class, 'tmpDeleteVehicleProfile']);

    // admin request
    Route::get('/accounts/approval',[RequestController::class,'fetchAccountApproval']);
    Route::get('/accounts/approval/{id}', [RequestController::class,'approve'])->name('accounts.approval');
    Route::get('/accounts/view/{id}', [RequestController::class,'getById'])->name('accounts.view');

    // about driver
    Route::get('/about-driver', [HomeController::class, 'aboutDriver'])->name('about.driver');
    // message driver
    Route::get('/client-dashboard/message', [HomeController::class, 'messageDriver'])->name('message.driver');
    // complain driver
    Route::get('/complain', [HomeController::class, 'complainDriver'])->name('complain.driver');
    // customer info page
    Route::get('/customers-info', [HomeController::class, 'customersInfo'])->name('customers.info');
    // drivers account
    Route::get('/drivers-account', [HomeController::class, 'driversAccount'])->name('drivers.account');
    // message customer
    Route::get('/message-customer', [HomeController::class, 'messageCustomer'])->name('message.customer');
    // add services
    Route::get('/add-services', [HomeController::class, 'addServices'])->name('add.services');
    // view more info about specific customer
    Route::get('/customer-info', [HomeController::class, 'customerInfo'])->name('customer.info');


    // driver allbooked
    Route::get('/all-booked',[HomeController::class,'getAllBooked'])->name('allBooked.home');
    Route::get('/getAllBooked/{id}',[DriverController::class,'getAllClientBooked']);
    // driver home
    Route::get('/driver-dashboard',[HomeController::class,'driverHome'])->name('driver.home');
    // driver all Client
    Route::get('/all-client',[HomeController::class,'getAllClientHome'])->name('allClient.home');
    // stored user location
    Route::post('/stored-location',[LocationController::class,'postUserLocation'])->name('driver.location');
    // get user location
    Route::get('/get-location/{id}',[LocationController::class,'getUserLocation'])->name('driver.location');
    // get user location
    Route::get('/get-Driver-Credentials/{id}',[DriverController::class,'getUserCredentials'])->name('driver.credentials');
    // get booked
    Route::get('/get-booked',[DriverController::class,'getBookedRequest'])->name('get.booked');
    // get booked by id
    Route::get('/get-booked/{id}',[DriverController::class,'getBookedByIdRequest'])->name('get.booked.id');
    
    // chat
    Route::get('/chatroom-driver',[DriverController::class,'chatRoomDriver'])->name('client-dash-chatroom-driver');
    Route::post('/send-client-message',[DriverController::class,'sendClientMessage'])->name('send-message');
    Route::post('/get-client-message',[DriverController::class,'getClientMessage'])->name('get-message');
    // Route::post('/get-client-message-driver',[DriverController::class,'getClientMessageDriver'])->name('get-message-driver');
    Route::post('/get-unseen-message',[DriverController::class,'getUnseenMessage'])->name('get-unseen-message');
    Route::post('/update-unseen-message',[DriverController::class,'updateUnseenMessage'])->name('update-unseen-message');
    // accept and send confirmation email
    Route::post('/confirmation-email',[AuthController::class,'confirmationBooking'])->name('accept.booking');
    // post maintenance
    Route::post('/post-maintenance',[MaintenanceController::class,'postMaintenance'])->name('maintenance.post');
    Route::get('/get-maintenance',[MaintenanceController::class,'getMaintenance'])->name('maintenance.get');

    // client home
    Route::get('/client-dashboard',[ClientController::class,'clientHome'])->name('client-dash');
    // client services
    Route::get('/client-dashboard/services',[ClientController::class,'clientServices'])->name('client-dash-services');
    // client About
    Route::get('/about',[ClientController::class,'clientAbout'])->name('client-dash-about');
    // client Profile
    Route::get('/profile',[ClientController::class,'clientProfile'])->name('client-dash-profile');
    Route::get('/profile/update_password', [ClientController::class, 'update_password']);

    // client Location
    Route::get('/location',[ClientController::class,'clientLocation'])->name('client-dash-location');
    
    // update account
    Route::post('/update-account',[ClientController::class,'updateAccount'])->name('update.account');

    // Route::get('/chatroom',[ClientController::class,'chatRoom'])->name('client-dash-chatroom');
    Route::post('/get-unseen-message-client',[ClientController::class,'getUnseenMessageClient'])->name('get-unseen-message-client');
    Route::post('/get-seen-message',[ClientController::class,'getSeenMessageClient'])->name('get-seen-message-client');

    // post request client
    Route::get('/post-Client-Booked',[ClientController::class,'clientBooked'])->name('client-dash-booked');
    Route::post('/tmp-upload-reciept',[RecieptController::class, 'tmpUploadReciept'])->name('reciept.upload');
    Route::delete('/tmp-delete-reciept',[RecieptController::class, 'tmpDeleteReciept'])->name('reciept.delete');
    Route::post('/send-driver-reciept',[RecieptController::class, 'tmpSendReciept'])->name('reciept.send');

    // payments
    Route::get('/get-payments', [RecieptController::class,'getPayments'])->name('driver.payments');
    Route::post('/post-recieved', [RecieptController::class,'postPayments'])->name('driver.payments.post');

    //create payment link
    Route::get('/payment_process',[ClientController::class,'process_payment']);
    
    //send sms
    Route::get('/send_sms', [SmsController::class, 'send_sms']);
    
});

