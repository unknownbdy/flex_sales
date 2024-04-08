<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\Modual;
use Illuminate\Support\Facades\DB;
use App\DataTables\PreferencesDataTable;
use App\Models\Preference;

class PreferencesController extends Controller
{
    public function index(PreferencesDataTable $dataTable)
    {
        return $dataTable->render('preferences.index');
    }

    public function create()
    {
        return view('preferences.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'preferences_name' => 'required',
            'arbic_preferences_name' => 'required'
        ]);

        $preference = Preference::create([
            'preferences_name' => $request->input('preferences_name'),
            'arbic_preferences_name' => $request->input('arbic_preferences_name'),
    ]);

        return redirect()->route('preferences.index')
            ->with('message', __('Preference Added successfully.'));
    }

    public function show($id)
    {
        // Find the preference by its ID
        $preference = Preference::findOrFail($id);

        // You can perform additional logic here, such as fetching related data

        return view('preferences.show', compact('preference'));
    }

    public function edit($id)
    {
        // Find the preference by its ID
        $preference = Preference::findOrFail($id);

        return view('preferences.edit', compact('preference'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'preferences_name' => 'required',
            'arbic_preferences_name' => 'required'
        ]);

        // Find the preference by its ID
        $preferences = Preference::findOrFail($id);

        $preferences->update([
            'preferences_name' => $request->input('preferences_name'),
            'arbic_preferences_name' => $request->input('arbic_preferences_name'),
        ]);

        return redirect()->route('preferences.index')
            ->with('message', __('Preference Updated successfully.'));
    }

    public function destroy($id)
    {
        // Find the preference by its ID
        $preference = Preference::findOrFail($id);

        // Perform any additional logic or checks before deleting

        $preference->delete();

        return redirect()->route('preferences.index')
            ->with('message', __('Preference Deleted successfully.'));
    }
}
