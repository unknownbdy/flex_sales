<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TvShowVideoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Preference;
use App\Models\TvShow\TVShow;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class TvShowVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(TvShowVideoDataTable $dataTable)
    {

        return $dataTable->render('tvshow-video.index');
    }

    //testimonial video create
    public function create()
    {
        // $role = TestimonialVideoType::get();
        $preferences = Preference::all();
        return view('tvshow-video.create', compact('preferences'));
    }


    public function store(Request $request)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        // dd($request->all());
        $this->validate($request, [
            'topic_english'      => 'required',
            'topic_arabic'       => 'required',
            'description'        => 'required',
            'description_arabic' => 'required',
            'show_arabic'        => 'required',
            'show_english'       => 'required',
            'link'               => 'required',
            'tag_id'             => 'required',
            'thumbnail'
        ]);

        $tag_ids = implode(',',$request['tag_id']);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            // Process the uploaded file here
        }
        $thumbImage = $image->move('tvshow/thumbnails', time() . '.' . $image->getClientOriginalExtension());

        $livevideo  =  TvShow::create(
            [
                'topic_english'      => $request['topic_english'],
                'topic_arabic'       => $request['topic_arabic'],
                'description'        => $request['description'],
                'description_arabic' => $request['description_arabic'],
                'show_english'       => $request['show_english'],
                'show_arabic'        => $request['show_arabic'],
                'link'               => $request['link'],
                'tag_id'             => $tag_ids,
                'channel_english'    => $request['channel_english'],
                'channel_arabic'     => $request['channel_arabic'],
                'thumbnail'  =>$thumbImage
            ]
        );
        return redirect()->route('tvshow-video.index')
            ->with('success', __('Tv-Show created successfully'));
    }

    // Podcast Teaser video show
    public function show($id)
    {
        $table = TvShow::where('id', '=', $id)->get()->toArray();
        $preferences = Preference::all();
        return view('tvshow-video.show1')->with([
            'data' => $table,
            'preferences' => $preferences,
        ]);
    }

    // // //testimonial video edit
    public function edit($id)
    {
        $preferences = Preference::all();
        $user = TvShow::with('preferences')->where('id', '=', $id)->first();
        // echo "<pre>"; print_r($user->toArray()); die;
        return view('tvshow-video.edit', compact('user','preferences'));
    }
    public function update(Request $request, $id)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $request['tag_id'] = implode(',', $request['tag_id']);

        $livevideo = TvShow::findOrFail($id);
        $input = $request->all();
        // dd($input);die;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbImage = $image->move('tvshow/thumbnails', time() . '.' . $image->getClientOriginalExtension());
            $input['thumbnail'] = $thumbImage;
            unset($input['hiddenimage']);
        }else{
            $input['thumbnail'] = $request['hiddenimage'];

        }

        $livevideo->fill($input)->save();
        return redirect()->route('tvshow-video.index')
            ->with('success', __('Tv-Show video updated successfully'));
    }

    public function destroy($id)
    {
        $post = TvShow::find($id);
        $post->delete();
        return redirect()->route('tvshow-video.index')->with('success', __('Tv-Show delete successfully.'));
    }
}
