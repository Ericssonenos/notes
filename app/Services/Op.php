<?php

namespace App\Services;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Op
{
    public static function decryptId($value)
    {
       return Crypt::decrypt($value);
    }
}
