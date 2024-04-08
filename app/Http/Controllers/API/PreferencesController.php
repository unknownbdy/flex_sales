<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Preference;
use App\Models\User;

class PreferencesController extends Controller
{

    public function index()
    {
        // Fetch all preferences from the database
        $preferences = Preference::all();

        // Return the preferences as JSON response
        return response()->json($preferences);
    }
   }
