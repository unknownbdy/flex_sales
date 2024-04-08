<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AboutDataTable;
use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\About\AboutMedia;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class AboutController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index(AboutDataTable $dataTable)
    {
        // if (Auth::user()->can('manage-pages')) {
        return $dataTable->render('about.index');
        // } else {
        //     return redirect()->back()->with('error', 'Permission denied.');
        // }
    }

    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        return view('about.create');
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

        // try {
                // dd($request->all());die;
        $request['description'] = $_POST['description'];
        $request['description_arabic'] = $_POST['description_arabic'];
        $this->validate($request, [
            'title'         => 'required',
            'slug'          => 'required',
            'description'   => 'required',
            'description_arabic' => 'required'
        ]);

        DB::beginTransaction();
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $aboutImage = $image->move(
                    'about-section/images',
                    time() . '.' . $image->getClientOriginalExtension()
                );
        $about = About::create(
            [
                'title'       => $request['title'],
                'slug'        => $request['slug'],
                'video_link'  => $request['video_link'],
                'description' => $request['description'],
                'description_arabic' => $request['description_arabic'],
                'thumbnail' => $aboutImage
            ]
        );

        // if ($request->hasFile('images')) {
        //     $images = $request->file('images');
        //     foreach ($images as $image) {
        //         $aboutImage = $image->move(
        //             'about-section/images',
        //             time() . '.' . $image->getClientOriginalExtension()
        //         );
        //         AboutMedia::create(
        //             [
        //                 'about_id' => $about['id'],
        //                 'type'     => 'image',
        //                 'url'      => $aboutImage
        //             ]
        //         );
            }
        }

        DB::commit();
        return redirect()->route('about.index')
            ->with('success', __('New About section has been created.'));
        // } catch (Throwable $e) {
        //     DB::rollBack();
        //     return redirect()->back()
        //         ->with('failed', __('There was an error.'));
        // }
    }

    public function show(About $about)
    {
        $about = About::where('id', $about['id'])
            ->with('media')->first();
        // dd($about);
        return view('about.show', compact('about'));
    }

    // // //testimonial video edit
    public function edit($id)
    {
        $about = About::where('id', $id)->first();
        return view('about.edit', compact('about'));
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
        $request['description'] = $_POST['description'];
        $request['description_arabic'] = $_POST['description_arabic'];
        $about = About::findOrFail($id);
        $input = $request->all();
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach ($images as $image) {
                    $aboutImage = $image->move(
                        'about-section/images',
                        time() . '.' . $image->getClientOriginalExtension()
                    );
                    $input['thumbnail']=$aboutImage;
                // AboutMedia::create(
                //     [
                //         'about_id' => $about['id'],
                //         'type'     => 'image',
                //         'url'      => $aboutImage
                //     ]
                // );
            }
        }
        $about->fill($input)->save();
        return redirect()->route('about.index')
            ->with('success', __('About updated successfully'));
    }
    /**
     * Method destroy
     *
     * @param $id $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('about.index')->with('success', __('page delete successfully.'));
    }
}
