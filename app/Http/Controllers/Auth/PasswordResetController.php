<?php
namespace App\Http\Controllers;

use App\Http\Requests\CheckEmailRequest;
use App\Http\Requests\SendResetCodeRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PasswordResetToken;

class PasswordResetController extends Controller
{
    public function checkEmail(CheckEmailRequest $request)
    {
        $exists = User::query()->where('email', $request->email)->exists();

        return response()->json([
            'message' => 'If this email exists, we will send the instructions'
        ], 200);
    }

    public function sendResetCode(SendResetCodeRequest $request)
    {
        $exists = User::query()->where('email', $request->email)->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'If this email exists, we will send the instructions'
            ], 200);
        }

        $code = rand(100000, 999999);

        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            ['token' => Hash::make($code), 'created_at' => now()]
        );

        return response()->json(['message' => 'Reset code has been sent'], 200);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $record = PasswordResetToken::where('email', $request->email)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            return response()->json(['message' => 'Invalid reset code'], 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $record->delete(); 

        return response()->json(['message' => 'Password updated successfully'], 200);
    }
}
