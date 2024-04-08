<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TVShow;

class TVShowController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {
            $tvShows = TVShow::all();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'All records fetched.',
                    'message_arabic' => 'تم جلب كافة السجلات.',
                    'data'   => $tvShows
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
     * Method tvShowsWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function tvShowsWithPagination()
    {
        try {
            $tvShows = TVShow::paginate(5);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $tvShows
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
     * Method tvShowById
     *
     * @param $id $id
     *
     * @return void
     */
    public function tvShowById($id)
    {
        try {
            $tvShow = TVShow::where('id', $id)->get();

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $tvShow
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
