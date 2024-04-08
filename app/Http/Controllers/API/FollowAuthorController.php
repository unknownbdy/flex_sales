<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FollowAuthor\FollowAuthor;
use Illuminate\Http\Request;

class FollowAuthorController extends Controller
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
     * Method followAuthor
     *
     * @return void
     */
    public function followAuthor()
    {
        try {
            $followAuthor = FollowAuthor::where(
                'user_id',
                $this->currentUser['id']
            )->first();

            // return $followAuthor;
            if ($followAuthor == null) {
                $followAuthor = FollowAuthor::create(
                    [
                        'user_id'   => $this->currentUser['id']
                    ]
                );

                return response()->json(
                    [
                        'status' => true,
                        'message'=> 'Record created',
                        'data'   => $followAuthor
                    ],
                    201
                );
            } else {

                return response()->json(
                    [
                        'status' => false,
                        'message'=> 'Record exist',
                        'data'   => $followAuthor
                    ],
                    200
                );
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }
    
    /**
     * Method unfollowAuthor
     *
     * @return void
     */
    public function unfollowAuthor()
    {
        try {
            $followAuthor = FollowAuthor::where(
                'user_id',
                $this->currentUser['id']
            )->first();

            if ($followAuthor != null) {
                $followAuthor = $followAuthor->delete();

                return response()->json(
                    [
                        'status' => true,
                        'message'=> 'Record has been deleted.',
                    ],
                    200
                );
            } else {

                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record not found'
                    ],
                    404
                );
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }
}
