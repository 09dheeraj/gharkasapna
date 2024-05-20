<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;


class VendorOTP extends Model
{
    use HasFactory;

    protected $table = 'vendor_otp';
    protected $fillable = ['vendor_id', 'otp', 'expires_at', 'phone'];

    

    public function VendorsendSMS($number, $otpCode, $name)
    {

        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $twilioPhoneNumber = getenv("TWILIO_FROM");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create(
                $number,
                [
                    "body" => "Hello $name, welcome to GHAR KA SAPNA! Your OTP for the first login is: $otpCode. Please keep it confidential and do not share it with anyone.",
                    "from" => $twilioPhoneNumber,
                ]
            );

        info('SMS sent successfully!');
    }











}
