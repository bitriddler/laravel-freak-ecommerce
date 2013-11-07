<?php namespace Kareem3d\FreakECommerce;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Kareem3d\Controllers\FreakController;
use Kareem3d\Ecommerce\Category;
use Kareem3d\Ecommerce\Product;

class ProductController extends FreakController {

    /**
     * @var Product
     */
    protected $products;

    /**
     * @var Category
     */
    protected $categories;

    /**
     * @param Product $products
     * @param Category $categories
     */
    public function __construct( Product $products, Category $categories )
    {
        $this->products = $products;

        $this->categories = $categories;

        $this->usePackages( 'Link', 'SEO' );
//        $this->usePackages( 'Images', 'Image', 'Link' );

        $this->setExtra(array(
            'images-group-name'    => 'Product.Gallery',
            'images-type'          => 'gallery',
            'image-group-name'     => 'Product.Main',
            'image-type'           => 'main',
            'link-page'            => 'home',
            'link-model-key'       => 'product'
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $products = $this->products->get();

        return View::make('ecommerce::products.data', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        $product = $this->products->find( $id );

        $this->setPackagesData($product);

        return View::make('ecommerce::products.detail', compact('product', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $product = $this->products;

        $this->setPackagesData($product);

        $categories = $this->categories->all();

        return View::make('ecommerce::products.form', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $product = $this->products->find( $id );

        $this->setPackagesData($product);

        return $this->getCreate()->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        $product = $this->products->newInstance(Input::get('Product'));

        return $this->jsonValidateResponse( $product );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit($id)
    {
        $product = $this->products->find($id);

        $product->fill(Input::get('Product'));

        return $this->jsonValidateResponse( $product );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete($id)
    {
        $this->products->find($id)->delete();

        return $this->redirectBack('Product deleted successfully.');
    }
}