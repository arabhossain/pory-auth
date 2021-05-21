<?php


namespace Pory\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'message'   => __('Login is successful'),
            'token' => $this['token'],
            'user' => $this['user']
        ];
    }
}
