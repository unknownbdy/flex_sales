<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $currentUser;

    /**
     * Method __construct
     *
     * @return f
     */
    public function __construct()
    {
        $this->currentUser = auth('api')->user();
    }
    /**
     * Method show
     *
     * @param User $user
     *
     * @return void
     */
    public function show(User $user)
    {
    }

    /**
     * Method update This function is to update user information
     *
     * @param Request $request
     *
     * @return void
     */
    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $user = $this->currentUser;
            $validator = Validator::make(
                $request->all(),
                [
                    'name'  => 'required',
                    // 'email' => 'required|email|unique:users,email,' . $user->id
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status'    => false,
                        'message'   => 'Validation error',
                        'arabic'   => 'خطئ في التحقق',
                        'error'     => $validator->errors()
                    ],
                    400
                );
            }
            if ($request->hasFile('profile_image')) {
                $profile_image = $request->file('profile_image');
                if ($profile_image->isValid()) {
                    $imagePath = $profile_image->move('profileImage/thumbnails',  time() . '.'. $profile_image->getClientOriginalExtension());
                    $profile_image = $imagePath; // Store the image path in the update data
                }
            }
            if(!isset($profile_image)){
                $profile_image = $user->profile_image;
            }
            // return $profile_image;

            if(!isset($profile_image)){
                $profile_image = $user->profile_image;
            }

            // return $profile_image;

            $update = auth()->user()->update(
                [
                    'name'  =>  $input['name'],
                    // 'email' =>  $input['email'],
                    'profile_image'=> $profile_image
                ]
            );

            $user->refresh();
            if ($update) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Record updated succesfully.',
                        'message_arabic' => 'تم تحديث السجل بنجاح.',
                        'data'    => auth('api')->user()
                    ],
                    200
                );
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage().$e->getLine(),
                ],
                500
            );
        }
    }

    /**
     * Method getUser This function is to get user information
     *
     * @return void
     */
    public function getUser()
    {

        $user = auth('api')->user();

        // $user['preferences_ids'] = json_decode($user['preferences_ids']);
        // $user = User::withCount('userCourses')->where('id',auth('api')->id())->get();
 
        $user = User::where('id', auth('api')->id())->first();

            $user['preferences_ids'] = json_decode($user['preferences_ids']);

           


            $course_count =  \App\Models\Cart\Purchase::withcount('purchaseDetails')->where('user_id', auth('api')->id())->where('total_courses','!=',0)->get();
            $totalCourses = 0;
            foreach($course_count as $course_count_val){
                $totalCourses += $course_count_val['total_courses'];
            }
            // echo $totalCourses; die;
            // echo "<pre>"; print_r($course_count->toArray()); die;
            
            // echo "<pre>"; print_r($course_count->toArray()[0]['purchase_details_count']); die;
            $user['user_courses_count'] = 0;
            if(isset($course_count->toArray()[0])){
                $user['user_courses_count'] = $totalCourses; //$course_count->toArray()[0]['purchase_details_count'];
            }

             return response()->json(
            [
                'status'    => true,
                'message'   => 'success',
                'message_arabic'   => 'نجاح',
                'data'      => $user,
                // 'newToken'  => auth()->refresh()
            ]
        );
    }
    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Perform the soft delete
        $user->delete();

        return response()->json(['message' => 'User soft deleted successfully']);
    }
    /**
     * Restore the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function restore($id)
    // {
    //     // Find the soft-deleted user by ID
    //     $user = User::withTrashed()->findOrFail($id);

    //     // Check if the user is actually soft-deleted
    //     if ($user->trashed()) {
    //         // Restore the user
    //         $user->restore();

    //         return response()->json(['message' => 'User restored successfully']);
    //     }

    //     return response()->json(['message' => 'User is not soft-deleted']);
    // }
     /**
     * Update the preferences for a user in the "users" table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function updateprefrence(Request $request){

        $input = $request->all();
        $id =  $input['user_id'];
        $user = User::findOrFail($id);


            // Check if 'preferences_ids' is available in the request
            if (isset($input['preferences_ids'])) {
                // Update the 'preferences_ids' field
                $user->update([
                    'preferences_ids' => $input['preferences_ids'],
                ]);

            // Return the updated user as JSON response with a success message
            return response()->json([
                'status' => true,
                'message' => __('Preference Update successfully'),
                'message_arabic' => __('تم تحديث التفضيلات بنجاح'),
            ]);
        }else{

    //     // Return a JSON response with an error message when 'age' or 'gender' is missing
        return response()->json([
            'status' => true,
            'message' => 'Prefrences required.',
            'message_arabic' => 'التفضيلات المطلوبة.',
        ]);
    }

     }

    // public function updateprofile(Request $request)
    // {
    //     $id =  $request['user_id'];
    //     $user = User::findOrFail($id);

    //     // Check if 'age' and 'gender' fields are available in the request
    //     if (isset($request['age']) && isset($request['gender'])) {
    //         // Update the 'age' and 'gender' fields
    //         $user->update([
    //             'age' => $request['age'],
    //             'gender' => $request['gender'],
    //             'preferences_ids' => $request['preferences_ids'],
    //             'is_completed' => 1

    //         ]);


    //         // Return the updated user as JSON response with a success message
    //         return response()->json([
    //             'status' => true,
    //             'message' => __('User updated successfully'),
    //         ]);
    //     }else{

    // //     // Return a JSON response with an error message when 'age' or 'gender' is missing
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Age and Gender are required.',
    //     ]);
    // }
    // }
    public function updateprofile(Request $request)
{
    $id = $request->input('user_id');
    $user = User::findOrFail($id);

    // Check if 'age' and 'gender' fields are available in the request
    if ($request->has('age') && $request->has('gender')) {
        // Update the 'age' and 'gender' fields
        $preferencesIds = $request->input('preferences_ids');

        // Check if 'preferences_ids' is an empty array from the API and set it to null
        if ($preferencesIds === "[]") {
            $preferencesIds = null;
        }

        $user->update([
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'preferences_ids' => $preferencesIds,
            'is_completed' => 1
        ]);

        // Return a JSON response for success
        return response()->json([
            'status' => true,
            'message' => __('User updated successfully'),
            'message_arabic' => __('تم تحديث المستخدم بنجاح'),
        ]);
    } else {
        // Return a JSON response with an error message when 'age' or 'gender' is missing
        return response()->json([
            'status' => false,
            'message' => 'Age and Gender are required.',
            'message_arabic' => 'العمر والجنس مطلوبان.',
        ]);
    }
}

}
