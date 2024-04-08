<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TvInterview\TvInterview;
use Illuminate\Http\Request;
use App\Models\TVShow; // Import the TVShow model
use App\Models\LiveVideo\LiveVideos;
use App\Models\Preference;
use App\Models\Collection\Collection;

class CollectionController extends Controller
{
    public function collections()
    {
        $tvshows = TVShow::all();
        $tvInterviews = TvInterview::all();
        $liveVideos = LiveVideos::all();
        $preferences = Preference::all();

        $data = [
            'TV Show' => $tvshows,
            'TV Interview' => $tvInterviews,
            'Live Video' => $liveVideos,
        ];
        $typeMap = [
            'TV Show' => 1,
            'TV Interview' => 2,
            'Live Video' => 3,
            // ... Add more mappings
        ];

        $storedCollectionData = Collection::all();

        $storedCheckboxValues = $storedCollectionData->map(function ($item) {
            return "{$item->type_id}_{$item->link_id}";
        })->toArray();
        // dd($storedCheckboxValues); die;
        return view('collections.collection', compact('data', 'preferences', 'storedCheckboxValues','typeMap'));
    }

    public function storeCollection(Request $request)
    {
        $data = $request->input('link_id');

        Collection::truncate();

        foreach ($data as $item) {
            list($type, $id) = explode('_', $item);
            // dd( $type );die;
            $collection = new Collection();
            $collection->type_id=$type ;
            $collection->link_id = $id;
            $collection->save();
        }

        return redirect()->route('collections.collection')->with('success', 'Collections created successfully.');
    }

    private function getTypeId($type)
    {
        $typeMap = [
            'TV Show' => 1,
            'TV Interview' => 2,
            'Live Video' => 3,
            // ... Add more mappings
        ];

        return $typeMap[$type] ?? null;
    }
}
