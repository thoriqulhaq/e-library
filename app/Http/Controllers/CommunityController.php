<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Jenssegers\Agent\Agent;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;

class CommunityController extends Controller
{
    public function viewLandingPage()
    {
        $academicResource = DB::table('academic_resources')->get();
        $academicResource = DB::table('academic_resources')->orderBy('download_count')->get();

        return view('community.landingPage', [
            'academicResource' => ($academicResource),
            'academicResourceSortByDownload' => ($academicResource),
        ]);
    }

    public function viewprofilePage(Request $request)
    {
        return Jetstream::inertia()->render($request, 'Profile/Show', [
            'sessions' => $this->sessions($request)->all(),
        ]);
    }

    public function sessions(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                ->where('user_id', $request->user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) use ($request) {
            $agent = $this->createAgent($session);

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === $request->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }

    public function viewDetail(Request $request, $id)
    {
        $userid = 1;
        $academicResourceID = $id;

        $academicResource = DB::table('academic_resources')->where('id', $academicResourceID)->get();
        $academicResourceAuthor = DB::table('academic_resources_author')->where('academic_resources_id', $academicResourceID)->get();
        $bookmarkStatus = DB::table('academic_resources_public_users')->where('academic_resources_id', $academicResourceID)->where('users_id', $userid)->get();

        $string = current(current($academicResource))->genre;
        $academicResourceGenre = explode(',', $string);

        return view('community.details', [
            'academicResource' => current(current($academicResource)),
            'academicResourceAuthor' => $academicResourceAuthor,
            'academicResourceGenre' => $academicResourceGenre,
            'bookmarkStatus' => count(current($bookmarkStatus)),
        ]);
    }

    public function viewLoginPage()
    {
        return view('community.login');
    }
}
