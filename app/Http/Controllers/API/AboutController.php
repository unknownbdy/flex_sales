<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use Illuminate\Http\Request;
use Throwable;

class AboutController extends Controller
{
    /**
     * Method show
     *
     * @param $slug $slug
     *
     * @return void
     */
    public function show($slug)
    {
        try {
            $page = About::where('slug', $slug)->with('media')->first();

            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Record fetched',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $page
                ]
            );
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
