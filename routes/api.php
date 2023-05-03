<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DriverApiController;
use App\Http\Controllers\CustomerRegApiController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ActiveDriverApiController;
use App\Http\Controllers\rides\CustomerRideBookings;
use App\Http\Controllers\rides\DriverRideController;
use App\Http\Controllers\OnlinePayController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/all-franchise', [DriverApiController::class, 'all_franchise']);

Route::post('/driver-registration', [DriverApiController::class, 'driver_registration']);

Route::post('/driver-password-login', [DriverApiController::class, 'driver_password_login']);

Route::post('/driver-mobile-verify', [DriverApiController::class, 'driver_mobile_verify']);
Route::post('/driver-otp-login', [DriverApiController::class, 'driver_otp_login']);


Route::middleware(['auth:driverapi','scope:driver'])->group(function () {
	 Route::get('/about', [FrontEndController::class, 'about']);

Route::get('/driver-logout', [ActiveDriverApiController::class, 'driver_logout']);	

Route::get('/all-states', [DriverApiController::class, 'all_states']);
Route::get('/all-districts/{sid}', [DriverApiController::class, 'all_districts']);

Route::get('/driver-personal-details', [DriverApiController::class, 'driver_personal_details_view']);
Route::post('/driver-personal-details', [DriverApiController::class, 'driver_personal_details_update']);

Route::get('/driver-profile-photo', [DriverApiController::class, 'driver_profile_photo_view']);
Route::post('/driver-profile-photo', [DriverApiController::class, 'driver_profile_photo_update']);

Route::get('/vehicle-categories', [DriverApiController::class, 'vehicle_categories']);
Route::get('/vehicle-types/{catid}', [DriverApiController::class, 'vehicle_types']);
Route::get('/vehicle-models/{typeid}', [DriverApiController::class, 'vehicle_models']);

Route::get('/driver-vehicle-details', [DriverApiController::class, 'driver_vehicle_details_view']);
Route::post('/driver-vehicle-details', [DriverApiController::class, 'driver_vehicle_details_update']);

Route::get('/driver-license-frontside', [DriverApiController::class, 'driver_licensefront_view']);
Route::post('/driver-license-frontside', [DriverApiController::class, 'driver_licensefront']);

Route::get('/driver-license-backside', [DriverApiController::class, 'driver_licenseback_view']);
Route::post('/driver-license-backside', [DriverApiController::class, 'driver_licenseback']);

Route::get('/vehicle-rc', [DriverApiController::class, 'vehicle_rc_view']);
Route::post('/vehicle-rc', [DriverApiController::class, 'vehicle_rc']);

Route::get('/vehicle-insurance', [DriverApiController::class, 'vehicle_insurance_view']);
Route::post('/vehicle-insurance', [DriverApiController::class, 'vehicle_insurance']);

Route::get('/pollution-certificate', [DriverApiController::class, 'pollution_certificate_view']);
Route::post('/pollution-certificate', [DriverApiController::class, 'pollution_certificate']);

Route::get('/vehicle-permit', [DriverApiController::class, 'vehicle_permit_view']);
Route::post('/vehicle-permit', [DriverApiController::class, 'vehicle_permit']);

Route::get('/driver-registration-fee', [DriverApiController::class, 'driver_registration_fee']);
Route::post('/driver-fee-payment', [DriverApiController::class, 'driver_fee_payment']);

Route::get('/driver-profile-submission', [DriverApiController::class, 'driver_profile_submission']);

// Route::post('/driver-logout', [DriverApiController::class, 'driver_logout']);

Route::get('/vehicle-rc-reupload', [DriverApiController::class, 'vehicle_rc_review']);
Route::post('/vehicle-rc-reupload', [DriverApiController::class, 'vehicle_rc_reupload']);

Route::get('/driver-licensefront-reupload', [DriverApiController::class, 'driver_licensefront_review']);
Route::post('/driver-licensefront-reupload', [DriverApiController::class, 'driver_licensefront_reupload']);

Route::get('/driver-licenseback-reupload', [DriverApiController::class, 'driver_licenseback_review']);
Route::post('/driver-licenseback-reupload', [DriverApiController::class, 'driver_licenseback_reupload']);

Route::get('/vehicle-insurance-reupload', [DriverApiController::class, 'vehicle_insurance_review']);
Route::post('/vehicle-insurance-reupload', [DriverApiController::class, 'vehicle_insurance_reupload']);

Route::get('/pollution-certificate-reupload', [DriverApiController::class, 'pollution_certificate_review']);
Route::post('/pollution-certificate-reupload', [DriverApiController::class, 'pollution_certificate_reupload']);

Route::get('/vehicle-permit-reupload', [DriverApiController::class, 'vehicle_permit_review']);
Route::post('/vehicle-permit-reupload', [DriverApiController::class, 'vehicle_permit_reupload']);

Route::get('/driver-profile-uploads', [DriverApiController::class, 'driver_profile_uploads']);

Route::get('/driver-profile-status', [DriverApiController::class, 'driver_profile_status']);

Route::get('/driver-ads', [AdvertisementController::class, 'driver_ads']);

Route::post('/driver-password-change', [ActiveDriverApiController::class, 'driver_password_change']);
Route::get('/driver-profile-details', [ActiveDriverApiController::class, 'driver_profile_details']);

Route::get('/driver-account-renewal-fee', [ActiveDriverApiController::class, 'driver_account_renewal_fee']);
Route::get('/driver-account-renewal', [ActiveDriverApiController::class, 'driver_account_renewal_status']);
Route::post('/driver-account-renewal', [ActiveDriverApiController::class, 'driver_account_renewal']);

Route::post('/driver-account-deactivate', [ActiveDriverApiController::class, 'driver_account_deactivate']);
Route::post('/driver-account-reactivate', [ActiveDriverApiController::class, 'driver_account_reactivate']);

Route::get('/driver-availability', [ActiveDriverApiController::class, 'driver_availability']);
Route::post('/driver-availability-on', [ActiveDriverApiController::class, 'driver_availability_on']);
Route::post('/driver-availability-off', [ActiveDriverApiController::class, 'driver_availability_off']);
Route::post('/driver-location-updates', [ActiveDriverApiController::class, 'driver_location_updates']);


////////Booking start//////////////


Route::post('/accept-booking', [DriverRideController::class, 'accept_booking']);
Route::post('/reject-booking', [DriverRideController::class, 'reject_booking']);

Route::post('/start-journey', [DriverRideController::class, 'start_journey']);
Route::post('/offline-fare-payment', [DriverRideController::class, 'offline_fare_payment']);
Route::post('/complete-journey', [DriverRideController::class, 'complete_journey']);

Route::get('/driver-running-ride', [DriverRideController::class, 'driver_running_ride']);
Route::get('/driver-active-ride/{bid}', [DriverRideController::class, 'driver_active_ride']);
Route::get('/driver-ride-history/{bid}', [DriverRideController::class, 'driver_ride_history']);
Route::get('/driver-todays-rides', [DriverRideController::class, 'driver_todays_rides']);
Route::get('/driver-todays-earnings', [DriverRideController::class, 'driver_todays_earnings']);
Route::post('/driver-datewise-rides', [DriverRideController::class, 'driver_datewise_rides']);

////////Booking end//////////////


////////////// Online Payment Reg Fee///////////////////

Route::get('/online-regfee', [OnlinePayController::class, 'online_regfee']);

////////////// Online Payment End///////////////////

	});




	



////////////////////////////////////////////////////



Route::post('/customer-registration', [CustomerRegApiController::class, 'customer_registration']);
Route::post('/customer-login', [CustomerRegApiController::class, 'customer_login']);
Route::post('/customer-login-otp', [CustomerRegApiController::class, 'customer_login_otp']);
Route::middleware(['auth:customerapi','scope:customer'])->group(function () {



Route::get('/customer-logout', [CustomerRegApiController::class, 'customer_logout']);	

Route::get('/disability-document', [CustomerRegApiController::class, 'disability_document_view']);
Route::post('/disability-document', [CustomerRegApiController::class, 'disability_document_upload']);

Route::get('/customer-ads', [AdvertisementController::class, 'customer_ads']);

Route::get('/customer-profile-photo', [CustomerRegApiController::class, 'customer_profile_photo']);
Route::post('/customer-profile-photo', [CustomerRegApiController::class, 'customer_profile_photo_update']);

Route::get('/customer-profile-details', [CustomerRegApiController::class, 'customer_profile_details']);
Route::post('/customer-profile-details', [CustomerRegApiController::class, 'customer_profile_details_update']);

Route::get('/girokab-categories', [CustomerRegApiController::class, 'girokab_categories']);

////////Booking start//////////////

Route::get('/active-vehicle-types/{catid}', [CustomerRideBookings::class, 'active_vehicle_types']);
Route::post('/drivers-list', [CustomerRideBookings::class, 'drivers_list']);
Route::post('/ride-booking', [CustomerRideBookings::class, 'ride_booking']);

Route::post('/payment-type', [CustomerRideBookings::class, 'payment_type']);

Route::post('/cancel-booking', [CustomerRideBookings::class, 'cancel_booking']);
Route::post('/timeout-booking', [CustomerRideBookings::class, 'timeout_booking']);

Route::post('/fare-payment', [CustomerRideBookings::class, 'fare_payments']);
Route::post('/journey-rating', [CustomerRideBookings::class, 'journey_rating']);

Route::get('/customer-running-ride', [CustomerRideBookings::class, 'customer_running_ride']);
Route::get('/customer-active-ride/{bid}', [CustomerRideBookings::class, 'customer_active_ride']);
Route::get('/customer-ride-history/{bid}', [CustomerRideBookings::class, 'customer_ride_history']);
Route::get('/customer-completed-rides', [CustomerRideBookings::class, 'customer_completed_rides']);


////////Booking end//////////////

////////////// Online Fare Payment ///////////////////

Route::get('/online-farepayment/{bid}', [OnlinePayController::class, 'online_farepayment']);

////////////// Online Fare Payment ///////////////////



	});