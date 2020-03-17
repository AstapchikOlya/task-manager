<?php

class Controller_task extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_task();
    }

    public function action_index()
    {
        $data['todo'] = $this->model->getTasksByStatus('todo');
        $data['doing'] = $this->model->getTasksByStatus('doing');
        $data['done'] = $this->model->getTasksByStatus('done');

        $this->view->generate( 'listOfTasks_view.php', 'template_view.php', $data );
    }

    public function action_create()
    {
        if ( isset( $_POST['name'] ) &&
            isset( $_POST['description'] ) &&
            isset( $_POST['status_code'] )
        ) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status_code = $_POST['status_code'];

            $data = compact( 'name', 'description', 'status_code' );

            $this->model->createNewTask( $data );

            echo true;
        } else {
            echo false;
        }

        exit;
    }

    public function action_show( $task_id = 0 )
    {
        if ( $task_id ) {
            $data['task_details'] = $this->model->getTaskDetails( $task_id );
            $data['comments'] = $this->model->getTaskComments( $task_id );
            $this->view->generate( 'showTask_view.php', 'template_view.php', $data );
        } else {
            header('Location:/');
        }

    }

    public function action_edit() {
        if ( isset( $_POST['task_id'] ) &&
            isset( $_POST['name'] ) &&
            isset( $_POST['description'] ) &&
            isset( $_POST['status_code'] )
        ) {
            $task_id = $_POST['task_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status_code = $_POST['status_code'];

            $data = compact( 'task_id', 'name', 'description', 'status_code' );

            $this->model->editTask( $data );

            echo true;
        } else {
            echo false;
        }

        exit;
    }

}
