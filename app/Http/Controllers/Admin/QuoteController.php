<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AboutDataTable;
use App\DataTables\QuoteDataTable;
use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\About\AboutMedia;
use App\Models\Podcast\PodcastEpisode;
use App\Models\Podcast\PodcastVideo; 
use App\Models\Quote\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class QuoteController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index(QuoteDataTable $dataTable)
    {
        if (Auth::user()->can('manage-quote')) {
        return $dataTable->render('quote.index');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        $podcast = PodcastEpisode::all();
        return view('quote.create', compact('podcast'));
    }


    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function store(Request $request)
    {

        // echo "<pre>"; print_r($request->all()); die;

        $this->validate($request, [
            'image' => 'required',
            'podcast_id' => 'required'
        ]);

        $request['podcast_id']  = implode(',',$request['podcast_id']);
        // echo "<pre>"; print_r($request['podcast_id']); die;
        $image = $request->file('image');
        $quoteImage = $image->move(
            'quotes/images',
            time() . '.' . $image->getClientOriginalExtension()
        );
        Quote::create(
            [
                'user_id'   => Auth::id(),
                'title'     => $request['title'],
                'podcast_id'=> $request['podcast_id'],
                'image'     => $quoteImage
            ]
        );

        return redirect()->route('quote.index')
            ->with('success', __('New quote has been added.'));
    }
    
    /**
     * Method show
     *
     * @param Quote $quote [explicite description]
     *
     * @return void
     */
    public function show(Quote $quote)
    {
        $id = $quote->toArray()['id'];
        

            $quotes = Quote::where('id',$id)->get();
            $podcastArray = [];
            $quotes->transform( function($item,$val){

                $podcast_id = explode(',',$item->podcast_id);
               $item['podcast'] = PodcastEpisode::whereIn('id',$podcast_id)->select('title','title_arabic')->get()->toArray();
              return  $item;
            }  );
 
        $podcastStr = '';
        if(!empty($quotes->toArray()[0]['podcast']))
        {
            $podacastArr = $quotes->toArray()[0]['podcast']; 
            foreach($podacastArr as $podacastArrVal){
                $podcastStr .= implode(',',$podacastArrVal).' ,';
            }
        } 
        return view('quote.show', compact('quote','podcastStr'));
    }

    // // //testimonial video edit
    public function edit($id)
    {
        $podcast = PodcastEpisode::all();
        $quote = Quote::where('id', $id)->first();
        return view('quote.edit', compact('quote','podcast'));
    }
    /**
     * Method update
     *
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */


     public function update(Request $request, $id)
    {
        $this->validate($request, [
            'podcast_id' => 'required' 
        ]);

        
        if(!empty($request['podcast_id'])){

            $request['podcast_id']  = implode(',',$request['podcast_id']);
        }else{
            $request['podcast_id']  = [];
        }

        if($request->file('quot_image'))
        { 
            $image = $request->file('quot_image');
            $quoteImage = $image->move(
                'quotes/images',
                time() . '.' . $image->getClientOriginalExtension()
            );
            //echo $quoteImage;
            $request['image'] = $quoteImage;
        } 
       // echo "<pre>"; print_r($request->all()); die;
 


         $livevideo = Quote::findOrFail($id);
         
         $input = $request->all();

         unset($input['hiddenImage']);
         unset($input['_method']);
         unset($input['_token']);
         unset($input['quot_image']);
        //  echo "<pre>"; print_r($input); die;

        $livevideo->fill($input)->save();
        
        
        // Quote::where('id',$id)->update(
        //     $input
        // );
        
        
        return redirect()->route('quote.index')->with('success', __('New quote has been updated.'));
    }

    // public function update(Request $request, $id)
    // {
    //     $about = About::findOrFail($id);
    //     $input = $request->all();
    //     if ($request->hasFile('images')) {
    //         $images = $request->file('images');

    //         foreach ($images as $image) {
    //             $aboutImage = $image->move(
    //                 'about-section/images',
    //                 time() . '.' . $image->getClientOriginalExtension()
    //             );
    //             AboutMedia::create(
    //                 [
    //                     'about_id' => $about['id'],
    //                     'type'     => 'image',
    //                     'url'      => $aboutImage
    //                 ]
    //             );
    //         }
    //     }
    //     $about->fill($input)->save();
    //     return redirect()->route('about.index')
    //         ->with('success', __('About updated successfully'));
    // }
    /**
     * Method destroy
     *
     * @param $id $id 
     *
     * @return void
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return redirect()->route('quote.index')->with('success', __('Quote has been deleted.'));
    }
}
