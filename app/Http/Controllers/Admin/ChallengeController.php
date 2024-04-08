<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ChallengeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Challenge\Challenge;
use App\Models\Challenge\ChallengeLink;
use App\Models\InstagramVideo\LiveVideoChapter;
use App\Models\InstagramVideo\LiveVideoLink;
use App\Models\Preference;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;


class ChallengeController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(ChallengeDataTable $dataTable)
    {
        return $dataTable->render('Challenge.index');
    }

    //instagram video create
    public function create()
    {
        $preferences = Preference::all();
        return view('Challenge.create', compact('preferences'));
        // return view('Challenge.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());die;
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description_english'] = $_POST['description_english'];
        $this->validate($request, [
            'title_english' => 'required',
            'title_arabic' => 'required',
            'description_arabic' => 'required',
            'description_english' => 'required'
        ]);

        $tag_ids = implode(',',$request['tag_id']);


        $livevideo   = Challenge::create(
            [
                'title_english' => $request['title_english'],
                'title_arabic' => $request['title_arabic'],
                'tag_ids' => $tag_ids,
                'description_arabic' => $request['description_arabic'],
                'description_english' => $request['description_english'],
            ]
        );


    //     // dd($livevideo);
    //     foreach ($request->addmore as $add) {
    //         //instagramVideoLink::create($add)->with('live_video);
    //         $image = $request->file('thumbnail');
    //         $thumbImage = $image->move('challenge/thumbnails', time() . '.' . $image->getClientOriginalExtension());
    //         $data = new ChallengeLink();
    //         $data->title_english = $add['title_english'];
    //         $data->title_arabic = $add['title_arabic'];
    //         $data->tv_show_name = $add['tv_show_name'];
    //         $data->channel_name = $add['channel_name'];
    //         $data->thumbnail = isset($thumbImage) ? $thumbImage : null;
    //         $data->video_link = $add['video_link'];
    //         $data->day = $add['day'];
    //         $data->challenge_id = $livevideo['id'];
    //         $data->save();
    //     }
    //     return redirect()->route('Challenge.index')
    //         ->with('success', __('created successfully'));
    // }
    foreach ($request->addmore as $key => $add) {
        // $image = $add['thumbnail'];
        $image = $add['thumbnail'];// Get the thumbnail image from the form data
        if ( $image->isValid()) {
            $thumbImage = $image->move('challenge/thumbnails',  $key  . '_' . time() . '.'. $image->getClientOriginalExtension());
        } else {
            $thumbImage = null;
        }
        $data = new ChallengeLink();
        $data->title_english = $add['title_english'];
        $data->title_arabic = $add['title_arabic'];
        $data->tv_show_name = $add['tv_show_name'];
        $data->channel_name = $add['channel_name'];
        $data->thumbnail = isset($thumbImage) ? $thumbImage : $add['thumbnail'];
        $data->video_link = $add['video_link'];
        $data->day = $add['day'];
        $data->challenge_id = $livevideo['id'];
        $data->save();
    }

    return redirect()->route('Challenge.index')
        ->with('success', __('created successfully'));
    }

    //Challenge video show
    public function show($id)
    {
        $user = Challenge::find($id);

        return view('Challenge.show', compact('user'));
    }

    //instagram video edit
     public function edit($id)
    {
        $preferences = Preference::all();
        $user = Challenge::with('challengeLinks','preferences')->where('id', '=', $id)->first();
        return view('Challenge.edit', compact('user','preferences'));

    }
     public function update(Request $request, $id)
    {
       // dd($request->all());
       $request['description_arabic'] = $_POST['description_arabic'];
        $request['description_english'] = $_POST['description_english'];
        $request['tag_ids'] = implode(',',$request['tag_id']);
        $livevideo = Challenge::findOrFail($id);
        $input = $request->all();
        $livevideo->fill($input)->save();



        foreach ($request->addmore as  $key => $add) {

            if(isset($add['thumbnail'])){
                $thumbnail = $add['thumbnail'];
                if($thumbnail->isValid()){
                    $add['thumbnail'] = $thumbnail->move('challenge/thumbnails',  $key  . '_' . time() . '.'. $thumbnail->getClientOriginalExtension());
                    unset($add['hiddenimage']);
                }
            }
            else{
                $add['thumbnail'] = $add['hiddenimage'];
                unset($add['hiddenimage']);

            }

            if(isset($add['id'])){

                // echo '<pre>';
                // print_r($add);
                // echo '</pre>';
                $data = ChallengeLink::where('challenge_id',$id)->where('day',$add['day'])->where('id',$add['id'])->update($add);
            }else{

                $data = new ChallengeLink();
                $data->title_english = $add['title_english'];
                $data->title_arabic = $add['title_arabic'];
                $data->tv_show_name = $add['tv_show_name'];
                $data->channel_name = $add['channel_name'];
                $data->thumbnail = $add['thumbnail'];
                $data->video_link = $add['video_link'];
                $data->day = $add['day'];
                $data->challenge_id = $livevideo['id'];
                $data->save();
            }

            // dd($add);
        }
        return redirect()->route('Challenge.index')
             ->with('success', __('updated successfully'));
    }

    //Challenge video delete
    public function destroy($id)
    {
            $post =  Challenge::find($id);
            $post->delete();
            return redirect()->route('Challenge.index')->with('success', __('delete successfully.'));
    }

    //Challenge video link create
    public function createLinks($id)
    {
       $user = $id;
       return view('Challenge.addlink',compact('user'));
    }

     public  function addlinks(Request $request , $id)
     {

            $request->validate([
             'addmore.*.title_english'  => 'required',
             'addmore.*.title_arabic'  => 'required',
             'addmore.*.video_link' => 'required',
             'addmore.*.day' => 'required|numeric|min:1|max:100'
            //  'addmore.*.point' => 'required'
        ]);
        foreach ($request->addmore as $add) {
            //instagramVideoLink::create($add)->with('live_video);
            $data = new ChallengeLink();
            $data->title_english = $add['title_english'];
            $data->title_arabic = $add['title_arabic'];
            $data->video_link = $add['video_link'];
            $data->point = $add['point'];
            $data->challenge_id = $id;
            $data->save();
        }
        return redirect()->route('Challenge.index')
        ->with('success', __('link created successfully'));
        }

        //instagram video link show
    public function showlink($id)
    {
        $table = Challenge::with('challengeLinks')->where('id', '=', $id)->first();
        $tagIds = explode(',', $table->tag_ids);
        $table['tags'] = Preference::whereIn('id', $tagIds)->get()->toArray();
        return view ('Challenge.show1')->with ('data',$table);
    }

    //instagram video link delete
    public function destroyLang($id)
   {
    $post = ChallengeLink::find($id);
    $post->delete();
    return redirect()->route('Challenge.index')->with('success', __('Link delete successfully.'));
    }

    public function restoreLink($id)
   {
    $post = ChallengeLink::withTrashed()->find($id);
    $post->restore();
    return redirect()->route('Challenge.index')->with('success', __('Link delete successfully.'));
    }

    //instagram video link edit
   public function editlink($id)
   {
     $user = ChallengeLink::find($id)->first();
    return view('Challenge.editLink', compact('user'));
   }
   public function updatelink(Request $request , $id)
   {
    $livevideo = ChallengeLink::findOrFail($id);
    $input = $request->all();
    $livevideo->fill($input)->save();
    return redirect()->route('Challenge.index')
         ->with('success', __('link updated successfully'));
    }
}
