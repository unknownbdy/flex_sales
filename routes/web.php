<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CoursesVideoController;
use App\Http\Controllers\Admin\HandPickedController;
use App\Http\Controllers\Admin\InstagramVideoController;
use App\Http\Controllers\Admin\LiveVideoController;
use App\Http\Controllers\Admin\TestimonialVideoController;
use App\Http\Controllers\Admin\ChallengeController;
use App\Http\Controllers\Admin\PodcastVideoController;
use App\Http\Controllers\Admin\TvInterviewVideoController;
use App\Http\Controllers\Admin\TvShowVideoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\MoodController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModualController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginSecurityController;
use App\Http\Controllers\UserReport;
use App\Models\handpicked\HandPicked;
use App\Models\Instagram\InstagramVideo;
use App\Models\Instagram\InstagramVideoLink;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\ContactUsController;

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


Auth::routes();
Route::get('events', [EventController::class, 'eventData']);
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'XSS', '2fa',]);

Route::post('/chart', [HomeController::class, 'chart'])->name('get.chart.data')->middleware(['auth', 'XSS',]);

Route::get('notification', [HomeController::class, 'notification']);

Route::group(['middleware' => ['auth', 'XSS']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('preferences', PreferencesController::class);
    Route::resource('users', UserController::class);
    Route::resource('mood', MoodController::class);
    // FAQs routes
    Route::resource('faqs', FaqsController::class);

    // Contact Us routes
    Route::resource('contactus', ContactUsController::class);


    Route::get('UserReport', [UserReport::class, 'index'])->name('UserReport.course');
    Route::post('UserReportSearch', [UserReport::class, 'UserReportSearch']);

    Route::get('UserChallenge', [UserReport::class, 'UserChallenge'])->name('UserChallenge.challenge');
    Route::post('UserChallengeSearch', [UserReport::class, 'UserChallengeSearch'])->name('UserChallenge.UserChallengeSearch');


    Route::get('UserMoodReport', [UserReport::class, 'UserMoodReport'])->name('UserMoodReport.userMood');
    Route::post('UserMoodReportSearch', [UserReport::class, 'UserMoodReportSearch']);

    Route::resource('permission', PermissionController::class);
    Route::resource('modules', ModualController::class);

    //Pages
    Route::resource('pages', PageController::class);
    //About
    Route::resource('about', AboutController::class);
    // Route::resource('jon', AboutController::class);
    Route::resource('quote', QuoteController::class);
});

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'XSS']);

Route::post('/role/{id}', [RoleController::class, 'assignPermission'])->name('roles_permit')->middleware(['auth', 'XSS']);

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('setting/email-setting', [SettingController::class, 'getmail'])->name('settings.getmail');
        Route::post('setting/email-settings_store', [SettingController::class, 'saveEmailSettings'])->name('settings.emails');

        Route::get('setting/datetime', [SettingController::class, 'getdate'])->name('datetime');
        Route::post('setting/datetime-settings_store', [SettingController::class, 'saveSystemSettings'])->name('settings.datetime');

        Route::get('setting/logo', [SettingController::class, 'getlogo'])->name('getlogo');
        Route::post('setting/logo_store', [SettingController::class, 'store'])->name('settings.logo');
        Route::resource('settings', SettingController::class);

        Route::get('test-mail', [SettingController::class, 'testMail'])->name('test.mail');
        Route::post('test-mail', [SettingController::class, 'testSendMail'])->name('test.send.mail');
    }
);

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);

Route::post('edit-profile', [UserController::class, 'editprofile'])->name('update.profile')->middleware(['auth', 'XSS']);

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
        Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
        Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
        Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy');
        Route::get('language', [LanguageController::class, 'index'])->name('index');
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder')->middleware(['auth', 'XSS',]);

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template')->middleware(['auth', 'XSS',]);

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template')->middleware(['auth', 'XSS',]);

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate')->middleware(['auth', 'XSS',]);

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback')->middleware(['auth', 'XSS',]);

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file')->middleware(['auth', 'XSS',]);

Route::group(['prefix' => '2fa'], function () {
    Route::get('/', [UserController::class, 'profile'])->name('2fa')->middleware(['auth', 'XSS',]);
    Route::post('/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret')->middleware(['auth', 'XSS',]);
    Route::post('/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa')->middleware(['auth', 'XSS',]);
    Route::post('/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa')->middleware(['auth', 'XSS',]);

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');


//Custom routes
   Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('Course-video', CoursesVideoController::class);
        Route::get('Course-video/{id}/add-links', [CoursesVideoController::class, 'createLinks'])->name('Course-video.createlinks');
        Route::post('Course-video/{id}/add-lisks', [CoursesVideoController::class, 'addlinks'])->name('Course-video.addlink');
        Route::get('Course-video/{id}/showlink',[CoursesVideoController::class, 'showlink'])->name('Course-video.showlinks');
        Route::get('Course-video/{id}/delete1', [CoursesVideoController::class, 'destroyLang'])->name('Course-video.destroy-custom');
        Route::get('Course-video/{id}/edit-link', [CoursesVideoController::class, 'editlink'])->name('Course-video.editlink');
        Route::post('Course-video/{id}/updatelink', [CoursesVideoController::class, 'updatelink'])->name('Course-video.updatelink');
        Route::get('Course-video/{id}/restore', [CoursesVideoController::class, 'restoreLink'])->name('Course-video.restore');



    }
   );


   Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('Show-event', EventController::class);
        Route::get('Show-event/{id}/delete1', [EventController::class, 'destroyLang'])->name('Show-event.destroy-custom');
        Route::get('Show-event/{id}/restore', [EventController::class, 'restoreLink'])->name('Show-event.restore');


    }
   );

   Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('live-video', LiveVideoController::class);
    }
   );
   Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('instagram-video', InstagramVideoController::class);
        Route::get('instagram-video/{id}/add-links', [InstagramVideoController::class, 'createLinks'])->name('instgram-video.createlinks');
        Route::post('instagram-video/{id}/add-lisks', [InstagramVideoController::class, 'addlinks'])->name('instagram-video.addlink');
        Route::get('instagram-video/{id}/showlink',[InstagramVideoController::class, 'showlink'])->name('instagram-video.showlinks');
        Route::get('instagram-video/{id}/delete', [InstagramVideoController::class, 'destroyLang'])->name('instgram-video.destroy');
        Route::get('instagram-video/{id}/edit-link', [InstagramVideoController::class, 'editlink'])->name('instagram-video.editlink');
        Route::post('instagram-video/{id}/updatelink', [InstagramVideoController::class, 'updatelink'])->name('instagram-video.updatelink');
     }
 );
 Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('testimonial-video', TestimonialVideoController::class);
    }
);
Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('podcast-video', PodcastVideoController::class);
        Route::delete('podcast-video/{id}/delete', [PodcastVideoController::class, 'destroy_episode'])->name('podcast-video.destroy');
        Route::get('podcast-video/{id}/restore', [PodcastVideoController::class, 'restore_episode'])->name('podcast-video.restore');
    }
);
Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('tvinterview-video', TvInterviewVideoController::class);
    }
);
Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('tvshow-video', TvShowVideoController::class);
    }
);
Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('HandPicked', HandPickedController::class);
    }
);
Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('/collections', [CollectionController::class, 'collections'])->name('collections.collection');
        // Handle form submissions to update the collection
        Route::post('/collections', [CollectionController::class, 'storeCollection'])->name('collections.store');
    }
);

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::resource('Challenge', ChallengeController::class);
        Route::get('Challenge/{id}/add-links', [ChallengeController::class, 'createLinks'])->name('Challenge.createlinks');
        Route::post('Challenge/{id}/add-lisks', [ChallengeController::class, 'addlinks'])->name('Challenge.addlink');
        Route::get('Challenge/{id}/showlink',[ChallengeController::class, 'showlink'])->name('Challenge.showlinks');
        Route::get('Challenge/{id}/delete', [ChallengeController::class, 'destroyLang'])->name('Challenge.delete');
        Route::get('Challenge/{id}/restore', [ChallengeController::class, 'restoreLink'])->name('Challenge.restore');
        Route::get('Challenge/{id}/edit-link', [ChallengeController::class, 'editlink'])->name('Challenge.editlink');
        Route::post('Challenge/{id}/updatelink', [ChallengeController::class, 'updatelink'])->name('Challenge.updatelink');



     }
 );
});






































Route::resource('tests', App\Http\Controllers\TestController::class)->middleware(['auth', 'XSS']);




















































































































































































































































































































































