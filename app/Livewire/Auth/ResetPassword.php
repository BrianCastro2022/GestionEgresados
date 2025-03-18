<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                Auth::login($user);
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('success', '¡Tu contraseña ha sido restablecida!');
            return redirect()->route('dashboard'); // Cambia esto por la ruta deseada
        } else {
            session()->flash('error', 'Hubo un error al restablecer la contraseña.');
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
