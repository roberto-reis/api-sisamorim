<?php

if (!function_exists('responde_with_token')) {
    /**
     * @param $token
     * @return array
    */
    function responde_with_token(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => intval(auth()->factory()->getTTL()) // expires_in is in seconds
        ];
    }
}

if (!function_exists('clear_cpf_cnpj')) {
    /**
     * @param $cpf_cnpj
     * @return string
    */
    function clear_cpf_cnpj(?string $data): ?string
    {
        if ($data == null || $data == '') return null;

        $paraRemover = ['.', '-', '/'];

        return str_replace($paraRemover, '', $data);
    }
}

if (!function_exists('formata_cpf_cnpj')) {
    /**
     * @param $cpf_cnpj
     * @return string
    */
    function formata_cpf_cnpj(?string $data): ?string
    {
        if ($data == null || $data == '') return null;

        if (strlen($data) == 11) {
            return substr($data, 0, 3) . '.' . substr($data, 3, 3) . '.' . substr($data, 6, 3) . '-' . substr($data, 9, 2);
        }

        return substr($data, 0, 2) . '.' . substr($data, 2, 3) . '.' . substr($data, 5, 3) . '/' . substr($data, 8, 4) . '-' . substr($data, 12, 2);
    }
}
