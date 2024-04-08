<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mood\Mood;
use App\Models\User;
use App\Models\Mood\MoodCategory;
use App\Models\Mood\MoodSubCategory;
use App\Models\Mood\UserMood;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MoodController extends Controller
{
    /**
     * Method indexMoods
     *
     * @return void
     */
    public function indexMoods()
    {
        try {
            $moods = Mood::all();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $moods
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
     * Method indexMoodCategories
     *
     * @param Mood $mood
     *
     * @return void
     */
    public function indexMoodCategories(Mood $mood)
    {
        try {

            $categories = $mood->categories()->get();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $categories
                ],
                200
            );
        } catch (\Throwable  $e) {
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
     * Method indexMoodSubCategories
     *
     * @param $moodCategory $moodCategory
     *
     * @return void
     */
    public function indexMoodSubCategories($moodId)
    {
        try
        {
            $subCategoriesCheck = MoodSubCategory::where('mood_id',$moodId)->get();
            // print_r($subCategoriesCheck->toArray()); die;
            if($subCategoriesCheck)
            {
                // $subCategories = MoodSubCategory::all(); //MoodCategory::find($moodCategory)->moodSubCategories;
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record fetched.',
                        'message_arabic' => 'تم جلب السجل.',
                        'data'   => $subCategoriesCheck
                    ],
                    200
                );
            }else{
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record fetched.',
                        'message_arabic' => 'تم جلب السجل.',
                        'data'   => "Data Not Found"
                    ],
                    200
                );
            }
        } catch (\Throwable  $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getLine().$e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method storeUserMood This method stores user's daily mood
     *
     * @param Request $request
     *
     * @return void
     */
    public function storeUserMood(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'date'                => 'required',
                    'mood_id'             => 'required',
                    'mood_category_id'    => 'required',
                    'mood_sub_category_id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $input = $request->all();

            $mood = UserMood::create(
                [
                    'date'                => $input['date'],
                    'user_id'             => auth()->user()->id,
                    'mood_id'             => $input['mood_id'],
                    'mood_category_id'    => $input['mood_category_id'],
                    'mood_sub_category_id' => $input['mood_sub_category_id'],
                ]
            );
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record created.',
                    'message_arabic' => 'تم إنشاء السجل.',
                    'data'   => $mood
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
     * Method showUserMood
     *
     * @return void
     */
    public function userMoodTracker()
    {
        try {
            $authUser = auth('api')->id();

            //Get logged in user's current month's moods information

                $userMoods = UserMood::leftJoin('users', 'users.id', '=', 'user_moods.user_id')
                ->leftJoin('moods', 'moods.id', '=', 'user_moods.mood_id')
                ->leftJoin('mood_categories', 'mood_categories.id', '=', 'user_moods.mood_category_id')
                ->leftJoin('mood_sub_categories', 'mood_sub_categories.id', '=', 'user_moods.mood_sub_category_id')
                ->where('users.id',$authUser)
                ->select('users.name','users.id', 'moods.name as main_mood','moods.name_arabic as main_mood_arabic', 'mood_categories.name as sub_mood','mood_categories.name_arabic as sub_mood_arabic', 'mood_sub_categories.name as sub_cat_mood','mood_sub_categories.name_arabic as sub_cat_mood_arabic', 'user_moods.date')
                ->get();


                    $resultArray = array();

                    foreach ($userMoods as $data) {
                        $userId = $data['name'];

                        if (!isset($resultArray[$userId])) {
                            $resultArray[$userId] = array();
                        }

                        $resultArray[$userId][] = $data->toArray();
                    }


                // $userMoodArray = [];
                // foreach($userId as $userIdVal){

                //     foreach($userMoods as $userMoodsVal){

                //     $userMoodArray[$userIdVal['user_id']] =  $userMoodsVal->toArray();

                //     }
                // }
               // echo "<pre>"; print_r($resultArray); die;
            return $resultArray;
            $moodDetail = [];
            //Find user's basic moods ids based on moods subcategories.
            foreach ($moods as $key => $value) {

                $mood_id = $value['moodSubCategory']['moodCategory']['mood_id'];
                $mood = Mood::find($mood_id);
                $moodDetail['user_detail'][] = [
                    'date' => $value['date'],
                    'mood' => $resultArray
                ];
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $moodDetail
                ],
            );
        } catch (\Throwable  $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }
}
