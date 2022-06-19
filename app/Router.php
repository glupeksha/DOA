<?php 

namespace App;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class Router
{
    /*
        * URL matcher takes in the request URI and 
        * will check if there is a match with the routes defined in routes/web.php.
        * If there is a match, the function call_user_func_array will call the right method of the right controller.
        * we used the function array_walk to cast the numeric values into integer values, 
        * because in our class methods we used the explicit type declaration.
    */
    public function __invoke(RouteCollection $routes)
    {
    
        try {
            Log::debug("start routing the incoming request...",['file'=>__FILE__,'method' => __METHOD__]);
            $context = new RequestContext();
            $request = Request::createFromGlobals();
            $context->fromRequest(Request::createFromGlobals());

            Log::debug("Initializing the URL matcher...",['file'=>__FILE__,'method' => __METHOD__]);
            // Routing can match routes with incoming requests
            $matcher = new UrlMatcher($routes, $context);
        
            Log::debug("Trying to match url...",['file'=>__FILE__,'method' => __METHOD__]);
            $matcher = $matcher->match($_SERVER['REQUEST_URI']);

            Log::debug("Getting url parameters...",['file'=>__FILE__,'method' => __METHOD__]);
            // Cast params to int if numeric
            array_walk($matcher, function(&$param)
            {
                if(is_numeric($param)) 
                {
                    Log::debug("Casting ".$param." numeric parameters to int",['file'=>__FILE__,'method' => __METHOD__]);
                    $param = (int) $param;
                }
            });
    
            Log::debug("Finding controllers in the system",['file'=>__FILE__,'method' => __METHOD__]);
            // https://github.com/gmaccario/simple-mvc-php-framework/issues/2
            // Issue #2: Fix Non-static method ... should not be called statically
            $className = '\\App\\Controllers\\' . $matcher['controller'];
            Log::debug($className." was matched as the controller",['file'=>__FILE__,'method' => __METHOD__]);

            $classInstance = new $className();
            
            Log::debug("Adding routes to the controller as parameters...",['file'=>__FILE__,'method' => __METHOD__]);
            // Add routes as paramaters to the next class
            $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes,'request'=>$request));
            Log::debug("Adding request to the controller as parameters...",['file'=>__FILE__,'method' => __METHOD__]);

            Log::debug("Trying to call the controller method ".$matcher['method']." with params ".json_encode($params),['file'=>__FILE__,'method' => __METHOD__]);

            call_user_func_array(array($classInstance, $matcher['method']), $params);
            
        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
            Log::error("Route method is not allowed.",['file'=>__FILE__,'method' => __METHOD__ ]);
            require_once APP_ROOT . '/views/errors/404.php';
        } catch (ResourceNotFoundException $e) {
            Log::error("Route does not exists.",['file'=>__FILE__,'method' => __METHOD__ ]);
            require_once APP_ROOT . '/views/errors/404.php';
        } catch (NoConfigurationException $e) {
            echo 'Configuration does not exists.';
            Log::error("Configuration does not exists.",['file'=>__FILE__,'method' => __METHOD__ ]);
            require_once APP_ROOT . '/views/errors/404.php';
        } catch(Exception $e){
            echo 'Error: ';
            Log::error("Exception: ",['file'=>__FILE__,'method' => __METHOD__ ]);
            require_once APP_ROOT . '/views/errors/500.php';
        }
    }
}

