<?php
namespace App\Chart\Facades;

use Illuminate\Support\Facades\Facade;

class Chart extends Facade
{
    /**
     * Get the API All component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {

      return 'Chart';

     }
}

 ?>
