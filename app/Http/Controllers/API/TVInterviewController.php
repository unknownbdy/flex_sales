<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TvInterview;
use App\Models\TvInterviewTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TVInterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tvInterviews = TvInterview::all();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $tvInterviews
                ]
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
     * Method tvInterviewsWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function tvInterviewsWithPagination()
    {
        try {
            $tvInterviews = TvInterview::with('tvInterviewTopics')
                ->paginate(5);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $tvInterviews
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
     * Method tvInterviewById What TV Interviews by ID
     *
     * @param $id $id
     *
     * @return void
     */
    public function tvInterviewById($id)
    {
        try {
            $tvInterview = TvInterview::where('id', $id)
                ->with('tvInterviewTopics')->get();

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $tvInterview
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
