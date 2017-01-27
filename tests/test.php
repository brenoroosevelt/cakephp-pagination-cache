<?php
use Cake\Controller\Controller;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
use BRPaginationCache\Controller\Component\PaginationCacheComponent;
use Cake\ORM\Entity;

class Test extends TestCase
{

    public $theController;

    public $plugin;

    public function testPluginComponent()
    {
        // ...
        $request = new Request();
        $response = new Response();
        
        $this->theController = new Controller($request, $response);
        // $this->plugin = new PaginationCacheComponent($this->theController->components());
        
        $this->theController->loadComponent('BRPaginationCache.PaginationCache', [
            'session' => 'posts_pagination'
        ]);
        
        $this->theController->request->query = [
            'order' => 'id',
            'limit' => 5
        ];
        
        $this->theController->PaginationCache->restore();
        
        $this->theController->PaginationCache->save();
    }
}
