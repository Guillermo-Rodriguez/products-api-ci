<?php

namespace App\Controllers\Api;

use App\Models\Product;
use App\Controllers\BaseController;


use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    /**
     * Product model
     *
     * @var Product
     */
    private $product;
    
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->product = new Product();
    }  

    public function index()
    {
        $products = $this->product->findAll();
        return $this->response->setJSON($products);
    }
}
