<?php
declare(strict_types=1);

class Router{
    
    private $route_path;
    private $form_path;
    private $auth_path;
    private $query;
    private $path;
    
    public function __construct(string $route_path, string $auth_path,string $form_path) {
        $this->auth_path = $auth_path;
        $this->route_path = $route_path;
        $this->form_path = $form_path;
        $this->query = false;
        $this->path = '';
    }
    
    private function request_url(){
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $clean_url = $this->sanitizeURI($url);

        if($clean_url === 'index.php' || $clean_url === 'public_html'){
            $clean_url = 'home';
        }

        $forbidden = ['config.php','session.config.php', 'config', 'routes', 'db.config.php','authenticator','database','router.php','storage','.env','app'];
        if(in_array($clean_url, $forbidden)){
            $clean_url = '404';
        }
        $this->path = $clean_url;
    }

    private function request_route(){
        
        if(!$this->query){
            $nav_routes = ['home','music','gallery'];
            $auth_routes = ['signup-login','logout','reset-request'];
            $form_routes = ['signup','login','request-reset'];
            
            if(in_array($this->path, $nav_routes)){
                require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . $this->path . '.route.php';
                die();
            }
            if(in_array($this->path, $auth_routes)){
                require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'authenticator' . DIRECTORY_SEPARATOR . $this->path . '.auth.php';
                die();
            }
            
            if(in_array($this->path, $form_routes)){
                require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'form_handler'. DIRECTORY_SEPARATOR . $this->path .'.form_handler.php';
                die();
            }
        }else{
            
                
                require_once __DIR__ . DIRECTORY_SEPARATOR . 'db.config.php';
                require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'router.model.php';
                require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'control' . DIRECTORY_SEPARATOR . 'router.control.php';
                
                $database = new Database();
                $database->requestConnection();
                $pdo = $database->getConnection();
                $token = $this->path;
                $status = token_invalid($pdo, $token);
                if($status === false || $status === 'expired'){
                    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'authenticator' . DIRECTORY_SEPARATOR . 'expired-otp.auth.php';
                    $pdo = null;
                    unset($database);
                    die();
                }
                if($status === 'reset'){
                    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'authenticator' . DIRECTORY_SEPARATOR . 'reset-pwd.auth.php';
                    $pdo = null;
                    unset($database);
                    die();
                }
                
                else{
                    
                    if(session_status()=== PHP_SESSION_NONE){
                        require_once __DIR__ . DIRECTORY_SEPARATOR . 'session.config.php';
                    }
                    $_SESSION['token'] = $token;
                    $_SESSION['token_email'] = email($pdo, $token);
                    $pdo = null;
                    unset($database);
                    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'authenticator' . DIRECTORY_SEPARATOR . 'email-verification.auth.php';
                    die();
                }
        }
    }

    private function sanitizeURI(string $url):string{
        if(filter_var($url, FILTER_VALIDATE_URL)){
            if(!empty(parse_url($url, PHP_URL_QUERY))){
                $url = parse_url($url, PHP_URL_QUERY);
                $url = explode('=',$url)[1];
                $this->query = true;
            }else{
                $url = parse_url($url, PHP_URL_PATH);
                $url = basename($url);
                $this->query = false;
            }
            
        }else{
            $url = '404';
        }
        return $url;
    }

    public function getURL(){
        $this->request_url();
    }

    public function getRoute(){
        $this->request_route();
    }
}

