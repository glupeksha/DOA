<?php 

namespace App;

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
    
     
        $context = new RequestContext();
        $request = Request::createFromGlobals();
        $context->fromRequest(Request::createFromGlobals());

        // Routing can match routes with incoming requests
        $matcher = new UrlMatcher($routes, $context);
        try {
            
            $matcher = $matcher->match($_SERVER['REQUEST_URI']);
            // Cast params to int if numeric
            array_walk($matcher, function(&$param)
            {
                if(is_numeric($param)) 
                {
                    $param = (int) $param;
                }
            });
    
    
            // https://github.com/gmaccario/simple-mvc-php-framework/issues/2
            // Issue #2: Fix Non-static method ... should not be called statically
            $className = '\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();
            
            // Add routes as paramaters to the next class
            $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes));

            call_user_func_array(array($classInstance, $matcher['method']), $params);
            
        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
            Log::error("Route method is not allowed.");
        } catch (ResourceNotFoundException $e) {
            echo 'Route does not exists.';
            Log::error("Route does not exists.");
        
        } catch (NoConfigurationException $e) {
            echo 'Configuration does not exists.';
            Log::error("Configuration does not exists.");
        } catch(Exception $e){
            echo 'Error: ';
        }
    }
}

// Invoke
$router = new Router();
$router($routes);