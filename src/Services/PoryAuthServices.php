<?php

namespace Pory\Auth\Services;


use Illuminate\Support\Facades\Config;

class PoryAuthServices extends JWTServices
{
    public function login(array $credentials)
    {

        $token =  $this->encode(request()->all());

        return ['user' => Config::get('pory'), 'token' => $token];
    }

    public function logout()
    {

        $token = $this->getBearerToken();

        return ['user' => $this->decode($token), 'token' => $token];
    }

    /**
     * @return bool
     */
    public function isAuth(): bool
    {
       $token = $this->getBearerToken();

       if (is_null($token))
           return false;

       //check if token exist in db

        //check if token has user id / type

        //now get user by token user id and match with token data


       return true;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function tokenData(): array
    {
        $token = $this->getBearerToken();
        if (!$token)
            return [
                'message'   => 'Empty authentication token',
                'status'    => false
            ];

        try {
            return [
                'message'   => 'Token data decoded successfully',
                'data'      => $this->decode($token),
                'status'    => true
            ];
        } catch (\Exception $e) {
            return [
                'message'   => $e->getMessage(),
                'status'    => false
            ];
        }
    }
}
