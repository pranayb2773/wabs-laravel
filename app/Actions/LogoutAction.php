<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

final readonly class LogoutAction
{
    /**
     * Execute the action.
     */
    public function handle(): Redirector|RedirectResponse
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
}
