<?php namespace Kareem3d\FreakECommerce;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Kareem3d\Controllers\FreakController;
use Kareem3d\Ecommerce\Category;

class CategoryController extends FreakController {

    /**
     * @var Category
     */
    protected $categories;

    /**
     * @var Category $categories
     */
    public function __construct( Category $categories )
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $categories = $this->categories->get();

        return View::make('ecommerce::categories.data', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        $category = $this->categories->find( $id );

        $this->setPackagesData($category);

        return View::make('ecommerce::categories.detail', compact('category', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $category = $this->categories;

        $this->setPackagesData($category);

        return View::make('ecommerce::categories.form', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $category = $this->categories->find( $id );

        $this->setPackagesData($category);

        return View::make('ecommerce::categories.form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        $category = $this->categories->newInstance(Input::get('Category'));

        return $this->jsonValidateResponse($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit($id)
    {
        $category = $this->categories->find($id);

        $category->fill(Input::get('Category'));

        return $this->jsonValidateResponse($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete($id)
    {
        $this->categories->find($id)->delete();

        return $this->redirectBack('Category deleted successfully.');
    }
}