<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});



// Product
$router->get('/ws/product/all', ['uses' => 'ProductController@all']);
$router->get('/ws/product/get/{id}', ['uses' => 'ProductController@get']);
$router->post('/ws/product/insert', ['uses' => 'ProductController@insert']);
$router->put('/ws/product/update', ['uses' => 'ProductController@update']);
$router->delete('/ws/product/delete/{id}', ['uses' => 'ProductController@delete']);

// Rol
$router->get('/ws/rol/all', ['uses' => 'RolController@all']);
$router->get('/ws/rol/get/{id}', ['uses' => 'RolController@get']);
$router->post('/ws/rol/insert', ['uses' => 'RolController@insert']);
$router->put('/ws/rol/update', ['uses' => 'RolController@update']);
$router->delete('/ws/rol/delete/{id}', ['uses' => 'RolController@delete']);

// SKU
$router->get('/ws/sku/all', ['uses' => 'SkuController@all']);
$router->get('/ws/sku/get/{id}', ['uses' => 'SkuController@get']);
$router->post('/ws/sku/insert', ['uses' => 'SkuController@insert']);
$router->put('/ws/sku/update', ['uses' => 'SkuController@update']);
$router->delete('/ws/sku/delete/{id}', ['uses' => 'SkuController@delete']);

// SKU
$router->get('/ws/user/all', ['uses' => 'UserController@all']);
$router->get('/ws/user/get/{id}', ['uses' => 'UserController@get']);
$router->post('/ws/user/insert', ['uses' => 'UserController@insert']);
$router->post('/ws/user/login', ['uses' => 'UserController@login']);
$router->put('/ws/user/update', ['uses' => 'UserController@update']);
$router->delete('/ws/user/delete/{id}', ['uses' => 'UserController@delete']);


// Product_sku
$router->get('/ws/productsku/all', ['uses' => 'ProductSkuController@all']);
$router->get('/ws/productsku/get/{id}', ['uses' => 'ProductSkuController@get']);
$router->get('/ws/productsku/getbyproduct/{id}', ['uses' => 'ProductSkuController@getByProduct']);
$router->post('/ws/productsku/insert', ['uses' => 'ProductSkuController@insert']);
$router->put('/ws/productsku/update', ['uses' => 'ProductSkuController@update']);
$router->delete('/ws/productsku/delete/{id}', ['uses' => 'ProductSkuController@delete']);

// Product_user
$router->get('/ws/productuser/all', ['uses' => 'ProductUserController@all']);
$router->get('/ws/productuser/get/{id}', ['uses' => 'ProductUserController@get']);
$router->get('/ws/productuser/getbyuser/{id}', ['uses' => 'ProductUserController@getByUser']);
$router->post('/ws/productuser/insert', ['uses' => 'ProductUserController@insert']);
$router->put('/ws/productuser/update', ['uses' => 'ProductUserController@update']);
$router->delete('/ws/productuser/delete/{id}', ['uses' => 'ProductUserController@delete']);


$router->get('/ws/pay/pay', ['uses' => 'PayController@pay']);

// Dimension
$router->get('/ws/dimension/all', ['uses' => 'DimensionController@all']);
$router->get('/ws/dimension/get/{id}', ['uses' => 'DimensionController@get']);
$router->post('/ws/dimension/insert', ['uses' => 'DimensionController@insert']);
$router->post('/ws/dimension/update', ['uses' => 'DimensionController@update']);
$router->delete('/ws/dimension/delete/{id}', ['uses' => 'DimensionController@delete']);

// DimensionMap
$router->get('/ws/dimensionmap/all', ['uses' => 'DimensionMapController@all']);
$router->get('/ws/dimensionmap/get/{id}', ['uses' => 'DimensionMapController@get']);
$router->post('/ws/dimensionmap/insert', ['uses' => 'DimensionMapController@insert']);
$router->put('/ws/dimensionmap/update', ['uses' => 'DimensionMapController@update']);
$router->delete('/ws/dimensionmap/delete/{id}', ['uses' => 'DimensionMapController@delete']);

// Category
$router->get('/ws/category/all', ['uses' => 'CategoryController@all']);
$router->get('/ws/category/get/{id}', ['uses' => 'CategoryController@get']);
$router->post('/ws/category/insert', ['uses' => 'CategoryController@insert']);
$router->put('/ws/category/update', ['uses' => 'CategoryController@update']);
$router->delete('/ws/category/delete/{id}', ['uses' => 'CategoryController@delete']);
