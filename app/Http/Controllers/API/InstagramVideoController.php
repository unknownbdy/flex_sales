<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instagram\InstagramVideo;
use App\Models\InstagramVideoLink;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class InstagramVideoController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {
            $instaVideos = InstagramVideo::all();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'All records fetched.',
                    'data'   => $instaVideos
                ]
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
     * Method instagramVideosWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function instagramVideosWithPagination()
    {
        try {
            $instaVideos = InstagramVideo::with('instaVideoLinks')->paginate(5);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $instaVideos
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
     * Method instagramVideoById
     *
     * @param $id $id
     *
     * @return void
     */
    public function instagramVideoById($id)
    {
        try {
            $instaVideos = InstagramVideo::where('id', $id)->with('instaVideoLinks')->get();

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $instaVideos
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
}
