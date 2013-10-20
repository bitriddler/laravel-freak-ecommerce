<?php namespace Kareem3d\FreakECommerce;

use Kareem3d\Ecommerce\Category;
use Kareem3d\Ecommerce\Order;
use Kareem3d\Ecommerce\Product;
use Kareem3d\Freak\Core\Client;
use Kareem3d\Freak\Core\Element;
use Kareem3d\Freak;
use Kareem3d\Freak\Menu\Icon;
use Kareem3d\Freak\Menu\Item;

class ECommerceClient extends Client {

    /**
     * @return Element[]
     */
    public function elements()
    {
        $product = Element::withDefaults('product', new Product());
        $product->setController('Kareem3d\FreakECommerce\ProductController');

        $category = Element::withDefaults('category', new Category());
        $category->setController('Kareem3d\FreakECommerce\CategoryController');

        $order = Element::withDefaults('order', new Order());
        $order->setController('Kareem3d\FreakECommerce\OrderController');
        $order->setMenuItem(Item::make('Order', '', Icon::make('icon-archive'))->addChildren(array(
            new Item('Display all orders', '/element/order', Icon::make('icol-inbox'))
        )));

        return array($product, $category, $order);
    }

    /**
     * Load client configurations
     *
     * @param \Kareem3d\Freak $freak
     * @return void
     */
    public function run(Freak $freak)
    {
        // TODO: Implement run() method.
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ecommerce';
    }
}