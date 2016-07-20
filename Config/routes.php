<?php

return  array(
    
    // site routes
    'default' => new Route('/', 'Index', 'index'),
    'products_list' => new Route('/products', 'Product', 'index'),
    'product_page' => new Route('/product-{id}\.html', 'Product', 'show', array('id' => '[0-9]+') ),
    'contact_us' => new Route('/contact-us', 'Index', 'contact'),
    'login' => new Route('/login', 'Security', 'login'),
    'logout' => new Route('/logout', 'Security', 'logout'),

    //admin routes
    'admin_default' => new Route('/admin', 'AdminIndex', 'index'),
    'admin_products_list' => new Route('/admin/products', 'AdminProduct', 'index'),
);