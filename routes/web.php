<?php

use App\Livewire\AdminDashboard;
use App\Livewire\ApplicationForm;
use App\Livewire\ApplicationFormShow;
use App\Livewire\AppStatus;
use App\Livewire\ConsentForm;
use App\Livewire\ChecklistForm;
use App\Livewire\ChecklistFormShow;
use App\Livewire\ConsentFormShow;
use App\Livewire\ProjectInformationForm;
use App\Livewire\ProjectInformationFormShow;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\UserDashboard;
use App\Models\AppStatus as ModelsAppStatus;
use Illuminate\Support\Facades\Route;


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

Route::get('/', Login::class);


Route::get('/register', Register::class);
Route::get('/user-dashboard', UserDashboard::class)->name('user-dashboard')->middleware('isLoggedIn');
Route::get('/admin-dashboard', AdminDashboard::class)->name('admin-dashboard')->middleware('isLoggedIn')->middleware('isAdmin');
Route::get('/application-form', ApplicationForm::class)->middleware('isLoggedIn');
Route::get('/project-information-form', ProjectInformationForm::class)->middleware('isLoggedIn');
Route::get('/app-status', AppStatus::class)->middleware('isLoggedIn');
Route::get('/checklist-form', ChecklistForm::class)->middleware('isLoggedIn');
Route::get('/information-consent-form', ConsentForm::class)->middleware('isLoggedIn');

// Route::get('/forms/{formType}/{formId}', AppStatus::class);
Route::get('/show/project-information-form/{formId}', ProjectInformationFormShow::class)->name('project-information-form-show')->middleware('isLoggedIn');
Route::get('/show/application-form/{formId}', ApplicationFormShow::class)->name('application-form-show')->middleware('isLoggedIn');
Route::get('/show/checklist/{formId}', ChecklistFormShow::class)->name('checklist-form-show')->middleware('isLoggedIn');
Route::get('/show/information-consent-form/{formId}', ConsentFormShow::class)->name('consent-form-show')->middleware('isLoggedIn');

