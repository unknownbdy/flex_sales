<?php

namespace App\Http\Controllers\API;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Http\Controllers\Controller;
use App\Models\Podcast\PodcastEpisode;
use App\Models\Podcast\PodcastVideo;
use App\Models\Rating\CourseRating;
use App\Models\Rating\PodcastRating;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    protected $currentUser;

    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentUser = auth('api')->user();
    }

    /**
     * Method store - This function store user's course reviews
     *
     * @param Request $request
     * @param Course  $course
     *
     * @return void
     */
    public function courseRating(Request $request, Course $course)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'rating' => 'required',
                    'comment' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = CourseRating::where(
                [
                    ['user_id', $this->currentUser['id']],
                    ['course_id', $course['id']]
                ]
            )->first();

            if ($data == null) {

                $input = $request->all();
                $input['course_id'] = $course['id'];
                $rating = $this->currentUser->courseRatings()->create($input);
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record submitted.',
                        'message_arabic' => 'تم تقديم السجل.',
                        'data'    => $rating
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status'  => false,
                        'message' => 'You have already rated for this course.',
                        'message_arabic' => 'لقد قمت بالفعل بتقييم هذه الدورة.'
                    ]
                );
            }
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status'  => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Method updateCourseRating
     *
     * @return void
     */
    public function updateCourseRating(Request $request, Course $course)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'rating' => 'required',
                    'comment' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = CourseRating::where(
                [
                    ['user_id', $this->currentUser['id']],
                    ['course_id', $course['id']]
                ]
            )->first();

            if ($data != null) {

                $input = $request->all();
                $rating = $data->update(
                    [
                        'rating'  => $input['rating'],
                        'comment' => $input['comment']
                    ]
                );

                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record updated.',
                        'message_arabic' => 'تم تحديث السجل.',
                        'data'    => $rating
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status'  => false,
                        'message' => 'You have not rated this course yet.',
                        'message_arabic' => 'لم تقم بتقييم هذه الدورة بعد.'
                    ]
                );
            }
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status'  => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Method podcastRating
     *
     * @param Request      $request
     * @param PodcastVideo $podcast
     *
     * @return void
     */
    public function podcastRating(Request $request, PodcastEpisode $podcast)
    {
        // dd($podcast);die;
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'rating' => 'required',
                    'comment' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = PodcastRating::where(
                [
                    ['user_id', $this->currentUser['id']],
                    ['podcast_id', $podcast['id']]
                ]
            )->first();

            if ($data == null) {

                $input = $request->all();
                $input['podcast_id'] = $podcast['id'];

                $rating = $this->currentUser->podcastRatings()->create($input);
                return response()->json(
                    [
                        'status'  => true,
                        'messsage' => 'Record added.',
                        'messsage_arabic' => 'تمت إضافة السجل.',
                        'data'    => $rating
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status'  => false,
                        'message' => 'You have already rated for this podcast.',
                        'message' => 'لقد قمت بالفعل بتقييم هذا البودكاست.'
                    ]
                );
            }
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Method updatePodcastRating
     *
     * @param Request      $request
     * @param PodcastVideo $podcast
     *
     * @return void
     */
    public function updatePodcastRating(Request $request, PodcastEpisode $podcast)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'rating' => 'required',
                    'comment' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = PodcastRating::where(
                [
                    ['user_id', $this->currentUser['id']],
                    ['podcast_id', $podcast['id']]
                ]
            )->first();

            if ($data != null) {

                $input = $request->all();

                $rating = $data->update(
                    [
                        'rating'  => $input['rating'],
                        'comment' => $input['comment']
                    ]
                );

                return response()->json(
                    [
                        'status'  => true,
                        'messsage'=> 'Record updated.',
                        'messsage_arabic'=> 'تم تحديث السجل.',
                        'data'    => $rating
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status'  => false,
                        'message' => 'You have not rated this podcast yet.',
                        'message_arabic' => 'لم تقم بتقييم هذا البودكاست بعد.'
                    ]
                );
            }
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }
}
