<?php

namespace App\Http\Controllers\API;

// use DB;
use Maatwebsite\Excel\Concerns\ToArray;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Cart\Purchase;
use App\Models\Wishlist\Wishlist;
use App\Models\Course\CourseLink;
use App\Models\Course\UserCourse;
use App\Models\Course\UserCourseLink;
use App\Http\Controllers\Controller;
use App\Models\Cart\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CourseController extends Controller
{
    protected $currentUser;
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {

        $this->currentUser = User::find(auth('api')->id());
    }
    /**
     * Method index This function is used for getting
     * all courses and for
     * Seeking help as well.
     *
     * @return void
     */
    public function index()
    {
        // return auth('api')->id();

        try {
            $courses = Course::with('courseRatings','courseLinks','wishlist')
            ->get();
            $course_count =  Purchase::with('purchaseDetails')->where('user_id', auth('api')->id())->get();
            $originalArray = $course_count->ToArray(); // Your original array

            $allPurchaseDetails = array(); // Array to store all purchase details

            foreach ($originalArray as $item) {
                if (isset($item['purchase_details']) && is_array($item['purchase_details'])) {
                    $allPurchaseDetails = array_merge($allPurchaseDetails, $item['purchase_details']);
                }
            }
            $resultArrayVal = array();

            foreach ($allPurchaseDetails as $item) {
                if (isset($item['course_id'])) {
                    $resultArrayVal[$item['course_id']] = array('course_id' => $item['course_id']);
                }
            }

            foreach ($courses as $key => $value) {

                $value['purchase_count'] = 0;

                if(isset($resultArrayVal[$value['id']]) && $resultArrayVal[$value['id']]['course_id']==$value['id'])
                {
                    $value['purchase_count'] = 1;
                }
                $ratings['rating'] = [];
                $totalChapter = [];
                $chapterWiseArray = [];

                if (!empty($value['courseRatings'])) {
                    foreach ($value['courseRatings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }

                //Calculate the average.
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }

                if (!empty($value->toArray()['course_links']))
                {
                    // echo "<pre>"; print_r($value->toArray()['course_links']);

                    foreach ($value->toArray()['course_links'] as $linkval)
                    {
                        $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }
                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value->toArray()['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                // $chapterWiseArray['chapter-title'.$chapter_id][] = $linkval;
                                $chapterWiseArray[$chapter_id][] = $linkval;
                                // $chapterWiseArray['الفصل '.$chapter_id][] ='';
                            }
                        }
                    }
                }



                $initialArray =  $chapterWiseArray;

                // $initialArray =  $chapterWiseArrayArabic;

                $newArray = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    // print_r()

                    $newChapter = [];
                    $newChapter['chapter-title'] ='Chapter ' .$chapterKey;
                    $newChapter['chapter-title_arabic'] = 'الفصل '.$chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }
                // return $resultArray;
                $wishlists = 0;
                if(!empty($value['wishlist']->toArray()[0])){
                    $wishlists = 1;
                }
                $is_course_resume=0;
                $usercourse  = UserCourse::where('user_id', auth('api')->id())
                ->where('course_id', $value['id'])
                ->first();
                if($usercourse){
                    $is_course_resume=1;
                }

                $coursesWithRatings[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'      => $wishlists,
                    'is_course_resume'  => $is_course_resume,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }
            // die;
// echo "<pre>"; print_r($coursesWithRatings); die;
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'    => $coursesWithRatings
                ],
                201
            );
        } catch (Throwable $e) {


            return response()->json(
                [
                    'status'  => false,
                    'message' => "Error on line " . $e->getLine() . ": " . $e->getMessage(),
                    'code' => $e->getCode()
                ],
                500
            );
        }
    }

    /**
     * Method userCourses This function is for user to view all
     *
     * Purchased courses.
     *
     * @return void
     */
    // public function userCourses()
    // {
    //     try {

    //         $courses = User::findOrFail(auth('api')->id())->purchases()
    //             ->with('purchaseDetails.course')->get();
    //         //
    //         // return $courses;
    //         // $purchasedCourse = [];

    //         // foreach($courses as $coursesVal){
    //         //     $purchasedCourse[] = $coursesVal['purchaseDetails'];

    //         // }


    //         $resultArray = [];

    // foreach ($courses as $item) {
    //     $resultItem = $item; // Copy all properties from the original item

    //     // If the item has a 'purchase_details' key and it's an array, use it as is
    //     if (isset($item['purchase_details']) && is_array($item['purchase_details'])) {
    //         $resultItem['purchase_details'] = $item['purchase_details'];
    //     }

    //     // Add the reformatted item to the result array
    //     $resultArray[] = $resultItem;
    // }
    // // echo "<pre>";  print_r($resultArray->toArray()); die;


    //                 if(!empty($courses->toArray())){

    //                     return response()->json(
    //                         [
    //                             'status' => true,
    //                             'message' => 'Record fetched.',
                                    // 'message_arabic' => 'تم جلب السجل.',
    //                             'data'    => $resultArray
    //                         ],
    //                         200
    //                     );
    //             }else{
    //                 return response()->json(
    //                     [
    //                         'status' => true,
    //                         'message' => 'No Record Found.',
    //                     ],
    //                     200
    //                 );
    //             }
    //         } catch (Throwable $e) {

    //             return response()->json(
    //                 [
    //                     'status' => false,
    //                     'message' => $e->getMessage(),
    //                 ],
    //                 500
    //             );
    //         }
    //     }

    public function userCourses()
        {
            try {
                $userId = auth('api')->id();

                // Retrieve user's purchases with associated course details
                $userPurchases = User::findOrFail($userId)->purchases()
                    ->with('purchaseDetails.course')
                    ->get();
                    $userCourseIds = [];
                    // dd($userPurchases);die;

                    foreach ($userPurchases as $purchase) {
                        foreach ($purchase->purchaseDetails as $purchaseDetail) {
                            // Access the course_id from the purchaseDetails' course relationship
                            $courseId = $purchaseDetail->course->id;

                            // Add the course_id to the $userCourseIds array
                            $userCourseIds[] = $courseId;
                        }
                    }
                    $courses = Course::whereIn('id', $userCourseIds)
                                ->with('courseRatings', 'courseLinks', 'wishlist')
                                ->get();
                    $course_count =  Purchase::with('purchaseDetails')->where('user_id', auth('api')->id())->get();
                    $originalArray = $course_count->ToArray(); // Your original array

                    $allPurchaseDetails = array(); // Array to store all purchase details

                    foreach ($originalArray as $item) {
                        if (isset($item['purchase_details']) && is_array($item['purchase_details'])) {
                            $allPurchaseDetails = array_merge($allPurchaseDetails, $item['purchase_details']);
                        }
                    }
                    $resultArrayVal = array();

                    foreach ($allPurchaseDetails as $item) {
                        if (isset($item['course_id'])) {
                            $resultArrayVal[$item['course_id']] = array('course_id' => $item['course_id']);
                        }
                    }

            foreach ($courses as $key => $value) {

                $value['purchase_count'] = 0;

                if(isset($resultArrayVal[$value['id']]) && $resultArrayVal[$value['id']]['course_id']==$value['id'])
                {
                    $value['purchase_count'] = 1;
                }
                $ratings['rating'] = [];
                $totalChapter = [];
                $chapterWiseArray = [];

                if (!empty($value['courseRatings'])) {
                    foreach ($value['courseRatings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }

                //Calculate the average.
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }

                if (!empty($value->toArray()['course_links']))
                {
                    // echo "<pre>"; print_r($value->toArray()['course_links']);

                    foreach ($value->toArray()['course_links'] as $linkval)
                    {
                        $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }
                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value->toArray()['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                // $chapterWiseArray['chapter-title'.$chapter_id][] = $linkval;
                                $chapterWiseArray[$chapter_id][] = $linkval;
                            }
                        }
                    }
                }



                $initialArray =  $chapterWiseArray;

                $newArray = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    $newChapter = [];
                    $newChapter['chapter-title'] ='Chapter ' .$chapterKey;
                    $newChapter['chapter-title_arabic'] = 'الفصل '.$chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }
                // return $resultArray;
                $wishlists = 0;
                if(!empty($value['wishlist']->toArray()[0])){
                    $wishlists = 1;
                }
                $is_course_resume=0;
                $usercourse  = UserCourse::where('user_id', auth('api')->id())
                ->where('course_id', $value['id'])
                ->first();
                if($usercourse){
                    $is_course_resume=1;
                }
                $CourseArray[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'      => $wishlists,
                    'is_course_resume'  => $is_course_resume,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }


                if (!empty($CourseArray)) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Record fetched.',
                        'message_arabic' => 'تم جلب السجل.',
                        'data' => $CourseArray,
                    ], 200);
                } else {
                    return response()->json([
                        'status' => true,
                        'message' => 'No Record Found.',
                    ], 200);
                }
            } catch (Throwable $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }

    /**
     * Method show This function is to show course details
     *
     * @param Course $course
     *
     * @return void
     */
    public function show($course)
    {

        try {
            $courses = Course::where('id',$course)->with('courseRatings','courseLinks','wishlist')->get();
            if(!empty($courses->toArray()))
            {

                // foreach ($courses as $key => $value)
                // {
                //     $ratings['rating'] = [];
                //     $totalChapter = [];
                //     $chapterWiseArray = [];

                //     if (!empty($value['courseRatings'])) {
                //         foreach ($value['courseRatings'] as $val) {
                //             $ratings['rating'][] = $val['rating'];
                //         }
                //     }

                //     //Calculate the average.
                //     if (count($ratings['rating']) > 0) {
                //         $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                //     } else {
                //         $avg = 0;
                //     }

                //     if (!empty($value->toArray()['course_links']))
                //     {
                //         foreach ($value->toArray()['course_links'] as $linkval)
                //         {
                //            $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                //         }

                //         foreach ($totalChapter as $chapter_id)
                //         {
                //             foreach ($value->toArray()['course_links'] as $linkval)
                //             {
                //                 if($chapter_id==$linkval['chapter_id'])
                //                 {
                //                     $chapterWiseArray['Chapter '.$chapter_id][] = $linkval;
                //                 }
                //             }
                //         }
                //     }

                //     $initialArray =  $chapterWiseArray;

                //     $newArray = [];
                //     foreach ($initialArray as $chapterKey => $chapterValue)
                //     {
                //         $newChapter = [];
                //         $newChapter['chapter-title'] = $chapterKey;
                //         $newChapter['lessions'] = $chapterValue;
                //         $newArray['chapter'][] = $newChapter;
                //     }
                //     if(isset($newArray['chapter'][0]['chapter-title'])){

                //         $resultArray =  $newArray['chapter'];
                //     }
                //     $wishlists = 0;
                //     if(!empty($value['wishlist']->toArray()[0])){
                //         $wishlists = 1;
                //     }

                //     $coursesWithRatings[] = [
                //         'id'                => $value['id'],
                //         'course_name'       => $value['course_name'],
                //         'course_name_arabic' => $value['course_name_arabic'],
                //         'sub_title'         => $value['sub_title'],
                //         'sub_title_arabic'  => $value['sub_title_arabic'],
                //         'description'       => $value['description'],
                //         'description_arabic'=> $value['description_arabic'],
                //         'listing_price'     => (float)$value['price'],
                //         'actual_price'      => (float)$value['actual_price'],
                //         'purchase_count'    => $value['purchase_count'],
                //         'is_wishlist'      => $wishlists,
                //         'thumbnail'         => $value['thumbnail'],
                //         'avg_rating'        => $avg,
                //         'chapter'           => $resultArray
                //     ];
                $course_count =  Purchase::with('purchaseDetails')->where('user_id', auth('api')->id())->get();
            $originalArray = $course_count->ToArray(); // Your original array

            $allPurchaseDetails = array(); // Array to store all purchase details

            foreach ($originalArray as $item) {
                if (isset($item['purchase_details']) && is_array($item['purchase_details'])) {
                    $allPurchaseDetails = array_merge($allPurchaseDetails, $item['purchase_details']);
                }
            }
            $resultArrayVal = array();

            foreach ($allPurchaseDetails as $item) {
                if (isset($item['course_id'])) {
                    $resultArrayVal[$item['course_id']] = array('course_id' => $item['course_id']);
                }
            }

            foreach ($courses as $key => $value) {

                $value['purchase_count'] = 0;

                if(isset($resultArrayVal[$value['id']]) && $resultArrayVal[$value['id']]['course_id']==$value['id'])
                {
                    $value['purchase_count'] = 1;
                }
                $ratings['rating'] = [];
                $totalChapter = [];
                $chapterWiseArray = [];

                if (!empty($value['courseRatings'])) {
                    foreach ($value['courseRatings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }

                //Calculate the average.
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }

                if (!empty($value->toArray()['course_links']))
                {
                    // echo "<pre>"; print_r($value->toArray()['course_links']);

                    foreach ($value->toArray()['course_links'] as $linkval)
                    {
                        $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }
                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value->toArray()['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                // $chapterWiseArray['chapter-title'.$chapter_id][] = $linkval;
                                $chapterWiseArray[$chapter_id][] = $linkval;
                            }
                        }
                    }
                }



                $initialArray =  $chapterWiseArray;

                $newArray = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    $newChapter = [];
                    $newChapter['chapter-title'] ='Chapter ' .$chapterKey;
                    $newChapter['chapter-title_arabic'] = 'الفصل '.$chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }
                // return $resultArray;
                $wishlists = 0;
                if(!empty($value['wishlist']->toArray()[0])){
                    $wishlists = 1;
                }
                $is_course_resume=0;
                $usercourse  = UserCourse::where('user_id', auth('api')->id())
                ->where('course_id', $value['id'])
                ->first();
                if($usercourse){
                    $is_course_resume=1;
                }
                $coursesWithRatings[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'      => $wishlists,
                    'is_course_resume' => $is_course_resume,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
                }
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record fetched.',
                        'message_arabic' => 'تم جلب السجل.',
                        'data'    => $coursesWithRatings
                    ],
                    201
                );
            }else{
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'No. Record Found.',
                        'message_arabic' => 'لا يوجد سجلات.',
                    ],
                    200
                );
            }
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status'  => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Method myCourses This function shows only limited purchased courses to
     *
     * User's homescreen.
     *
     * @return void
     */
    public function myCourses()
    {
        try {
            $courses = Purchase::where('user_id', auth('api')->id())
                ->with('purchaseDetails')->get();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'    => $courses
                ]
            );
        } catch (Throwable $e) {
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
     * Method recommendedCourses
     *
     * @return void
     */
    public function recommendedCourses()
    {
        try {
            $user = User::where('id', auth('api')->id())->get();
            // dd($user);die;
            $preferences_ids = [];
            $array = [];
            if(!empty($user->toArray()[0]['preferences_ids']))
            {
                $inputString = $user->toArray()[0]['preferences_ids'];
                $preferences_ids = str_replace(['[', ']'], '', $inputString);
                $parts = explode(',', $preferences_ids);
                foreach ($parts as $part) {
                    $array[] = (int)$part;
                }
            }
            $courses = Course::with('courseRatings','courseLinks','wishlist')
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->get();

            if(empty($courses->toArray())){
                $courses = Course::with('courseRatings','courseLinks','wishlist')->get();

            }


            foreach ($courses as $key => $value) {

                $ratings['rating'] = [];
                $totalChapter = [];
                $chapterWiseArray = [];
                $value['is_wishlists'] = false;

                if (!empty($value['courseRatings'])) {
                    foreach ($value['courseRatings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }

                //Calculate the average.
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }

                if (!empty($value->toArray()['course_links']))
                {
                    foreach ($value->toArray()['course_links'] as $linkval)
                    {
                       $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }

                    // echo "<pre>" ; print_r($totalChapter);

                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value->toArray()['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                $chapterWiseArray[$chapter_id][] = $linkval;
                            }
                        }
                    }
                }

                // echo "<pre>" ; print_r($chapterWiseArray);

                $initialArray =  $chapterWiseArray;

                $newArray = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    $newChapter = [];
                    $newChapter['chapter-title'] ='Chapter ' .$chapterKey;
                    $newChapter['chapter-title_arabic'] = 'الفصل '.$chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }

                $wishlists = 0;
                    if(!empty($value['wishlist']->toArray()[0])){
                        $wishlists = 1;
                    }
                $is_course_resume=0;
                $usercourse  = UserCourse::where('user_id', auth('api')->id())
                ->where('course_id', $value['id'])
                ->first();
                if($usercourse){
                    $is_course_resume=1;
                }
                $coursesWithRatings[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'      => $wishlists,
                    'is_course_resume'  =>$is_course_resume,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'    => $coursesWithRatings
                ]
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage().'--'.$e->getLine(),
                ],
                500
            );
        }
    }

    /**
     * Method recommendedCoursesLimit
     *
     * @return void
     */
    public function recommendedCoursesLimit()
    {
        try {
            $user = User::where('id', auth('api')->id())->get();
            $preferences_ids = [];
            $array = [];
            if(!empty($user->toArray()[0]['preferences_ids']))
            {
                $inputString = $user->toArray()[0]['preferences_ids'];
                $preferences_ids = str_replace(['[', ']'], '', $inputString);
                $parts = explode(',', $preferences_ids);
                foreach ($parts as $part) {
                    $array[] = (int)$part;
                }
            }

            //  print_r($array);
            // print_r($val); die;
            // $courses = Course::with('courseRatings','courseLinks')
            // ->where(function ($query) use ($array)
            // {
            //     if(!empty($array))
            //     {
            //         $query->whereIn('tag_id',$array);
            //     }

            // })->take(2)->get();
            $courses = Course::with('courseRatings','courseLinks','wishlist')
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->take(3)->get();

            if(empty($courses->toArray())){
                $courses = Course::with('courseRatings','courseLinks','wishlist')->take(3)->get();

            }


            foreach ($courses as $key => $value) {

                $ratings['rating'] = [];
                $totalChapter = [];
                $chapterWiseArray = [];

                if (!empty($value['courseRatings'])) {
                    foreach ($value['courseRatings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }

                //Calculate the average.
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }

                if (!empty($value->toArray()['course_links']))
                {
                    foreach ($value->toArray()['course_links'] as $linkval)
                    {
                       $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }

                    // echo "<pre>" ; print_r($totalChapter);

                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value->toArray()['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                $chapterWiseArray[$chapter_id][] = $linkval;
                            }
                        }
                    }
                }

                // echo "<pre>" ; print_r($chapterWiseArray);

                $initialArray =  $chapterWiseArray;

                $newArray = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    $newChapter = [];
                    $newChapter['chapter-title'] ='Chapter ' .$chapterKey;
                    $newChapter['chapter-title_arabic'] = 'الفصل '.$chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }

                $wishlists = 0;
                if(!empty($value['wishlist']->toArray()[0])){
                    $wishlists = 1;
                }
                $is_course_resume=0;
                $usercourse  = UserCourse::where('user_id', auth('api')->id())
                ->where('course_id', $value['id'])
                ->first();
                if($usercourse){
                    $is_course_resume=1;
                }
                $coursesWithRatings[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'      => $wishlists,
                    'is_course_resume' => $is_course_resume,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'    => $coursesWithRatings
                ]
            );
        } catch (Throwable $e) {
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
     * Method mightAlsoLikeCourse
     *
     * @return void
     */
    public function mightAlsoLikeCourse()
    {
        try {

            $user = User::where('id', auth('api')->id())->get();
            $preferences_ids = [];
            $array = [];
            if(!empty($user->toArray()[0]['preferences_ids']))
            {
                $inputString = $user->toArray()[0]['preferences_ids'];
                $preferences_ids = str_replace(['[', ']'], '', $inputString);
                $parts = explode(',', $preferences_ids);
                foreach ($parts as $part) {
                    $array[] = (int)$part;
                }
            }

            //  print_r($array);
            // print_r($val); die;
            $courses = Course::with('courseRatings','courseLinks','wishlist')
            ->where(function ($query) use ($array)
            {
                if(!empty($array))
                {
                    $query->whereIn('tag_id',$array);
                }

            })->inRandomOrder()->limit(3)->get();

            $coursesWithRatings=[];
            foreach ($courses as $key => $value) {

                $ratings['rating'] = [];
                $totalChapter = [];
                $chapterWiseArray = [];

                if (!empty($value['courseRatings'])) {
                    foreach ($value['courseRatings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }

                //Calculate the average.
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }

                if (!empty($value->toArray()['course_links']))
                {
                    foreach ($value->toArray()['course_links'] as $linkval)
                    {
                       $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }

                    // echo "<pre>" ; print_r($totalChapter);

                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value->toArray()['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                $chapterWiseArray['Chapter '.$chapter_id][] = $linkval;
                            }
                        }
                    }
                }

                // echo "<pre>" ; print_r($chapterWiseArray);

                $initialArray =  $chapterWiseArray;

                $newArray = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    $newChapter = [];
                    $newChapter['chapter-title'] = $chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }
                $wishlists = 0;
                if(!empty($value['wishlist']->toArray()[0])){
                    $wishlists = 1;
                }
                $is_course_resume=0;
                $usercourse  = UserCourse::where('user_id', auth('api')->id())
                ->where('course_id', $value['id'])
                ->first();
                if($usercourse){
                    $is_course_resume=1;
                }
                $coursesWithRatings[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'      => $wishlists,
                    'is_course_resume' => $is_course_resume,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'    => $coursesWithRatings
                ]
            );

        } catch (Throwable $e) {
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
     * Method completeCourseVideo
     *
     * @param Course $course
     * @param $video  $video
     *
     * @return void
     */
    public function completeCourseVideo(Course $course, $video)
    {
        try {
            $data['user']   = $this->currentUser;
            $data['course'] = $course;
            $data['video']  = $video;
            $courseVideos = null;

            //  print_r($data['user']->toArray()) .'--'.print_r($data['course']->toArray()).'----'.print_r($data['video']); die;
        //    echo "<pre>"; print_r($course->userCourses->toArray()); die;
            //Check if user has purchased course.

            $data['purchased'] = $course->userCourses
                ->where('user_id', $data['user']['id'])->first();

        //    echo "<pre>"; print_r($data['purchased']->toArray()); die;

            if ($data['purchased'] != null)
            {

                //If purchased then check if Course Link is completed or not and
                //if not.
                $courseVideos = UserCourse::whereHas(
                    'userCourseLinks',
                    function ($query) use ($data) {
                        $query->where('completed', false);
                    }
                )
                    ->where('user_id', $data['user']['id'])
                    ->where('course_id', $data['course']['id'])
                    ->where('completed', false)->first();

                //If Course Link is not completed then update "Completed"
                //column as True.

                // echo "<pre>"; print_r($courseVideos); die;

                if ($courseVideos != null) {

                    $course = UserCourse::find($data['course']['id'])
                        ->update(
                            [
                                'completed' => true
                            ],
                        );
                    return response()->json(
                        [
                            'status' => true,
                            'message' => 'Record updated',
                            'message_arabic' => 'تم جلب السجل.',
                            'data'   => $course
                        ],
                        200
                    );
                } else {
                    return response()->json(
                        [
                            'status' => false,
                            'message' => 'Course video has been already completed.',
                            'message_arabic' => 'تم الانتهاء بالفعل من فيديو الدورة التدريبية.'
                        ],
                        500
                    );
                }
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'User has not subscribed to this course.',
                        'message_arabic' => 'لم يشترك المستخدم في هذه الدورة.'
                    ],
                    500
                );
            }
        } catch (Throwable $e) {
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
     * Method completeCourse Mark as Complete
     *
     * @param Course $course
     *
     * @return void
     */
    public function completeCourse(Course $course)
    {
        try {
            $data['user']   = $this->currentUser;
            $data['course'] = $course;
            $courseVideos = UserCourse::whereHas(
                'userCourseLinks',
                function ($query) use ($data) {
                    $query->where('completed', false);
                }
            )
                ->where('user_id', $data['user']['id'])
                ->where('course_id', $data['course']['id'])
                ->where('completed', false)->first();

            if ($courseVideos != null) {

                $course = UserCourse::find($data['course']['id'])
                    ->update(
                        [
                            'completed' => true
                        ],
                    );
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record updated',
                        'message_arabic' => 'تم جلب السجل.',
                        'data'   => $course
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Course has been already completed.',
                        'message_arabic' => 'تم الانتهاء من الدورة بالفعل.'
                    ],
                    500
                );
            }
        } catch (Throwable $e) {
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
     * Method getRecentPlaylist
     *
     * @return void
     */
    public function getRecentPlaylist()
    {
        try {
            $user = $this->currentUser;

            $video = UserCourseLink::where('user_id', $user['id'])
                ->latest('completed')->first();

            $courseVideos = UserCourse::with('course.courseLinks')
                ->where('course_id', $video['user_course_id'])
                ->first();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $courseVideos
                ],
                200
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function mostPurchasedCourse()
{
    try {
        $user = $this->currentUser;

        $purchased_details = PurchaseDetail::all();

        // Count purchases per course
        $coursePurchaseCounts = [];
        foreach ($purchased_details as $purchase) {
            $courseId = $purchase->course_id;
            if (!isset($coursePurchaseCounts[$courseId])) {
                $coursePurchaseCounts[$courseId] = 0;
            }
            $coursePurchaseCounts[$courseId]++;
        }

        // Sort courses by purchase counts in descending order
        arsort($coursePurchaseCounts);

        // Fetch course details for the most purchased courses
        $mostPurchasedCourses = [];
        $count = 0;
        foreach ($coursePurchaseCounts as $courseId => $purchaseCount) {
            if ($count >= 3) {
                break;
            }
            $course = Course::with('courseRatings', 'courseLinks', 'wishlist')->find($courseId);// Assuming you have a Course model
            $wishlists = 0;
                if(!empty($course['wishlist']->toArray()[0])){
                    $wishlists = 1;
                }
            if ($course) {
                $courseData = $course->toArray();
                $courseData['wishlist'] = $wishlists;
                $mostPurchasedCourses[] = $courseData;
                $count++;
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Top three most purchased courses fetched.',
            'message_arabic' => 'تم جلب أعلى ثلاث دورات تدريبية تم شراؤها.',
            'data'   => $mostPurchasedCourses
        ], 200);
    } catch (Throwable $e) {
        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

// store user course points

    public function UserCoursePoints(Request $request)
    {
        try {
            $userId = auth('api')->id();
            // Check if the data already exists in the user_course_points table
            $existingRecord = DB::table('user_course_points')
                ->where('user_id', $userId)
                ->where('course_id', $request->input('course_id'))
                ->where('course_link_id', $request->input('lesson_id'))
                ->where('chapter_id', $request->input('chapter_id'))
                ->first();

            // Check if the lesson has points
            $lesson = CourseLink::where('id', $request->input('lesson_id'))
                ->where('course_id', $request->input('course_id'))
                ->where('chapter_id', $request->input('chapter_id'))
                ->first();

            if (!$lesson) {
                return response()->json([
                    'error' => 'Lesson not found',
                    'error_arabic' => 'لم يتم العثور على الدرس'
                ], 404);
            }

            if ($lesson->points === 0 || $lesson->points === null) {
                return response()->json([
                    'message' => 'Points not available',
                    'message_arabic' => 'النقاط غير متوفرة'
                ], 201);
            }

            if ($existingRecord) {
                return response()->json([
                    'message' => 'Data already exists',
                    'message_arabic' => 'البيانات موجودة بالفعل'
                ], 200);
            }

            // Insert user course points
            DB::table('user_course_points')->insert([
                'user_id' => $userId,
                'course_id' => $request->input('course_id'),
                'course_link_id' => $request->input('lesson_id'),
                'chapter_id' => $request->input('chapter_id'),
                'points' => $lesson ->points,
            ]);

            return response()->json([
                'message' => 'Data inserted',
                'message_arabic' => 'تم إدخال البيانات"'
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Data not inserted',
                'error_arabic' => 'لم يتم إدراج البيانات'
            ], 500);
        }
    }
    //get api
    public function UserCoursesPoint(Request $request)
    {
        try {
            $userId = auth('api')->id();

            // Retrieve and sum the points for the user
            $userPointsSum = DB::table('user_course_points')
                ->where('user_id', $userId)
                ->sum('points');

            return response()->json([
                'status' => true,
                'message' => 'Total Points fetched.',
                'message_arabic' => 'جمع النقاط تم بنجاح.',
                'points_total' => $userPointsSum,
                'discount' => 10,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'message_arabic' => 'حدث خطأ أثناء جلب جمع النقاط.',
            ], 500);
        }
    }

    public function coursevideotracking(Request $request)
    {
        try {
            $userId = auth('api')->id();
            $courseId = $request['course_id'];
            // Check if a record already exists for this user and course
            $existingRecord = UserCourse::where('user_id', $userId)
                ->where('course_id', $courseId)
                ->first();

            if ($existingRecord) {
                // If a record exists, update the 'type' column
                // $existingRecord->update(['type' => $type]);

                return response()->json([
                    'message' => 'Course Video tracking data Already Exists',
                    'message_arabic' => 'تم تحديث نوع الفيديو بنجاح'
                ], 200);
            } else {
                // If no record exists, create a new record
                UserCourse::create([
                    'course_id' => $courseId,
                    'user_id' => $userId,
                ]);

                return response()->json([
                    'message' => 'Course Video tracking data inserted',
                    'message_arabic' => 'تم تسجيل بيانات الفيديو بنجاح'
                ], 200);
            }
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Failed to insert/update video data',
                'error_arabic' => 'فشل في إدراج/تحديث بيانات الفيديو'
            ], 500);
        }
    }

    public function courses($courseId = '')
{
    try {
        if ($courseId != "") {
            $user_id = auth('api')->id();

            // Fetch data for a specific course by ID
            $data = Course::with('courseRatings', 'courseLinks', 'wishlist')->where('id',$courseId)->get();

            if (!$data) {
                return response()->json([
                    'status' => false,
                    'message' => 'Course not found.',
                ], 404);
            }

            $userCourseLinks = UserCourseLink::where('user_id', $user_id)
                ->where('user_course_id', $courseId)
                ->orderBy('course_video_date', 'desc')
                ->get();

            foreach($data as $course){
                $userCoursecount = UserCourseLink::where('user_id', $user_id)
                ->where('user_course_id', $course->id)
                ->count();
                $course['total_journey_days'] = $course->courseLinks->count();
                $course['remaining_journey_days'] =$course['total_journey_days'] - $userCoursecount;
            }

            $userCourseVideos = [];
            $userCourseVideosDate = [];
            foreach ($userCourseLinks->toArray() as $userCourse) {
                $userCourseVideos[$userCourse['course_link_id']] = $userCourse;
                $userCourseVideosDate[] = $userCourse;
            }

            $resultArray = [];
            $i = 0;
            foreach ($data->toArray() as $course) {
                $resultCourse = $course;
                if (isset($course['course_links'])) {
                    $i = 0;
                    $j = 0;
                    foreach ($course['course_links'] as &$link){
                        if (isset($userCourseVideos[$link['id']])) {
                            $link['type'] = 'seen';
                        } else {

                            if(!empty($userCourseVideosDate))
                            {
                                $date11 = date('Y-m-d',strtotime($userCourseVideosDate[0]['course_video_date']));
                                $date22 = now()->format('Y-m-d');

                                $date1 = \Carbon\Carbon::parse($date11);
                                $date2 = \Carbon\Carbon::parse($date22);

                                if ($date1->equalTo($date2)) {
                                    $difference = 0;
                                } elseif ($date2->lessThan($date1)) {
                                    $difference = -$date1->diffInDays($date2);
                                } else {
                                    $difference = $date2->diffInDays($date1)+1;
                                }
                                if($difference>0 &&  $j == 0){
                                    $link['type'] = 'Open';
                                    $j++;
                                }else{
                                    $link['type'] = 'Not seen';
                                }
                          }else
                          {
                            if($j == 0){
                                $link['type'] = 'Open';
                                $j++;
                            }else{
                                $link['type'] = 'Not seen';
                            }
                          }
                        }
                        $resultCourse['course_links'][$i] = $link;
                        $i++;
                    }
                }
                $resultArray[] = $resultCourse;
            }

        } else {
            // Fetch a list of all courses
            $resultArray = Course::with('courseRatings', 'courseLinks', 'wishlist')->get();
            foreach($resultArray as $course){
                $userCoursecount = UserCourseLink::where('user_id', auth()->id())
                ->where('user_challenge_id', $course->id)
                ->count();
                $course['total_journey_days']=$course->course_link_count;
                $course['remaining_journey_days']=$course['total_journey_days']-$userCoursecount;
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Record fetched.',
            'message_arabic' => 'تم جلب السجل.',
            'data'   => $resultArray
        ], 200);

    } catch (Throwable $e) {
        return response()->json([
            'status' => false,
            'message' => $e->getMessage() . $e->getLine()
        ], 500);
    }

}
public function coursereadbyuser(Request $request)
{
    try {
        $userId = auth('api')->id();
        // dd($request->all());die;
        // Check if a record already exists for this user and course
        $existingRecord = UserCourseLink::where('user_id', $userId)
            ->where('user_course_id', $request['course_id'])
            ->where('course_link_id', $request['course_link_id'])
            ->first();

        if ($existingRecord) {
            // If a record exists, update the 'type' column
            // $existingRecord->update(['type' => $type]);

            return response()->json([
                'message' => 'Course Video tracking data Already Exists',
                'message_arabic' => 'تم تحديث نوع الفيديو بنجاح'
            ], 200);
        } else {
            // If no record exists, create a new record
            UserCourseLink::create([
                'user_course_id' =>  $request['course_id'],
                'user_id' =>$userId,
                'course_link_id' => $request['course_link_id'],
            ]);

            return response()->json([
                'message' => 'successful play video',
                'message_arabic' => 'تم تسجيل بيانات الفيديو بنجاح'
            ], 200);
        }
    } catch (Throwable $e) {
        return response()->json([
            'error' => 'Failed to insert/update video data',
            'error_arabic' => 'فشل في إدراج/تحديث بيانات الفيديو'
        ], 500);
    }
}
}
