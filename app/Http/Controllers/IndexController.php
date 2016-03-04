<?php

namespace App\Http\Controllers;

use Composer\Config;
use Illuminate\Routing\Controller;
use Helpers\Javascript_factory;
//use Database\Models\Log;
// the required libs
use Illuminate\Support\Facades\Input;
use Illuminate\Container\Container as Container;
use Illuminate\Support\Facades\App;
use Propel\Runtime\Propel;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Base\ServerQuery;
use Base\LogQuery;

class IndexController extends Controller
{

    public function Index()
    {
        $this->load_template('index/home.tpl', [
            'base_url' => BASE_URL,
            ['auto_reload' => true]
        ]);
    }
}
