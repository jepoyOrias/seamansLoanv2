<?php

use App\Http\Controllers\Auth\CreateAdminController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\RequirementsController;
use App\Models\LoanInformation;
use App\Models\Repayment;
use Illuminate\Foundation\Application;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'pendingApplications'=>LoanInformation::where('status_id', '<',5)->get()->count(),
        'applications'=>LoanInformation::count(),
        'releasedApplications'=>LoanInformation::where('status_id', 8)->orWhere('status_id' , 5)->get()->count(),
    ]);
})->name("home");

Route::get('/search-reference', [LoanController::class, 'searchByReference'])->name('search.reference');
Route::get('/privacy-policy', function (){
    return Inertia::render('PrivacyPolicy',
    ['canLogin' => true,]
);
})->name('privacy.policy');

Route::get('/dashboard', [LoanController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('loans', [LoanController::class, 'store']);
Route::patch('loans/${id}', [LoanController::class, 'update']);

Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('add-receipt', [RepaymentController::class, 'storeReceipt'])->name('store.receipt');
});



Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('initial-application',[LoanController::class, 'initialApplication'])->name('initialApplication');
    Route::get('information-verification',[LoanController::class, 'informationVerification'])->name('informationVerification');
    Route::get('for-interview',[LoanController::class, 'forInterview'])->name('forInterview');
    Route::get('for-approval',[LoanController::class, 'forApproval'])->name('forApproval');
    Route::get('approved',[LoanController::class, 'approved'])->name('approved');
    Route::get('declined',[LoanController::class, 'declined'])->name('declined');
    Route::get('for-releasing',[LoanController::class, 'releasing'])->name('releasing');
    Route::get('released',[LoanController::class, 'released'])->name('released');
    Route::post('/send-email-notification',[NotificationController::class, 'sendEmailNotification'])->name('sendInformationVerificationEmail');
    Route::post('/download-application',[PdfController::class, 'generatePDF'])->name('downloadApplication');
    Route::post('/admin/register', [CreateAdminController::class, 'store'])->name('admin.register');
    Route::post('/approved-receipt',[RepaymentController::class, 'approveReceipt'])->name('approveReceipt');
    Route::get('/loan/{personal_information_id}/requirements/download', [RequirementsController::class, 'downloadUserRequirements'])
    ->name('loan.requirements.download');
    
    Route::delete('/loans/{id}', [LoanController::class, 'delete']);
});

require __DIR__.'/auth.php';
