<?php

namespace App\Http\Controllers\API;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'title'         => "required",
                    'content'       => "required",
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $slug = Str::slug($request['title']);

            $record = Page::updateOrCreate(
                ['slug' => $request['slug']],
                [
                    'title'         => $request['title'],
                    'slug'          => $slug,
                    'content'       => $request['content']
                ]
            );

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record updated.',
                    'message_arabic' => 'تم تحديث السجل.',
                    'data'    => $record
                ],
                201
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

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

            $page = Page::where('slug', $slug)->first();
            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Page fetched successfully.',
                    'message_arabic'=> 'تم جلب الصفحة بنجاح.',
                    'data'   => $page
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
