<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class AuthController extends Controller
    {
        public function showLogin() {
            return view('login'); 
        }

        public function login(Request $request) {
            $credentials = $request->validate([
                'name'     => 'required|string',
                'email'    => 'required|email',
                'password' => 'required',
            ]);

             $user = User::where('nama', $request->name)
                ->where('email', $request->email)
                ->first();

             if ($user && Hash::check($request->password, $user->password)) {

                Auth::login($user);
                $request->session()->regenerate();

                if ($user->role === 'pembeli') {
                    return redirect()->intended('pembeli-beranda');
                } elseif ($user->role === 'penjual') {
                    return redirect()->intended('penjual-beranda');
                } elseif ($user->role === 'admin') {
                    return redirect()->intended('admin-beranda');
                }
            }


            return back()->with('error', 'Kredensial tidak cocok dengan data kami.')->withInput();
        }

        public function register(Request $request) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
            User::create([
                'nama' => $request->name, 
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'pembeli',
            ]);

            return redirect('/')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        public function logout(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }