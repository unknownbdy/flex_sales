<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Course\Course;
use App\Models\Challenge\Challenge;
use App\Models\Podcast\PodcastEpisode;
use App\Models\TvInterview\TvInterview;
use App\Models\TvShow\TVShow;
use App\Models\Podcast\PodcastVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class HandpickedController extends Controller
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
     * Method handpickedCourses
     *
     * @return void
     */
    // public function handpickedCourses()
    // {
    //     try {
    //         $courses = Course::with('courseRatings')->get();

    //         foreach ($courses as $key => $value) {
    //             $ratings['rating'] = [];
    //             if (!empty($value['courseRatings'])) {
    //                 foreach ($value['courseRatings'] as $val) {
    //                     $ratings['rating'][] = $val['rating'];
    //                 }
    //             }

    //             //Calculate the average.
    //             if (count($ratings['rating']) > 0) {
    //                 $avg = array_sum($ratings['rating']) / count($ratings['rating']);
    //             } else {
    //                 $avg = 0;
    //             }
    //             $handpickedCourses[] = [
    //                 'id'                => $value['id'],
    //                 'course_name'       => $value['course_name'],
    //                 'course_name_arabic' => $value['course_name_arabic'],
    //                 'tag'               => $value['tag'],
    //                 'tag_arabic'        => $value['tag_arabic'],
    //                 'description'       => $value['description'],
    //                 'description_arabic' => $value['description_arabic'],
    //                 'purchase_count'    => $value['purchase_count'],
    //                 'avg_rating'        => $avg
    //             ];
    //         }
    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message' => 'Record fetched.',
    //                 'data'    => $handpickedCourses
    //             ],
    //             201
    //         );
    //     } catch (Throwable $e) {
    //         return response()->json(
    //             [
    //                 'status'  => false,
    //                 'message' => $e->getMessage(),
    //             ],
    //             500
    //         );
    //     }
    // }

    /**
     * Method handpickedItemById
     *
     * @param Course $course
     *
     * @return void
     */
    // public function handpickedItemById(Course $course)
    // {
    //     try {
    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message' => 'Record fetched.',
    //                 'data'    => $course
    //             ],
    //             201
    //         );
    //     } catch (Throwable $e) {
    //         return response()->json(
    //             [
    //                 'status' => false,
    //                 'message' => $e->getMessage()
    //             ]
    //         );
    //     }
    // }

    /**
     * Method handpickedItemByLimit
     *
     * @return void
     */
    // public function handpickedItemByLimit()
    // {
    //     try {

    //         $courses = Course::with('courseRatings')->paginate(2);

    //         foreach ($courses as $key => $value) {
    //             $ratings['rating'] = [];
    //             if (!empty($value['courseRatings'])) {
    //                 foreach ($value['courseRatings'] as $val) {
    //                     $ratings['rating'][] = $val['rating'];
    //                 }
    //             }

    //             //Calculate the average.
    //             if (count($ratings['rating']) > 0) {
    //                 $avg = array_sum($ratings['rating']) / count($ratings['rating']);
    //             } else {
    //                 $avg = 0;
    //             }
    //             $handpickedCourses[] = [
    //                 'id'                => $value['id'],
    //                 'course_name'       => $value['course_name'],
    //                 'course_name_arabic'=> $value['course_name_arabic'],
    //                 'tag'               => $value['tag'],
    //                 'tag_arabic'        => $value['tag_arabic'],
    //                 'description'       => $value['description'],
    //                 'description_arabic'=> $value['description_arabic'],
    //                 'purchase_count'    => $value['purchase_count'],
    //                 'avg_rating'        => $avg
    //             ];
    //         }
    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message' => 'Record fetched.',
    //                 'data'    => $handpickedCourses
    //             ],
    //             201
    //         );

    //     } catch (Throwable $e) {
    //         return response()->json(
    //             [
    //                 'status' => false,
    //                 'message' => $e->getMessage()
    //             ]
    //         );
    //     }
    // }


    public function handpickedForYou($limit=''){
        try {
            // $data = array();
            $user = Auth::guard('api')->user();
            $tags = $user->preferences_ids;
            // echo $tags = str_replace(['[', ']'], '', $tags);
            // // die;


            $preferences_ids = [];
            $array = [];
            if(!empty($tags))
            {
                $inputString = $tags;
                $preferences_ids = str_replace(['[', ']'], '', $inputString);
                $parts = explode(',', $preferences_ids);
                foreach ($parts as $part) {
                    $array[] = (int)$part;
                }
            }
            $PodcastVideo =  PodcastEpisode::select('title as title_english','title_arabic as title_arabic' ,'link','thumbnail' )
            ->addSelect(DB::raw("'Podcast' as type"))
            ->whereRaw("CONCAT(',', tags, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();


            $Article =  Article::select('title_english as title_english','title_arabic as title_arabic' ,'id as link','image as thumbnail' )
            ->addSelect(DB::raw("'Article' as type"))
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $tv_interview =  TvInterview::select('topic_english as title_english','topic_arabic as title_arabic' ,'link as link','link as thumbnail')
            ->addSelect(DB::raw("'TvInterview' as type"))
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $TVShow =  TVShow::select('topic_english as title_english','topic_arabic as title_arabic' ,'link as link','link as thumbnail')
            ->addSelect(DB::raw("'TVShow' as type"))
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $records = $PodcastVideo->concat($Article)->concat($tv_interview)->concat($TVShow);
            // echo "<pre>"; print_r($TVShow->toArray()); die;
            if($limit!=""){

                $randomKeys = array_rand($records->toArray(), 3);
                $data = [];

                foreach ($randomKeys as $key) {
                    $data[] = $records->toArray()[$key];
                }
            }
            else{
                $data = $records;
            }


            return response()->json([
                'status' => false,
                'message' => 'Success',
                'base_path' => asset('storage/'),
                'titile' => 'Handpicked For You',
                'titile_arabic' => 'اختارته لك',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function handpickedForYouLimit(){
        try {
            $data = array();
            $user = Auth::guard('api')->user();
            $tags = $user->preferences_ids;
            $preferences_ids = [];
            $array = [];
            if(!empty($tags))
            {
                $inputString = $tags;
                $preferences_ids = str_replace(['[', ']'], '', $inputString);
                $parts = explode(',', $preferences_ids);
                foreach ($parts as $part) {
                    $array[] = (int)$part;
                }
            }
            $PodcastVideo =  PodcastEpisode::select('title as title_english','title_arabic as title_arabic' ,'link','thumbnail' )
            ->addSelect(DB::raw("'Podcast' as type"))
            ->whereRaw("CONCAT(',', tags, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $Article =  Article::select('title_english as title_english','title_arabic as title_arabic' ,'id as link','image as thumbnail' )
            ->addSelect(DB::raw("'Article' as type"))
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $tv_interview =  TvInterview::select('topic_english as title_english','topic_arabic as title_arabic' ,'link as link','link as thumbnail')
            ->addSelect(DB::raw("'TvInterview' as type"))
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $TVShow =  TVShow::select('topic_english as title_english','topic_arabic as title_arabic' ,'link as link','link as thumbnail')
            ->addSelect(DB::raw("'TVShow' as type"))
            ->whereRaw("CONCAT(',', tag_id, ',') REGEXP ?", [',' . implode('|', $array) . ','])
            ->orWhereRaw("1=1")
            ->latest()->take(5)->get();

            $data = $PodcastVideo->concat($Article)->concat($tv_interview)->concat($TVShow);
            $randomKeys = array_rand($data->toArray(), 3);
            $randomData = [];

            foreach ($randomKeys as $key) {
                $randomData[] = $data->toArray()[$key];
            }

            return response()->json([
                'status' => false,
                'message' => 'Success',
                'titile' => 'Handpicked For You',
                'titile_arabic' => 'اختارته لك',
                'data' => $randomData,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
