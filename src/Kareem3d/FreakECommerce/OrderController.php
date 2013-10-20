<?php namespace Kareem3d\FreakECommerce;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Kareem3d\Controllers\FreakController;
use Kareem3d\Ecommerce\Order;

class OrderController extends FreakController {

    /**
     * @var Order
     */
    protected $orders;

    /**
     * $var Order $orders
     */
    public function __construct( Order $orders )
    {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $orders = $this->orders->get();

        return View::make('ecommerce::orders.data', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        $order = $this->orders->find( $id );

        $this->setPackagesData($order);

        return View::make('ecommerce::orders.detail', compact('order', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $order = $this->orders->find( $id );

        $this->setPackagesData($order);

        return View::make('ecommerce::orders.form', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit($id)
    {
        $order = $this->orders->find($id);

        $order->fill(Input::get('Order'));

        return $this->jsonValidateResponse($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete($id)
    {
        $this->orders->find($id)->delete();

        return $this->redirectBack('Order deleted successfully.');
    }
}