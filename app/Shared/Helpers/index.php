<?php

if (!function_exists('responde_with_token')) {
    function responde_with_token($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()
        ];
    }
}
