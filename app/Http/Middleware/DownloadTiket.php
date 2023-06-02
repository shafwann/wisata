<?php

namespace App\Http\Middleware;

use App\Models\Tiket;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadTiket
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
        $ticketId = $request->route('id');
        $ticket = Tiket::find($ticketId);
        if ($ticket->user_id == Auth::user()->id) {
            if ($ticket->konfirmasi == 0) {
                return redirect('daftar-pemesanan');
            }
        } else if ($ticket->user_id != Auth::user()->id) {
            return redirect('daftar-pemesanan');
        }

        return $next($request);
    }
}
