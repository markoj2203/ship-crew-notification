<?php

namespace app\core;
use app\core\Request;
use app\core\Application;
use app\core\Database;

class Router{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    protected string $baseUrl = '/ship-crew-notification';

    public function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $path = $this->routes['get'][$this->baseUrl.$path] = $callback;     
    }

    public function post($path, $callback){
        $path = $this->routes['post'][$this->baseUrl.$path] = $callback;     
    }

    public function resolve(){
        $path = $this->request->getPath();         
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;
        
        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderContent("Not found");
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        return call_user_func_array($callback[0], $callback[1]);
    }

    public function renderView($view, $params = []){
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent){
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent(){
        //ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.html.php";
        //return ob_get_clean();
    }

    protected function renderOnlyView($view, $params){
        //ob_start();
        include_once Application::$ROOT_DIR."/views/$view.html.php";
        //return ob_get_clean();            
    }
}




?>