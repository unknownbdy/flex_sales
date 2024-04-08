<?php

namespace App\Http\Controllers\API;

use App\Models\LiveVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course\UserCourseLink;
use App\Models\LiveVideo\LiveVideos;
use App\Models\LiveVideo\UserLiveVideo;
use App\Models\LiveVideoLink;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Throwable;

class LiveVideoController extends Controller
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
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {
            $liveVideo = LiveVideos::with('chapter')->get();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'All records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $liveVideo
                ],
                200
            );
        } catch (\throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }


    /**
     * Method liveVideoWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function liveVideosWithPagination()
    {
        try {
            $liveVideos = LiveVideos::with('chapter')->paginate(5);
            // with('liveVideoLinks')->paginate(5);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $liveVideos
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method liveVideoById
     *
     * @param $id $id
     *
     * @return void
     */
    public function liveVideoById($id)
    {
        try {
            $liveVideos = LiveVideos::where('id', $id)
            ->with('chapter')
            // ->with('liveVideoLinks')
            ->get();

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $liveVideos
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method watchNowVideo
     *
     * @param $liveVideo $liveVideo
     *
     * @return void
     */
    public function watchNowVideo($liveVideo)
    {
        try {
            $video = LiveVideos::where('id', $liveVideo)->first();
            if(empty($video)){
                return response()->json(
                    [
                        'status' => false,
                        'message'=> 'Record not found.',
                        'message_arabic'=> 'لم يتم العثور على السجل.'
                    ],
                    201
                );
            }
            $video = UserLiveVideo::create(
                [
                    'user_id'       => $this->currentUser['id'],
                    'live_video_id' => $liveVideo['id'],
                    'completed'     => false
                ]
            );

            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Record added.',
                    'message_arabic'=> 'تمت إضافة السجل.',
                    'data'   => $video
                ],
                201
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method savePlayedVideo
     *
     * @param $liveVideo $liveVideo
     *
     * @return void
     */
    public function savePlayedVideo($liveVideo)
    {
        try {
            $video = UserLiveVideo::where('live_video_id', $liveVideo)
                ->where('user_id', $this->currentUser['id'])
                ->update(
                    [
                        'completed' => true
                    ]
                );

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record updated.',
                    'message_arabic' => 'تم تحديث السجل.',
                    'data'   => $video
                ],
                201
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method getRecentVideo this function return recent played video.
     *
     * @return void
     */
    public function getRecentVideo()
    {
        try {
            $user = $this->currentUser;

            $liveVideo = UserLiveVideo::where('user_id', $user['id'])
                ->with('liveVideo')
                ->latest('completed')->first();

            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $liveVideo
                ],
                200
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }
}
