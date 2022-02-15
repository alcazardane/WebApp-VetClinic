<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\VetStaffController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\VaxRecordsController;
use App\Http\Controllers\HealthRecordsController;
use App\Http\Controllers\GroomingRecordsController;
use App\Http\Controllers\ClientCredentialsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PublicPostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\ReqRecordController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\GroomingHistoryController;
use App\Http\Controllers\GroomingHistoryDocController;
use App\Http\Controllers\VaxHistoryController;
use App\Http\Controllers\VaxHistoryDocController;
use App\Http\Controllers\SurgicalRecordsController;
use App\Http\Controllers\ConsultationRecordsController;
use App\Http\Controllers\ConsultationHistoryController;
use App\Http\Controllers\SurgicalHistoryController;
use App\Http\Controllers\SurgicalHistoryDocController;
use App\Http\Controllers\ConsultationHistoryDocController;
use App\Http\Controllers\PublicRecordsController;
use App\Http\Controllers\PetProfileController;
use App\Http\Controllers\ArchiveController;
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

// * Home
Route::get('/', [PageController::class, 'index']);
// * Login
Route::get('/login', [PageController::class, 'login']);

// * Register
Route::get('/register', [PageController::class, 'register']);
Route::get('/user', [PageController::class, 'verify_user']);

Route::get('/helpful-articles', [PageController::class, 'helpfularticle']);
Route::get('/help', [PageController::class, 'help']);
Route::get('/help-page', [PageController::class, 'helppage']);

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
    // * Guess Appointment
    Route::get('/set-appointment', [PageController::class, 'guessAppointment']);
    Route::post('/guess-appointment-store', [PageController::class, 'guessAppointStore'])->name('page.guessappointstore');
    
    Route::get('client-profile/{id}', [ProfileController::class, 'clientindex']);
    Route::put('profile-pass/{id}', [ProfileController::class, 'updatepassword']);
    Route::resource('accprofile', ProfileController::class);
    
    Route::get('/home', [PageController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
    Route::put('reqrecords/make/{id}', [ReqRecordController::class, 'make'])->name('reqrecords.make');
    Route::get('reqrecords/{id}', [ReqRecordController::class, 'hide']);
    
    Route::post('publicrecords-store/{id}', [PublicRecordsController::class, 'store'])->name('pubrecords.store');
    Route::get('publicrecords-show/{id}', [PublicRecordsController::class, 'show'])->name('pubrecords.show');
    Route::get('publicrecords-destroy/{id}', [PublicRecordsController::class, 'destroy'])->name('pubrecords.destroy');
    
    Route::resource('petprofile', PetProfileController::class);
    Route::get('petprofile-destroy/{id}', [PetProfileController::class, 'destroy'])->name('petprofile.destroy');
    
    Route::resource('vaxhistory', VaxHistoryController::class);
});


// * Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // * Client
        Route::resource('clients', ClientsController::class);
        Route::put('/regtwo/store', [ClientCredentialsController::class, 'store']);
    // *--------------------

    // * Appointment
        Route::resource('appointment', AppointmentController::class);
        Route::get('/appointment-destroy/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
        Route::get('/appointment-archive/{id}', [AppointmentController::class, 'archive'])->name('appointment.archive');
    // *--------------------

    // * Vaccine Records
        Route::resource('vaxrecords', VaxRecordsController::class);
        Route::get('vaxrecords-destroy/{id}', [VaxRecordsController::class, 'destroy'])->name('vaxrecords.destroy');
        Route::get('vaxrecords-archive/{id}', [VaxRecordsController::class, 'archive'])->name('vaxrecords.archive');

        Route::get('vaxhistory-destroy/{id}', [VaxHistoryController::class, 'destroy'])->name('vaxhistory.destroy');

        Route::get('docxgenerate-vaccine/{id}', [VaxHistoryDocController::class, 'store'])->name('vaxhistorydoc.store');
    // *--------------------

    // * Health Records
        Route::resource('healthrecords', HealthRecordsController::class);
        Route::get('/healthrecords-destroy/{id}', [HealthRecordsController::class, 'destroy'])->name('healthrecords.destroy');
        Route::get('/healthrecords-archive/{id}', [HealthRecordsController::class, 'archive'])->name('healthrecords.archive');

        Route::resource('medicalhistory', MedicalHistoryController::class);
        Route::get('/healthrecords/medicalhistory-destroy/{id}', [MedicalHistoryController::class, 'destroy']);

        Route::resource('docxgenerator', DocumentController::class);
        Route::get('/docxgenerate/{id}', [DocumentController::class, 'store']);
    // *--------------------

    // * Grooming Routes
        Route::resource('groomingrecords', GroomingRecordsController::class);
        Route::get('groomingrecords-destroy/{id}', [GroomingRecordsController::class, 'destroy'])->name('groomingrecords.destroy');
        Route::get('groomingrecords-archive/{id}', [GroomingRecordsController::class, 'archive'])->name('groomingrecords.archive');

        Route::resource('groominghistory', GroomingHistoryController::class);
        Route::post('groominghistory/store', [GroomingHistoryController::class, 'store'])->name('groominghistory.store');
        Route::get('groominghistory/destroy/{id}', [GroomingHistoryController::class, 'destroy'])->name('groominghistory.destroy');

        Route::get('/docxgenerate-grooming/{id}', [GroomingHistoryDocController::class, 'store']);
    // *--------------------

    // * Staff and Vets
        Route::resource('vetstaff', VetStaffController::class);
        Route::get('/vetstaff-destroy/{id}', [VetStaffController::class, 'destroy'])->name('vetstaff.destroy');
        Route::get('/vetstaff-archive/{id}', [VetStaffController::class, 'archive'])->name('vetstaff.archive');
    // *--------------------

    // * userAdmin
    Route::resource('users', UserController::class);

    // * Posts
        Route::resource('posts', PostsController::class);
        Route::get('/posts-destroy/{id}', [PostsController::class, 'destroy']);
        Route::put('/posts-update/{id}', [PostsController::class, 'update']);
        Route::get('/posts-publish/{id}', [PostsController::class, 'publish']);
        Route::post('posts/upload', [PostsController::class, 'upload'])->name('ckeditor.image-upload');
    // *--------------------

    // * Public Posts
        Route::resource('publicposts', PublicPostsController::class);
        Route::get('/publicposts-hidepost/{id}', [PublicPostsController::class, 'hide']);
        Route::get('/publicposts-destroy/{id}', [PublicPostsController::class, 'destroy']);
    // *--------------------

    // * Profile
    Route::resource('profile', ProfileController::class);

    // * Email
    Route::get('send-email/{id}', [SendEmailController::class, 'RecordsEmail']);

    // * Requests
        Route::get('reqrecords', [ReqRecordController::class, 'index']);

    // * Surgical Routes
        Route::resource('surgicalrecords', SurgicalRecordsController::class);
        Route::get('surgicalrecords-destroy/{id}', [SurgicalRecordsController::class, 'destroy'])->name('surgicalrecords.destroy');
        Route::get('surgicalrecords-archive/{id}', [SurgicalRecordsController::class, 'archive'])->name('surgicalrecords.archive');

        Route::resource('surgicalhistory', SurgicalHistoryController::class);
        Route::get('surgicalhistory-destroy/{id}', [SurgicalHistoryController::class, 'destroy'])->name('surgicalhistory.destroy');

        Route::resource('surgicalhistorydoc', SurgicalHistoryDocController::class);
        Route::get('surgicalhistorydoc-docx/{id}', [SurgicalHistoryDocController::class, 'store'])->name('surgicalhistorydoc.store');
    // *--------------------

    // *Consultation Routes
        Route::resource('consultationrecords', ConsultationRecordsController::class);
        Route::get('consultationrecords-destroy/{id}', [ConsultationRecordsController::class, 'destroy']);
        Route::get('consultationrecords-archive/{id}', [ConsultationRecordsController::class, 'archive'])->name('consultationrecords.archive');

        Route::resource('consultationhistory', ConsultationHistoryController::class);
        Route::get('consultationhistory-destroy/{id}', [ConsultationHistoryController::class, 'destroy'])->name('consultationhistory.destroy');

        Route::resource('consultationhistorydoc', ConsultationHistoryDocController::class);
        Route::get('consultationhistorydoc-docx/{id}', [ConsultationHistoryDocController::class, 'store'])->name('consultationhistorydoc.store');
    // *--------------------

    // * Archive Routes
        Route::get('archive', [ArchiveController::class, 'index'])->name('archive.index');

        Route::get('archive/healthrecords', [ArchiveController::class, 'archealthrecords'])->name('archive.healthrecords');
        Route::get('archive/healthrecords/restore/{id}', [ArchiveController::class, 'activatehealthrecord'])->name('archive.restorehr');

        Route::get('archive/consultationrecords', [ArchiveController::class, 'arcconsultationrecords'])->name('archive.consultationrecords');
        Route::get('archive/consultationrecords/restore/{id}', [ArchiveController::class, 'activateconsultationrecord'])->name('archive.restorecr');

        Route::get('archive/vaxrecords', [ArchiveController::class, 'arcvaxrecords'])->name('archive.vaxrecords');
        Route::get('archive/vaxrecords/restore/{id}', [ArchiveController::class, 'activatevaxrecord'])->name('archive.restorevr');

        Route::get('archive/appointments', [ArchiveController::class, 'arcappointments'])->name('archive.appointments');
        Route::get('archive/appointments/restore/{id}', [ArchiveController::class, 'activateappointment'])->name('archive.restoreappointment');

        Route::get('archive/groomingrecords', [ArchiveController::class, 'arcgroomingrecords'])->name('archive.groomingrecords');
        Route::get('archive/groomingrecords/restore/{id}', [ArchiveController::class, 'activategroomingrecord'])->name('archive.restoregr');

        Route::get('archive/surgicalrecords', [ArchiveController::class, 'arcsurgicalrecords'])->name('archive.surgicalrecords');
        Route::get('archive/surgicalrecords/restore/{id}', [ArchiveController::class, 'activatesurgicalrecord'])->name('archive.restoresr');

        Route::get('archive/vetstaff', [ArchiveController::class, 'arcvetstaff'])->name('archive.vetstaff');
        Route::get('archive/vetstaff/restore/{id}', [ArchiveController::class, 'activatevetstaff'])->name('archive.restorevs');
    // *--------------------
});