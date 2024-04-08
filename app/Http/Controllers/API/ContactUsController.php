<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contactus\ContactUs;
use Illuminate\Support\Facades\Auth;
use Throwable;

// ...

use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function create(Request $request)
    {
        try {
            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required',
                'email_address' => 'required|email',
                'message' => 'required',
            ]);

            // Get the ID of the currently authenticated user
            // $currentUserId = auth('api')->id();

            // Create a new contact us message and associate it with the user
            $ContactUs = ContactUs::create([
                'name' => $validatedData['name'],
                'email_address' => $validatedData['email_address'],
                'message' => $validatedData['message'],
                'user_id' =>auth('api')->id(),
            ]);

            return response()->json([
                'message' => 'Contact us message created successfully',
                'message_arabic' => 'اتصل بنا تم إنشاء الرسالة بنجاح',
                'data' => $ContactUs,
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'An error occurred while creating the contact us message.',
                'message' => 'حدث خطأ أثناء إنشاء رسالة اتصل بنا.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        try {
            $currentUserId = Auth::id(); // Get the ID of the currently authenticated user
            $ContactUs = ContactUs::where('user_id', $currentUserId)->get();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched successfully.',
                    'message_arabic' => 'تم جلب السجلات بنجاح.',
                    'data'   => $ContactUs
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


}
