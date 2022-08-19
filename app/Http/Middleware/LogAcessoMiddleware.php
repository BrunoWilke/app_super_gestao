<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$manipular $request
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' =>"IP $ip requisitou a rota $rota"]);
        //return $next($request);//next so manda continuar
        //return Response('chegamos no middleware e paramos');
        $resposta = $next($request);
        $resposta->setStatusCode('251','Nao está nada ok');
        return $resposta;
        //dd($resposta);

    }
}
