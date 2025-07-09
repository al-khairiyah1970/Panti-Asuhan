<?php

use App\Mail\ForgotPassword;

/**
 * Generate unique code.
 */
function generateCode($prefix = 'ALK') {
    $date = date('ymd');
    $suffix = generateSuffix();
    return $prefix . '.' . $date . '.' . $suffix;
}

/**
 * Generate unique suffix.
 */
function generateSuffix() {
    $suffix = '';
    $length = 5; // Desired length of the suffix (5 characters)

    while (strlen($suffix) < $length) {
        $randType = rand(0, 2); // Randomly choose 0 for letter, 1 for number, 2 for alphanumeric

        if ($randType === 0) {
            $suffix .= chr(rand(65, 90)); // Random letter from A to Z
        } elseif ($randType === 1) {
            $suffix .= rand(0, 9); // Random number from 0 to 9
        } else {
            $suffix .= chr(rand(65, 90)) . rand(0, 9); // Random alphanumeric combination
        }
    }

    // Trim or pad the suffix to ensure it has exactly 5 characters
    $suffix = substr($suffix, 0, $length);

    return $suffix;
}

/**
 * Unix Epoch Conversion.
 */
function ts_conv($ts){
    $timestamp_sec = $ts / 1000;
    $date = date("Y-m-d H:i:s", $timestamp_sec);
    return $date;
}

/**
 * Send an email.
 */
function sendEmail($data){
    $send = Mail::to($data['to'])->send(new ForgotPassword($data));
    if($send){
        // return true;
        return [
            'status' => true,
            'message' => 'Message has been sent'
        ];
    }
    // return false;
    return [
        'status' => false,
        'message' => "Message could not be sent."
    ];
}
