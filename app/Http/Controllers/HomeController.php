<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\CustomRoute;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $customroutes = CustomRoute::where('route_show', 'enable')->get();
      // foreach ($customroutes as $key => $routes) {
      //   return 'Route::'.$routes->request_type."('/".$routes->group_url.'/'.$routes->url."',[".$routes->controller_name."::class, '". $routes->function_name."'])->name('".$routes->route_name."');";
      // }
        return view('route', ['customroutes' => $customroutes]);
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function route(Request $request)
    {

        $validator = Validator::make($request->all(), [
         'request_type' => 'required|string|max:255',
         'group_url' => 'sometimes|string',
         'url' => "required|string|unique:routes,url",
         'controller_name' => 'required|string',
         'function_name' => 'required|string|max:255|unique:routes,function_name',
         'route_name' => 'required|string|max:255|unique:routes,route_name',
         'route_show' => "required|string",
         'menu' => 'required|string',
       ]);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }
       $route = new CustomRoute();
       $route->request_type = $request->request_type;
       $route->group_url = $request->group_url;
       $route->url = $request->url;
       $route->controller_name = $request->controller_name;
       $route->function_name = $request->function_name;
       $route->route_name = $request->route_name;
       $route->route_show = $request->route_show;
       $route->menu = $request->menu;
       $route->save();

       return redirect()->back();
    }
}
