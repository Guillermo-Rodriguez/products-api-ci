<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

use App\Models\Order;
use App\Models\OrderDetail;

use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class OrderController extends BaseController
{
    const SUCCESS = 1; //success request
    const FAIL    = 0; //fail request

    protected $helpers = ['form', 'db'];

    private $order;
    private $orderDetail; 

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }  

    /**
     * Create a new client order
     *
     * @return mixed
     */
    public function store()
    {
        try{
            $data = [
                'client_name'=> $this->request->getVar('client_name'),
                'products' => $this->request->getVar('products'),
            ];
    
            $rule = [
                'client_name'   => 'required|string',
                'products' => 'required',
            ];
    
            if (! $this->validateData($data, $rule) ) {
                return $this->response->setJSON([
                    'code' => self::FAIL,
                    'message' => 'Data is invalid!',
                ]);
            }

            $orderID = $this->order->insert([
                'nombre_cliente'=> $this->request->getVar('client_name'),
                'fecha_pedido' => date('Y-m-d H:i:s')
            ]);

            $this->saveOrderDetails($this->request->getVar('products'), $orderID);
            return $this->response->setJSON([
                'code' => self::SUCCESS,
                'message' => 'OK' 
            ]);
        } catch (\Exception $e){
            return $this->response->setJSON([
                'code' => self::FAIL,
                'message' => 'Error during the request. ' . $e->getMessage() 
            ]);
        }
    }

    /**
     * Create order details
     *
     * @param array $products
     * @param integer $orderID
     * @return void
     */
    public function saveOrderDetails(array $products, int $orderID)
    {
        foreach($products as $productID){
            $this->orderDetail->save([
                'id_pedido' => $orderID,
                'id_producto' => $productID,
            ]);
        }
    }
}
