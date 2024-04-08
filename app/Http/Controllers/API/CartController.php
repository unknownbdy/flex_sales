<?php

namespace App\Http\Controllers\API;

use Throwable;
use App\Models\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Cart\Purchase;
use App\Models\Course\Course;
use App\Models\Cart\PurchaseDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
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
     * Method addCourseToCart
     *
     * @param Course $course
     *
     * @return void
     */
    public function addCourseToCart(Course $course)
    {
        // return $course['actual_price'];
        try {
            $userId = $this->currentUser['id'];
            $purchaseDetails = PurchaseDetail::whereIn('purchase_id', function ($query) use ($userId) {
                $query->select('id')
                    ->from('purchases')
                    ->where('user_id', $userId);
            })
            ->where('course_id', $course['id'])
            ->count();
// return $purchaseDetails;
            if($purchaseDetails  ==0  ){
                $courses = Cart::where(
                    [
                        ['user_id',$userId],
                        ['course_id', $course['id']]
                    ]
                )->get();

                if (count($courses) == 0) {


                        $amount = $course['price'];
                        $discount_amount = $course['actual_price'] - $course['price'];

                    $cartCourses = $course->carts()->create(
                        [
                            'user_id'           => $this->currentUser['id'],
                            'price'             => $amount,
                            'discount_amount'   => $discount_amount,
                            'original_price'    => $course['actual_price']
                        ]
                    );

                    return response()->json(
                        [
                            'status' => true,
                            'message' => 'Record has been added.',
                            'message_arabic' => 'تمت إضافة السجل.',
                            'data'   => $cartCourses
                        ],
                        201
                    );
                } else {
                    return response()->json(
                        [
                            'status' => true,
                            'message' => 'Record already added to cart.',
                            'message_arabic' => 'تم إضافة السجل بالفعل إلى سلة التسوق.',
                            'data'   => $courses
                        ],
                        403
                    );
                }
            } else {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Course Already Purchased.',
                        'message_arabic' => 'الدورة التدريبية التي تم شراؤها بالفعل.',
                        'data'   => array()
                    ],
                    403
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
     * Method removeCartCourse
     *
     * @param Cart $cartCourse
     *
     * @return void
     */
    public function removeCartCourse($cartId)
    {
        // dd(1);
        try {

            Cart::where('id',$cartId)->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record has been removed from cart.',
                    'message_arabic' => 'تمت إزالة السجل من سلة التسوق.'
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

    /**
     * Method showCart
     *
     * @return void
     */
    public function showCart()
    {
        try {
            $user = $this->currentUser;

            $courses['info'] = Cart::with( 'course.courseRatings','course.courseLinks','course.wishlist')
                ->where('user_id', $user['id'])->get();

                $courseArray = [];
                $cartArray = [];

                // echo "<pre>";
                // print_r($courses['info']->toArray());
                $i = 0;
                foreach ($courses['info'] as $key => $courseInfo) {
                    $cartArray[$i]['cart_id'] = $courseInfo->toArray()['id'];
                    $cartArray[$i]['cart_price'] = $courseInfo->toArray()['price'];
                    $cartArray[$i]['cart_original_price'] = $courseInfo->toArray()['original_price'];
                    $courseArray[] = $courseInfo->toArray()['course'];
                    $i++;
                }

                // foreach ($courseArray as $key => $courseInfo) {
                    // echo "<pre>"; print_r($cartArray); die;
                    // die;
                    $j=0;
                    $coursesWithRatings = [];
                    foreach($courseArray as $value)
                    {

                    //   print_r($courseArrayDetail);

                        //   print_r($value);
                        // return $courses;
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

                // echo "<pre>"; print_r($value);
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


                // print_r($chapterWiseArray) ;

                $initialArray =  $chapterWiseArray;

                $newArray = [];
                $courseArrayDetail = [];
                foreach ($initialArray as $chapterKey => $chapterValue)
                {
                    $newChapter = [];
                    $newChapter['chapter-title'] = $chapterKey;
                    $newChapter['lessions'] = $chapterValue;
                    $newArray['chapter'][] = $newChapter;


                    $courseArrayDetail['id'] = $courseInfo->toArray()['course_id'];
                    $courseArrayDetail['price'] = $courseInfo->toArray()['price'];
                    $courseArrayDetail['original_price'] = $courseInfo->toArray()['original_price'];
                }
                if(isset($newArray['chapter'][0]['chapter-title'])){

                    $resultArray =  $newArray['chapter'];
                }
                $wishlists = 0;
                if(!empty($value['wishlist'][0])){
                    $wishlists = 1;
                }

                if(!isset($cartArray[$j]['cart_id']) && !isset($cartArray[$j]['cart_price']) && !isset($cartArray[$j]['cart_original_price'])){
                    $cartArray[$j]['cart_id'] = 0;
                    $cartArray[$j]['cart_price'] = 0;
                    $cartArray[$j]['cart_original_price'] = 0;
                }


                $coursesWithRatings[] = [
                    'id'                =>  $value['id'],
                    'cart_id'           =>  $cartArray[$j]['cart_id'],
                    'price'             =>  $cartArray[$j]['cart_price'] ,
                    'original_price'    =>  $cartArray[$j]['cart_original_price'],
                    'course_name'       =>  $value['course_name'],
                    'course_name_arabic' => $value['course_name_arabic'],
                    'sub_title'         =>  $value['sub_title'],
                    'sub_title_arabic'  =>  $value['sub_title_arabic'],
                    'description'       =>  $value['description'],
                    'description_arabic'=>  $value['description_arabic'],
                    'listing_price'     =>  (float)$value['price'],
                    'actual_price'      =>  (float)$value['actual_price'],
                    'purchase_count'    =>  $value['purchase_count'],
                    'is_wishlist'      =>  $wishlists,
                    'thumbnail'         => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'chapter'           => $resultArray

                ];

                $j++;
            }
            // }
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





            //Calculate all course prices and update cart record every time
            // we click on show cart.


            // $amount = 0;
            // foreach ($courses['info'] as $key => $value) {


            //         $amount = $value->course['price'];
            //         $discount_amount = $value->course['actual_price'] - $value->course['price'];

            //     $cartItem[] = Cart::where(
            //         [
            //             ['user_id', $user['id']],
            //             ['course_id', $value['course_id']]
            //         ]
            //     )->update(
            //         [
            //             'price'             => $amount,
            //             // 'discount_type'     => $value['course']['discount_type'],
            //             'discount_amount'   => $discount_amount,
            //             'original_price'    => $value->course['actual_price']
            //         ]
            //     );
            // }

            // $finalCourses['info'] = Cart::with('course')
            //     ->where('user_id', $user['id'])->get();

            // return response()->json(
            //     [
            //         'status' => true,
            //         'message' => 'Record fetched.',
            //         'data'   => $finalCourses
            //     ],
            //     201
            // );



        } catch (Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage().$e->getLine()
                ]
            );
        }
    }

    /**
     * Method purchaseCourses
     *
     * @return void
     */
    public function purchaseCourses()
    {
        DB::beginTransaction();

        try {
            $user = $this->currentUser;

            $courses['info'] = Cart::with('course')->where('user_id', $user['id'])->get();

            $courses['total_price'] = $courses['info']->map->only('price')->sum('price');


            $purchase = $user->purchases()->create(
                [
                    'total_courses' => count($courses['info']),
                    'price'   => $courses['total_price']

                ]
            );
            $purchaseDetail = [];
// return $courses['info'];
            foreach ($courses['info'] as $key => $value) {

                $purchaseDetail[] = $purchase->purchaseDetails()
                    ->create(
                        [
                            'course_id'         => $value['course_id'],
                            'price'             => $value['price'],
                            'discount_type'     => $value['discount_type'],
                            'discount_amount'   => $value['discount_amount'],
                            'original_price'    => $value['original_price']
                        ]
                    );
            }
            // die;

            //Delete all cart items after purchasing.
            Cart::where('user_id', $user['id'])->delete();

            DB::commit();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record added.',
                    'data'   => $purchaseDetail
                ],
                201
            );
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage().$e->getLine()
                ]
            );
        }
    }
}
