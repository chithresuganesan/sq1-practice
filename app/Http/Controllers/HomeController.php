<?php

namespace App\Http\Controllers;

use Chart;
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

       return view('chart');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pusher()
    {
        return view('pusher');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function animation()
    {
        return view('animation');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function route()
    {
        return view('route');
    }


    public function chart()
    {
      $request = app('request');

      if ($request->chart_id == 'demo1') {
        $type = $request->chart_type;

        $labels = ['Secqureone', 'comscore', 'pixstone', 'centrexIT'];
        $data = [300, 400, 800, 19];

        $collect_data[] = [
               'label' => ucfirst("clients"),
               'data' => $data,
               'backgroundColor' => ['red', 'green', 'blue', 'orange'],
           ];

        return Chart::setType($type)->setLabel($labels)->Datasets($collect_data)->get();
      }

       else {
        $type = $request->chart_type;

        $labels = ['Client 1', 'Client 2', 'Client 3', 'Client 4'];
        $data = [60, 30, 80, 109];

        $collect_data[] = [
               'label' => ucfirst("clients"),
               'data' => $data,
               'backgroundColor' => ['orange','red', 'green', 'blue'],
           ];

        return Chart::setType($type)->setLabel($labels)->Datasets($collect_data)->get();
      }


    }



}
