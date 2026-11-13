<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.orders'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function index(Request $request)
    {
        $orders = Order::latest()
            ->when($request->status, fn ($query, $status) => $query->where('status', $status))
            ->paginate(15)
            ->withQueryString();

        // Jumlah order per status, untuk tab filter
        $counts = Order::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return view('admin.index', compact('orders', 'counts'));
    }

    public function show(Order $order)
    {
        return view('admin.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(array_keys(config('shop.statuses')))],
            'admin_note' => ['nullable', 'string', 'max:1000'],
        ]);

        $order->update($data);

        return back()->with('ok', 'Order diperbarui.');
    }
}
