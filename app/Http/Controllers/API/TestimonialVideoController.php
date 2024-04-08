<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\InstagramVideoLink;
use App\Models\TestimonialVideo\TestimonialVideo;
use App\Models\TestimonialVideoLink;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class TestimonialVideoController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {
            // $tesimonialVideos = TestimonialVideo::with('testimonialType')->get();
            $tesimonialVideos = TestimonialVideo::with('testimonialType')
                                ->orderBy('created_at', 'desc')
                                ->get();


            return response()->json(
                [
                    'status' => true,
                    'message' => 'All records fetched.',
                    'message_arabic' => 'تم جلب كافة السجلات.',
                    'data'   => $tesimonialVideos
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
     * Method testimonialsWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function testimonialsWithPagination()
    {
        try {
            $testimonials = TestimonialVideo::with('testimonialType')
                ->paginate(5);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجلات.',
                    'data'   => $testimonials
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
     * Method testimonialById
     *
     * @param $id $id
     *
     * @return void
     */
    public function testimonialById($id)
    {
        try {
            $testimonials = TestimonialVideo::where('id', $id)
                ->with('testimonialType')->get();

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $testimonials
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
