<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HandPickedDataTable;
use App\Http\Controllers\Controller;
use App\Models\handpicked\HandPicked;
use App\Models\Article\Article;
use App\Models\Preference;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class HandPickedController extends Controller
{

    /**
     * Method index
     *
     * @return void
     */
    public function index(HandPickedDataTable $dataTable)
    {
        return $dataTable->render('HandPicked.index');
    }

    //Handpicked video create
    public function create()
    {
        $preferences = Preference::all();
        return view('HandPicked.create', compact('preferences'));
    }


    public function store(Request $request)
    {
       // dd($request->all());
            $this->validate($request, [
            'title_english' => 'required',
            'title_arabic' => 'required',
            'description_english' => 'required',
            'description_arabic' => 'required',
            'short_description_english' => 'required',
            'short_description_arabic' => 'required',
            // 'type' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $tagsIdsJson1 = implode(',',$request['tag_id']);
        $request['description_english'] = $_POST['description_english'];
        $request['description_arabic'] = $_POST['description_arabic'];
        // dd($convertedArray); die;
        // dd($request->all());die;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $thumbImage = $image->move('article/thumbnails', time() . '.' . $image->getClientOriginalExtension());
        }
        $livevideo  =  Article::create(
            [
                'title_english' => $request['title_english'],
                'title_arabic' => $request['title_arabic'],
                'description_english' => $request['description_english'],
                'description_arabic' => $request['description_arabic'],
                'short_description_english' => $request['short_description_english'],
                'short_description_arabic' => $request['short_description_arabic'],
                'tag_id' =>  $tagsIdsJson1,
                'image' =>  $thumbImage,
                // 'type' => $request['type'],
            ]
        );
        return redirect()->route('HandPicked.index')
            ->with('success', __('created successfully'));
    }

    // // Handpicked show
    public function show($id)
    {
        $table = Article::where('id', '=', $id)->get()->toArray();

        try {
            $handPicked = Article::findOrFail($id);

            // Assuming tags_ids is stored as a comma-separated string in the 'hand_pickeds' table
            $tagsArray = explode(',', $handPicked->tag_id);

            // Extract the preference IDs from the exploded array
            $preferencesIds = isset($tagsArray) ? $tagsArray : [];

            // Get the preference names using the extracted IDs
            $preferences = Preference::all();

            return view('HandPicked.show1', compact('preferences', 'handPicked'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // HandPicked edit
    public function edit($id)
    {
        $user = Article::where('id', '=', $id)->first();
        // Fetch all preferences from the database and pass it to the view
        $preferences = Preference::all();
        return view('HandPicked.edit', compact('user', 'preferences'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());die;
        $tagsIdsJson1 = implode(',', $request['tag_id']);
        $request['description_english'] = $_POST['description_english'];
        $request['description_arabic'] = $_POST['description_arabic'];

        // Find the article by ID
        $article = Article::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            // Handle image upload if a new image is provided
            $image = $request->file('thumbnail');
            $thumbImage = $image->move('article/thumbnails', time() . '.' . $image->getClientOriginalExtension());

            // Update the article with the new image path
            $article->update([
                'title_english' => $request['title_english'],
                'title_arabic' => $request['title_arabic'],
                'description_english' => $request['description_english'],
                'description_arabic' => $request['description_arabic'],
                'short_description_english' => $request['short_description_english'],
                'short_description_arabic' => $request['short_description_arabic'],
                'tag_id' => $tagsIdsJson1,
                'image' => $thumbImage,
            ]);
        } else {
            // If no new image is uploaded, update without changing the image field
            $article->update([
                'title_english' => $request['title_english'],
                'title_arabic' => $request['title_arabic'],
                'description_english' => $request['description_english'],
                'description_arabic' => $request['description_arabic'],
                'short_description_english' => $request['short_description_english'],
                'short_description_arabic' => $request['short_description_arabic'],
                'tag_id' => $tagsIdsJson1,
            ]);
        }

        return redirect()->route('HandPicked.index')
            ->with('success', __('Updated successfully'));
    }

    public function destroy($id)
    {
            $post = Article::find($id);
            $post->delete();
            return redirect()->route('HandPicked.index')->with('success', __(' delete successfully.'));
    }
}
