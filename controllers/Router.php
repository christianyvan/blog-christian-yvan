<?php
require_once ('views/View.php');

/**
 * Description of Router
 *
 * @author Christian
 */
class Router {
    private $_ctrl;
    private $_view;
    
    // chargment automatique des classes situé dans models si besoin
    public function routeReq(){
        try {
            spl_autoload_register(function($class){
            require_once ('models/'.$class.'.php'); //
            });
            $page = '';
            // le contrôleur est inclus selon l'action de l'utilisateur
            if(isset($_GET['page'])){
              $page = explode('/', filter_var($_GET['page'],FILTER_SANITIZE_URL));
              $controller = ucfirst(strtolower($page[0]));
              $controllerClass = "Controller".$controller;
              $controllerFile = "controllers/".$controllerClass.".php";
                if (file_exists($controllerFile)) {
                    require_once ($controllerFile);
                    $this->_ctrl = new $controllerClass($page);
                  //  if(isset ($_GET['id']))
                        
                }  else {
                    throw new Exception('Page introuvable');
                    }
            
            }
            else{
                    require_once 'controllers/ControllerHome.php';
                    $this->_ctrl = new ControllerHome($page);
                }  
            
        } catch (Exception $ex) {
            $errorMsg = $ex->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
          }
    }
}
