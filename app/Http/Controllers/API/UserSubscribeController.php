<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Website;
use App\Models\User;
use App\Models\Subscribe;
use App\Http\Requests\UserSubscribe\StoreRequest;

class UserSubscribeController extends Controller
{
    /**
     * subscribe user to website
     */
    public function create(StoreRequest $request)
    {
        $website = Website::find($request->website_id);
        if(!$website) {
            return response()->json([
                'status' => false,
                'message' => "Website not found",
            ], 404);
        }

        $user = User::find($request->user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => "User not found",
            ], 404);
        }
        
        Subscribe::updateOrCreate([
            'user_id' => $request->user_id,
            'website_id' => $request->website_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => $user->name.' subscribed successfully',
        ]);
    }
}
