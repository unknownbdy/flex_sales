<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CoursesVideoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use App\Models\Course\CourseChapter;
use App\Models\Course\CourseLink;
use App\Models\Preference;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class CoursesVideoController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(CoursesVideoDataTable $dataTable)
    {
        return $dataTable->render('Course-video.index');
    }

    public function create()
    {
        $preferences = Preference::all();
        $role = CourseChapter::get();
        $course = Course::all();

        return view('Course-video.create', compact('preferences','role','course'));
    }


    public function store(Request $request)
    {



        $this->validate($request, [
            'course_name'           => 'required',
            'course_name_arabic'    => 'required',
            'sub_title'             => 'required',
            'sub_title_arabic'      => 'required',
            'tag_id'                => 'required',
            'description'           => 'required',
            'description_arabic'    => 'required',
            'thumbnail'             => 'required',
            'actual_price'          => 'required',
            'price'                 => 'required',
            // 'price' => 'required',
            // 'discounte_type' => 'required',
            // 'discounted_price'  => 'required',
            // 'total_points'  => 'required',
        ]);
        // echo "<pre>"; print_r($request->all()); die;

        $request['description'] = $_POST['description'];
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['tag_id']  = implode(',',$request['tag_id']);
        $request['references_course_ids']  = implode(',',$request['references_course_ids']);




        $image = $request->file('thumbnail');
        $thumbImage = $image->move(
            'courses/thumbnails',
            time() . '.' . $image->getClientOriginalExtension()
        );
        if (is_null($request['discounte_type'])) {
            $request['discounte_type'] = 'fixed';
        }
        $livevideo   = Course::create(
            [
                'course_name' => $request['course_name'],
                'course_name_arabic' => $request['course_name_arabic'],
                'sub_title' => $request['sub_title'],
                'sub_title_arabic' => $request['sub_title_arabic'],
                'tag_id' =>$request['tag_id'],
                'references_course_ids' =>$request['references_course_ids'],
                'description' => $request['description'],
                'description_arabic' => $request['description_arabic'],
                'thumbnail' => $thumbImage,
                'price' => $request['price'],
                'actual_price' => $request['actual_price'],

            ]
        );
        $request->validate([
            'addmore.*.name'  => 'required',
            'addmore.*.name_arabic'  => 'required',
            'addmore.*.link' => 'required',
            'addmore.*.chapter_id' => 'required'
        ]);
        foreach ($request->addmore as $add) {
            $data = new CourseLink();
            $data->name = $add['name'];
            $data->name_arabic = $add['name_arabic'];
            $data->link = $add['link'];
            $data->chapter_id = $add['chapter_id'];
            $data->points = $add['points'];

            // Assign the course_id to the newly created course's id
            $data->course_id = $livevideo->id; // Assuming 'id' is the primary key of the Course model

            $data->save();
        }
        return redirect()->route('Course-video.index')
            ->with('success', __('Courses video created successfully'));
    }
    // public function show($id)
    // {
    //     $table = Course::where('id', '=', $id)->get()->toArray();
    //     return view('Course-video.show')->with('data', $table);
    // }
    public function show($id)
    {
        try {
            $course = Course::findOrFail($id);

            // Assuming tags_ids is stored as a comma-separated string in the 'courses' table
            $tagsArray = explode(',', $course->tag_id);

            // Extract the preference IDs from the exploded array
            $preferencesIds = isset($tagsArray) ? $tagsArray : [];

            // Get the preference names using the extracted IDs
            $preferences = Preference::whereIn('id', $preferencesIds)->get();
            $referenceArray = explode(',', $course->references_course_ids);
            $references_course_ids = isset($referenceArray) ? $referenceArray : [];
            $references = Course::whereIn('id', $references_course_ids)->get();
            $data =  CourseLink::where('course_id', '=', $id)->withTrashed()->paginate(10);
            return view('Course-video.show', compact('preferences', 'course','data','references'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $preferences = Preference::all();
        $role = CourseChapter::get();
        $user = Course::where('id', '=', $id)->first();
        // $course = Course::all();
        $course = Course::where('id', '!=', $id)->get();
        $courselink = CourseLink::where('course_id',$user->id)->withTrashed()->paginate(10);

        $highestIndex = count($courselink) - 1;
        // dd($courselink);die;

        $tagIds = explode(',', $user->tag_id);
        $user['tags'] = Preference::whereIn('id', $tagIds)->get()->toArray();
        // $data =  CourseLink::where('course_id', '=', $id)


        // echo "<pre>"; print_r($user->toArray()); die;
        return view('Course-video.edit', compact('user', 'role','preferences','courselink','highestIndex','course'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_name'           => 'required',
            'course_name_arabic'    => 'required',
            'sub_title'             => 'required',
            'sub_title_arabic'      => 'required',
            'description_arabic'    => 'required',
            'description'           => 'required'
        ]);

        $request['description'] = $_POST['description'];
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['tag_id']  = implode(',',$request['tag_id']);
        $request['references_course_ids']  = implode(',',$request['references_course_ids']);
        // dd($request->all());die;
        if ($request->hasFile('thumbnail')) {
            $courseImage = $request->file('thumbnail');
            $thumbImage = $courseImage->move(
                'courses/thumbnails',
                time() . '.' . $courseImage->getClientOriginalExtension()
            );

            Course::where('id', $id)
                ->update(
                    [
                        'thumbnail' => $thumbImage
                    ]
                );
        }

        $input = $request->all();
    //     $input['tags_ids']  = implode(',',$input['tags_ids']);
        Course::where('id', $id)
            ->update(
                [
                    'course_name'           => $input['course_name'],
                    'course_name_arabic'    => $input['course_name_arabic'],
                    'sub_title'             => $input['sub_title'],
                    'sub_title_arabic'      => $input['sub_title_arabic'],
                    'tag_id'                => $request['tag_id'],
                    'description'           => $request['description'],
                    'description_arabic'    => $request['description_arabic'],
                    'price'                 => $input['price'],
                    'actual_price'          => $input['actual_price'],
                    'references_course_ids' => $request['references_course_ids']
                ]
            );
            // $course = Course::find($id);

            // if ($course) {
            //     // Retrieve associated CourseLink records
            //     $courselinks = CourseLink::where('course_id', $id)->get();

            //     // Delete each CourseLink record
            //     foreach ($courselinks as $courselink) {
            //         $courselink->delete();
            //     }
            // }

            // $request->validate([
            //     'addmore.*.name'  => 'required',
            //     'addmore.*.name_arabic'  => 'required',
            //     'addmore.*.link' => 'required',
            //     'addmore.*.chapter_id' => 'required'
            // ]);

            foreach ($request->addmore as $add) {
                // Check if all required values are present and not null
                if (
                    !empty($add['name']) &&
                    !empty($add['name_arabic']) &&
                    !empty($add['link']) &&
                    !empty($add['chapter_id']) ||
                    !empty($add['points'])
                ) {
                    if (isset($add['id'])) {
                        // Update the existing CourseLink record
                        $courseLink = CourseLink::withTrashed()
                                // ->where('chapter_id', $add['chapter_id'])
                                ->where('id', $add['id'])
                                ->where('course_id', $id)
                                ->first();
                        // dd($add);die;
                            if ($courseLink) {
                                // If found, update the record
                                $courseLink->update($add);
                            }
                    }else {
                        // Create a new CourseLink record
                        $newData = [
                            'name'        => $add['name'],
                            'name_arabic' => $add['name_arabic'],
                            'link'        => $add['link'],
                            'chapter_id'  => $add['chapter_id'],
                            'points'      => $add['points'],
                            'course_id'   => $id,
                        ];

                        // Insert a new record
                        CourseLink::create($newData);
                    }
                }
            }

                    return redirect()->route('Course-video.index')
            ->with('success', __('Course video updated successfully'));
    }



    public function  destroy($id)
    {
        // DB::table("LiveVideos")->delete($id);
        $post = Course::find($id);
        $post->delete();
        return redirect()->route('Course-video.index')->with('success', __('video delete successfully.'));
    }
    public function createLinks($id)
    {
        $user = $id;
        $role = CourseChapter::get();
        return view('Course-video.addlink', compact('user', 'role'));
    }

    public  function addlinks(Request $request, $id)
    {


        $request->validate([
            'addmore.*.name'  => 'required',
            'addmore.*.name_arabic'  => 'required',
            'addmore.*.link' => 'required',
            'addmore.*.chapter_id' => 'required'
        ]);
        foreach ($request->addmore as $add) {
            //instagramVideoLink::create($add)->with('live_video);
            $data = new CourseLink();
            $data->name = $add['name'];
            $data->name_arabic = $add['name_arabic'];
            $data->link = $add['link'];
            $data->chapter_id = $add['chapter_id'];
            $data->points = $add['points'];
            $data->course_id = $id;
            $data->save();
        }
        return redirect()->route('Course-video.index')
            ->with('success', __('video link created successfully'));
    }

    //instagram video link show
    public function showlink($id, Request $request)
    {
        $table =  CourseLink::where('course_id', '=', $id)->paginate(10);
        return view('Course-video.show1')->with('data', $table);
    }
    public function editlink($id)
    {
       // echo $id; die;
        $user = CourseLink::where('id', '=', $id)->first();
        $role = CourseChapter::get();
        return view('Course-video.editlink', compact('user', 'role'));
    }
    public function updatelink(Request $request, $id)
    {
        $livevideo = CourseLink::findOrFail($id);
        $input = $request->all();
        $livevideo->fill($input)->save();
        return redirect()->route('Course-video.index')
            ->with('success', __('video link updated successfully'));
    }
    public function destroyLang($id)
    {
        $post = CourseLink::find($id);
        $post->delete();
        return redirect()->route('Course-video.index')->with('success', __('video Link delete successfully.'));
    }
    public function restoreLink($id)
    {
        $post = CourseLink::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('Course-video.index')->with('success', __('Link delete successfully.'));
        }
}
