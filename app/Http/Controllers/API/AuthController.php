<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Validation\Rule;
use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Auth\UserOtp;
use App\Models\Cart\PurchaseDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\verifyMail;
use App\Models\Cart\Purchase;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    /**
     * Method register this function is to register user
     *
     * @param Request $request
     *
     * @return void
     */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => "required",
                    'email' => [
                        'required',
                        'email',
                        function ($attribute, $value, $fail) {
                            $existingUser = \DB::table('users')
                                ->where('email', $value)
                                ->whereNull('deleted_at')
                                ->first();

                            if ($existingUser) {
                                $fail('The email has already been taken.');
                            }
                        },
                    ],
                    'password' => 'required|confirmed|min:6',
                ]
            );



            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->first()
                    ],
                    400
                );
            }

            $input = $request->all();
            $input['password'] = Hash::make($request['password']);

            $user = User::create($input);


            $user['preferences_ids'] = json_decode($user['preferences_ids']);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Registered succesfully.',
                    'message_arabic' => 'تم التسجيل بنجاح.',
                    'data'    => $user
                ],
                201
            );



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
     * Method login this function in to login users
     *
     * @param Request $request
     *
     * @return void
     */
    public function login(Request $request)
    {
        try {
             // Attempt to authenticate the user
             $loginType = filter_var($request->name_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
             $user = User::where($loginType, $request->name_email)->first();
    
             if (!$user) {
                 return response()->json([
                     'status' => false,
                     'error' => 'User not found',
                 ], 404);
             }
     
            $validator = Validator::make(
                $request->all(),
                [
                    'name_email' => 'required',
                    'password'   => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->first()
                    ],
                    400
                );
            }
           
            // dd(auth('api')->user());
            $credentials = [
                $loginType => $request->name_email,
                'password'  => $request->password
            ];
            // return $credentials;
            // return auth('api')->user();
            // return User::where('id', auth('api')->id())->with('userCourses')->first();

            $token = auth('api')->attempt($credentials);
            if ($token === false) {
                return response()->json([
                    'status' => false,
                    'error' => 'Unauthorized',
                    'error_arabic' => 'غير مصرح'
                    ], 401);
            }

            $user = User::where('id', auth('api')->id())->first();

            $user['preferences_ids'] = json_decode($user['preferences_ids']);

            // return $user;

            // dd($user->userOtp ->toArray());die;
            if (isset($user->userOtp) && !empty($user->userOtp ->toArray())) {
            foreach ($user->userOtp as $userOtpval) {
                // dd($userOtpval->userOtp->toArray());die;
                if ($userOtpval->is_verified !== 1) {
                    // User is not verified

                    return response()->json([
                        'status'  => false,
                        'message' => 'User is not verified. Please verify your account.',
                        'message_arabic' => 'لم يتم التحقق من المستخدم. يرجى التحقق من حسابك.',
                    ]);
                }
            }
        }
            // return $user;


            $course_count =  Purchase::withcount('purchaseDetails')->where('user_id', auth('api')->id())->where('total_courses','!=',0)->get();
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

            $user['base_url']   = env('APP_URL');
            return response()->json(
                [
                    'status'       => true,
                    'user'         => $user,
                    'token_type'   => 'bearer',
                    'expires_in'   => 315360000,
                    'access_token' => $token
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error'  => $validator->errors()->first(),
                    ],
                    400
                );
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }



    /**
     * Method logout
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(
            [
                'status' => true,
                'message' => 'Logged out succesfully.',
                'message_arabic' => 'تم تسجيل الخروج بنجاح.',
            ]
        );
    }

    /**
     * Method shareOTP
     *
     * @return void
     */
    public function shareOTP(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email_contact_no' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->first()
                    ],
                    400
                );
            }

            $input = $request->all();
            $credType = filter_var($input['email_contact_no'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

            $user = User::where($credType, $input['email_contact_no'])->first();

            $type = "forget password";

            if (!empty($user)) {
                $otp = rand(1000, 9999);

                UserOtp::where('user_id', $user['id'])
                    ->where('type', $type)
                    ->whereIn('is_verified', [true, false])
                    ->delete();

                //Create otp records.
                $userOtp = UserOtp::create(
                    [
                        'user_id'  => $user['id'],
                        'otp' => $otp,
                        'type'     => $type,
                        'email' => $user['email'],
                    ]
                );

                $user_name = $user['name'];
                Mail::to($user['email'])->send(new verifyMail($otp,$user_name));


                return response()->json(
                    [
                        'status' => true,
                        'message' => 'OTP has been sent.',
                        'message_arabic' => 'تم إرسال كلمة المرور لمرة واحدة.',
                        'data' => $userOtp
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status'       => false,
                        'error'      => "User not found",
                        'error_arabic'      => "لم يتم العثور على المستخدم"
                    ],
                    404
                );
            }

            return response()->json(
                [
                    'status'       => true,
                    'message'      => $user
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Method verifyOtp
     *
     * @return void
     */
    public function verifyOtp(Request $request)
    {
        try {

            $validator = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required',
                    'otp'     => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->first()
                    ],
                    400
                );
            }

            $input = $request->all();
            $input['type'] = 'forget password';

            $userOtp = UserOtp::where('user_id', $input['user_id'])
                ->where('type', $input['type'])
                ->where('is_verified', false)
                ->latest()->first();


           // return $input['email'];

            if (!empty($userOtp)) {

                if ($userOtp['otp'] == $input['otp']) {

                    $userOtp->update(
                        [
                            'is_verified' => true
                        ]
                    );


                    ////////////////////------------------------ Login Code --------------////////////////////

                    $loginType = filter_var($input['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
                    // print_r($loginType); die;

                    $credentials = [
                        $loginType => $input['email'],
                        'password'  => $input['password']
                    ];

                    $token = auth('api')->attempt($credentials);
                    if ($token === false) {
                        return response()->json(['status' => false, 'error' => 'Unauthorized'], 401);
                    }

                    $user = User::where('id', auth('api')->id())
                        ->withCount('userCourses')
                        ->first();

                    $user['base_url']   = env('APP_URL');
                    return response()->json(
                        [
                            'status'       => true,
                            'user'         => $user,
                            'token_type'   => 'bearer',
                            'expires_in'   => auth('api')->factory()->getTTL() * 60,
                            'access_token' => $token
                        ]
                    );

                    /////////////------------- Login Code End -----------------////////////




                    // return response()->json(
                    //     [
                    //         'status'        => true,
                    //         'message'       => 'OTP is verified',
                    //     ]
                    // );
                } else {
                    return response()->json(
                        [
                            'status'        => false,
                            'error'       => 'OTP is not valid',
                            'error_arabic'       => 'كلمة المرور لمرة واحدة غير صالحة'
                        ]
                    );
                }
            } else {
                return response()->json(
                    [
                        'status'        => false,
                        'error'       => 'Generate new OTP',
                        'error_arabic'       => 'إنشاء OTP جديد',
                    ]
                );
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    public function verifyOTPForgetPass(Request $request)
    {
        try {



            $validator = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required',
                    'otp'     => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->first()
                    ],
                    400
                );
            }

            $input = $request->all();
            $input['type'] = 'forget password';

            $userOtp = UserOtp::where('user_id', $input['user_id'])
                ->where('type', $input['type'])
                ->latest()->first();

            if (!empty($userOtp)) {

                if ($userOtp['otp'] == $input['otp']) {

                    $userOtp->update(
                        [
                            'is_verified' => true
                        ]
                    );

                    return response()->json(
                        [
                            'status'        => true,
                            'message'       => 'OTP Veryfied',
                            'message_arabic'       => 'OTP تم التحقق'
                        ]
                    );

                } else {
                    return response()->json(
                        [
                            'status'        => false,
                            'error_arabic'       => 'OTP غير صالح'
                        ]
                    );
                }
            } else {
                return response()->json(
                    [
                        'status'        => false,
                        'error_arabic'       => 'توليد جديد OTP',
                    ]
                );
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }


    public function updateForgetPassword(Request $request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'user_id'           => 'required',
                    'password'          => 'required|min:6',
                    'confirm_password'  => 'required|min:6',
                ]
            );



            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->all()
                    ]
                );
            }

            $input = $request->all();
            $user = User::where('id', $input['user_id'])->first();
            if (empty($user)) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => "User not found.",
                        'message_arabic' => "لم يتم العثور على المستخدم."
                    ],
                    404
                );
            }
            //Generate bcrypted password and updated user.

            if($input['password'] != $input['confirm_password']){
                return response()->json(
                    [
                        'status' => false,
                        'message' => "Password and confirm password not matched.",
                        'message_arabic' => "كلمة المرور وتأكيد كلمة المرور غير متطابقين."
                    ],
                    200
                );
            }

            if($input['password']=='' || $input['confirm_password']==''){
                return response()->json(
                    [
                        'status' => false,
                        'message' => "Password or confirm password can not be blank.",
                        'message_arabic' => "كلمة المرور أو تأكيد كلمة المرور لا يمكن أن تكون فارغة."
                    ],
                    200
                );
            }
            $password = bcrypt($input['password']);

                $user->update(
                    [
                        'password' => $password
                    ]
                );
            return response()->json(
                [
                    'status' => true,
                    'message' => "Password has been updated.",
                    'message_arabic' => "تم تحديث كلمة المرور."
                ],
                200
            );

        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json(
            [
                'status'       => true,
                'user'         => auth('api')->user(),
                'token_type'   => 'bearer',
                'expires_in'   => auth('api')->factory()->getTTL() * 60,
                'access_token' => $token
            ]
        );
    }

    /**
     * Method refreshToken This function generates new token for logged in user
     * and disabled old token.
     *
     * @return void
     */
    public function refreshToken()
    {
        try {
            return response()->json(
                [
                    'status' => true,
                    'newToken' => auth()->refresh()
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Method deleteUser
     *
     * @param Request $request
     *
     * @return void
     */
    public function deleteUser(Request $request)
    {
        try {
            $user = User::where('id', auth('api')->id())->firstOrFail();

            auth()->logout();
            $user->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => "Logged out successfully.",
                    'message_arabic' => "تم تسجيل الخروج بنجاح."
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }

    /**
     * Method updatePassword
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function updatePassword(Request $request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'user_id'           => 'required',
                    'password'          => 'required|min:6',
                    'confirm_password'  => 'required|min:6',
                    'old_password'  => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => false,
                        'error' => $validator->errors()->all()
                    ]
                );
            }

            $input = $request->all();
            $user = User::where('id', $input['user_id'])->first();
            if (empty($user)) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => "User not found.",
                        'message_arabic' => "لم يتم العثور على المستخدم."
                    ],
                    404
                );
            }
            //Generate bcrypted password and updated user.

            // print_r($user); die;
            // echo $input['password'].'-----'.$input['confirm_password'];
            if($input['password'] != $input['confirm_password']){
                return response()->json(
                    [
                        'status' => false,
                        'message' => "Password and confirm password not matched.",
                        'message_arabic' => "كلمة المرور وتأكيد كلمة المرور غير متطابقين."
                    ],
                    200
                );
            }

            if($input['password']=='' || $input['confirm_password']==''){
                return response()->json(
                    [
                        'status' => false,
                        'message' => "Password or confirm password can not be blank.",
                        'message_arabic' => "كلمة المرور أو تأكيد كلمة المرور لا يمكن أن تكون فارغة."
                    ],
                    200
                );
            }
            $password = bcrypt($input['password']);

            if (Hash::check($input['old_password'], $user->password)){
                $user->update(
                    [
                        'password' => $password
                    ]
                );
            return response()->json(
                [
                    'status' => true,
                    'message' => "Password has been updated.",
                    'message_arabic' => "تم تحديث كلمة المرور."
                ],
                200
            );
        }else{
            return response()->json(
                [
                    'status' => false,
                    'message' => "your old password not matched with current password",
                    'message_arabic' => "كلمة المرور القديمة الخاصة بك غير متطابقة مع كلمة المرور الحالية"
                ],
                200
            );
        }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                ],
                500
            );
        }
    }
    public function googleAuth(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'idToken' => 'required',
            'email' => 'required|email',
            'username' => 'required',
        ]);
    
        // Check if the user already exists in the database
        $existingUser = User::where('email', $request->email)->first();
    
        if ($existingUser) {
            // User already exists, so check their authentication type
            $existingUser['preferences_ids'] = json_decode($existingUser['preferences_ids']);
            $course_count =  Purchase::withcount('purchaseDetails')->where('user_id', auth('api')->id())->where('total_courses','!=',0)->get();
            $totalCourses = 0;
            foreach($course_count as $course_count_val){
                $totalCourses += $course_count_val['total_courses'];
            }
            // echo $totalCourses; die;
            // echo "<pre>"; print_r($course_count->toArray()); die;
            
            // echo "<pre>"; print_r($course_count->toArray()[0]['purchase_details_count']); die;
            $existingUser['user_courses_count'] = 0;
            if(isset($course_count->toArray()[0])){
            $existingUser['user_courses_count'] = $totalCourses; //$course_count->toArray()[0]['purchase_details_count'];
            } 

            $existingUser['base_url']   = env('APP_URL');

            if ($existingUser->auth_type === 'google') {
                // User is authenticated with Google
                return $this->generateGoogleAuthResponse($existingUser);
            } else {
                // User exists but is not authenticated with Google
                return response()->json([
                    'status' => false,
                    'error' => 'User is not authenticated with Google.',
                ], 403); // 403 Forbidden status code
            }
        } else {
            // User doesn't exist, create a new user and authenticate them with Google
            $newUser = new User();
            $newUser->name = $request->username;
            $newUser->email = $request->email;
            $newUser->auth_type = 'google';
            $newUser->save();
            return $this->generateGoogleAuthResponse($newUser);
        }
    }
    
    private function generateGoogleAuthResponse($user)
    {
        // Construct the response for Google-authenticated users
        $response = [
            'status' => true,
            'user' => $user,
            'token_type' => 'bearer',
            'expires_in' => 315360000,
            'access_token' => auth('api')->login($user),
        ];
        return response()->json($response);
    }
    
  
    
} 

