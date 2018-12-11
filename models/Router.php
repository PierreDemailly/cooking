<?php 
/**
 * Class representing router
 * @author Pierre Demailly
 */
class Router 
{
  /**
   * @var array $routes
   * @var string $currentRoute
   * @var array $vars
   */
  private $routes,
          $currentRoute,
          $vars;

  /**
   * @param string $route
   */
  public function __construct(string $route = null)
  {
    $this->routes = require './conf/routes.conf.php';
    if(!is_null($route))
    {
      if(array_key_exists($route, $this->routes))
      {
        $this->currentRoute = ($route !== null) ? $route : 'default';
      }
      else 
      {
        $this->currentRoute = 'default';
      }
    }
    else 
    {
      $this->currentRoute = 'default';
    }
  }

  /**
   * Set the current route
   * @param string $route
   * @return void
   */
  public function setCurrentRoute(string $route)
  {
    if(array_key_exists($route, $this->routes))
      $this->currentRoute = ($route !== null) ? $route : 'default';
    else 
      $this->currentRoute = 'default';
  }

  /**
   * Assign vars to get them when calling controllers
   * @param array $vars
   * @return void
   */
  public function assignVar(array $vars)
  {
    if(is_array($vars))
    {
      foreach($vars as $key => $value)
      {
        $this->vars[$key] = $value;
      }
    }
  }

  /**
   * Require controller assigned to the current route
   * @return void
   */
  public function callController()
  {
    if(!empty($this->vars))
      extract($this->vars);
      
    if($this->currentRoute === 'default')
      require_once './controllers/' . $this->routes[$this->routes[$this->currentRoute]] . '.php';
    else 
      require_once './controllers/' . $this->routes[$this->currentRoute] . '.php';
  }

  /**
   * Get the default route
   * @return void
   */
  public static function getDefaultRoute()
  {
    $router = new static;
    return $router->routes['default'];
  }
}
