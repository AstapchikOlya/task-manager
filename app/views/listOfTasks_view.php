<div id="list-of-tasks-content">

    <div class="d-flex justify-content-between align-items-center mt-4">
        <h1>Dashboard</h1>

        <div class="actions">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create-task-modal">
                Create Task
            </button>

            <a href="/api/loadTasks" type="button" class="btn btn-info">
                Load Tasks
            </a>
        </div>
    </div>

    <?php include 'app/views/forms/createTask_form.php'; ?>

    <div class="dashboard mt-3 mb-3">

        <div class="row">
            <div class="col">
                <h4 class="pb-2 mb-3 border-bottom"><?php echo count( $data['todo'] ); ?> Todo</h4>

                <?php foreach ( $data['todo'] as $task_todo ) { ?>

                    <div class="card mb-2">
                        <div class="card-header">
                            <p class="text-right mb-0 small"><?php echo $task_todo->date; ?></p>
                            <h5 class="mb-0"><?php echo $task_todo->name; ?></h5>
                        </div>

                        <div class="card-body">
                            <p class="card-text"><?php echo $task_todo->description; ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-secondary mb-0">Comments: <?php echo $task_todo->count_comments; ?></p>

                                <a href="/task/show/<?php echo $task_todo->id; ?>" class="btn btn-outline-info btn-sm">Edit</a>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>

            <div class="col border-left border-right">

                <h4 class="pb-2 mb-3 border-bottom"><?php echo count( $data['doing'] ); ?> Doing</h4>

                <?php foreach ( $data['doing'] as $task_doing ) { ?>

                    <div class="card mb-2">
                        <div class="card-header">
                            <p class="text-right mb-0 small"><?php echo $task_doing->date; ?></p>
                            <h5 class="mb-0"><?php echo $task_doing->name; ?></h5>
                        </div>

                        <div class="card-body">
                            <p class="card-text"><?php echo $task_doing->description; ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-secondary mb-0">Comments: <?php echo $task_doing->count_comments; ?></p>

                                <a href="/task/show/<?php echo $task_doing->id; ?>" class="btn btn-outline-info btn-sm">Edit</a>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>

            <div class="col">

                <h4 class="pb-2 mb-3 border-bottom"><?php echo count( $data['done'] ); ?> Done</h4>

                <?php foreach ( $data['done'] as $task_done ) { ?>

                    <div class="card mb-2">
                        <div class="card-header">
                            <p class="text-right mb-0 small"><?php echo $task_done->date; ?></p>
                            <h5 class="mb-0"><?php echo $task_done->name; ?></h5>
                        </div>

                        <div class="card-body">
                            <p class="card-text"><?php echo $task_done->description; ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-secondary mb-0">Comments: <?php echo $task_done->count_comments; ?></p>

                                <a href="/task/show/<?php echo $task_done->id; ?>" class="btn btn-outline-info btn-sm">Edit</a>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>

</div>
