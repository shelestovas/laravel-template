<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminAccessDenied
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = \Sentinel::getUser();

        if (!$user->hasAccess(\Route::currentRouteName())) {
            if ($request->ajax()) {
                return response()->json([
                    'result'       => 'system_error',
                    'notify_title' => 'Ошибка!',
                    'msg'          => 'У вас не достаточно прав для выполнение данной операции.',
                    'notify_class' => 'bg-danger'
                ], 422);
            }

            if ($request->getRealMethod() == 'POST') {
                session()->flash('alert', [
                    'type'    => 'danger',
                    'message' => '<span class="text-semibold">Ошибка!</span> У вас не достаточно прав для выполнение данной операции.'
                ]);

                return redirect()->back();
            }
            return response(view('admin.access_denied', [
                'title' => 'Доступ закрыт',
            ]));
        }
        return $next($request);
    }
}