<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TvInterviewVideoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Preference;
use App\Models\TvInterview\TvInterview;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class TvInterviewVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(TvInterviewVideoDataTable $dataTable)
    {
        return $dataTable->render('tvinterview-video.index');
    }

    //testimonial video create
    public function create()
    {
       // $role = TestimonialVideoType::get();
       $preferences = Preference::all();
        return view('tvinterview-video.create',compact('preferences'));
    }


    public function store(Request $request)
    {
    //    dd($request->all());
    $request['description_arabic'] = $_POST['description_arabic'];
    $request['description'] = $_POST['description'];
            $this->validate($request, [
            'topic_english' => 'required',
            'topic_arabic' => 'required',
            'description' => 'required',
            'description_arabic' => 'required',
            // 'show_arabic' => 'required',
            // 'show_english' => 'required',
            'link'  => 'required',
            'tag_id' => 'required'
        ]);

        $tag_ids = implode(',',$request['tag_id']);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            // Process the uploaded file here
        }
        $thumbImage = $image->move('tvinterview/thumbnails', time() . '.' . $image->getClientOriginalExtension());
        // echo "<pre>"; print_r($request->all()); die;
        $livevideo  =  TvInterview::create(
            [
                'topic_english'   => $request['topic_english'],
                'topic_arabic'    => $request['topic_arabic'],
                'description'     => $request['description'],
                'description_arabic'     => $request['description_arabic'],
                'show_english'    => $request['show_english'],
                'show_arabic'     => $request['show_arabic'],
                'link'            => $request['link'],
                'tag_id'          => $tag_ids,
                'channel_english' => $request['channel_english'],
                'channel_arabic'  => $request['channel_arabic'],
                'thumbnail'  =>$thumbImage
            ]
        );
        return redirect()->route('tvinterview-video.index')
            ->with('success', __('Tv-InterView created successfully'));
    }

    // Podcast Teaser video show
    public function show($id)
    {
        $table = TvInterview::where('id', '=', $id)->get()->toArray();
        $preferences = Preference::all();
        return view('tvinterview-video.show1')->with([
            'data' => $table,
            'preferences' => $preferences,
        ]);


    }

    // // //testimonial video edit
      public function edit($id)
    {
        $preferences = Preference::all();
        $user = TvInterview::where('id', '=', $id)->first();
        return view('tvinterview-video.edit', compact('user','preferences'));

    }
     public function update(Request $request, $id)
    {
       // dd($request->all());
       $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
       $request['tag_id'] = implode(',',$request['tag_id']);
        $livevideo = TvInterview::findOrFail($id);
        $input = $request->all();
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbImage = $image->move('tvinterview/thumbnails', time() . '.' . $image->getClientOriginalExtension());
            $input['thumbnail'] = $thumbImage;
            unset($input['hiddenimage']);
        }else{
            $input['thumbnail'] = $request['hiddenimage'];

        }
        $livevideo->fill($input)->save();
        return redirect()->route('tvinterview-video.index')
             ->with('success', __('Tv-Interview video updated successfully'));
    }
    public function destroy($id)
    {
            $post = TvInterview::find($id);
            $post->delete();
            return redirect()->route('tvinterview-video.index')->with('success', __('Tv-Innterview delete successfully.'));
    }
}
