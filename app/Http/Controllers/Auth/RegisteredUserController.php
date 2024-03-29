<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'fingerprint' => 'required|string|max:255', 
        ]);

        try {

            $user = $this->createUser($validatedData);
            // Dispatch the Registered event
            event(new Registered($user));
            
            // Log in the newly registered user
            $this->loginUser($user);
            return redirect(RouteServiceProvider::HOME);
            
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'User registration failed. Please try again.']);
        }
    }

    /**
     * Create a new user record.
     */
    protected function createUser(array $validatedData): User
    {
        return User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'fingerprint_hash' => Hash::make($validatedData['fingerprint'])
        ]);
    }

    /**
     * Log in the specified user.
     */
    protected function loginUser(User $user): void
    {
        Auth::login($user);
    }
} 
