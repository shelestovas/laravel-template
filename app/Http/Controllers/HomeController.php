<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$routeCollection = \Route::getRoutes()->getRoutes();
        //dd($routeCollection);
        //var_dump($routeCollection);
        $names = ['no_admin', 'admin'];
        $routeCollection = \Route::getRoutes(); // RouteCollection object
        $routes = $routeCollection->getRoutes(); // array of route objects
        $grouped_routes = array_filter($routes, function($route) use ($names) {
            $action = $route->getAction();
            if (isset($action['group'])) {
                // for the first level groups, $action['group_name'] will be a string
                // for nested groups, $action['group_name'] will be an array
                foreach($names as $name) {
                    if (is_array($action['group'])) {
                        return in_array($name, $action['group']);
                    } else {
                        return $action['group'] == $name;
                    }
                }
            }
            return false;
        });

// array containing the route objects in the 'pages' group
        //dd($routes);

        return view('home');
    }
}
