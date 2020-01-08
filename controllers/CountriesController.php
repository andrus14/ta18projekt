<?php

class CountriesController {

    
    public function index() {

        $message = $_GET['message'];
        
        global $app;
        $countries = $app['database']->selectAll('country');

        $oCountry = new stdClass();
        if ( $_GET['action'] == 'edit' ) {
            $oCountry = $app['database']->selectByID('country', $_GET['id']);
        }

        return view('countries', ['countries' => $countries, 'message' => $message, 'country' => $oCountry]);
    }

    public function add() {

        global $app;
        $app['database']->insert('country', [
            'name' => $_POST['country_name'],
            'order_nr' => 100,
        ]);
        
        header('Location: /countries');
    }

    public function edit() {
        $id = $_POST['id'];

        global $app;
        $oCountry = $app['database']->selectByID('country', $id);

        if ( is_object($oCountry) ) {
            $app['database']->updateByID('country', $id, [
                'name' => $_POST['country_name'],
            ]);            
        }

        header('Location: /countries');
    }

    public function delete() {

        global $app;
        $app['database']->delete('country', $_GET['id']);
        
        header('Location: /countries?message=Rida kustutatud!');
    }


}