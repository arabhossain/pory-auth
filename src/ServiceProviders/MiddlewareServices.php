<?php


namespace Pory\Auth\ServiceProviders;
use Closure;
use Pory\Auth\Facades\PoryAuth;

class MiddlewareServices
{
    public function handle( $request, Closure $next ) {

        $token = $request->header('authorization');
        if($token == null)
            return response()->json([
                'message'   => __('Token required for this route'),
                'success'   => false
            ],401);

        if(!PoryAuth::isAuth())
            return response()->json([
                'message'   => __('Invalid authentication token'),
                'success'   => false
            ],401);

        $tokenData = PoryAuth::tokenData();
        if (!$tokenData['status'])
            return response()->json($tokenData,401);

        $request['auth'] =  $tokenData['data'] ?? [];

        return $next($request);
    }
}
