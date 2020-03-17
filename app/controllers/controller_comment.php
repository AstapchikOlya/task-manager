<?php

class Controller_comment extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_comment();
    }

    public function action_add()
    {
        if ( isset( $_POST['task_id'] ) &&
            isset( $_POST['content'] )
        ) {
            $task_id = $_POST['task_id'];
            $content = $_POST['content'];

            $data = compact( 'task_id', 'content' );

            $this->model->addNewComment( $data );

            echo true;
        } else {
            echo false;
        }

        exit;
    }

}
