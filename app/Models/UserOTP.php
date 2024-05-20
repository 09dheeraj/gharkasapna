<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;

class UserOTP extends Model
{
    use HasFactory;

    protected $table = 'user_otp';
    protected $fillable = ['user_id', 'user_otp', 'expires_at', 'phone'];

    public function sendSMS($number, $otpCode)
    {

        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $twilioPhoneNumber = getenv("TWILIO_FROM");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create(
                $number,
                [
                    "body" => "Welcome to GHAR KA SAPNA! Your OTP for the first login is: $otpCode. Never share this OTP with anyone.",
                    "from" => $twilioPhoneNumber,
                ]
            );

        info('SMS sent successfully!');
    }
}
