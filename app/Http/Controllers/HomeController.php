<?php

namespace App\Http\Controllers;

use App\Facades\UtilityFacades;
use App\Models\Challenge\Challenge;
use App\Models\Course\Course;
use App\Models\Modual;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (!file_exists(storage_path() . "/installed")) {
            header('location:install');
            die;
        } else {



            $user = User::count();
            $course = Course::count();
            $challenge = Challenge::count();
            $languages = count(UtilityFacades::languages());

            return view('dashboard.homepage', compact('user', 'course', 'challenge', 'languages'));
        }
    }

    public function chart(Request $request)
    {

        if ($request->type == 'year') {

            $arrLable = [];
            $arrValue = [];

            for ($i = 0; $i < 12; $i++) {
                $arrLable[] = Carbon::now()->subMonth($i)->format('F');
                $arrValue[Carbon::now()->subMonth($i)->format('M')] = 0;
            }
            $arrLable = array_reverse($arrLable);
            $arrValue = array_reverse($arrValue);
            // $t =User::select(DB::raw("COUNT(*) as count"))
            // ->whereYear('created_at', date('Y'))
            // ->groupBy(DB::raw("Month(created_at)"))
            // ->pluck('count');
            $t = User::select(DB::raw('DATE_FORMAT(created_at,"%b") AS user_month,COUNT(*) AS usr_cnt'))
                ->whereYear('created_at', '>=', Carbon::now()->subDays(365)->toDateString())
                ->whereYear('created_at', '<=', Carbon::now()->toDateString())
                ->groupBy(DB::raw('DATE_FORMAT(created_at,"%b") '))
                ->get()
                ->pluck('usr_cnt', 'user_month')
                ->toArray();

            foreach ($t as $key => $val) {
                $arrValue[$key] = $val;
            }
            $arrValue = array_values($arrValue);
            return response()->json(['lable' => $arrLable, 'value' => $arrValue], 200);
        }

        if ($request->type == 'month') {

            $arrLable = [];
            $arrValue = [];

            for ($i = 0; $i < 30; $i++) {
                $arrLable[] = date("d M", strtotime('-' . $i . ' days'));

                $arrValue[date("d-m", strtotime('-' . $i . ' days'))] = 0;
            }
            $arrLable = array_reverse($arrLable);
            $arrValue = array_reverse($arrValue);
            // $monthlyCounts = DB::table('users')
            // ->selectRaw('month(created_at) as month')
            // ->selectRaw('count(*) as count')
            // ->groupBy('month')
            // ->orderBy('month')
            // ->pluck('count', 'month');
            $t = User::select(DB::raw('DATE_FORMAT(created_at,"%d-%m") AS user_month,COUNT(id) AS usr_cnt'))
                ->whereYear('created_at', '>=', Carbon::now()->subDays(365)->toDateString())
                ->whereYear('created_at', '<=', Carbon::now()->toDateString())
                ->groupBy(DB::raw('DATE_FORMAT(created_at,"%d-%m") '))
                ->get()
                ->pluck('usr_cnt', 'user_month')
                ->toArray();

            foreach ($t as $key => $val) {
                $arrValue[$key] = $val;
            }
            $arrValue = array_values($arrValue);

            return response()->json(['lable' => $arrLable, 'value' => $arrValue], 200);
        }
    }
}
