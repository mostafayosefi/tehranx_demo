<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckActivitionUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        $user = Auth::guard('user')->user();


        if (($user->authentication->tell_verify=='inactive')&&($user->authentication->email_verify=='inactive')&&($user->authentication->tells_verify=='inactive')&&($user->authentication->cardmelli_verify=='inactive')&&($user->authentication->selfi_verify=='inactive')) {

                   Alert::error('      مدارک شما تایید نشده است', '    لطفا نسبت به تایید مدارک و حساب کاربری خود اقدام نمایید      ');

            return redirect(route('user.dashboard.index'));

        }

        $response = $next($request);

        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma','no-cache'); //HTTP 1.0
        $response->headers->set('Expires','Sat, 01 Jan 1990 00:00:00 GMT'); // // Date in the past

        return $response;    }
}
