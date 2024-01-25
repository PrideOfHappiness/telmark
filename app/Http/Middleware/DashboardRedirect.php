<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class DashboardRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Cek apakah user adalah admin
        if (Auth::user() && Auth::user()->kategori == 'Admin'){
            return redirect()->route('dashboard.dashboardAdmin'); // Ganti 'admin.dashboard' dengan nama route dashboard admin
        }

        // Cek apakah user adalah karyawan
        if (Auth::user() && Auth::user()->kategori == 'Karyawan'){
            return redirect()->route('dashboard.dashboardUser'); // Ganti 'admin.dashboard' dengan nama route dashboard admin
        }

        if (Auth::user() && Auth::user()->kategori == 'Super Admin'){
            return redirect()->route('dashboard.dashboardSuperAdmin'); // Ganti 'admin.dashboard' dengan nama route dashboard admin
        }

        if ($user && $user->isSuperAdmin()) {
            return redirect()->route('karyawan.dashboard'); // Ganti 'karyawan.dashboard' dengan nama route dashboard karyawan
        }

        // Jika bukan admin atau karyawan, lanjutkan ke halaman biasa
        return $next($request);
    }
}
