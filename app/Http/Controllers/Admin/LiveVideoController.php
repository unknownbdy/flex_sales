<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LiveVideoDataTable;
use App\DataTables\LiveVideoLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\LiveVideo\LiveVideos;
use App\Models\LiveVideo\LiveVideoChapter;
use App\Models\Preference;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class LiveVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(LiveVideoDataTable $dataTable)
    {
        return $dataTable->render('live-video.index');
    }

    public function create()
    {
        $preferences = Preference::all();
        $role = LiveVideoChapter::get();
        return view('live-video.create', compact('role','preferences'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'description_english' => 'required',
            'name_english' => 'required',
            'name_arabic' => 'required',
            'channel_english'  => 'required',
            'channel_arabic' => 'required',
            'show_english' => 'required',
            'show_arabic' => 'required',
            'link'  => 'required',
            'chapter_id' => 'required',
            'thumbnail'   => 'required',
            'tag_id'    => 'required'
        ]);
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description_english'] = $_POST['description_english'];
        $tag_ids = implode(',',$request['tag_id']);

        $image = $request->file('thumbnail');
        $thumbImage = $image->move(
            'live-videos/thumbnails',
            time() . '.' . $image->getClientOriginalExtension()
        );

        $livevideo   = LiveVideos::create(
            [
                'name_english' => $request['name_english'],
                'name_arabic' => $request['name_arabic'],
                'channel_english' => $request['channel_english'],
                'channel_arabic' => $request['channel_arabic'],
                'show_english' => $request['show_english'],
                'show_arabic' => $request['show_arabic'],
                'description_arabic' => $request['description_arabic'],
                'description_english' => $request['description_english'],
                'thumbnail' => $thumbImage,
                'tag_id'    => $tag_ids,
                'link' => $request['link'],
                'chapter_id' => $request['chapter_id'],
            ]
        );
        return redirect()->route('live-video.index')
            ->with('success', __('live video created successfully'));
    }
    public function show($id)
    {
        $table = LiveVideos::where('id', '=', $id)->get()->toArray();
        $preferences = Preference::all();
        return view('live-video.show1')->with([
            'data' => $table,
            'preferences' => $preferences,
        ]);

    }
    public function edit($id)
    {
        $preferences = Preference::all();
        $role = LiveVideoChapter::get();
        $user = LiveVideos::where('id', '=', $id)->first();
        return view('live-video.edit', compact('user', 'role','preferences'));
    }
    public function update(Request $request, $id)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description_english'] = $_POST['description_english'];
        $this->validate($request, [
            // 'description_arabic' => 'required',
            'description_english' => 'required',
            'name_english' => 'required',
            'name_arabic' => 'required',
            'channel_english'  => 'required',
            'channel_arabic' => 'required',
            'show_english' => 'required',
            'show_arabic' => 'required',
            'link'  => 'required',
            'chapter_id' => 'required',
            'tag_id'    => 'required'
        ]);

        $tag_ids = implode(',',$request['tag_id']);


        if ($request->hasFile('thumbnail')) {
            $liveVideoImage = $request->file('thumbnail');
            $thumbImage = $liveVideoImage->move(
                'live-videos/thumbnails',
                time() . '.' . $liveVideoImage->getClientOriginalExtension()
            );

            LiveVideos::where('id', $id)
                ->update(
                    [
                        'thumbnail' => $thumbImage
                    ]
                );
        }else{
            $input['thumbnail'] = $request['hiddenimage'];

        }

        $input = $request->all();

        LiveVideos::where('id', $id)->update(
            [
                'name_english' => $input['name_english'],
                'name_arabic' => $input['name_arabic'],
                'channel_english' => $input['channel_english'],
                'channel_arabic' => $input['channel_arabic'],
                'show_english' => $input['show_english'],
                'show_arabic' => $input['show_arabic'],
                'tag_id'    => $tag_ids,
                'description_arabic' => $input['description_arabic'],
                'description_english' => $input['description_english'],
                'link' => $input['link'],
                'chapter_id' => $input['chapter_id'],

            ]
        );

        return redirect()->route('live-video.index')
            ->with('success', __('live video updated successfully'));
    }
    public function destroy($id)
    {
        // DB::table("LiveVideos")->delete($id);
        $post = LiveVideos::find($id);
        $post->delete();
        return redirect()->route('live-video.index')->with('success', __('video delete successfully.'));
    }
}
