<?php

namespace Training\Test\App\Router;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Router\NoRouteHandlerInterface;

class NoRouteHandler implements NoRouteHandlerInterface
{

//    protected $logger;
//
//    public function __construct(\Psr\Log\LoggerInterface $logger)
//    {
//        $this->logger = $logger;
//    }

    public function process(RequestInterface $request)
    {
        $moduleName = 'cms';
        $controllerPath = 'index';
        $controllerName = 'index';

        //$this->logger->info(':: 404 ::' . $request->getPathInfo());

        //try 2
        //  $requestValue = trim($request->getPathInfo(), '/');
        //  $request->setParam('q', $requestValue);

        $request->setModuleName($moduleName)
                ->setControllerName($controllerPath)
                ->setActionName($controllerName);
        return true;
    }
}