<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course\Course;
use App\Models\Course\CourseLink;
use App\Models\Wishlist\Wishlist;
use Illuminate\Http\Request;
use Throwable;

class WishlistController extends Controller
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
     * Method userWishlist This function is for fetching wishlist
     * based on logged in user
     *
     * @return void
     */

     public function userAddWish(Request $request)
    {
        try{

            $result = Wishlist::where('user_id',$request['user_id'])->where('course_id',$request['course_id'])->get();
            if(!empty($result->toArray())){

                Wishlist::where('id', $result->toArray()[0]['id'])
                ->where('user_id', $this->currentUser['id'])->delete();
                // $course = Course::find($request->course_id);
                // $course->update(['is_wishlists' => false]);

                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Remove From Wishlist.',
                        'message_arabic' => 'إزالة من قائمة الرغبات.'
                    ]
                );
            }else
            {
                $userWishList   = Wishlist::create(
                            [
                                'user_id'            => $request['user_id'],
                                'course_id'          => $request['course_id'],
                            ]
                        );
                        // $course = Course::find($request->course_id);
                        // $course->update(['is_wishlists' => true]);
                        $freshData = $userWishList->fresh();
                        $wishlistCourses = Wishlist::with('Course.courseRatings','Course.courseLinks')
                        ->where('user_id',$this->currentUser['id'])
                        ->get();
            // echo "<pre>";
            // print_r($wishlistCourses->toArray()); die;
            // return $courses;
            $courses = [];
            foreach($wishlistCourses as $coursesVal)
            {
                $courses[] = $coursesVal->toArray()['course'];
            }
                // print_r($courses);// die;

                foreach ($courses as $key => $value)
                {
                    // echo "<pre>"; print_r($value);

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
                    //  print_r($value['course_links']);

                if (!empty($value['course_links']))
                {


                    foreach ($value['course_links'] as $linkval)
                    {
                        $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }
                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                // $chapterWiseArray['chapter-title'.$chapter_id][] = $linkval;
                                $chapterWiseArray['Chapter '.$chapter_id][] = $linkval;
                            }
                        }
                    }
                }

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
                // return $resultArray;
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
                    'is_wishlist'       => 1,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }

            //   die;
// echo "<pre>"; print_r($coursesWithRatings); die;
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Added Into Wishlist.',
                    'message_arabic' => 'تمت الإضافة إلى قائمة الرغبات.',
                    'data'    => $coursesWithRatings
                ],
                201
            );




                        // return response()->json(
                        //     [
                        //         'status' => true,
                        //         'message' => 'Added Into Wishlist.',
                        //         'data'   => $freshData
                        //     ],
                        //     200
                        // );
            }

        }catch (Throwable $e)
        {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage().$e->getLine()
                ],
                500
            );
        }
    }

    public function userWishlist()
    {
        try {
            // $wishlistItems = Wishlist::where('user_id', $this->currentUser['id'])->get();

            // $wishlistData = [];

            // foreach ($wishlistItems as $wishlistItem) {
            //     $course = Course::with('courseRatings', 'courseLinks', 'wishlist')->find($wishlistItem->course_id);

            //     if ($course) {
            //         $course->is_wishlist = 1; // Add the 'is_wishlist' flag to the course object
            //         $wishlistData[] = $course;
            //     }
            // }

            // return response()->json(
            //     [
            //         'status' => true,
            //         'message' => 'Wishlist items fetched.',
            //         'data' => $wishlistData
            //     ]
            // );
            $wishlistCourses = Wishlist::with('courses.courseRatings','courses.courseLinks')
                        ->where('user_id',$this->currentUser['id'])
                        ->get();
            // echo "<pre>";
            // print_r($wishlistCourses->toArray()); die;
            // return $courses;
            $courses = [];
            $coursesWithRatings = [];
            foreach($wishlistCourses as $coursesVal)
            {
                $courses[] = $coursesVal->toArray()['courses'];
            }
                // print_r($courses); die;

                foreach ($courses as $key => $value)
                {

                    $ratings['rating'] = [];
                    $totalChapter = [];
                    $chapterWiseArray = [];

                    if (!empty($value['courseRatings'])) {
                        foreach ($value['courseRatings'] as $val) {
                            $ratings['rating'][] = $val['rating'];
                        }
                    }
                    // print_r($key);

                    //Calculate the average.
                    if (count($ratings['rating']) > 0) {
                        $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                    } else {
                        $avg = 0;
                    }
                    //  print_r($avg);

                if (!empty($value['course_links']))
                {
                    foreach ($value['course_links'] as $linkval)
                    {
                        $totalChapter[$linkval['chapter_id']] = $linkval['chapter_id'];
                    }
                    foreach ($totalChapter as $chapter_id)
                    {
                        foreach ($value['course_links'] as $linkval)
                        {
                            if($chapter_id==$linkval['chapter_id'])
                            {
                                // $chapterWiseArray['chapter-title'.$chapter_id][] = $linkval;
                                $chapterWiseArray['Chapter '.$chapter_id][] = $linkval;
                            }
                        }
                    }
                }


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
                // print_r($resultArray);
                // return $resultArray;
                $coursesWithRatings[] = [
                    'id'                => $value['id'],
                    'course_name'       => $value['course_name'],
                    'course_name_arabic'=> $value['course_name_arabic'],
                    'sub_title'         => $value['sub_title'],
                    'sub_title_arabic'  => $value['sub_title_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'listing_price'     => (float)$value['price'],
                    'actual_price'      => (float)$value['actual_price'],
                    'purchase_count'    => $value['purchase_count'],
                    'is_wishlist'       => 1,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray
                ];
            }

            if(!empty($coursesWithRatings)){
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Added Into Wishlist.',
                        'message_arabic' => 'تمت الإضافة إلى قائمة الرغبات.',
                        'data'    => $coursesWithRatings
                    ],
                    201
                );
            }else{
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Record not found',
                        'message_arabic' => 'لم يتم العثور على السجل'
                    ],
                    201
                );

            }


        } catch (Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage().$e->getLine()
                ],
                500
            );
        }
    }


    /**
     * Method removeCourseWishlist
     *
     * @param Wishlist $wishlist
     *
     * @return void
     */
    public function removeCourseWishlist($wishlist)
    {
        try {
            $wishlist = Wishlist::where('id', $wishlist)
                ->where('user_id', $this->currentUser['id'])->delete();

            if ($wishlist == false) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Record not found.',
                        'message_arabic' => 'لم يتم العثور على السجل'
                    ]
                );
            }
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record deleted.',
                    'message_arabic' => 'تم حذف السجل.'
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

    /**
     * Method wishlistByPagination
     *
     * @return void
     */
    public function wishlistByPagination()
    {
        try {
            $wishlist = Wishlist::where('user_id', $this->currentUser['id'])
                            ->paginate(2);
            foreach ($wishlist as &$item) {
                $item['is_wishlist'] = 1;
            }
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم حذف السجل.',
                    'data'    => $wishlist
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
