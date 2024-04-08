<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mood\Mood;
use App\Models\Mood\MoodCategory;
use App\Models\Mood\MoodSubCategory;

class MoodController extends Controller
{
    public function index()
    {
        $mood = Mood::with('categories','moodSubCategories')->get();
        $data = [
            'mood' => $mood,
        ];
        return view('mood.index', compact('data'));
    }
    public function store(Request $request)
    {

        // echo "<pre>"; print_r($request->all()); die;

        $this->validate($request, [
            'name' => 'required',
            'name_arabic' => 'required',
        ]);

        $moodType = $request->input('moodtype');

        if ($moodType === 'moodcategory') {
            // Handle Mood Category form submission
            MoodCategory::create([
                'mood_id' => $request['moodId'],
                'name' => $request['name'],
                'name_arabic' => $request['name_arabic']
            ]);
            return redirect()->route('mood.index')->with('success', 'Mood Category created successfully.');

        } elseif ($moodType === 'moodsubcategory') {
            // Handle Mood Sub Category form submission
            MoodSubCategory::create([
                'mood_id' => $request['moodId'],
                'mood_category_id' => $request['moodId'],
                'name' => $request['name'],
                'name_arabic' => $request['name_arabic']
            ]);
            return redirect()->route('mood.index')->with('success', 'Mood Sub Category created successfully.');
        }

        // Return an error or redirect as needed
    }

    public function update(Request $request){
        // print_r($request->all()); die;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'name_arabic' => 'required|string|max:255',
        ]);

        $moodid =  $request->input('idmood');
        $moodType = $request->input('moodtype');
        if ($moodType === 'Mood Category') {
            $moodcategory = MoodCategory::find($moodid);
            $moodcategory->name = $validatedData['name'];
            $moodcategory->name_arabic = $validatedData['name_arabic'];
            $moodcategory->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'MoodCategory updated successfully.');
        }
        else
         {
            $moodsubcategory = MoodSubCategory::find($moodid);
            $moodsubcategory->name = $validatedData['name'];
            $moodsubcategory->name_arabic = $validatedData['name_arabic'];
            $moodsubcategory->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Mood Sub Category updated successfully.');
}
}

    public function destroy(Request $request, $id)
    {
        // echo "<pre>"; print_r($request->all()); die;
        $itemType = $request->input('moodtype'); // Assuming you're sending the item type as a parameter
        $item = null;

        if ($itemType === 'mood') {
            $item = Mood::find($id);
        } elseif ($itemType === 'moodcategory') {
            $item = MoodCategory::find($id);
        } elseif ($itemType === 'moodsubcategory') {
            $item = MoodSubCategory::find($id);
        }

        if (!$item) {
            return false;
        }
        // echo "<pre>"; print_r($item); die;
        $item->delete();

        return true;
    }

}
