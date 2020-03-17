<div id="task-details-content">

    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2><?php echo $data['task_details']->name; ?></h2>

        <div class="actions">
            <a class="btn btn-outline-secondary" href="/">Back</a>
            <button type="button" class="btn btn-success" id="btn-edit-task" data-task-id="<?php echo $data['task_details']->id; ?>">Save changes</button>
        </div>
    </div>

    <?php include 'app/views/forms/addComment_form.php'; ?>

    <div class="task-content">

        <form>
            <div class="form-group row">
                <label for="task-name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="task-name" name="name" value="<?php echo $data['task_details']->name; ?>">
                    <div class="invalid-feedback">
                        Name can not be empty
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="task-description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="task-description" name="description"><?php echo $data['task_details']->description; ?></textarea>
                    <div class="invalid-feedback">
                        Description can not be empty
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="task-status" class="col-sm-3 col-form-label">Status</label>

                <div class="col-sm-9">
                    <select id="task-status" class="form-control" name="status">
                        <option <?php echo $data['task_details']->code == 'todo' ? 'selected' : ''; ?> value="todo">TODO</option>
                        <option <?php echo $data['task_details']->code == 'doing' ? 'selected' : ''; ?> value="doing">DOING</option>
                        <option <?php echo $data['task_details']->code == 'done' ? 'selected' : ''; ?> value="done">DONE</option>
                    </select>
                </div>
            </div>
        </form>

        <hr>

        <div class="comments">

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h3>Comments</h3>

                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#add-comment-modal">
                    Add comment
                </button>
            </div>

            <?php if ( ! empty( $data['comments'] ) ) { ?>
                <ul class="list-group list-group-flush">

                    <?php foreach ( $data['comments'] as $comment ) {  ?>
                    <li class="list-group-item">
                        <small class="text-right"><?php echo $comment->date; ?></small>
                        <p><?php echo $comment->content; ?></p>
                    </li>

                    <?php } ?>
                </ul>
            <?php } ?>

        </div>

    </div>

</div>
