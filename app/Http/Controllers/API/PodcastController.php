<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Podcast\PodcastVideo;
use App\Models\MostViewedVideo;
use App\Models\Podcast\PodcastEpisode;
use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PodcastController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    // public function index()
    // {
    //     try {
    //         $podcasts = PodcastVideo::with('ratings','episodes')->get();


    //         foreach ($podcasts as $key => $value) {
    //             // return $value['episodes'];
    //             $ratings['rating'] = [];
    //             if (!empty($value['ratings'])) {
    //                 foreach ($value['ratings'] as $val) {
    //                     $ratings['rating'][] = $val['rating'];
    //                 }
    //             }
    //             if(!empty($value['episodes'])){
    //                 unset($value['episodes']['user_id']);
    //             }
    //             // dd($value);
    //             //Calculate the average.
    //             if (count($ratings['rating']) > 0) {
    //                 $avg = array_sum($ratings['rating']) / count($ratings['rating']);
    //             } else {
    //                 $avg = 0;
    //             }
    //             $podcastsWithRatings[] = [
    //                 'id'                => $value['id'],
    //                 'title'             => $value['teaser_english'],
    //                 'title_arabic'      => $value['teaser_arabic'],
    //                 // 'tag'               => $value['tag_english'],
    //                 // 'tag_arabic'        => $value['tag_arabic'],
    //                 'description'       => $value['description_english'],
    //                 'description_arabic'=> $value['description_arabic'],
    //                 'avg_rating'        => $avg,
    //                 'thumbnail'         => $value['thumbnail'],
    //                 'episodes'          => $value['episodes'],
    //             ];
    //         }

    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message'=> 'All records fetched.',
    //                 'data'   => $podcastsWithRatings
    //             ],
    //             200
    //         );
    //     } catch (Throwable $e) {
    //         return response()->json(
    //             [
    //                 'status' => false,
    //                 'message' => $e->getMessage()
    //             ],
    //             500
    //         );
    //     }
    // }
    public function index()
    {
        try {
            $podcasts = PodcastVideo::with('ratings', 'episodes')->get();
            $podcastsWithRatings = [];

            foreach ($podcasts as $podcast) {
                $ratings = [];

                // Extract ratings for the podcast
                if (!empty($podcast->ratings)) {
                    foreach ($podcast->ratings as $rating) {
                        $ratings[] = $rating->rating;
                    }
                }

                // Calculate the average rating for the podcast
                $avgRating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0;

                // Initialize an array to store episodes with their ratings
                $episodesWithRatings = [];

                // Add episode ratings to the array
                if (!empty($podcast->episodes)) {
                    foreach ($podcast->episodes as $episode) {
                        $episodeRatings = [];

                        // Extract ratings for the episode
                        if (!empty($episode->ratings)) {
                            foreach ($episode->ratings as $rating) {
                                $episodeRatings[] = $rating->rating;
                            }
                        }

                        // Calculate the average rating for the episode
                        $episodeAvgRating = count($episodeRatings) > 0 ? array_sum($episodeRatings) / count($episodeRatings) : 0;

                        // Add episode data with its average rating
                        $tagIds = explode(',', $episode['tags']);
                        $table['tags'] = Preference::whereIn('id', $tagIds)
                            ->select('id','preferences_name', 'arbic_preferences_name')
                            ->get()
                            ->toArray();
                        $episodesWithRatings[] = [
                            'id' => $episode->id,
                            'title' => $episode->title,
                            'title_arabic'      => $episode->title_arabic,
                            // 'tag'               => $episode->tag_english,
                            // 'tag_arabic'        => $episode->tag_arabic,
                            'description'       => $episode->description,
                            'description_arabic'=> $episode->description_arabic,
                            'tags'              => $table['tags'],
                            'link'              => $episode->link,
                            'thumbnail'         => $episode->thumbnail,
                            'avg_rating' => $episodeAvgRating,
                        ];
                    }
                }

                // Store podcast data with the average rating and episodes with their ratings
                $podcastData = [
                    'id' => $podcast->id,
                    'title' => $podcast->teaser_english,
                    'title_arabic' => $podcast->teaser_arabic,
                    'description' => $podcast->description_english,
                    'description_arabic' => $podcast->description_arabic,
                    // 'avg_rating' => $avgRating,
                    'thumbnail' => $podcast->thumbnail,
                    'episodes' => $episodesWithRatings,
                ];

                $podcastsWithRatings[] = $podcastData;
            }

            return response()->json([
                'status' => true,
                'message' => 'All records fetched.',
                'data' => $podcastsWithRatings
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Method podcastsWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function podcastsWithPagination()
    {
        try {
            // $podcasts = PodcastVideo::with('podcastTeasers')->paginate(5);
            $podcasts = PodcastVideo::with('ratings','episodes')->paginate(5);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $podcasts
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
     * Method podcastById Listen Podcast by ID
     *
     * @param Podcast $id
     *
     * @return void
     */
    public function podcastById($id)
    {
        try {
            // $podcast = PodcastVideo::where('id', $id)->with('podcastTeasers')->get();
            $podcast = PodcastVideo::where('id', $id)->with('episodes')->first();

            if(empty($podcast)){
                return response()->json(
                    [
                        'status'   => false,
                        'message'  => 'Record not found.',
                        'message_arabic' => 'تم جلب السجل.',
                    ],
                    404
                );
            }

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $podcast
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
    public function mostViewedVideo()
    {
        try {
            $mostViewedVideos = MostViewedVideo::all();

            // Count views per video type
            $mostViewedCounts = [];
            foreach ($mostViewedVideos as $viewed) {
                if ($viewed->type === 'Podcast Videos') {
                    $typeID = $viewed->type_id;

                    if (!isset($mostViewedCounts[$typeID])) {
                        $mostViewedCounts[$typeID] = 0;
                    }
                    $mostViewedCounts[$typeID]++;
                }
            }

            // Sort video types by view counts in descending order
            arsort($mostViewedCounts);

            // Fetch video details for the most viewed types
            $mostViewedVideo = [];
            $count = 0;
            foreach ($mostViewedCounts as $typeID => $views) {
                // dd($typeID);
                if ($count >= 3) {
                    break;
                }
                // Check if the views are greater than or equal to 3
                    $podcast = PodcastEpisode::find($typeID);

                    if ($podcast) {
                        $podcastData = $podcast->toArray();
                        $mostViewedVideo[] = $podcastData;
                        $count++;
                    }
                }


            return response()->json([
                'status' => true,
                'message' => 'Top three most viewed videos fetched.',
                'message_arabic' => 'تم جلب أعلى ثلاثة مقاطع فيديو مشاهدةً.',
                'data'   => $mostViewedVideo
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function newRelease()
    {
        try {
            // Retrieve the top three latest episodes by ordering by release date
            $newReleaseVideos = PodcastEpisode::with('ratings')->orderBy('id', 'desc')
                ->limit(3)
                ->get();
            foreach ($newReleaseVideos as $key => $value) {
                // return $value['episodes'];
                $ratings['rating'] = [];
                if (!empty($value['ratings'])) {
                    foreach ($value['ratings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }
                $tagIds = explode(',', $value['tags']);
                $table['tags'] = Preference::whereIn('id', $tagIds)
                    ->select('id','preferences_name', 'arbic_preferences_name')
                    ->get()
                    ->toArray();

                $newReleaseVideosWithRatings[] = [
                    'id'                => $value['id'],
                    'title'             => $value['title'],
                    'title_arabic'      => $value['title_arabic'],
                    // 'tag'               => $value['tag_english'],
                    // 'tag_arabic'        => $value['tag_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'tags'              => $table['tags'],
                    'link'              => $value['link'],
                    'thumbnail'              => $value['thumbnail'],
                    'avg_rating'        => $avg
                ];
            }

            return response()->json([
                'status' => true,
                'message' => 'Top three new release videos fetched.',
                'message_arabic' => 'تم جلب أعلى ثلاثة مقاطع فيديو مشاهدةً.',
                'data'   => $newReleaseVideosWithRatings
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function topPodcast()
    {
        try {
            // Retrieve the top three latest episodes by ordering by release date
            $newReleaseVideos = PodcastEpisode::with('ratings')->orderBy('id', 'desc')
                ->get();
            foreach ($newReleaseVideos as $key => $value) {
                // return $value['episodes'];
                $ratings['rating'] = [];
                if (!empty($value['ratings'])) {
                    foreach ($value['ratings'] as $val) {
                        $ratings['rating'][] = $val['rating'];
                    }
                }
                if (count($ratings['rating']) > 0) {
                    $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                } else {
                    $avg = 0;
                }
                $tagIds = explode(',', $value['tags']);
                $table['tags'] = Preference::whereIn('id', $tagIds)
                    ->select('id','preferences_name', 'arbic_preferences_name')
                    ->get()
                    ->toArray();
                $total_rating = 0;

                $newReleaseVideosWithRatings[] = [
                    'id'                => $value['id'],
                    'title'             => $value['title'],
                    'title_arabic'      => $value['title_arabic'],
                    // 'tag'               => $value['tag_english'],
                    // 'tag_arabic'        => $value['tag_arabic'],
                    'description'       => $value['description'],
                    'description_arabic'=> $value['description_arabic'],
                    'tags'              => $table['tags'],
                    'link'              => $value['link'],
                    'thumbnail'              => $value['thumbnail'],
                    'avg_rating'        => $avg,
                    'total_rating'      => $total_rating
                ];
            }

            return response()->json([
                'status' => true,
                'message' => 'Top five new release videos fetched.',
                'message_arabic' => 'تم جلب أفضل خمسة مقاطع فيديو للإصدار الجديد.',
                'data'   => $newReleaseVideosWithRatings
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function recent_topvideos(Request $request)
    {

        try{
                $user_id = auth('api')->user()->id; //die;
                $validator = Validator::make(
                    $request->all(),
                    [
                        'type_video_id'     => 'required',
                        'type'              => 'required',
                    ]
                );

                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                // $mostViewedVideos = MostViewedVideo::where('user_id',$user_id)->where('type_id',$request['type_video_id'])->where('type',$request['type'])->get();

                // if(!empty($mostViewedVideos->toArray()))
                // {
                //     return response()->json(
                //         [
                //             'status' => false,
                //             'message' => 'Already Added.',
                //         ],
                //         200
                //     );
                // }

                $MostVieweOrRecentdVideo   = MostViewedVideo::create(
                    [
                        'type_id'       => $request['type_video_id'],
                        'type'          => $request['type'],
                        'user_id'       => $user_id,
                    ]
                );
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Added successfully.',
                        'message_arabic' => 'اضيف بنجاح.',
                        'data'    => $MostVieweOrRecentdVideo
                    ],
                    200
                );
            }catch (Throwable $e) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => $e->getMessage()
                    ],
                    401
                );
            }

    }

    public function recent_podcast()
    {
        try{
            $user_id = auth('api')->user()->id; //die;

            $mostViewedVideos = MostViewedVideo::select('type_id', 'type', 'user_id', \Illuminate\Support\Facades\DB::raw('MAX(id) as id'))
            ->where('type', 'Podcast Videos')
            ->where('user_id', $user_id)
            ->groupBy('type_id', 'type', 'user_id')
            ->orderByDesc('id')
            ->limit(3)
            ->get();
            $podcastsWithRatings = array();

            foreach($mostViewedVideos as $recentPocast){


                $podcasts = PodcastEpisode::with('ratings')
                ->where('id',$recentPocast['type_id'])
                ->get();

                foreach ($podcasts as $key => $value)
                {
                    $ratings['rating'] = [];
                    if (!empty($value['ratings'])) {
                        foreach ($value['ratings'] as $val) {
                            $ratings['rating'][] = $val['rating'];
                        }
                    }
                    if(!empty($value['episodes'])){
                        unset($value['episodes']['user_id']);
                    }
                    if (count($ratings['rating']) > 0) {
                        $avg = array_sum($ratings['rating']) / count($ratings['rating']);
                    } else {
                        $avg = 0;
                    }
                    $podcastsWithRatings[] = [
                        'id'                => $value['id'],
                        'title'             => $value['title'],
                        'title_arabic'      => $value['title_arabic'],
                        // 'tag'               => $value['tag_english'],
                        // 'tag_arabic'        => $value['tag_arabic'],
                        'description'       => $value['description'],
                        'description_arabic'=> $value['description_arabic'],
                        'avg_rating'        => $avg,
                        'thumbnail'              => $value['thumbnail'],
                        'link'          => $value['link'],
                    ];
                }
            }
//             echo "<pre>"; print_r($podcastsWithRatings);
// die;


            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Recent Podcast',
                    'message_arabic'=> 'البودكاست الأخير',
                    'data'   => $podcastsWithRatings
                ],
                200
            );

        }catch(Throwable $e)
        {
            return response()->json(
                    [
                        'status' => false,
                        'message' => $e->getMessage()
                    ],
                    401
                );
        }
    }

}
