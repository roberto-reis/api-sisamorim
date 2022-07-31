<?php

if (!function_exists('responde_with_token')) {
    function responde_with_token(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => intval(auth()->factory()->getTTL()) // expires_in is in seconds
        ];
    }
}