<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\BlockUser;

class IpMiddleware
{
    public function getBlock()
    {
        $block = BlockUser::get(['ip'])->pluck('ip')->toArray();
        //$implode = implode(',',$block);
        return $block;
    }
    //public $restrictIps = ['127.0.0.1'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $restrictIps = $this->getBlock() ?? [];
        if (in_array($request->ip(), $restrictIps)) {
            session()->flash('success', trans("admin.blockedIP"));
            if(auth()->check()){
                auth()->logout();
            }
            return  redirect('/');
        }

        return $next($request);
    }
}
