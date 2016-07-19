<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('LIB_DIR', ROOT . 'Library' . DS);
define('CONTROLLER_DIR', ROOT . 'Controller' . DS);
define('MODEL_DIR', ROOT . 'Model' . DS);
define('CONF_DIR', ROOT . 'Config' . DS);

function __autoload($className)
{
    $file = "{$className}.php";

    if (file_exists(LIB_DIR . $file))
    {
        require_once LIB_DIR . $file;
    }
    elseif (file_exists(CONTROLLER_DIR . $file))
    {
        require_once CONTROLLER_DIR . $file;
    }
    elseif (file_exists(MODEL_DIR . $file))
    {
        require_once MODEL_DIR . $file;
    }
    else
    {
        throw new Exception("{$file} not found", 500);
    }
}

try {
    Session::start();

    Config::setFromXML('db.xml');
    Config::setFromXML('main.xml');

    Router::init('routes.php');
    
    $request = New Request();
    Router::match($request);
    
    $controller = Router::$controller;
    $action = Router::$action;

    $controller = new $controller;

    if (!method_exists($controller, $action)) {
        throw New Exception("{$action} not found, 500");
    }

    $content = $controller->$action($request);

} catch (PDOException $e) {
    // you can make it different
    $content = Controller::renderError($e->getMessage(), $e->getCode());
} catch (NotFoundException $e){
    // you can make it different
    $content = Controller::renderError($e->getMessage(), $e->getCode());
} catch (Exception $e){
    $content = Controller::renderError($e->getMessage(), $e->getCode());
}

require VIEW_DIR . 'default_layout.phtml';

//echo '<hr>';
//var_dump($route);