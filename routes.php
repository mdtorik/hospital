<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/directory4/router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/directory4', 'directory4/index.php');
get('/directory4/list', 'directory4/list-view.php');
get('/directory4/profile/$slug', 'directory4/redirect.php');
get('/directory4/blog-list', 'directory4/blog-list.php');
get('/directory4/blog/$blogSlug', 'directory4/redirect.php');
get('/directory4/contact', 'directory4/contact.php');
//admin routing 

any('/404','directory4/404.php');







// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
//get('/user/$id', 'user.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in user.php
// The $last_name will be available in user.php
//get('/user/$name/$last_name', 'user.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
//get('/product/$type/color/:color', 'product.php');

// Dynamic GET. Example with 1 variable and 1 query string
// In the URL -> http://localhost/item/car?price=10
// The $name will be available in items.php which is inside the views folder
//get('/item/$name', 'views/items.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST

