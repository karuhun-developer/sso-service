<?php

namespace App\Models\Passport;

use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    protected $fillable = [
        'name',
        'redirect',
        'personal_access_client',
        'password_client',
        'revoked'
    ];
}
