<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Challenge\ChallengeVideo;
use App\Models\Challenge\EnlightingChallenge;
use App\Models\Challenge\UserChallengeInformation;
use App\Models\Challenge\Challenge;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class EnlightingChallengeController extends Controller
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
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {

            $challenges = Challenge::withCount('challengeLink')->get();


            foreach($challenges as $challenge){
                $userChallengecount = UserChallengeInformation::where('user_id', auth()->id())
                ->where('user_challenge_id', $challenge->id)
                ->count();
                $challenge['total_journey_days']=$challenge->challenge_link_count;
                $challenge['remaining_journey_days']=$challenge['total_journey_days']-$userChallengecount;
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $challenges
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
     * Method challengesByLimit
     *
     * @return void
     */
    public function challengesByLimit()
    {
        try {

            $challenges = challenge::withCount('challengeLink')->take(3)->get();
            foreach($challenges as $challenge){
                $userChallengecount = UserChallengeInformation::where('user_id', auth()->id())
                ->where('user_challenge_id', $challenge->id)
                ->count();
                $challenge['total_journey_days']=$challenge->challenge_link_count;
                $challenge['remaining_journey_days']=$challenge['total_journey_days']-$userChallengecount;
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $challenges
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
     * Method showChallenge
     *
     * @param EnlightingChallenge $enlighting_challenge
     *
     * @return void
     */
    public function showChallenge(EnlightingChallenge $enlighting_challenge)
    {
        try {

            $challenges = $enlighting_challenge->challengeVideos;

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $challenges
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
     * Method challengesReadByUser
     *
     * @param ChallengeVideo $challenge_video
     *
     * @return void
     */

    public function challengeByUser(Request $request){

        // print_r($request->all()); die;

    $challenge = Challenge::join('challenges_link', 'challenge.id', '=', 'challenges_link.challenge_id')
    ->where('challenge.id', $request['user_challenge_id'])
    ->where('challenges_link.id', $request['challenge_video_id'])
    ->select('challenge.*')
    ->get();

    if(empty($challenge->toArray())){
        return response()->json(
            [
                'status' => true,
                'message' => 'Challenge Video Not Found',
                'message_arabic' => 'لم يتم العثور على فيديو التحدي'
            ],
            200
        );
    }else{

       $checkAlready = UserChallengeInformation::where('user_id',$request['user_id'])
                        ->where('user_challenge_id',$request['user_challenge_id'])
                        ->where('challenge_video_id',$request['challenge_video_id'])
                        ->where('day',$request['day'])
                        ->whereDate('challenge_video_date',now()->format('Y-m-d'))
                        ->get();

            // echo "<pre>"; print_r($checkAlready->toArray()); die;

            if(empty($checkAlready->toArray()))
            {
                try{
                    $userChallenge   = UserChallengeInformation::create(
                                    [
                                        'user_id'            => $request['user_id'],
                                        'user_challenge_id'  => $request['user_challenge_id'],
                                        'challenge_video_id' => $request['challenge_video_id'],
                                        'day'                => $request['day'],
                                        'completed'          => $request['completed'],
                                        'points'             => $request['points'],
                                        'challenge_video_date' => now()->format('Y-m-d')
                                    ]
                                );
                                $freshData = $userChallenge->fresh();

                                return response()->json(
                                    [
                                        'status' => true,
                                        'message' => 'Record Created.',
                                        'message_arabic' => 'تم جلب السجل.',
                                        'data'   => $freshData
                                    ],
                                    200
                                );

                }catch (Throwable $e)
                {
                    return response()->json(
                        [
                            'status' => false,
                            'message' => $e->getMessage()
                        ],
                        500
                    );
                }

            }else
            {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Challenge Video Already Added',
                        'message_arabic' => 'تمت إضافة فيديو التحدي بالفعل',
                        'data' => $checkAlready
                    ],
                    200
                );
            }

    }



    }


    public function challengesReadByUser($challenge_video)
    {
        try {

            $challenges = UserChallengeInformation::where('id', $challenge_video)
                ->update(
                    [
                        'completed'  => 1
                    ]
                );

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $challenges
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


    public function challenges($challengeId=''){
        // return $challengeId;
        try {
            if($challengeId!="")
            {
                $checkUserSeenVideo = UserChallengeInformation::where('user_id',auth('api')->id())
                ->where('user_challenge_id',$challengeId)
                ->orderBy('challenge_video_date','desc')
                ->get();
                // dd($checkUserSeenVideo->toArray());die;
                $data = Challenge::with('challengeLink')->withCount('challengeLink')->where('id',$challengeId)->get();
                foreach($data as $challenge){
                    $userChallengecount = UserChallengeInformation::where('user_id', auth()->id())
                    ->where('user_challenge_id', $challenge->id)
                    ->count();
                    $challenge['total_journey_days']=$challenge->challenge_link_count;
                    $challenge['remaining_journey_days']=$challenge['total_journey_days']-$userChallengecount;
                }

                $userChallengeVideos = [];
                $userChallengeVideosDate = [];
                foreach ($checkUserSeenVideo->toArray() as $userChallenge) {
                    $userChallengeVideos[$userChallenge['challenge_video_id']] = $userChallenge;
                    $userChallengeVideosDate[] = $userChallenge;
                }

                $resultArray = [];
                $i = 0;
                foreach ($data->toArray() as $challenge) {
                    $resultChallenge = $challenge;
                    if (isset($challenge['challenge_link'])) {
                        $i = 0;
                        $j = 0;
                        foreach ($challenge['challenge_link'] as &$link){
                            if (isset($userChallengeVideos[$link['id']])) {
                                $link['type'] = 'seen';
                            } else {

                                if(!empty($userChallengeVideosDate))
                                {
                                    $date11 = date('Y-m-d',strtotime($userChallengeVideosDate[0]['challenge_video_date']));
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
                            $resultChallenge['challenge_link'][$i] = $link;
                            $i++;
                        }
                    }
                    $resultArray[] = $resultChallenge;
                }
            }
            else{
                $resultArray = Challenge::with('challengeLink')->withCount('challengeLink')->get();
                foreach($resultArray as $challenge){
                    $userChallengecount = UserChallengeInformation::where('user_id', auth()->id())
                    ->where('user_challenge_id', $challenge->id)
                    ->count();
                    $challenge['total_journey_days']=$challenge->challenge_link_count;
                    $challenge['remaining_journey_days']=$challenge['total_journey_days']-$userChallengecount;
                }
            }
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $resultArray
                ],
                200
            );
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
    public function challengeBytag()
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
            // dd($array);die;

            // $challenges = Challenge::whereRaw("CONCAT(',', tag_ids, ',') REGEXP ?", [',' . implode('|', $array) . ','])->get();
            // Retrieve all data
            $allChallenges = Challenge::withCount('challengeLink')->get();
            foreach($allChallenges as $challenge){
                $userChallengecount = UserChallengeInformation::where('user_id', auth()->id())
                ->where('user_challenge_id', $challenge->id)
                ->count();
                $challenge['total_journey_days']=$challenge->challenge_link_count;
                $challenge['remaining_journey_days']=$challenge['total_journey_days']-$userChallengecount;
            }

            // Filter matching data
            $matchingChallenges = $allChallenges->filter(function ($challenge) use ($array) {
                $tagIds = explode(',', $challenge->tag_ids);
                foreach ($array as $tag) {
                    if (in_array($tag, $tagIds)) {
                        return true; // Match found, include in filtered result
                    }
                }
                return false; // No match found, exclude from filtered result
            });

            // Merge matching data at the beginning of all data
            $challenges = $matchingChallenges->merge($allChallenges->diff($matchingChallenges));


            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $challenges
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
