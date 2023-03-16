<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandleFranchise;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\CustomerBasicController;
use App\Http\Controllers\HandleDriver;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\RideBookingController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\rides\FranchiseRideController;
use App\Http\Controllers\rides\AdminRideController;
use App\Http\Controllers\rides\AdminCollectionController;
use App\Http\Controllers\rides\DriverSalaryController;
use App\Http\Controllers\rides\FranchiseSalaryController;
use App\Http\Controllers\rides\AdminSalaryController;



 Route::get('/', [FrontEndController::class, 'index']);
 Route::get('/about', [FrontEndController::class, 'about']);
 Route::get('/services', [FrontEndController::class, 'services']);
 Route::get('/contact', [FrontEndController::class, 'contact']);
 Route::get('/terms&conditions', [FrontEndController::class, 'terms']);
 Route::get('/privacy-policy', [FrontEndController::class, 'privacy_policy']);
 Route::get('/refund-policy', [FrontEndController::class, 'refund_policy']);
 Route::get('/giro/driver-details/{did}', [FrontEndController::class, 'driver_details']);
  Route::post('/enquiry-mail', [FrontEndController::class, 'enquiry_mail']);

 //////////////////////////////////

Route::get('/girokab-admin', [AdminController::class, 'home'])->name('admin.home');
//Route::get('/admin', [AdminController::class, 'home'])->name('admindash.home');
Route::get('/AdminPage', [AdminController::class, 'home'])->name('admin.home1');
Route::get('/forgot-password', [AdminController::class, 'forgot_password']);
Route::post('/AdminMailChk' , [AdminController::class, 'admin_mail_chk']);
Route::get('/admin-password-reset/{tk}/{em}', [AdminController::class, 'admin_password_reset']);
Route::post('/adminpsw-reset' , [AdminController::class, 'adminpsw_reset']);
Route::post('/AdminLogin' , [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['AdminLoginCheck','PreventBack'])->group(function () {

  Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
  Route::get('/change-password', [AdminController::class, 'change_password']);
  Route::post('/password-update', [AdminController::class, 'password_update']);
  Route::get('/admin-profile', [AdminController::class, 'admin_profile']);
  Route::get('/edit-admin-profile', [AdminController::class, 'edit_admin_profile']);
  Route::post('/admin-profile-update', [AdminController::class, 'admin_profile_update']);

  Route::get('/girokab-admin/driver-search/{did}', [AdminController::class, 'driver_search']);
   Route::get('/girokab-admin/invalid-driver' , [AdminController::class, 'invalid_driver']);

 Route::get('/fee-details', [AdminController::class, 'fee_details']);
 Route::post('/driver-regfee-edit', [AdminController::class, 'driver_regfee_edit']);
  Route::post('/driver-renewfee-edit', [AdminController::class, 'driver_renewfee_edit']);
   Route::post('/driver-per-edit', [AdminController::class, 'driver_per_edit']);
    Route::post('/tax-edit', [AdminController::class, 'tax_edit']);
    Route::post('/frpr-edit', [AdminController::class, 'frpr_edit']);
     Route::post('/nightride-edit', [AdminController::class, 'nightride_edit']);


    
  Route::get('/vehicle-categories', [AdminController::class, 'vehicle_categories']);
  Route::get('/add-vehicle-category', [AdminController::class, 'add_vehicle_category']);
  Route::get('/edit-vehicle-category/{vid}', [AdminController::class, 'edit_vehicle_category']);
  Route::post('/vehicle-category-add', [AdminController::class, 'vehicle_category_add']);
  Route::post('/vehicle-category-edit', [AdminController::class, 'vehicle_category_edit']);
  Route::post('/block-category', [AdminController::class, 'block_category']);
  Route::post('/activate-category', [AdminController::class, 'activate_category']);
  Route::get('/fare-histories/{vid}', [AdminController::class, 'fare_histories']);

  Route::get('/vehicle-types/{vcat}', [AdminController::class, 'vehicle_types']);
  Route::get('/add-vehicletype/{vcat}', [AdminController::class, 'vehicle_typesadd']);
  Route::post('/vehicle-type-add', [AdminController::class, 'vehicle_type_add']);
  Route::get('/edit-vehicletype/{vtype}', [AdminController::class, 'vehicle_typesedit']);
  Route::post('/vehicle-type-edit', [AdminController::class, 'vehicle_type_edit']);
  //Route::post('/vehicle-fare-edit', [AdminController::class, 'vehicle_fare_edit']);
  Route::post('/block-type', [AdminController::class, 'block_type']);
  Route::post('/activate-type', [AdminController::class, 'activate_type']);

  Route::get('/vehicle-models/{vid}', [AdminController::class, 'vehicle_models']);
  Route::post('/vehicle-model-add', [AdminController::class, 'vehicle_model_add']);
  Route::post('/vehicle-model-edit', [AdminController::class, 'vehicle_model_edit']);
  Route::post('/block-model', [AdminController::class, 'block_model']);
  Route::post('/activate-model', [AdminController::class, 'activate_model']);

  Route::get('/add-franchise', [HandleFranchise::class, 'add_franchise']);
  Route::post('/franchise-add', [HandleFranchise::class, 'franchise_add']);

  Route::get('/edit-franchise/{fid}', [HandleFranchise::class, 'edit_franchise']);
  Route::post('/franchise-update', [HandleFranchise::class, 'franchise_update']);

  Route::get('/franchise-area', [HandleFranchise::class, 'franchise_area']);
  Route::get('/active-franchise', [HandleFranchise::class, 'active_franchise']);
  Route::get('/franchise-details/{fid}', [HandleFranchise::class, 'franchise_details']);
  Route::post('/renew-franchise', [HandleFranchise::class, 'renew_franchise']);
  Route::post('/block-franchise', [HandleFranchise::class, 'block_franchise']);

  Route::get('/blocked-franchise', [HandleFranchise::class, 'blocked_franchise']);
  Route::get('/blockedfranchise-details/{fid}', [HandleFranchise::class, 'blockedfranchise_details']);
  Route::post('/activate-franchise', [HandleFranchise::class, 'activate_franchise']);

  Route::get('/expired-franchise', [HandleFranchise::class, 'expired_franchise']);
  Route::get('/expiredfranchise-details/{fid}', [HandleFranchise::class, 'expiredfranchise_details']);

  Route::get('/advertisement', [AdvertisementController::class, 'advertisement']);
  Route::get('/all-advertisements', [AdvertisementController::class, 'all_advertisement']);
  Route::get('/blocked-advertisement', [AdvertisementController::class, 'blocked_advertisement']);
  Route::get('/add-advertisement', [AdvertisementController::class, 'add_advertisement']);
  Route::post('/advertisement-add', [AdvertisementController::class, 'advertisement_add']);
  Route::post('/block-ads', [AdvertisementController::class, 'block_ads']);
  Route::post('/activate-ads', [AdvertisementController::class, 'activate_ads']);
  Route::post('/delete-ads', [AdvertisementController::class, 'delete_ads']);
  Route::get('/edit-advertisement/{aid}', [AdvertisementController::class, 'edit_advertisement']);
  Route::get('/edit-advertisements/{aid}', [AdvertisementController::class, 'edit_advertisements']);
  Route::post('/advertisement-edit', [AdvertisementController::class, 'advertisement_edit']);

  Route::get('/girokab-admin/drivers-final-approval', [DriverController::class, 'drivers_final_approval']);  
  Route::get('/girokab-admin/driver-final-approval/{did}', [DriverController::class, 'driver_final_approval']);
  Route::post('/reject-driver-profile', [DriverController::class, 'reject_driver_profile']);

  Route::post('/approve-driver-profile', [DriverController::class, 'approve_driver_profile']); 
  Route::get('/approve-driver', [DriverController::class, 'approve_driver']);  

  Route::get('/girokab-admin/driver-profile-updates', [DriverController::class, 'driver_profile_updates']);
  Route::get('/admin/driver-document-verify/{pid}', [DriverController::class, 'driver_document_verify']); 

  Route::get('/girokab-admin/driver-account-renewal', [DriverController::class, 'driver_account_renewal']);
  Route::post('/girokab-admin/reject-renewal-req', [DriverController::class, 'reject_renewal_req']);
  Route::get('/girokab-admin/rejected-renewals', [DriverController::class, 'rejected_renewals']);
  Route::post('/girokab-admin/restore-renewal', [DriverController::class, 'restore_renewal']);
  Route::post('/girokab-admin/approve-renewal', [DriverController::class, 'approve_renewal']);

  Route::post('/admin/reject-driverdoc', [DriverController::class, 'reject_driverdoc']); 
  Route::post('/admin/rc-reapproval', [DriverController::class, 'rc_reapproval']);
  Route::post('/admin/license-reapproval', [DriverController::class, 'license_reapproval']); 
  Route::post('/admin/license-reapprovalback', [DriverController::class, 'license_reapprovalback']); 
  Route::post('/admin/insurance-reapproval', [DriverController::class, 'insurance_reapproval']); 
  Route::post('/admin/pollution-reapproval', [DriverController::class, 'pollution_reapproval']); 
  Route::post('/admin/permit-reapproval', [DriverController::class, 'permit_reapproval']); 

  //////////////////
  Route::get('/girokab-admin/franchise-drivers/{fid}', [HandleFranchise::class, 'franchise_drivers']);

  Route::get('/girokab-admin/active-driver-profile/{did}', [HandleFranchise::class, 'active_driver_profile']);
  Route::post('/girokab-admin/deactivate-driver', [HandleFranchise::class, 'deactivate_driver']);
  Route::post('/girokab-admin/activate-driver', [HandleFranchise::class, 'activate_driver']);

  Route::get('/girokab-admin/driver-documents/{pid}', [HandleFranchise::class, 'driver_documents']);
  Route::get('/girokab-admin/driver-profile-rejections/{pid}', [HandleFranchise::class, 'driver_profile_rejections']);
  Route::get('/girokab-admin/driver-account-deactivations/{pid}', [HandleFranchise::class, 'driver_account_deactivations']);
  Route::get('/girokab-admin/driver-renewals-history/{pid}', [HandleFranchise::class, 'driver_renewals_history']);
  Route::get('/girokab-admin/driver-account-reactivations/{pid}', [HandleFranchise::class, 'driver_account_reactivations']);
  Route::get('/girokab-admin/driver-idcard-regenerations/{pid}', [HandleFranchise::class, 'driver_idcard_regenerations']);
  Route::get('/girokab-admin/driver-idcard-generation/{pid}', [HandleFranchise::class, 'driver_idcard_generation']);
 Route::get('/girokab-admin/driver-idcard-regenerate/{pid}/{reason}', [HandleFranchise::class, 'driver_idcard_regenerate']);
    Route::get('/girokab-admin/qrcode-generate/{pid}', [HandleFranchise::class, 'qrcode_generate']);




  Route::get('/girokab-admin/active-drivers/{fid}', [HandleFranchise::class, 'active_drivers']);
  Route::get('/girokab-admin/expired-drivers/{fid}', [HandleFranchise::class, 'expired_drivers']);
  Route::get('/girokab-admin/blocked-drivers/{fid}', [HandleFranchise::class, 'blocked_drivers']);
  Route::get('/girokab-admin/deactivated-drivers/{fid}', [HandleFranchise::class, 'deactivated_drivers']); 
  Route::get('/girokab-admin/self-deactivated-drivers/{fid}', [HandleFranchise::class, 'self_deactivated_drivers']);
  Route::get('/girokab-admin/admin-deactivated-drivers/{fid}', [HandleFranchise::class, 'admin_deactivated_drivers']);
  Route::get('/girokab-admin/reactivation-drivers-list/{fid}', [HandleFranchise::class, 'reactivation_drivers_list']);

  Route::get('/girokab-admin/rc-expiring-drivers/{fid}', [HandleFranchise::class, 'rc_expiring_drivers']);
  Route::get('/girokab-admin/license-expiring-drivers/{fid}', [HandleFranchise::class, 'license_expiring_drivers']);
  Route::get('/girokab-admin/insurance-expiring-drivers/{fid}', [HandleFranchise::class, 'insurance_expiring_drivers']);
  Route::get('/girokab-admin/pollution-expiring-drivers/{fid}', [HandleFranchise::class, 'pollution_expiring_drivers']);
  Route::get('/girokab-admin/permit-expiring-drivers/{fid}', [HandleFranchise::class, 'permit_expiring_drivers']);

  Route::get('/girokab-admin/rc-expired-drivers/{fid}', [HandleFranchise::class, 'rc_expired_drivers']);
  Route::get('/girokab-admin/license-expired-drivers/{fid}', [HandleFranchise::class, 'license_expired_drivers']);
  Route::get('/girokab-admin/insurance-expired-drivers/{fid}', [HandleFranchise::class, 'insurance_expired_drivers']);
  Route::get('/girokab-admin/pollution-expired-drivers/{fid}', [HandleFranchise::class, 'pollution_expired_drivers']);
  Route::get('/girokab-admin/permit-expired-drivers/{fid}', [HandleFranchise::class, 'permit_expired_drivers']);

  Route::get('/girokab-drivers/driver-area', [HandleDriver::class, 'driver_area']);

  Route::get('/girokab-drivers/active-drivers', [HandleDriver::class, 'active_drivers']);
  Route::get('/girokab-drivers/expired-drivers', [HandleDriver::class, 'expired_drivers']);
  Route::get('/girokab-drivers/blocked-drivers', [HandleDriver::class, 'blocked_drivers']);
  Route::get('/girokab-drivers/deactivated-drivers', [HandleDriver::class, 'deactivated_drivers']); 
  Route::get('/girokab-drivers/self-deactivated-drivers', [HandleDriver::class, 'self_deactivated_drivers']);
  Route::get('/girokab-drivers/admin-deactivated-drivers', [HandleDriver::class, 'admin_deactivated_drivers']);
  Route::get('/girokab-drivers/reactivation-drivers-list', [HandleDriver::class, 'reactivation_drivers_list']);

  Route::get('/girokab-drivers/rc-expiring-drivers', [HandleDriver::class, 'rc_expiring_drivers']);
  Route::get('/girokab-drivers/license-expiring-drivers', [HandleDriver::class, 'license_expiring_drivers']);
  Route::get('/girokab-drivers/insurance-expiring-drivers', [HandleDriver::class, 'insurance_expiring_drivers']);
  Route::get('/girokab-drivers/pollution-expiring-drivers', [HandleDriver::class, 'pollution_expiring_drivers']);
  Route::get('/girokab-drivers/permit-expiring-drivers', [HandleDriver::class, 'permit_expiring_drivers']);

  Route::get('/girokab-drivers/rc-expired-drivers', [HandleDriver::class, 'rc_expired_drivers']);
  Route::get('/girokab-drivers/license-expired-drivers', [HandleDriver::class, 'license_expired_drivers']);
  Route::get('/girokab-drivers/insurance-expired-drivers', [HandleDriver::class, 'insurance_expired_drivers']);
  Route::get('/girokab-drivers/pollution-expired-drivers', [HandleDriver::class, 'pollution_expired_drivers']);
  Route::get('/girokab-drivers/permit-expired-drivers', [HandleDriver::class, 'permit_expired_drivers']);


  //////////////////

   Route::get('/girokab-admin/customer-area', [CustomerBasicController::class, 'customer_area']);

   Route::get('/girokab-admin/normal-customers', [CustomerBasicController::class, 'normal_customers']);
   Route::get('/girokab-admin/disabled-customers', [CustomerBasicController::class, 'disabled_customers']);
   Route::get('/girokab-admin/blocked-customers', [CustomerBasicController::class, 'blocked_customers']);

   Route::get('/girokab-admin/disability-certificates', [CustomerBasicController::class, 'disability_certificates']);
   Route::post('/girokab-admin/reject-disability-doc', [CustomerBasicController::class, 'reject_disability_doc']); 
   Route::get('/girokab-admin/rejected-disability-certificates', [CustomerBasicController::class, 'rejected_disability_certificates']);
    Route::post('/girokab-admin/restore-disability-doc', [CustomerBasicController::class, 'restore_disability_doc']); 
  Route::post('/girokab-admin/approve-disability-doc', [CustomerBasicController::class, 'approve_disability_doc']);

  Route::get('/girokab-admin/customer-profile/{did}', [CustomerBasicController::class, 'customer_profile']);
    Route::post('/girokab-admin/block-customer', [CustomerBasicController::class, 'block_customer']);
  Route::post('/girokab-admin/activate-customer', [CustomerBasicController::class, 'activate_customer']);
  Route::post('/girokab-admin/customer-rides-history', [CustomerBasicController::class, 'customer_rides_history']);

////////////////
Route::post('/girokab-admin/driver-rides-history', [AdminRideController::class, 'driver_ride_history']);
Route::get('/girokab-admin/rides-details/{bid}', [AdminRideController::class, 'rides_details']);
Route::get('/girokab-admin/ride-details/{bid}', [AdminRideController::class, 'ride_details']);
Route::get('/girokab-admin/completed-driver-rides/{did}', [AdminRideController::class, 'completed_driver_rides']);
Route::get('/girokab-admin/rejected-driver-rides/{did}', [AdminRideController::class, 'rejected_driver_rides']);
Route::get('/girokab-admin/timeout-driver-rides/{did}', [AdminRideController::class, 'timeout_driver_rides']);

Route::post('/girokab-admin/rides-history', [AdminRideController::class, 'ride_history']);
Route::get('/girokab-admin/completed-mrides/{fid}', [AdminRideController::class, 'completed_mrides']);
Route::get('/girokab-admin/rejected-mrides/{fid}', [AdminRideController::class, 'rejected_mrides']);
Route::get('/girokab-admin/cancelled-mrides/{fid}', [AdminRideController::class, 'cancelled_mrides']);
Route::get('/girokab-admin/timeout-mrides/{fid}', [AdminRideController::class, 'timeout_mrides']);

Route::post('/girokab-admin/division-collection-history', [AdminRideController::class, 'division_collection_history']);
Route::get('/girokab-admin/completed-colrides/{fdt}/{fid}', [AdminRideController::class, 'completed_colrides']);

////////////////

Route::get('/girokab-admin/todays-bookings/{type}', [AdminCollectionController::class, 'todays_rides']);
Route::get('/girokab-admin/all-bookings-filter', [AdminCollectionController::class, 'all_bookings_filter']);
Route::post('/girokab-admin/allrides-history', [AdminCollectionController::class, 'allride_history']);
Route::get('/girokab-admin/completed-all-mrides', [AdminCollectionController::class, 'completed_mrides']);
Route::get('/girokab-admin/rejected-all-mrides', [AdminCollectionController::class, 'rejected_mrides']);
Route::get('/girokab-admin/cancelled-all-mrides', [AdminCollectionController::class, 'cancelled_mrides']);
Route::get('/girokab-admin/timeout-all-mrides', [AdminCollectionController::class, 'timeout_mrides']);

Route::get('/girokab-admin/todays-collection', [AdminCollectionController::class, 'todays_collection']);
Route::get('/girokab-admin/driver-rides/{did}', [AdminCollectionController::class, 'driver_rides']);
Route::get('/girokab-admin/all-collection-filter', [AdminCollectionController::class, 'all_collection_filter']);

Route::post('/girokab-admin/driver-collection-history', [AdminCollectionController::class, 'driver_collection_history']);
Route::get('/girokab-admin/driver-rides-list/{did}/{dt}', [AdminCollectionController::class, 'driver_rides_list']);

Route::get('/girokab-admin/all-collection', [AdminCollectionController::class, 'all_collection']);
Route::post('/girokab-admin/all-collection-history', [AdminCollectionController::class, 'all_collection_history']);

Route::get('/girokab-admin/offline-payments', [AdminCollectionController::class, 'offline_payments']);
Route::post('/offline-pay-approval', [AdminCollectionController::class, 'offline_pay_approve']);

/////////////////


Route::post('/driver-salary-pay', [DriverSalaryController::class, 'driver_salary_pay']);
Route::get('/girokab-admin/payments', [DriverSalaryController::class, 'payments']);
Route::post('/girokab-admin/driver-payments', [DriverSalaryController::class, 'driver_payments']);
Route::get('/girokab-admin/driver-paid-rides/{pid}', [DriverSalaryController::class, 'driver_rides_list']);
Route::post('/girokab-admin/drivers-payment', [DriverSalaryController::class, 'drivers_payment']);


Route::post('/franchise-salary-pay', [AdminSalaryController::class, 'franchise_salary_pay']);
Route::post('/girokab-admin/division-payments', [AdminSalaryController::class, 'division_payments']);









    
});




Route::get('/division-login', [FranchiseController::class, 'home'])->name('franchise.home');
Route::get('/division-forgot-password', [FranchiseController::class, 'forgot_password']);
Route::post('/DivisionMailChk' , [FranchiseController::class, 'division_mail_chk']);
Route::get('/division-password-reset/{tk}/{em}', [FranchiseController::class, 'division_password_reset']);
Route::post('/divisionpsw-reset' , [FranchiseController::class, 'divisionpsw_reset']);


Route::post('/FranchiseLogin' , [FranchiseController::class, 'login'])->name('franchise.login');


Route::middleware(['FranchiseLoginCheck','PreventBack'])->group(function () {
  Route::get('/unauthorized-access' , [FranchiseController::class, 'unauthorized_access']);
 
  Route::get('/franchise-dashboard', [FranchiseController::class, 'dashboard'])->name('franchise.dashboard');
    Route::get('/franchise-logout', [FranchiseController::class, 'logout'])->name('franchise.logout');
    Route::get('/franchise-change-password', [FranchiseController::class, 'franchise_change_password']);
    Route::post('/franchise-password-update', [FranchiseController::class, 'franchise_password_update']);

    Route::get('/franchise-profile', [FranchiseController::class, 'franchise_profile']);
    Route::get('/edit-franchise-profile', [FranchiseController::class, 'edit_franchise_profile']);
    Route::post('/franchise-profile-update', [FranchiseController::class, 'franchise_profile_update']);

    Route::get('/driver-search/{did}', [FranchiseController::class, 'driver_search']);

    Route::get('/franchise-division/new-drivers', [FranchiseController::class, 'new_drivers']);
    Route::get('/franchise-division/driver-profile-status/{did}', [FranchiseController::class, 'driver_profile_status']);
    Route::post('/franchise-division/reject-driver', [FranchiseController::class, 'reject_driver']);
    Route::get('/franchise-division/rejected-drivers', [FranchiseController::class, 'rejected_drivers']);

    Route::get('/franchise-division/driver-approval-pending', [FranchiseController::class, 'driver_approval_pending']);  
    Route::get('/franchise-division/driver-approval/{did}', [FranchiseController::class, 'driver_approval']);

     Route::post('/approve-pdet', [FranchiseController::class, 'approve_pdet']);
     Route::post('/approve-vdet', [FranchiseController::class, 'approve_vdet']);
     Route::post('/approve-dldet', [FranchiseController::class, 'approve_dldet']);
    Route::post('/approve-dldetback', [FranchiseController::class, 'approve_dldetback']);
     Route::post('/approve-rcdet', [FranchiseController::class, 'approve_rcdet']);
    Route::post('/approve-insdet', [FranchiseController::class, 'approve_insdet']);
    Route::post('/approve-pldet', [FranchiseController::class, 'approve_pldet']);
    Route::post('/approve-prdet', [FranchiseController::class, 'approve_prdet']);

    Route::post('/reject-pdet', [FranchiseController::class, 'reject_pdet']);
    Route::post('/reject-vdet', [FranchiseController::class, 'reject_vdet']);
    Route::post('/reject-lsdet', [FranchiseController::class, 'reject_lsdet']);
    Route::post('/reject-lsdetback', [FranchiseController::class, 'reject_lsdetback']);
    Route::post('/reject-rcdet', [FranchiseController::class, 'reject_rcdet']);
    Route::post('/reject-indet', [FranchiseController::class, 'reject_indet']);
    Route::post('/reject-pldet', [FranchiseController::class, 'reject_pldet']);
    Route::post('/reject-prdet', [FranchiseController::class, 'reject_prdet']);

    Route::post('/reject-for-resubmission', [FranchiseController::class, 'reject_for_resubmission']);
    Route::post('/send-for-approval', [FranchiseController::class, 'send_for_approval']);


Route::get('/driver-area', [FranchiseController::class, 'driver_area']);

Route::get('/active-drivers', [FranchiseController::class, 'active_drivers']);

Route::get('/active-driver-profile/{did}', [FranchiseController::class, 'active_driver_profile']);

Route::get('/rc-expiring-drivers', [FranchiseController::class, 'rc_expiring_drivers']);
Route::get('/license-expiring-drivers', [FranchiseController::class, 'license_expiring_drivers']);
Route::get('/insurance-expiring-drivers', [FranchiseController::class, 'insurance_expiring_drivers']);
Route::get('/pollution-expiring-drivers', [FranchiseController::class, 'pollution_expiring_drivers']);
Route::get('/permit-expiring-drivers', [FranchiseController::class, 'permit_expiring_drivers']);

Route::get('/rc-expired-drivers', [FranchiseController::class, 'rc_expired_drivers']);
Route::get('/license-expired-drivers', [FranchiseController::class, 'license_expired_drivers']);
Route::get('/insurance-expired-drivers', [FranchiseController::class, 'insurance_expired_drivers']);
Route::get('/pollution-expired-drivers', [FranchiseController::class, 'pollution_expired_drivers']);
Route::get('/permit-expired-drivers', [FranchiseController::class, 'permit_expired_drivers']);

Route::post('/block-driver', [FranchiseController::class, 'block_driver']);
Route::get('/blocked-drivers', [FranchiseController::class, 'blocked_drivers']);
Route::get('/deactivated-drivers', [FranchiseController::class, 'deactivated_drivers']);
Route::get('/self-deactivated-drivers', [FranchiseController::class, 'self_deactivated_drivers']);
Route::get('/admin-deactivated-drivers', [FranchiseController::class, 'admin_deactivated_drivers']);
Route::get('/reactivation-drivers-list', [FranchiseController::class, 'reactivation_drivers_list']);

Route::post('/activate-driver', [FranchiseController::class, 'activate_driver']);
Route::post('/deactivate-driver', [FranchiseController::class, 'deactivate_driver']);
Route::post('/reactivate-driver', [FranchiseController::class, 'reactivate_driver']);
Route::post('/reactivate-driver-req', [FranchiseController::class, 'reactivate_driver_req']);
Route::post('/deactivate-driver-req', [FranchiseController::class, 'deactivate_driver_req']);

Route::get('/documents-reuploads', [FranchiseController::class, 'driver_profile_updates']);
Route::get('/rejected-documents', [FranchiseController::class, 'driver_rejprofile_updates']);
Route::get('/driver-document-verify/{pid}', [FranchiseController::class, 'driver_document_verify']);

Route::post('/send-for-docapproval', [FranchiseController::class, 'send_for_docapproval']);
Route::post('/reject-driverdoc', [FranchiseController::class, 'reject_driverdoc']);

Route::get('/driver-documents/{pid}', [FranchiseController::class, 'driver_documents']);
Route::get('/driver-profile-rejections/{pid}', [FranchiseController::class, 'driver_profile_rejections']);
Route::get('/driver-renewals-history/{pid}', [FranchiseController::class, 'driver_renewals_history']);
Route::get('/driver-account-deactivations/{pid}', [FranchiseController::class, 'driver_account_deactivations']);
Route::get('/driver-account-reactivations/{pid}', [FranchiseController::class, 'driver_account_reactivations']);

Route::get('/expired-drivers', [FranchiseController::class, 'expired_drivers']);

Route::get('/register-driver', [FranchiseController::class, 'register_driver']);
Route::get('/add-driver', [FranchiseController::class, 'add_driver']);
Route::post('/driver-add', [FranchiseController::class, 'driver_add']);
Route::get('/driver-profile-add/{pid}', [FranchiseController::class, 'driver_profile_add']);
Route::post('/get-type', [FranchiseController::class, 'get_type']);

Route::post('/add-driver-pdetails', [FranchiseController::class, 'add_driver_pdetails']);
Route::post('/add-driver-vdetails', [FranchiseController::class, 'add_driver_vdetails']);
Route::post('/add-driver-docs', [FranchiseController::class, 'add_driver_docs']);
Route::post('/driver-profile-submit', [FranchiseController::class, 'driver_profile_submit']);


////////////////////////////////

Route::get('/online-drivers', [FranchiseRideController::class, 'online_drivers']);
Route::get('/offline-drivers', [FranchiseRideController::class, 'offline_drivers']);


////////////////


Route::get('/todays-bookings/{type}', [FranchiseRideController::class, 'todays_rides']);
Route::get('/all-bookings-filter', [FranchiseRideController::class, 'all_bookings_filter']);
Route::post('/rides-history', [FranchiseRideController::class, 'ride_history']);
Route::get('/ride-details/{bid}', [FranchiseRideController::class, 'ride_details']);
Route::get('/rides-details/{bid}', [FranchiseRideController::class, 'rides_details']);
Route::post('/driver-rides-history', [FranchiseRideController::class, 'driver_ride_history']);

Route::get('/completed-mrides', [FranchiseRideController::class, 'completed_mrides']);
Route::get('/rejected-mrides', [FranchiseRideController::class, 'rejected_mrides']);
Route::get('/cancelled-mrides', [FranchiseRideController::class, 'cancelled_mrides']);
Route::get('/timeout-mrides', [FranchiseRideController::class, 'timeout_mrides']);

Route::get('/completed-driver-rides/{did}', [FranchiseRideController::class, 'completed_driver_rides']);
Route::get('/rejected-driver-rides/{did}', [FranchiseRideController::class, 'rejected_driver_rides']);
Route::get('/timeout-driver-rides/{did}', [FranchiseRideController::class, 'timeout_driver_rides']);

Route::get('/todays-collection', [FranchiseRideController::class, 'todays_collection']);
Route::get('/all-collection-filter', [FranchiseRideController::class, 'all_collection_filter']);
Route::get('/driver-rides/{did}', [FranchiseRideController::class, 'driver_rides']);
Route::get('/division-collection', [FranchiseRideController::class, 'division_collection']);

Route::post('/driver-collection-history', [FranchiseRideController::class, 'driver_collection_history']);
Route::post('/division-collection-history', [FranchiseRideController::class, 'division_collection_history']);
Route::get('/completed-colrides/{fdt}', [FranchiseRideController::class, 'completed_colrides']);
Route::get('/offline-payments', [FranchiseRideController::class, 'offline_payments']);
Route::post('/offline-pay-approve', [FranchiseRideController::class, 'offline_pay_approve']);


Route::post('/drivers-payment', [FranchiseSalaryController::class, 'drivers_payment']);
Route::get('/driver-paid-rides/{pid}', [FranchiseSalaryController::class, 'driver_rides_list']);

Route::get('/payments', [FranchiseSalaryController::class, 'payments']);


    });


