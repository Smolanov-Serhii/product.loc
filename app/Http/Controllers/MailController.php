<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function send(Request $request)
    {
        $toEmail = Variable::where('key', 'email')->first()->translate->value;

        try {
            Mail::to($toEmail)->send(new FeedbackMail($request));
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => __('feedback.fail_msg') . $exception->getMessage()
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => __('feedback.success_msg')
        ]);
    }
}
