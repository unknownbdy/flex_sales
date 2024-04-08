<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Challenge\UserChallengeInformation;
use Illuminate\Http\Request;
use App\Models\Event\Event;
use App\Models\Podcast\PodcastVideo;
use App\Models\TVShow;
use App\Models\Collection\Collection;
use App\Models\TvInterview;
use App\Models\LiveVideo\LiveVideos;
use Throwable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Method remainingRewards
     *
     * @return void
     */
    public function remainingRewards()
    {
        try {

            $points = UserChallengeInformation::where('user_id', $this->currentUser['id'])
                ->where('completed', true)->sum('points');

            $data = [
                'total_points'        => $points,
                'discount_percentage' => 10
            ];

            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $data,
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


    public function new_releases(){
        try {
        $data = [];
        // $event = Event::select('title','arabic_title','thumbnail','location as link')
        // ->addSelect(DB::raw("'Event' as subtitle"))
        // ->latest()->take(3)->get();

        $TVShow = TVShow::select('topic_english as title','topic_arabic as arabic_title','description','description_arabic','channel_english','channel_arabic','show_english','show_arabic','link')
        ->addSelect(DB::raw("'TVShow' as subtitle"))
        ->addSelect(DB::raw("'' as 'thumbnail'"))
        ->latest()->take(3)->get();

        $TVInterview = TvInterview::select('topic_english as title','topic_arabic as arabic_title','description','description_arabic','channel_english','channel_arabic','show_english','show_arabic','link')
        ->addSelect(DB::raw("'TvInterview' as subtitle"))
        ->addSelect(DB::raw("'' as 'thumbnail'"))
        ->latest()->take(3)->get();

        // $podcast = PodcastVideo::select('teaser_english as title','teaser_arabic as arabic_title','link','thumbnail')
        // ->addSelect(DB::raw("'Podcasts' as subtitle"))
        // ->latest()->where('podcast_type',1)->take(3)->get();
        $LiveVideos = LiveVideos::select('name_english as title','name_arabic as arabic_title','description_english as description','description_arabic','channel_english','channel_arabic','show_english','show_arabic','link')
        ->addSelect(DB::raw("'LiveVideos' as subtitle"))
        ->addSelect(DB::raw("'' as 'thumbnail'"))
        ->latest()->take(3)->get();
        $data = $TVShow->concat($TVInterview)->concat($LiveVideos);

         return response()->json(
             [
                 'status'=> true,
                 'message' => "success",
                 'message_arabic' => 'نجاح',
                 'title' => "New Releases",
                 'title_arabic' => "الإصدارات الجديدة",
                 'base_path' => asset('storage/'),
                 'data' => $data,
             ],
             200
         );
        } catch (\Throwable $th) {
             return response()->json(
                 [
                     'status'=> false,
                     'message' => $th->getMessage()
                 ],
                 500
             );
        }
    }

    public function videos(){
        try {
        $data = [];
        $data['TVShow'] = TVShow::select('id as id', 'topic_english as topic_english', 'topic_arabic as topic_arabic', 'link as link',
        'channel_english as channel_english' , 'channel_arabic as channel_arabic', 'show_english as show_english', 'show_arabic as show_arabic' )
        ->addSelect(DB::raw("'' as 'thumbnail'"))->get();
        $data['TVInterview'] = TvInterview::select('id as id', 'topic_english as topic_english', 'topic_arabic as topic_arabic', 'link as link',
        'channel_english as channel_english' , 'channel_arabic as channel_arabic', 'show_english as show_english', 'show_arabic as show_arabic' )
        ->addSelect(DB::raw("'' as 'thumbnail'"))->get();
        $data['LiveVideos'] = LiveVideos::select('id as id', 'name_english as topic_english', 'name_arabic as topic_arabic', 'link as link','thumbnail as thumbnail')
        ->addSelect(DB::raw("'' as 'channel_english'"))
        ->addSelect(DB::raw("'' as 'channel_arabic'"))
        ->addSelect(DB::raw("'' as 'show_english'"))
        ->addSelect(DB::raw("'' as 'show_arabic'"))
        ->get();
         return response()->json(
             [
                 'status'=> true,
                 'message' => "success",
                 'message_arabic' => 'نجاح',
                 'title' => "Videos",
                 'title_arabic' => "أشرطة فيديو",
                 'base_path' => asset('storage/'),
                 'data' => $data,
             ],
             200
         );
        } catch (\Throwable $th) {
             return response()->json(
                 [
                     'status'=> false,
                     'message' => $th->getMessage()
                 ],
                 500
             );
        }
    }


    public function collectionsByLimit(){
        try {

            $TVShow = TVShow::select('topic_english as topic_english','topic_arabic as topic_arabic','link as link')->get();
            $TVInterview = TvInterview::select('topic_english as topic_english','topic_arabic as topic_arabic','link as link')->get();
            $LiveVideos = LiveVideos::select('name_english as topic_english','name_arabic as topic_arabic','link as link')->get();
            $records = $LiveVideos->concat($TVShow)->concat($TVInterview);
            $randomKeys = array_rand($records->toArray(), 3);
            $data = [];
            foreach ($randomKeys as $key) {
                $data[] = $records->toArray()[$key];
            }
             return response()->json(
                 [
                     'status'=> true,
                     'message' => "success",
                     'message_arabic' => 'نجاح',
                     'title' => "Videos",
                     'title_arabic' => "أشرطة فيديو",
                     'base_path' => asset('storage/'),
                     'data' => $data,
                 ],
                 200
             );
            } catch (\Throwable $th) {
                 return response()->json(
                     [
                         'status'=> false,
                         'message' => $th->getMessage()
                     ],
                     500
                 );
            }
    }
    public function collectionsbyadmin()
{
    try {
        $collections = Collection::all();
        $tvshows = [];
        $tvInterviews = [];
        $liveVideos = [];

        foreach ($collections as $data) {
            if ($data->type_id == 1) {
                $tvshows = array_merge($tvshows, TVShow::whereIn('id', explode(',', $data->link_id))->get()->toArray());
            }
            if ($data->type_id == 2) {
                $tvInterviews = array_merge($tvInterviews, TvInterview::whereIn('id', explode(',', $data->link_id))->get()->toArray());
            }
            if ($data->type_id == 3) {
                $liveVideos = array_merge($liveVideos, LiveVideos::whereIn('id', explode(',', $data->link_id))->get()->toArray());
            }
        }

        $liveVideosArr = [];
        foreach($liveVideos as $liveVideosVal)
        {
            $liveVideosArr[] = array(
                                    'id'                =>  $liveVideosVal['id'],
                                    'topic_english'     => $liveVideosVal['name_english'],
                                    'topic_arabic'      => $liveVideosVal['name_arabic'],
                                    'channel_english'   => '',
                                    'channel_arabic'     => '',
                                    'show_english'      => $liveVideosVal['name_english'],
                                    'show_arabic'       => $liveVideosVal['name_arabic'],
                                    'tag_english'       => $liveVideosVal['tag_english'],
                                    'tag_arabic'        => $liveVideosVal['tag_arabic'],
                                    'tag_id'            => $liveVideosVal['tag_id'],
                                    'description'       => $liveVideosVal['description_english'],
                                    'description_arabic' => $liveVideosVal['description_arabic'],
                                    'link'              => $liveVideosVal['link'],
                                    'thumbnail'         => $liveVideosVal['thumbnail'],
                                    'created_at'        => $liveVideosVal['created_at'],
                                    'updated_at'        => $liveVideosVal['updated_at']
                                );
        }

        $combinedData =  array_merge($tvshows,$tvInterviews,$liveVideosArr);

        return response()->json(
            [
                'status' => true,
                'message' => "success",
                'message_arabic' => 'نجاح',
                'title' => "Videos",
                'title_arabic' => "أشرطة فيديو",
                'data' => $combinedData,
            ],
            200
        );
    } catch (\Throwable $th) {
        return response()->json(
            [
                'status' => false,
                'message' => $th->getMessage()
            ],
            500
        );
    }
}


}
