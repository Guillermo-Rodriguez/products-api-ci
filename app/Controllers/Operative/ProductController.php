<?php

namespace App\Controllers\Operative;

use App\Controllers\BaseController;
use App\Models\Product;

use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    protected $helpers = ['form', 'db'];

    private $product;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->product = new Product();
    }  

    /**
     * List all records
     *
     * @return mixed
     */
    public function index()
    {
        $products = $this->product->findAll();
        return view('Operative/Products/index', compact('products') );
    }

    /**
     * Load form to create record
     *
     * @return mixed
     */
    public function new()
    {
        $acction = 'CREATE';
        $product = [
            'nombre_producto' => null,
            'descripcion_producto' => null,
            'imagen' => null,
            'precio' => null,
        ];
        return view('Operative/Products/form', compact('acction', 'product') );
    }

    /**
     * Store new record
     *
     * @return mixed
     */
    public function create()
    {
        try{

            $data = [
                'nombre_producto' => $this->request->getPost('nombre_producto'),
                'descripcion_producto' => $this->request->getPost('descripcion_producto'),
                'imagen' => $this->request->getPost('imagen'),
                'precio' => $this->request->getPost('precio'),
            ];
            $rules = [
                'nombre_producto' => 'required',
                'descripcion_producto' => 'required',
                'imagen' => 'required',
                'precio' => 'required',
            ];

            if( !$this->validateData($data, $rules) ){
                return redirect()->back();
            }

            $productID = $this->product->insert($data);
            return redirect()->to( '/operative/products/'.$productID.'/show' );

        } catch (\Exception $e){
            return redirect()->back();
        }
    }

    /**
     * Display resource information 
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        return view('Operative/Products/view', compact('product'));
    }

    /**
     * Load form to edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        return view('Operative/Products/form', compact('product'));
    }

    /**
     * Update the resource
     *
     * @param int $id
     * @return void
     */
    public function update($id)
    {
        try{

            $data = [
                'nombre_producto' => $this->request->getPost('nombre_producto'),
                'descripcion_producto' => $this->request->getPost('descripcion_producto'),
                'imagen' => $this->request->getPost('imagen'),
                'precio' => $this->request->getPost('precio'),
            ];
            $rules = [
                'nombre_producto' => 'required',
                'descripcion_producto' => 'required',
                'imagen' => 'required',
                'precio' => 'required',
            ];

            if( !$this->validateData($data, $rules) ){
                return redirect()->back();
            }

            $this->product->update($id, $data);
            return redirect()->to( '/operative/products/'.$id.'/show' );

        } catch (\Exception $e){
            return redirect()->back();
        }
    }

    /**
     * Delete resource
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        try{
            $this->product->delete($id);
            return redirect()->to( '/operative/products/list' );
        } catch (\Exception $e){
            return redirect()->back();
        }
    }

}

