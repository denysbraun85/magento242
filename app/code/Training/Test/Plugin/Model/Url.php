<?php

namespace Training\Test\Plugin\Model;

use Magento\Framework\UrlInterface;

class Url
{
    public function beforeGetUrl(
        UrlInterface $subject,
        $routePath = null,
        $routeParams = null
    ) {
        if ($routePath == 'customer/account/create') {
            return ['customer/account/login', null];
        }
    }
}
