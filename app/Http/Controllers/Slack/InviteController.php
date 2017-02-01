<?php

namespace App\Http\Controllers\Slack;

use App\Http\Controllers\Controller;
use App\MailingListUser;
use App\Slack\Slack;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function getIndex()
    {
        return view('slack.invite');
    }

    public function postIndex(Request $request)
    {
        $joinMailingList = $request->input('mailing_list', '0') == '1';
        if ($joinMailingList) {
            $this->addMailingListUserFromRequest($request);
        }

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');

        $slack = new Slack(config('services.slack.token'), config('services.slack.team'), $email);
        $response = $slack->firstName($firstName)
                          ->lastName($lastName)
                          ->invite();

        return view('slack.invite', [
            'result' => $response
        ]);
    }

    protected function addMailingListUserFromRequest(Request $request)
    {
        $attributes = $request->only(['first_name', 'last_name', 'email']);

        $user = MailingListUser::firstOrCreate($attributes);
    }
}
