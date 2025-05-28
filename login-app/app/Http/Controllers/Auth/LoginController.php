<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cadastro;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view("auth.login");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "usuario" => ["required", "string", "max:45"],
            "senha" => ["required", "string", "max:45"],
        ]);

        $user = Cadastro::where('usuario', $credentials['usuario'])->first();

        if ($user && $user->senha === $credentials['senha']) {
            Auth::guard('web')->login($user);
            $request->session()->regenerate();

            return redirect()->intended(route("dashboard"));
        }

        return back()->withErrors([
            "usuario" => "As informações inseridas não existem ou estão incorretas.",
        ])->onlyInput("usuario");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    /**
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }
}
