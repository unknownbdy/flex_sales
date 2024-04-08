<?php
namespace App\Http\Controllers\Admin;

use App\Models\Event\Event;
use App\Models\Preference;
use App\Models\Event\EventPeople;
use App\DataTables\EventDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function eventData()
{
    $baseUrl = url('/'); // Get the base URL of your application
    $events = Event::with('eventPeople')->get();

    // Loop through each event and its eventPeople
    foreach ($events as $event) {
        // Check if the event has a thumbnail
        if ($event->thumbnail === null || $event->thumbnail === '') {
            // If the thumbnail is null or empty, set it to the default image name
            $event->thumbnail = $baseUrl . '/courses/thumbnails/default_thumbnail.jpg';
        } else {
            // Append the base URL to the thumbnail URL
            $event->thumbnail = $baseUrl . '/' . $event->thumbnail;
        }

        foreach ($event->eventPeople as $eventPerson) {
            if ($eventPerson->image === null || $eventPerson->image === '') {
                // If the image is null or empty, set it to the default image name
                $eventPerson->image = $baseUrl . '/eventPeople/default_image.jpg';
            } else {
                // Append the base URL to the image URL
                $eventPerson->image = $baseUrl . '/' . $eventPerson->image;
            }
        }
    }

    return response()->json($events);
}

    public function index(EventDataTable $dataTable)
    {
        return $dataTable->render('Show-event.index');
    }
    // event create
    public function create()
    {
        $preferences = Preference::all();
        return view('Show-event.create', compact('preferences'));
    }

    public function store(Request $request)
    {
        // dd($request->all());die;
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $validation = $request->validate([
            'title' => 'required',
            'arabic_title' => 'required',
            'city' => 'required',
            'arabic_city' => 'required',
            'location' => 'required',
            'description' => 'required',
            'description_arabic' => 'required',
            // 'date' => 'required|date_format:Y-m-d',
            'from_date' => 'required|date_format:Y-m-d',
            'to_date' => 'required|date_format:Y-m-d',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'from_time' => 'required|date_format:H:i',
            'to_time' => 'required|date_format:H:i',
        ]);

        // Upload and save the thumbnail image
        $image = $request->file('thumbnail');
        $thumbImage = $image->move('courses/thumbnails', time() . '.' . $image->getClientOriginalExtension());
        $request['tags_ids']  = implode(',',$request['tags_ids']);
        $event = Event::create([
            'title' => $request->input('title'),
            'arabic_title' => $request->input('arabic_title'),
            'description' =>  $request['description'],
            'description_arabic' => $request['description_arabic'],
            'city' => $request->input('city'),
            'arabic_city' => $request->input('arabic_city'),
            'address' => $request->input('address'),
            'arabic_address' => $request->input('arabic_address'),
            'location' => $request->input('location'),
            // 'date' => $request->input('date'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'time' => $request->input('from_time'),
            'thumbnail' => $thumbImage,
            'from_time' => $request->input('from_time'),
            'to_time' => $request->input('to_time'),
            'tag_id' =>    $request['tags_ids']
        ]);


        foreach ($request->addmore as $key=>$add) {
                $image = $add['image'];// Get the thumbnail image from the form data
                if ( $image->isValid()) {
                    $thumbImage = $image->move('eventpeople/thumbnails',  $key  . '_' . time() . '.'. $image->getClientOriginalExtension());
                }
                $data = new EventPeople();
                $data->event_id = $event->id;
                $data->name = $add['name'];
                $data->type = $add['type'];
                $data->name_arabic = $add['name_arabic'];
                $data->type_arabic = $add['type_arabic'];
                $data->image = isset($thumbImage) ? $thumbImage : null;
                $data->save();
             }

        // -------------end---------------------------------------
        // $counts = $request->input('count');
        // dd($counts);die;
        // for ($i = 1; $i <= $counts; $i++) {
        //     $name = $request->input('name' . $i);
        //     $type = $request->input('type' . $i);
        //     if (!empty($name) && !empty($type)) {
        //         if ($request->hasFile('image' . $i)) {
        //             $image = $request->file('image' . $i);
        //             if ($image->isValid()) {
        //                 $imagePath =  $image->move('eventpeople', time() . $i. '.' . $image->getClientOriginalExtension());
        //                 EventPeople::create([
        //                     'event_id' => $event->id,
        //                     'name' => $name,
        //                     'type' => $type,
        //                     'image' => isset($imagePath) ? $imagePath : null,
        //                 ]);
        //             } else {

        //             }
        //         }
        //     }
        // }
    return redirect()->route('Show-event.index')->with('success', 'Event created successfully');
    }
    public function show($id)
    {
        // Find the event by its ID along with its associated event people
        $event = Event::with('eventpeople')->find($id);
        // dd($event);die;

        $preferences = Preference::all();

        return view('Show-event.show1')->with([
            'data' => $event,  // Pass the event data to the view
            'preferences' => $preferences
        ]);
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $preferences = Preference::all();
        $eventpeople = EventPeople::where('event_id',$event->id)->withTrashed()->paginate(10);
        $highestIndex = count($eventpeople) - 1;

        return view('Show-event.edit', compact('event','preferences','eventpeople','highestIndex'));
    }

    public function update(Request $request, $id)
    {
        $request['description_arabic'] = $_POST['description_arabic'];
        $request['description'] = $_POST['description'];
        $validation = $request->validate([
            'title' => 'required',
            'city' => 'required',
            'location' => 'required',
            'description' => 'required',
            'description_arabic' => 'required',
            // 'date' => 'required|date_format:Y-m-d',
            'from_date' => 'required|date_format:Y-m-d',
            'to_date' => 'required|date_format:Y-m-d',
            'from_time' => 'required|date_format:H:i',
            'to_time' => 'required|date_format:H:i',
        ]);

     $event = Event::findOrFail($id);
    $data = $request->except(['_token', '_method']); // Exclude the CSRF token and HTTP method
    // dd($request->all());die;
    // Check if a new thumbnail image is uploaded
    $tag_id = implode(',',$data['tags_ids']);
    $data['tag_id']  =  $tag_id;
    if ($request->hasFile('thumbnail')) {
        $image = $request->file('thumbnail');
        $thumbImage = $image->move('eventpeople/thumbnails', time() . '.' . $image->getClientOriginalExtension());

        // Delete the old thumbnail image if it exists
        if ($event->thumbnail && file_exists(public_path($event->thumbnail))) {
            unlink(public_path($event->thumbnail));
        }

        $data['thumbnail'] = $thumbImage;
    }

        $event->update($data);


        // $counts = $request->input('count');
        // for ($i = 1; $i <= $counts; $i++) {
        //     // Retrieve the values using the dynamic input names (name0, type0, image0, typepath0, name1, type1, image1, typepath1, etc.)
        //     $name = $request->input('name' . $i);
        //     $type = $request->input('type' . $i);

        //     // Check if the required fields (name and type) are not empty or null
        //     if (!empty($name) && !empty($type)) {
        //         // Check if a file was uploaded for this row
        //         if ($request->hasFile('image' . $i)) {
        //             $image = $request->file('image' . $i);
        //             $imagePath = $image->move('eventpeople', time() . $i . '.' . $image->getClientOriginalExtension());
        //             // Create new EventPeople record with all fields
        //             EventPeople::updateOrCreate(
        //                 ['event_id' => $event->id, 'name' => $name, 'type' => $type],
        //                 ['image' => $imagePath]
        //             );

        //         } else {
        //             // Find the existing EventPeople record if it exists
        //             $eventPerson = EventPeople::where('event_id', $event->id)
        //                 ->where('name', $name)
        //                 ->where('type', $type)
        //                 ->first();

        //             // Update name and type if the record exists
        //             if ($eventPerson) {
        //                 $eventPerson->update([
        //                     'name' => $name,
        //                     'type' => $type,
        //                 ]);
        //             }
        //         }
        //     }
        // }
        foreach ($request->addmore as $key => $add) {
            // Check if all required values are present and not null
            if (
                !empty($add['type']) && !empty($add['name'])){
                if (isset($add['id'])) {
                    // Update the existing CourseLink record
                    // $image = $add['image'];
                    // if ( $image->isValid()) {
                    //     $thumbImage = $image->move('eventpeople/thumbnails',  $key  . '_' . time() . '.'. $image->getClientOriginalExtension());

                    // }

                    if(!empty($add['image'])){
                        $image = $add['image'];
                        if($image->isValid()){
                            $add['image'] = $image->move('eventpeople/thumbnails',  $key  . '_' . time() . '.'. $image->getClientOriginalExtension());

                        }
                    }
                    $eventpeople = EventPeople::withTrashed()
                            ->where('event_id', $event->id)
                            ->where('id', $add['id'])
                            ->first();
                        // dd(  $eventpeople);die;
                        if ($eventpeople) {
                            $eventpeople->update($add);
                        }
                }else {
                    // Create a new CourseLink record
                    if(!empty($add['image'])){
                    $image = $add['image'];
                    if ( $image->isValid()) {
                        $thumbImage = $image->move('eventpeople/thumbnails',  $key  . '_' . time() . '.'. $image->getClientOriginalExtension());
                    }
                }
                    $newData = [
                        'event_id'  => $event->id,
                        'type'  => $add['type'],
                        'name'  => $add['name'],
                        'type_arabic'  => $add['type_arabic'],
                        'name_arabic'  => $add['name_arabic'],
                        'image' => isset($thumbImage) ? $thumbImage : null
                    ];

                    // Insert a new record
                    EventPeople::create($newData);
                }
                }
            }


    return redirect()->route('Show-event.index')->with('success', 'Event updated successfully');
}

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->eventPeople()->delete();
        $event->delete();

        return redirect()->route('Show-event.index')->with('success', 'Event deleted successfully');
    }
    public function destroyLang($id)
    {
        $post = EventPeople::find($id);
        $post->delete();
        return redirect()->route('Show-event.index')->with('success', __('eventpeople delete successfully.'));
    }
    public function restoreLink($id)
    {
        $post = EventPeople::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('Show-event.index')->with('success', __('eventpeople restore successfully.'));
        }

}
