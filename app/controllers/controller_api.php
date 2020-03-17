<?php

class Controller_api extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_api();
    }

    public function action_loadTasks() {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, 'http://www.mocky.io/v2/5e70a6d13000009b6c7a3077' );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        $response = curl_exec( $curl );
        curl_close($curl);

        if ( $response ) {
            $loaded_tasks = json_decode( $response );

            $this->model->saveLoadedTasks( $loaded_tasks );
        }

        header('Location:/');
    }

}
