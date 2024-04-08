<?php

namespace App\Http\Controllers;
use App\Models\Cart\Purchase;
use App\Models\Mood\UserMood;
use App\Models\User;
use App\Models\Course\Course;
use App\Models\Challenge\Challenge;
use App\Models\Challenge\UserChallengeInformation;

use App\Models\Cart\PurchaseDetail;
use App\Models\Mood\Mood;
use Illuminate\Http\Request;

class UserReport extends Controller
{
    public function index()
    {

        if (\Auth::user()->can('manage-user')) {

            $fromDate = now()->format('Y-m-d');
            $toDate = now()->addDays(7)->format('Y-m-d');
            $courseId = 0;
            $userId = 0;
            $applyDate = 0;

            $totalPurchase = Purchase::with('user','purchaseDetails.course')
            ->get();

            $users = User::get();
            $Courses = Course::get();
            $url = url('/UserReportSearch');

            $data = compact('totalPurchase','users','Courses','url','fromDate','toDate','courseId','userId','applyDate');

            return view('User-Report.index',$data);
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function UserReportSearch(Request $request){

        $fromDate   = $request['from_date'];
        $toDate     = $request['to_date'];
        $courseId   = $request['course'];
        $userId     = $request['user'];
        $applyDate  = 0;
        if(isset($request['applyDate'])){
            $applyDate = 1;
        }


        $totalPurchase = Purchase::with('user','purchaseDetails.course')
        ->whereHas('purchaseDetails', function ($query) use ($fromDate, $toDate, $applyDate)
        {

            if (!empty($applyDate) && $applyDate!=0) {
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }

            if (!empty($courseId) && $courseId!=0) {
                $query->where('course_id' ,'=', $courseId);
            }
        })
        ->where(function ($query) use ($userId) {
        if (!empty($userId) && $userId != 0) {
            $query->where('user_id', '=', $userId);
        }
        })
         ->get();
        // echo "<pre>"; print_r($totalPurchase->toArray()); die;

            $users   =  User::get();
            $Courses = Course::get();
            $url     = url('/UserReportSearch');
            $data    = compact('totalPurchase','users','Courses','url','fromDate','toDate','courseId','userId','applyDate');
            return view('User-Report.index',$data);
    }

    public function UserChallenge()
    {
        if (\Auth::user()->can('manage-user')) {

            $fromDate   = now()->format('Y-m-d');
            $toDate     = now()->addDays(7)->format('Y-m-d');
            $challangeId   = 0;
            $userId     = 0;
            $applyDate  = 0;
            $url        = url('/UserChallengeSearch');

            $userChallenges = Challenge::with('userChallengeVideos')->get();
            $users          = User::get();
            $challenge      = Challenge::get();

            $data = compact('userChallenges','users','challenge','url','fromDate','toDate','challangeId','userId','applyDate');
            return view('User-Report.userchallenge',$data);

        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }

    }


    public function UserChallengeSearch(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); die;
            $fromDate   = $request['from_date'];
            $toDate     = $request['to_date'];
            $challangeId = $request['challenge'];
            $userId     = $request['user'];
            $applyDate  = 0;
            if(isset($request['applyDate'])){
                $applyDate = 1;
            }

            $url = url('/UserChallengeSearch');

            $userChallenges = Challenge::with('userChallengeVideos')
                ->where(function ($query) use ($fromDate, $toDate,$challangeId,$applyDate) {

                if (!empty($applyDate) && $applyDate!=0) {
                        $query->whereBetween('created_at', [$fromDate, $toDate]);
                    }

                if (!empty($challangeId) && $challangeId != 0) {
                    $query->where('id', '=', $challangeId);
                }
                })
                ->whereHas('userChallengeVideos', function ($query) use ($userId)
                {
                    if (!empty($userId) && $userId!=0) {
                        $query->where('user_id' ,'=', $userId);
                    }
                })
                ->get();
            $users          = User::get();
            $challenge      = Challenge::get();

            $data = compact('userChallenges','users','challenge','url','fromDate','toDate','challangeId','userId','applyDate');
            return view('User-Report.userchallenge',$data);
    }

    function transformArrayByMonth($inputArray)
{
    $outputArray = [];

    foreach ($inputArray as $name => $data) {
        foreach ($data as $item) {
            $date = $item['date'];
            $formattedDate = date('Y-m-d', strtotime($date));
            $outputArray[$name][$formattedDate] = $item;
        }
    }

    // Now, fill in the gaps for the entire month with empty arrays
    foreach ($outputArray as $name => $data) {
        $startDate = date('Y-m-01', strtotime(reset($data)['date']));
        $endDate = date('Y-m-t', strtotime(end($data)['date']));

        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            if (!isset($outputArray[$name][$currentDate])) {
                $outputArray[$name][$currentDate] = [];
            }
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }

        ksort($outputArray[$name]);
    }

    return $outputArray;
}

    public function UserMoodReport()
    {

        if (\Auth::user()->can('manage-user')) {

            $currentMonthValue = \Illuminate\Support\Carbon::now()->month;
            $month   =  $currentMonthValue;
            $moodId     = 0;
            $userIdSelect = 0;
            $url        = url('/UserMoodReportSearch');

            $userMoods =  UserMood::leftJoin('users', 'users.id', '=', 'user_moods.user_id')
            ->leftJoin('moods', 'moods.id', '=', 'user_moods.mood_id')
            ->leftJoin('mood_categories', 'mood_categories.id', '=', 'user_moods.mood_category_id')
            ->leftJoin('mood_sub_categories', 'mood_sub_categories.id', '=', 'user_moods.mood_sub_category_id')
            // ->where('users.id', '=', 1)
            ->select('users.name','users.id', 'moods.name as main_mood', 'mood_categories.name as sub_mood', 'mood_sub_categories.name as sub_cat_mood', 'user_moods.date')
            ->get();

            $resultArray = array();

                    foreach ($userMoods as $data) {
                        $userId = $data['name'];

                        if (!isset($resultArray[$userId])) {
                            $resultArray[$userId] = array();
                        }

                        $resultArray[$userId][] = $data->toArray();
                    }

                    $outputArray = $this->transformArrayByMonth($resultArray);

// print_r($outputArray);

           // echo "<pre>"; print_r($outputArray); die;


            $users          = User::get();
            $moods      = Mood::get();

            $data = compact('outputArray','users','moods','url','userIdSelect','moodId','month');
            return view('User-Report.usermoods',$data);

        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }

    }


    public function UserMoodReportSearch(Request $request)
    {
        if (\Auth::user()->can('manage-user')) {

            // print_r($request->all()); die;

            $month   = $request['month'];
            $moodId     = $request['mood'];
            $userIdSelect = $request['user'];
            $url        = url('/UserMoodReportSearch');

            $userMoods =  UserMood::leftJoin('users', 'users.id', '=', 'user_moods.user_id')
            ->leftJoin('moods', 'moods.id', '=', 'user_moods.mood_id')
            ->leftJoin('mood_categories', 'mood_categories.id', '=', 'user_moods.mood_category_id')
            ->leftJoin('mood_sub_categories', 'mood_sub_categories.id', '=', 'user_moods.mood_sub_category_id')
            ->where(function ($query) use ($userIdSelect,$month,$moodId) {

                if (!empty($userIdSelect) && $userIdSelect != 0) {
                    $query->where('users.id', '=', $userIdSelect);
                }
                if (!empty($month) && $month != 0) {
                    $query->whereMonth('user_moods.date', $month);
                }

                if (!empty($moodId) && $moodId != 0) {
                    $query->where('user_moods.mood_id', $moodId);
                }

                })
            ->select('users.name','users.id', 'moods.name as main_mood', 'mood_categories.name as sub_mood', 'mood_sub_categories.name as sub_cat_mood', 'user_moods.date')
            ->get();

            $resultArray = array();

                    foreach ($userMoods as $data) {
                        $userId = $data['name'];

                        if (!isset($resultArray[$userId])) {
                            $resultArray[$userId] = array();
                        }

                        $resultArray[$userId][] = $data->toArray();
                    }

                    $outputArray = $this->transformArrayByMonth($resultArray);

// print_r($outputArray);

            // echo "<pre>"; print_r($outputArray); die;


            $users          = User::get();
            $moods      = Mood::get();

            $data = compact('outputArray','users','moods','url','userIdSelect','moodId','month');
            return view('User-Report.usermoods',$data);

        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }

    }


}
