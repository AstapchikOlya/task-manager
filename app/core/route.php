<?php

class Route {

    public static function start()
    {
        $controller_name = 'task';
        $action_name = 'index';
        $task_id = '';

        $route = explode( '/', $_SERVER['REQUEST_URI'] );

        if ( ! empty( $route[1] ) ) {
            $controller_name = $route[1];
        }

        if ( ! empty( $route[2] ) ) {
            $action_name = $route[2];
        }

        if ( ! empty( $route[3] ) ) {
            $task_id = $route[3];
        }

        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        $model_file = strtolower( $model_name ) . '.php';
        $model_path = 'app/models/' . $model_file;

        if ( file_exists( $model_path ) ) {
            include 'app/models/' . $model_file;
        }

        $controller_file = strtolower( $controller_name ) . '.php';
        $controller_path = 'app/controllers/' . $controller_file;

        if ( file_exists( $controller_path ) ) {
            include 'app/controllers/' . $controller_file;
        } else {
            throw new Exception( "$controller_path doesn't exist" );
        }

        $controller = new $controller_name;
        $action = $action_name;

        if ( method_exists( $controller, $action ) ) {
            if ( isset( $task_id ) ) {
                $controller->$action( $task_id );
            } else {
                $controller->$action();
            }
        } else {
            throw new Exception( "$controller doesn't have action $action" );
        }

    }

}
