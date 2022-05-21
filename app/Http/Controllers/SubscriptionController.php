<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $rules = [
            'userId' => 'required|exists:users,id',
            'websiteId' => [
                'required', 'exists:websites,id',
                Rule::notIn(Subscription::query()
                    ->where('website_id', $request->websiteId)
                    ->where('user_id', $request->userId)
                    ->pluck('website_id'))
            ],
        ];
        $messages = [
            'websiteId.not_in' => 'You have existing subscription!',
            'websiteId.exists' => 'The website specified does not exist!',
            'websiteId.required' => 'The websiteId field is missing!',
            'userId.required' => 'The userId field is missing!',
            'userId.exists' => 'The user specified does not exist!'
        ];
        $this->validate($request, $rules, $messages);
        $user = User::query()->findOrFail($request->userId);
        $website = Website::query()->findOrFail($request->websiteId);
        $user->subscriptions()->attach($website);
    }

    public function unsubscribe(Request $request)
    {
        $rules = [
            'userId' => 'required|exists:users,id',
            'websiteId' => [
                'required', 'exists:websites,id',
                Rule::in(Subscription::query()
                    ->where('website_id', $request->websiteId)
                    ->where('user_id', $request->userId)
                    ->pluck('website_id'))
            ]
        ];
        $messages = [
            'websiteId.in' => 'You do not have existing subscription!',
            'websiteId.exists' => 'The website specified does not exist!',
            'websiteId.required' => 'The websiteId field is missing!',
            'userId.required' => 'The userId field is missing!',
            'userId.exists' => 'The user specified does not exist!'
        ];
        $this->validate($request, $rules, $messages);
        $user = User::query()->findOrFail($request->userId);
        $website = Website::query()->findOrFail($request->websiteId);
        $user->subscriptions()->detach($website);
    }
}
