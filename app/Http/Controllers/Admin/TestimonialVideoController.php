<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialVideoDataTable;
use App\Http\Controllers\Controller;
use App\Models\TestimonialVideo\TestimonialVideo;
use App\Models\TestimonialVideo\TestimonialVideoLink;
use App\Models\TestimonialVideo\TestimonialVideoType;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class TestimonialVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(TestimonialVideoDataTable $dataTable)
    {
        return $dataTable->render('testimonial-video.index');
    }

    //testimonial video create
    public function create()
    {
        $role = TestimonialVideoType::get();
        return view('testimonial-video.create', compact('role'));
    }


    public function store(Request $request)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $this->validate($request, [
            'name' => 'required',
            'name_arabic' => 'required',
            // 'description_arabic' => 'required',
            'description' => 'required',
            'link'  => 'required',
            'thumbnail' => 'required',
            'tesimonial_video_type_id' => 'required'
        ]);

        $image = $request->file('thumbnail');
        $thumbImage = $image->move(
            'live-videos/thumbnails',
            time() . '.' . $image->getClientOriginalExtension()
        );
        TestimonialVideo::create(
            [
                'name' => $request['name'],
                'name_arabic' => $request['name_arabic'],
                'description_arabic' => $request['description_arabic'],
                'description' => $request['description'],
                'designation' => $request['designation'],
                'link' =>        $request['link'],
                'thumbnail'   => $thumbImage,
                'testimonial_video_type_id' => $request['tesimonial_video_type_id'],
            ]
        );
        return redirect()->route('testimonial-video.index')
            ->with('success', __('testimonial video created successfully'));
    }

    //testimonial video show
    public function show($id)
    {
        $table = TestimonialVideo::where('id', '=', $id)->get()->toArray();
        return view('testimonial-video.show1')->with('data', $table);
    }

    // //testimonial video edit
    public function edit($id)
    {
        $role = TestimonialVideoType::get();
        $user = TestimonialVideo::where('id', '=', $id)->first();
        return view('testimonial-video.edit', compact('user', 'role'));
    }
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'name_arabic' => 'required',
    //         // 'description_arabic' => 'required',
    //         'description' => 'required',
    //         'link'  => 'required',
    //         'tesimonial_video_type_id' => 'required'
    //     ]);

    //     if ($request->hasFile('thumbnail')) {
    //         $liveVideoImage = $request->file('thumbnail');
    //         $thumbImage = $liveVideoImage->move(
    //             'testimonial-videos/thumbnails',
    //             time() . '.' . $liveVideoImage->getClientOriginalExtension()
    //         );

    //         TestimonialVideo::where('id', $id)
    //             ->update(
    //                 [
    //                     'thumbnail' => $thumbImage
    //                 ]
    //             );
    //     }

    //     $input = $request->all();

    //     TestimonialVideo::where('id', $id)->update(
    //         [
    //             'name' => $input['name'],
    //             'name_arabic' => $input['name_arabic'],
    //             'description_arabic' => $input['description_arabic'],
    //             'description' => $input['description'],
    //             'designation' => $input['designation'],
    //             'link' =>        $input['link'],
    //             'thumbnail'   => $thumbImage,
    //             'testimonial_video_type_id' => $input['tesimonial_video_type_id'],
    //         ]
    //     );

    //     return redirect()->route('testimonial-video.index')
    //         ->with('success', __('Testimonial video updated successfully'));
    // }
    public function update(Request $request, $id)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $this->validate($request, [
            'name' => 'required',
            'name_arabic' => 'required',
            'description' => 'required',
            'link'  => 'required',
            'tesimonial_video_type_id' => 'required'
        ]);

        $event = TestimonialVideo::findOrFail($id); // Initialize the variable with null
        $thumbImage = $event->thumbnail; // Initialize with the existing thumbnail value

        if ($request->hasFile('thumbnail')) {
            $liveVideoImage = $request->file('thumbnail');
            $thumbImage = $liveVideoImage->move(
                'testimonial-videos/thumbnails',
                time() . '.' . $liveVideoImage->getClientOriginalExtension()
            );

            if ($event->thumbnail && file_exists(public_path($event->thumbnail))) {
                unlink(public_path($event->thumbnail));
            }
        }

        $input = $request->all();


        TestimonialVideo::where('id', $id)->update(
            [
                'name' => $input['name'],
                'name_arabic' => $input['name_arabic'],
                'description_arabic' => $input['description_arabic'],
                'description' => $input['description'],
                'designation' => $input['designation'],
                'link' => $input['link'],
                'thumbnail'   => $thumbImage,
                'testimonial_video_type_id' => $input['tesimonial_video_type_id'],
            ]
        );

        return redirect()->route('testimonial-video.index')
            ->with('success', __('Testimonial video updated successfully'));
    }

    public function destroy($id)
    {
        // DB::table("LiveVideos")->delete($id);
        $post = TestimonialVideo::find($id);
        $post->delete();
        return redirect()->route('testimonial-video.index')->with('success', __('video delete successfully.'));
    }
}
