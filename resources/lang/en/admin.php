<?php
$email=':email';

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'app_name' => env("APP_NAME"),
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
  'verified' => "Your Email is not Verified,Please Check Your Email, click <a href='/resendmail/$email'>here</a> 
                            Resend Mail",
                           
  'active' => 'Your Account is pending for Approval !!!',

];
