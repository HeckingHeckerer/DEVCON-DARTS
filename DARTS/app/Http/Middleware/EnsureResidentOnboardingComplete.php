<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureResidentOnboardingComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user()->loadMissing('residentProfile.verification');

        $residentProfile = $user->residentProfile;
        $verification = $residentProfile?->verification;

        if (! $residentProfile || ! $verification) {
            return redirect()->route('resident.onboarding.create');
        }

        return match ($verification->status) {
            'verified' => $next($request),
            'pending_verification' => $this->redirectIfNeeded($request, 'resident.verification.pending'),
            'needs_correction' => $this->redirectIfNeeded($request, 'resident.verification.correction'),
            'rejected' => $this->redirectIfNeeded($request, 'resident.verification.rejected'),
            default => redirect()->route('resident.onboarding.create'),
        };
    }

    private function redirectIfNeeded(Request $request, string $routeName): Response
    {
        if ($request->routeIs($routeName)) {
            return app()->handle($request);
        }

        return redirect()->route($routeName);
    }
}
