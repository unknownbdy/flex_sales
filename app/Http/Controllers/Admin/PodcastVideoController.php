<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PodcastVideoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Podcast\PodcastVideo;
use App\Models\Podcast\PodcastEpisode;
use App\Models\Preference;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class PodcastVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(PodcastVideoDataTable $dataTable)
    {
        return $dataTable->render('podcast-video.index');
    }

    //testimonial video create
    public function create()
    {
        $preferences = Preference::all();
        $podcast = PodcastVideo::first();
        // dd($podcast->id);die; // Retrieve the podcast with the given ID
        return view('podcast-video.create', compact('preferences', 'podcast'));
    }

    public function store(Request $request)
    {
            // dd($request->all()); die;
            $this->validate($request, [
            'teaser_english' => 'required',
            'teaser_arabic' => 'required',
            'description_arabic' => 'required',
            'description_english' => 'required',
            // 'podcast_thumbnail' => 'required',
            // 'podcast_type' => 'required',
            // 'link'  => 'required',

            // 'tag_arabic' => 'required'
        ]);

        $request['description_english'] = $_POST['description_english'];
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['tag_id']  = implode(',',$request['tag_id']);

        if ($request->hasFile('podcast_thumbnail')) {
            $image = $request->file('podcast_thumbnail');
            $thumbImage = $image->move('podcast/thumbnails', time() . '.' . $image->getClientOriginalExtension());
        }
        $podcastVideoId = $request['parent_id'];
        $livevideo = PodcastVideo::find($podcastVideoId); // Replace with the actual ID of the parent podcast video
        if ($livevideo) {
            $livevideo->teaser_english = $request['teaser_english'];
            $livevideo->teaser_arabic = $request['teaser_arabic'];
            $livevideo->description_arabic = $request['description_arabic'];
            $livevideo->description_english = $request['description_english'];
            $livevideo->thumbnail = isset($thumbImage) ? $thumbImage : $livevideo->thumbnail;

            // Update other attributes of the parent record
            $livevideo->save();
        }else{
            $livevideo   = PodcastVideo::create(
                [
                    'teaser_english' => $request['teaser_english'],
                    'teaser_arabic' => $request['teaser_arabic'],
                    'description_arabic' => $request['description_arabic'],
                    'description_english' => $request['description_english'],
                    'link' =>        $request['link'],
                    'thumbnail' => $thumbImage,
                    // 'podcast_type' => $request['podcast_type'],
                    // 'tag_english' => $request['tag_english'],
                    // 'tag_arabic' => $request['tag_arabic'],
                    'tag_id' =>$request['tag_id']
                ]
            );
        }

        if (isset($_POST['addmore'])) {
            foreach ($_POST['addmore'] as $add) {
                if ($request->hasFile('thumbnail')) {
                    $image = $request->file('thumbnail');
                    $thumbImage = $image->move('podcast/thumbnails', time() . '.' . $image->getClientOriginalExtension());
                }
                $add['tags'] = implode(',',$add['tags']);
                $data = new PodcastEpisode();
                $data->title = $add['title'];
                $data->title_arabic = $add['title_arabic'];
                $data->description = $add['description'];
                $data->description_arabic = $add['description_arabic'];
                $data->tags = $add['tags'];
                $data->link = $add['link'];
                $data->thumbnail = $thumbImage;
                $data->podcast_id = $livevideo['id'];
                $data->save();
            }
        }
        return redirect()->route('podcast-video.index')
        ->with('success', __('podcast teaser created successfully'));
    }

    // Podcast Teaser video show
    public function show($id)
    {
        // $table = PodcastVideo::with('episodes')->where('id', '=', $id)->first();
        $table = PodcastVideo::first();
        $tagIds = explode(',', $table->tag_id);
        $preferences= Preference::all();
        $podcastEpisodes = PodcastEpisode::where('id',$id)->get();
        // $table->episodes->transform(function ($item, $key) {
        //     $tagId = explode(',',$item->tags);
        //      $item['episode_tags'] =  Preference::whereIn('id',$tagId)->get()->toArray();
        //      return $item;
        // });

        // return view ('podcast-video.show1')->with ('data',$table);
        return view('podcast-video.show1')->with([
            'data' => $table,
            'podcastEpisodes' => $podcastEpisodes,
            'preferences' => $preferences
        ]);
    }

    // testimonial video edit
    public function edit($id)
    {
        $preferences = Preference::all();
        $user = PodcastVideo::first();
        $podcast = PodcastEpisode::where('id',$id)->get();


        return view('podcast-video.edit', compact('user','preferences','podcast'));
    }

    public function update(Request $request, $id)
    {
        $request['description_english'] = $_POST['description_english'];
        $request['description_arabic'] = $_POST['description_arabic'];
        $this->validate($request, [
            'teaser_english' => 'required',
            'teaser_arabic' => 'required',
            'description_arabic' => 'required',
            'description_english' => 'required',
            // 'thumbnail' => 'required',
            // 'podcast_type' => 'required',
        ]);
        // dd($request->all());

        if($request->file('podcast_thumbnail')){
            $image = $request->file('podcast_thumbnail');
            $thumbImage = $image->move('podcast/thumbnails', time() . '.' . $image->getClientOriginalExtension());
            $request['thumbnail'] = $thumbImage;
        }
        $request['tag_id']  = implode(',',$request['tag_id']);

        $livevideo = podcastVideo::findOrFail($id);
        $input = $request->all();
        $livevideo->fill($input)->save();

        if (isset($_POST['addmore'])) {
            foreach ($_POST['addmore'] as $add) {

                if(isset($add['id'])){
                    if($request->file('thumbnail1')){
                        $image = $request->file('thumbnail1');
                        $thumbImage = $image->move('podcast/thumbnails', time() . '.' . $image->getClientOriginalExtension());
                        $add['thumbnail'] = $thumbImage;
                    }
                    $add['tags'] = implode(',',$add['tags']);
                    $data = PodcastEpisode::where('podcast_id',$id)->where('id',$add['id'])->update($add);
                }else{
                    if($request->file('thumbnail')){
                        $image = $request->file('thumbnail');
                        $thumbImage = $image->move('podcast/thumbnails', time() . '.' . $image->getClientOriginalExtension());
                    }
                    $add['tags'] = implode(',',$add['tags']);
                    $data = new PodcastEpisode();
                    $data->title = $add['title'];
                    $data->title_arabic = $add['title_arabic'];
                    $data->description = $add['description'];
                    $data->description_arabic = $add['description_arabic'];
                    $data->tags = $add['tags'];
                    $data->link = $add['link'];
                    $data->thumbnail = $thumbImage;
                    $data->podcast_id = $id;
                    $data->save();
                }
            }
        }
        return redirect()->route('podcast-video.index')
        ->with('success', __('podcast teaser video updated successfully'));
    }

    public function destroy($id)
    {
        // $post = PodcastVideo::find($id);
        $post = PodcastEpisode::find($id);

        $post->delete();
        return redirect()->route('podcast-video.index')
        ->with('success', __('teaser delete successfully.'));
    }

    public function destroy_episode($id)
    {
        $post = PodcastEpisode::find($id);
        $post->delete();
        return redirect()->back();
        // ->with('success', __('teaser delete successfully.'));
    }
}
