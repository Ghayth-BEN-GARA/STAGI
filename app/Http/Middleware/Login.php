<?php
    namespace App\Http\Middleware;
    use Closure;
    use Illuminate\Http\Request;

    class Login{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle(Request $request, Closure $next){
            if(Session()->has('email') && (url('signin')==$request->url())
            || Session()->has('email') && (url('signup')==$request->url())
            || Session()->has('email') && (url('forget1')==$request->url())
            || Session()->has('email') && (url('forget2')==$request->url())
            || Session()->has('email') && (url('forget3')==$request->url())
            || Session()->has('email') && (url('forget4')==$request->url())){
                return redirect('not-found');
            }
            return $next($request);
        }
    }
?>
