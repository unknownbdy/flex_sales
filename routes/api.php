<?php

use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CollectionController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\EnlightingChallengeController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\FaqsController;
use App\Http\Controllers\API\FollowAuthorController;
use App\Http\Controllers\API\HandpickedController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\TVShowController;
use App\Http\Controllers\API\PodcastController;
use App\Http\Controllers\API\LiveVideoController;
use App\Http\Controllers\API\InstagramVideoController;
use App\Http\Controllers\API\MoodController;
use App\Http\Controllers\API\QuoteController;
use App\Http\Controllers\API\RatingController;
use App\Http\Controllers\API\TestimonialVideoController;
use App\Http\Controllers\API\TVInterviewController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WishlistController;
use App\Http\Controllers\API\PreferencesController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', [AuthController::class, 'register']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/google/login', [AuthController::class, 'googleAuth']);
Route::get('/pages/{slug}', [PageController::class, 'show']);

//Forget password
Route::post('share-otp', [AuthController::class, 'shareOTP']);
Route::post('verify-otp', [AuthController::class, 'verifyOTP']);


Route::post('verify-otp-forgetpass', [AuthController::class, 'verifyOTPForgetPass']);
Route::post('update-forget-password', [AuthController::class, 'updateForgetPassword']);

Route::post('update-password', [AuthController::class, 'updatePassword']);

//APIs for admin
Route::group(
    ['middleware' => 'admin:api'],
    function () {
    }
);

//APIs for users
Route::group(
    ['middleware' => ['auth:api', 'throttle:100,1']],
   function () {

        Route::post(
            'refresh-token',
            [AuthController::class, 'refreshToken']
        );
        Route::post(
            '/get-user',
            [UserController::class, 'getUser']
        );
        Route::post(
            '/update-user',
            [UserController::class, 'Update']
        );

        Route::post(
            'users/updateprefrence',
             [UserController::class, 'updateprefrence']
            );

        Route::post(
            'users/updateprofile',
             [UserController::class, 'updateprofile']
            );
        Route::post(
            '/logout',
            [AuthController::class, 'logout']
        );

        Route::post(
            'user/delete',
            [AuthController::class, 'deleteUser']
        );
        Route::delete(
            'deletesoftuser/{id}',
            [UserController::class, 'destroy']
        );
        // Route::put(
        //     'softuser/{id}/restore',
        //      [UserController::class, 'restore']
        //     );

        Route::get('preferences', [PreferencesController::class, 'index']);

        //Get all courses
        Route::get(
            '/courses',
            [CourseController::class, 'index']
        );

        Route::get(
            '/courses/might-also-like',
            [CourseController::class, 'mightAlsoLikeCourse']
        );

        //Get specific course detail
        Route::get(
            'course/{course}',
            [CourseController::class, 'show']
        );

        //Get all courses purchased by user
        Route::get(
            'user/courses',
            [CourseController::class, 'userCourses']
        );
        // UserCoursePoints
        Route::post(
            'user/courses/points',
            [CourseController::class, 'UserCoursePoints']
        );
        // UserCoursePoints
        Route:: get(
            'user/courses/points',
            [CourseController::class, 'UserCoursesPoint']
        );

        //Get user's course with limit 5 for homepage
        Route::get(
            'user-courses/homepage',
            [CourseController::class, 'myCourses']
        );
        //all recommanded courses
        Route::get(
            'courses/all-recommandations',
            [CourseController::class, 'recommendedCourses']
        );

        //all recommanded courses with limit
        Route::get(
            'courses/recommanded',
            [CourseController::class, 'recommendedCoursesLimit']
        );

        //Store user courses ratings
        Route::post(
            'course/{course}/rating',
            [RatingController::class, 'courseRating']
        );

        Route::post(
            'course/{course}/rating/update',
            [RatingController::class, 'updateCourseRating']
        );

        //Watched a course video
        Route::post(
            'course/{course}/video/{video}/complete',
            [CourseController::class, 'completeCourseVideo']
        );

        //Complete Course
        Route::post(
            'course/{course}/mark-complete',
            [CourseController::class, 'completeCourse']
        );


         //most/purchased/course
         Route::get(
            'most/purchased/course',
            [CourseController::class, 'mostPurchasedCourse']
        );
        // Check Course Video Play and resume
        Route::post(
            'course/video/resume',
            [CourseController::class, 'coursevideotracking']
        );
        // coursesvideotracking
        Route::post(
            'course/video/{courseId}',
            [CourseController::class, 'courses']
        );
        Route::post(
            'coursereadbyuser',
            [CourseController::class, 'coursereadbyuser']
        );

        // Route::get(
        //     'handpicked/courses',
        //     [HandpickedController::class, 'handpickedCourses']
        // );

        // Route::get(
        //     'handpicked/{course}/courses',
        //     [HandpickedController::class, 'handpickedItemById']
        // );

        // Route::get(
        //     'handpicked/courses/limit',
        //     [HandpickedController::class, 'handpickedItemByLimit']
        // );

        Route::get(
            'handpicked_for_you/{limit?}',
            [HandpickedController::class, 'handpickedForYou']
        );


        Route::get(
            'courses/recent-playlist',
            [CourseController::class, 'getRecentPlaylist']
        );

        //Get all Live videos
        Route::get(
            'live-videos',
            [LiveVideoController::class, 'index']
        );

        Route::get(
            'live-videos/pagination',
            [LiveVideoController::class, 'liveVideosWithPagination']
        );

        Route::get(
            'live-video/{id}',
            [LiveVideoController::class, 'liveVideoById']
        );

        Route::post(
            'live-video/{liveVideo}/watch-now',
            [LiveVideoController::class, 'watchNowVideo']
        );

        Route::post(
            'live-video/{liveVideo}/save-played-video',
            [LiveVideoController::class, 'savePlayedVideo']
        );

        //Recent playlist

        Route::get(
            'video/recent',
            [LiveVideoController::class, 'getRecentVideo']
        );

        //End live videos

        //Instagram videos

        Route::get(
            'instagram-videos',
            [InstagramVideoController::class, 'index']
        );

        Route::get(
            'instagram-videos/pagination',
            [InstagramVideoController::class, 'instagramVideosWithPagination']
        );

        Route::get(
            'instagram-video/{id}',
            [InstagramVideoController::class, 'instagramVideoById']
        );

        //Testimonials

        Route::get(
            'testimonials',
            [TestimonialVideoController::class, 'index']
        );

        Route::get(
            'testimonials/pagination',
            [TestimonialVideoController::class, 'testimonialsWithPagination']
        );

        Route::get(
            'testimonial/{id}',
            [TestimonialVideoController::class, 'testimonialById']
        );

        //TV Shows

        Route::get(
            'tv-shows',
            [TVShowController::class, 'index']
        );

        Route::get(
            'tv-shows/pagination',
            [TVShowController::class, 'tvShowsWithPagination']
        );

        Route::get(
            'tv-show/{id}',
            [TVShowController::class, 'tvShowById']
        );

        //Podcasts
        Route::get(
            'podcasts',
            [PodcastController::class, 'index']
        );

        Route::get(
            'podcasts/pagination',
            [PodcastController::class, 'podcastsWithPagination']
        );

        Route::get(
            'podcast/{id}',
            [PodcastController::class, 'podcastById']
        );

        Route::get(
            'podcast/new-release',
            [PodcastController::class, 'podcastNewRelease']
        );

        Route::post(
            'podcast/{podcast}/rating',
            [RatingController::class, 'podcastRating']
        );
        Route::post(
            'podcast/{podcast}/updateRating',
            [RatingController::class, 'updatePodcastRating']
        );
        //most/viewed/podcast
        Route::get(
            'most/viewed/podcast',
            [PodcastController::class, 'MostViewedVideo']
        );
         //newRelease/podcast
         Route::get(
            'new/release/podcast',
            [PodcastController::class, 'newRelease']
        );
        // topPodcast
        Route::get(
            'topPodcast',
            [PodcastController::class, 'topPodcast']
        );

        Route::post(
            'recent/topvideos',
            [PodcastController::class, 'recent_topvideos']
        );

        Route::get(
            'recent/podcast',
            [PodcastController::class, 'recent_podcast']
        );



        // End podcast

        //Tv Interviews
        Route::get(
            'tv-interviews',
            [TVInterviewController::class, 'index']
        );

        Route::get(
            'tv-interviews/pagination',
            [TVInterviewController::class, 'tvInterviewsWithPagination']
        );

        Route::get(
            'tv-interview/{id}',
            [TVInterviewController::class, 'tvInterviewById']
        );

        //Moods

        Route::get(
            'moods',
            [MoodController::class, 'indexMoods']
        );

        Route::get(
            'mood/{mood}/categories',
            [MoodController::class, 'indexMoodCategories']
        );

        Route::get(
            '/category/{moodCategory}/sub-categories',
            [MoodController::class, 'indexMoodSubCategories']
        );

        Route::post(
            '/user/mood',
            [MoodController::class, 'storeUserMood']
        );

        Route::get(
            'user/mood-tracker',
            [MoodController::class, 'userMoodTracker']
        );

        Route::get(
            'about/{slug}',
            [AboutController::class, 'show']
        );

        //Events Route
        Route::get(
            'events',
            [EventController::class, 'index']
        );

        Route::get(
            'events/{id}/show',
            [EventController::class, 'eventById']
        );

        Route::post(
            'event/{event}/registration',
            [EventController::class, 'eventRegistration']
        );

        //Wishlist Routes


        Route::post(
            'addwishlist',
            [WishlistController::class, 'userAddWish']
        );

        Route::get(
            'wishlist',
            [WishlistController::class, 'userWishlist']
        );

        Route::get(
            'wishlist/pagination',
            [WishlistController::class, 'wishlistByPagination']
        );

        Route::delete(
            'wishlist/{wishlist}',
            [WishlistController::class, 'removeCourseWishlist']
        );

        //Articles Routes
        Route::get(
            'articles',
            [ArticleController::class, 'index']
        );

        Route::get(
            'articles/pagination',
            [ArticleController::class, 'articlesWithPagination']
        );

        Route::get(
            'articles/{id}',
            [ArticleController::class, 'articleById']
        );

        //Follow Author route
        Route::post(
            'follow-author',
            [FollowAuthorController::class, 'followAuthor']
        );

        Route::post(
            'unfollow-author',
            [FollowAuthorController::class, 'unfollowAuthor']
        );

        Route::post(
            'quotes',
            [QuoteController::class, 'storeQuote']
        );

        Route::get(
            'quotes',
            [QuoteController::class, 'quotesOfDay']
        );

        Route::get(
            'quote/{quote}',
            [QuoteController::class, 'show']
        );

        //Cart
        Route::post(
            'add-to-cart/{course}',
            [CartController::class, 'addCourseToCart']
        );

        Route::delete(
            'cart-item/{cartCourse}',
            [CartController::class, 'removeCartCourse']
        );

        Route::post(
            'cart/show',
            [CartController::class, 'showCart']
        );

        //Purchase courses
        Route::post(
            'courses/purchase',
            [CartController::class, 'purchaseCourses']
        );

        //Enlighting Challenges
        Route::get(
            'challenges',
            [EnlightingChallengeController::class, 'index']
        );

        Route::get(
            'challenges/limit',
            [EnlightingChallengeController::class, 'challengesByLimit']
        );

        Route::get(
            'enlighting-challenges/{enlighting_challenge}',
            [EnlightingChallengeController::class, 'showChallenge']
        );

        Route::post(
            'englighting_challenge/{enlighting_challenge}/video',
            [EnlightingChallengeController::class, 'challengesReadByUser']
        );

        Route::post(
            'challengeByUser',
            [EnlightingChallengeController::class, 'challengeByUser']
        );

        // Challenges
        Route::get(
            'challenges/{challengeId?}',
            [EnlightingChallengeController::class, 'challenges']
        );
        // challengeBytag
        Route::get(
            'challengeBytag',
            [EnlightingChallengeController::class, 'challengeBytag']
        );
        // //    most/take/challendes
        // Route::get(
        //     'most/take/challendes',
        //     [EnlightingChallengeController::class, 'challengeByUser']
        // );

        // // collections
        // Route::get(
        //     'collections',
        //     [CollectionController::class, 'index']
        // );

        // Route::get(
        //     'collections/limit',
        //     [CollectionController::class, 'collectionsByLimit']
        // );

        //HomePage Routes

        Route::get(
            'remaining-rewards',
            [HomeController::class, 'remainingRewards']
        );

        Route::get(
            'new_releases',
            [HomeController::class, 'new_releases']
        );

        Route::get(
            'collections',
            [HomeController::class, 'videos']
        );

        Route::get(
            'collections/limit',
            [HomeController::class, 'collectionsByLimit']
        );
        Route::get(
            'collections/admin',
            [HomeController::class, 'collectionsbyadmin']
        );
        // Contact Us Get and Post api
        Route::post(
            '/contact-us',
            [ContactUsController::class, 'create']
        );
        Route::get(
            '/contact-us',
            [ContactUsController::class, 'index']
        );
        // FAQs get api
        Route::get(
            '/faqs',
            [FaqsController::class, 'index']
        );
    }
);

Route::resource('tests', App\Http\Controllers\API\TestAPIController::class);
