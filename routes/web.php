<?php

use App\Livewire\AppStatus;
use App\Livewire\ConsentForm;
use App\Livewire\ChecklistForm;
use App\Livewire\Form1;
use App\Livewire\Form2;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\UserDashboard;
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
Route::get('/application-form', Form1::class)->middleware('isLoggedIn');
Route::get('/project-information-form', Form2::class)->middleware('isLoggedIn');
Route::get('/app-status', AppStatus::class)->middleware('isLoggedIn');
Route::get('/checklist-form', ChecklistForm::class)->middleware('isLoggedIn');
Route::get('/information-consent-form', ConsentForm::class)->middleware('isLoggedIn');


