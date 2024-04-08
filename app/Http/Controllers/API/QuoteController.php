<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Podcast\PodcastEpisode;
use App\Models\Podcast\PodcastVideo;
use App\Models\Quote\Quote;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class QuoteController extends Controller
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
     * Method show
     *
     * @param Quote $quote
     *
     * @return void
     */
    public function show( $quote)
    {
        try {

            $quote = Quote::where('id', $quote)->first();

            if(empty($quote)){
                return response()->json(
                    [
                        'status' => false,
                        'message'=> "Quote not found.",
                        'message_arabic'=> "لم يتم العثور على الاقتباس."
                    ],
                    404
                );
            }
            return response()->json(
                [
                    'status' => true,
                    'data'   => $quote
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
     * Method storeQuote
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    // public function storeQuote(Request $request)
    // {
    //     try {
    //         $validator = Validator::make(
    //             $request->all(),
    //             [
    //                 'image' => 'required',
    //             ]
    //         );

    //         if ($validator->fails()) {
    //             return response()->json($validator->errors(), 400);
    //         }

    //         $user = User::where('id', auth('api')->id())->first();
    //         $input = $request->all();

    //         //Store banner for event.
    //         if (!empty($input['image'])) {
    //             $quoteFile = $request->file('image');
    //             $quoteImage = (string)$quoteFile->move(
    //                 'quotes/images',
    //                 time() . '.' . $quoteFile->getClientOriginalExtension()
    //             );
    //         }

    //         $quote = Quote::create(
    //             [
    //                 'user_id' => $user['id'],
    //                 'image' => $quoteImage
    //             ]
    //         );

    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message' => 'Quote added.',
    //                 'data'   => $quote
    //             ],
    //             200
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
     * Method quotesOfDay This function is for showing
     * random 5 qoutes
     *
     * @return void
     */
    public function quotesOfDay()
    {
        try {
            //whereDate('created_at', Carbon::today())
            //->
            $quotes = Quote::inRandomOrder()->limit(4)->get();
            $podcastArray = [];
            $quotes->transform( function($item,$val){

               $podcast_id = explode(',',$item->podcast_id);
               $item['podcast'] = PodcastEpisode::whereIn('id',$podcast_id)->limit(2)->get()->toArray();
              return  $item;
            }  );


            return response()->json(
                [
                    'status' => true,
                    'message'=> 'Record fetched',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $quotes
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
}
