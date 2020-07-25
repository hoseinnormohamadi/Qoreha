<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RedirectController;
use Closure;

class AccountActivationCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->AccountStatus == 'Active'){
            return $next($request);
        }
        return RedirectController::Redirect('/Account/ActivateAccount','ابتدا اکانت خود را فعال کنید');
    }
}
