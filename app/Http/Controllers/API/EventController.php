<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Models\Event\EventRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class EventController extends Controller
{
    protected $currentUser;
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentUser = User::find(auth('api')->id());
    }
    /**
     * Method show This function shows all events
     *
     * @return void
     */
    public function index()
    {
        try {

            $dayArabic = [
                'Sunday' => 'الأحد',
                'Monday' => 'الاثنين',
                'Tuesday' => 'الثلاثاء',
                'Wednesday' => 'الأربعاء',
                'Thursday' => 'الخميس',
                'Friday' => 'الجمعة',
                'Saturday' => 'السبت',
            ];
            $events = Event::orderBy('id', 'DESC')->with('eventPeople')->get()->map(function ($event) use ($dayArabic) {
                $event['from_day'] = $event->from_date ? date('l', strtotime($event->from_date)) : null;
                $event['to_day'] = $event->to_date ? date('l', strtotime($event->to_date)) : null;
                if($event['from_day']===null){
                    $event['from_day_arabic'] = null ;
                    $event['to_day_arabic'] =  null;
                }
                else{
                    $event['from_day_arabic'] = $dayArabic[$event['from_day']] ;
                    $event['to_day_arabic'] =  $dayArabic[$event['to_day']];
                }
                return $event;
            });

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Record fetched',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $events
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()

                ]
            );
        }
    }

    /**
     * Method eventById New release event watch now
     *
     * @param $id $id
     *
     * @return void
     */
    public function eventById($id)
    {
        try {
            $dayArabic = [
                'Sunday' => 'الأحد',
                'Monday' => 'الاثنين',
                'Tuesday' => 'الثلاثاء',
                'Wednesday' => 'الأربعاء',
                'Thursday' => 'الخميس',
                'Friday' => 'الجمعة',
                'Saturday' => 'السبت',
            ];
            $event = Event::with('eventPeople')->findOrFail($id);
            $event['from_day'] = $event->from_date ? date('l', strtotime($event->from_date)) : null;
            $event['to_day'] = $event->to_date ? date('l', strtotime($event->to_date)) : null;
            if($event['from_day']===null){
                $event['from_day_arabic'] = null ;
                $event['to_day_arabic'] =  null;
            }
            else{
                $event['from_day_arabic'] = $dayArabic[$event['from_day']] ;
                $event['to_day_arabic'] =  $dayArabic[$event['to_day']];
            }
            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $event
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method eventRegistration
     *
     * @return void
     */
    public function eventRegistration(Event $event)
    {
        try {
            $eventInfo = EventRegistration::where('user_id', $this->currentUser['id'])
                ->where('event_id', $event['id'])
                ->get();

            if (count($eventInfo) == 0) {

                $events = $this->currentUser->eventRegistrations()->create(
                    [
                        'event_id' => $event['id'],
                    ]
                );
                return response()->json(
                    [
                        'status' => true,
                        'message'=> 'Record added.',
                        'message_arabic' => 'تمت إضافة السجل.',
                        'data'   => $event
                    ]
                );
            } else {


                return response()->json(
                    [
                        'status' => true,
                        'message'=> 'You have already registered for this event.',
                        'message_arabic'=> 'لقد قمت بالتسجيل بالفعل لهذا الحدث.',
                        'data'   => $event
                    ]
                );
            }
        } catch (Throwable $e) {

            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }
}
