<?php
    namespace App\Http\Middleware;
    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

    class DeleteCache{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle(Request $request, Closure $next){
            $response = $next($request);

            if (!$response instanceof SymfonyResponse) {
                $response = new Response($response);
            }

            /**
                * @var  $headers  \Symfony\Component\HttpFoundation\HeaderBag
            */
            $response->header('Pragma', 'no-cache');
            $response->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
            $response->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');
            return $response;
        }
    }
?>
