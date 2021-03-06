<?php

    $router->get('', 'PagesController@home');

    $router->get('about', 'PagesController@about');

    $router->get('contact', 'PagesController@contact');

    $router->get('countries', 'CountriesController@index');
    $router->get('countries/delete', 'CountriesController@delete');

    $router->get('register', 'UserController@index');
    
    $router->post('addcountry', 'CountriesController@add');
    $router->post('editcountry', 'CountriesController@edit');

    $router->post('register', 'UserController@register');

