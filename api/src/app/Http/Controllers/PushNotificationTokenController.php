<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PushNotificationTokenController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $params = $request->only('token');

        $pushNotification = $user->pushNotifications()->create($params);

        return response()->json([
            "token" => $pushNotification->token,
        ], Response::HTTP_CREATED);
    }
}
