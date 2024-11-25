<?php

use Diagonal\DbLogger\Tests\Models\User;
use Illuminate\Support\Str;

function createUser(?string $name = null, ?string $email = null)
{
    return User::create(
        [
            'name' => $name ?? Str::random(6),
            'email' => $email ?? Str::random(6).'@email.com',
            'password' => bcrypt('Password@123'),
        ]
    );
}
