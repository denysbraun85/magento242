<?php

namespace Training\Test\App;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterListInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\Request\ValidatorInterface;
use Magento\Framework\Message\ManagerInterface;

class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var RouterListInterface
     */
    protected $routerList;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param RouterListInterface $routerList
     * @param ResponseInterface $response
     * @param LoggerInterface $logger
     */
    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        LoggerInterface $logger,
        ValidatorInterface $validator,
        ManagerInterface $manager
    ) {
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;

        parent::__construct($routerList, $response, $validator, $manager, $logger);

    }
    public function dispatch(RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}