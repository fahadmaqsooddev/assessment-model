<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\DimensionController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\ExtraQuestionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserResponsesController;
use App\Http\Controllers\Admin\ExtraQuestionResponsesController;

use App\Http\Controllers\SigninController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\UserMiddleware;

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SignupController;


//Categories Routes
// Route::get('/',function(\App\PaymentService\PaypalAPI $payment){
// 	//dd(app());
// 	dump($payment->pay());
// });


//Admin Login and Logout Routes
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'store']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::middleware(LoginMiddleware::class)->group(function () {

	//Dashboard Page Route 

	Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
	Route::get('/categories',[CategoryController::class,'index'])->name('categories');

	//Category Page Route

	Route::get('/add-category',[CategoryController::class,'create'])->name('add-category');
	Route::post('/add-category',[CategoryController::class,'store'])->name('storecategory');
	Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('edit-category');
	Route::post('/update-category',[CategoryController::class,'update'])->name('updatecategory');
	Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('delete-category');

	//Questions Routes

	Route::get('/questions',[QuestionController::class,'index'])->name('questions');
	Route::get('/add-question',[QuestionController::class,'create'])->name('add-question');
	Route::post('/add-question',[QuestionController::class,'store'])->name('storequestion');
	Route::get('/edit-question/{id}',[QuestionController::class,'edit'])->name('edit-question');
	Route::post('/update-question',[QuestionController::class,'update'])->name('updatequestion');
	Route::get('/delete-question/{id}',[QuestionController::class,'delete'])->name('delete-question');

	//Dimensions Routes

	Route::get('/dimensions',[DimensionController::class,'index'])->name('dimensions');
	Route::get('/add-dimension',[DimensionController::class,'create'])->name('add-dimension');
	Route::post('/add-dimension',[DimensionController::class,'store'])->name('storedimension');
	Route::get('/edit-dimension/{id}',[DimensionController::class,'edit'])->name('edit-dimension');
	Route::post('/update-dimension',[DimensionController::class,'update'])->name('updatedimension');
	Route::get('/delete-dimension/{id}',[DimensionController::class,'delete'])->name('delete-dimension');

	//Solution Routes

	Route::get('/solutions',[SolutionController::class,'index'])->name('solutions');
	Route::get('/add-solution',[SolutionController::class,'create'])->name('add-solution');
	Route::post('/add-solution',[SolutionController::class,'store'])->name('storesolution');
	Route::get('/edit-solution/{id}',[SolutionController::class,'edit'])->name('edit-solution');
	Route::post('/update-solution',[SolutionController::class,'update'])->name('updatesolution');
	Route::get('/delete-solution/{id}',[SolutionController::class,'delete'])->name('delete-solution');

	//ExtraQuestion Routes

	Route::get('/extra-questions',[ExtraQuestionController::class,'index'])->name('extra-questions');
	Route::get('/add-extra-question',[ExtraQuestionController::class,'create'])->name('add-extra-question');
	Route::post('/add-extra-question',[ExtraQuestionController::class,'store'])->name('storeextraquestion');
	Route::get('/edit-extra-question/{id}',[ExtraQuestionController::class,'edit'])->name('edit-extra-question');
	Route::post('/update-extra-question',[ExtraQuestionController::class,'update'])->name('updateextraquestion');
	Route::get('/delete-extra-question/{id}',[ExtraQuestionController::class,'delete'])->name('delete-extra-question');


	//Update Logo
	Route::get('/logo',[LogoController::class,'index'])->name('logo');
	Route::post('/updatelogo',[LogoController::class,'update'])->name('update_logo');

	//Update Profile

	Route::get('/profile',[ProfileController::class,'index'])->name('profile');
	Route::post('/updateprofile',[ProfileController::class,'update'])->name('update_profile');

	//User Routes
	Route::get('/users',[UserController::class,'index'])->name('users');

	//User Responses
	Route::get('/responses',[UserResponsesController::class,'index'])->name('responses');
	Route::get('/responsedetail/{token}',[UserResponsesController::class,'responsedetail']);
	Route::get('downloadpdf/{token}',[UserResponsesController::class,'downloadpdf'])->name('downloadpdf');

	//Extra Question Responses

	Route::get('/extraresponses',[ExtraQuestionResponsesController::class,'index'])->name('extraresponses');
	Route::get('/extraresponsedetail/{token}',[ExtraQuestionResponsesController::class,'extraresponsedetail']);
	Route::get('extradownloadpdf/{token}',[ExtraQuestionResponsesController::class,'extradownloadpdf'])->name('extradownloadpdf');

});



//User Register Routes
Route::get('/',[SignupController::class,'index']);
Route::post('/register',[SignupController::class,'signup'])->name('register');
Route::get('/email/verify/{token}', [SignupController::class, 'verify'])->name('verification.verify');


//Login Routes 

Route::get('/userlogin',[SigninController::class,'signin']);
Route::post('/userlogin',[SigninController::class,'login'])->name('userlogin');
Route::get('/userlogout',[SigninController::class,'logout'])->name('userlogout');
Route::middleware(UserMiddleware::class)->group(function(){
	Route::get('/userdashboard',[WebsiteController::class,'index']);
	Route::post('/userdashboard',[WebsiteController::class,'store']);
	Route::get('/userresponses',[WebsiteController::class,'responses']);
	Route::get('/userprofile',[WebsiteController::class,'profile']);
	Route::post('/userprofile',[WebsiteController::class,'updateprofile']);
	Route::get('/extraquestions',[WebsiteController::class,'extraquestions']);
	Route::post('/resextra',[WebsiteController::class,'extraquestionresponses']);
	//Route::get('/responsedetail/{token}',[WebsiteController::class,'responsedetail']);
});








//Route::get('/greet', [GreetingController::class, 'showGreeting']);
// Route::get('auth/google/callback',[SignupController::class,'googleHandle'])->name('user-dashboard');

// Route::get('auth/google',[SignupController::class,'redirect']);










