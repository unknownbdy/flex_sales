<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InstagramVideoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Instagram\InstagramVideo;
use App\Models\Instagram\InstagramVideoLink;
use App\Models\InstagramVideo\LiveVideoChapter;
use App\Models\InstagramVideo\LiveVideoLink;
use App\Models\Preference;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class InstagramVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(InstagramVideoDataTable $dataTable)
    {
        return $dataTable->render('instagram-video.index');
    }

    //instagram video create
    public function create()
    {
        $preferences = Preference::all();
        return view('instagram-video.create', compact('preferences'));
    }


    public function store(Request $request)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $this->validate($request, [
            'name' => 'required',
            'name_arabic' => 'required',
            // 'tag' => 'required',
            // 'tag_arabic' => 'required',
            'description_arabic' => 'required',
            'description' => 'required',
            'thumbnail'     => 'required',
            'tag_id'       => 'required',
            'link'         => 'required'
        ]);
        $request['tag_id']  = implode(',',$request['tag_id']);
        $image = $request->file('thumbnail');
        $thumbImage = $image->move(
            'instagram-videos/thumbnails',
            time() . '.' . $image->getClientOriginalExtension()
        );

        $livevideo   = InstagramVideo::create(
            [
                'name' => $request['name'],
                'name_arabic' => $request['name_arabic'],
                // 'tag' => $request['tag'],
                // 'tag_arabic' => $request['tag_arabic'],
                'description_arabic' => $request['description_arabic'],
                'description' => $request['description'],
                'thumbnail' => $thumbImage,
                'tag_id'  => $request['tag_id'],
                'link'  => $request['link']
            ]
        );
        return redirect()->route('instagram-video.index')
            ->with('success', __('instgram video created successfully'));
    }

    //instagram video show
    public function show($id)
    {
        $preferences = Preference::all();
        $table = InstagramVideo::where('id', '=', $id)->get();

        return view('instagram-video.show', [
            'data' => $table,
            'preferences' => $preferences,
        ]);
    }


    //instagram video edit
    public function edit($id)
    {
        $user = InstagramVideo::where('id', '=', $id)->first();
        $preferences = Preference::all();
        return view('instagram-video.edit', compact('user','preferences'));
    }
    public function update(Request $request, $id)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $this->validate($request, [
            'name' => 'required',
            'name_arabic' => 'required',
            // 'tag' => 'required',
            // 'tag_arabic' => 'required',
            'tag_id' => 'required',
            'description_arabic' => 'required',
            'description' => 'required',
            'link'       => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $instaVideoImage = $request->file('thumbnail');
            $thumbImage = $instaVideoImage->move(
                'instagram-videos/thumbnails',
                time() . '.' . $instaVideoImage->getClientOriginalExtension()
            );

            InstagramVideo::where('id', $id)
                ->update(
                    [
                        'thumbnail' => $thumbImage
                    ]
                );
        }
        $request['tag_id']  = implode(',',$request['tag_id']);
        $input = $request->all();
        InstagramVideo::where('id', $id)->update(
            [
                'name' => $input['name'],
                'name_arabic' => $input['name_arabic'],
                // 'tag' => $input['tag'],
                // 'tag_arabic' => $input['tag_arabic'],
                'description_arabic' => $input['description_arabic'],
                'description' => $input['description'],
                'tag_id'     =>  $request['tag_id'],
                'link'  => $request['link']
            ]
        );
        return redirect()->route('instagram-video.index')
            ->with('success', __('instagram video updated successfully'));
    }

    //instagram video delete
    public function destroy($id)
    {
        // DB::table("LiveVideo")->delete($id);
        $post = InstagramVideo::find($id);
        $post->delete();
        return redirect()->route('instagram-video.index')->with('success', __('instagram video delete successfully.'));
    }

    //instagram video link create
    public function createLinks($id)
    {
        $user = $id;
        return view('instagram-video.addlink', compact('user'));
    }

    public  function addlinks(Request $request, $id)
    {

        $request->validate([
            'addmore.*.name'  => 'required',
            'addmore.*.name_arabic'  => 'required',
            'addmore.*.link' => 'required'
        ]);
        foreach ($request->addmore as $add) {
            //instagramVideoLink::create($add)->with('live_video);
            $data = new InstagramVideoLink();
            $data->name = $add['name'];
            $data->name_arabic = $add['name_arabic'];
            $data->link = $add['link'];
            $data->instagram_video_id = $id;
            $data->save();
        }
        return redirect()->route('instagram-video.index')
            ->with('success', __('instagram link created successfully'));
    }

    //instagram video link show
    public function showlink($id)
    {

        $table = InstagramVideoLink::where('instagram_video_id', '=', $id)->paginate(10);
        return view('instagram-video.show1')->with('data', $table);
    }

    //instagram video link delete
    public function destroyLang($id)
    {
        $post = InstagramVideoLink::find($id);
        $post->delete();
        return redirect()->route('instagram-video.index')->with('success', __('instagram video Link delete successfully.'));
    }

    //instagram video link edit
    public function editlink($id)
    {

        $user = InstagramVideoLink::find($id)->first();
        return view('instagram-video.editLink', compact('user'));
    }
    public function updatelink(Request $request, $id)
    {
        $livevideo = InstagramVideoLink::findOrFail($id);
        $input = $request->all();
        $livevideo->fill($input)->save();
        return redirect()->route('instagram-video.index')
            ->with('success', __('instagram video link updated successfully'));
    }
}
