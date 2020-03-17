<div class="modal fade" id="create-task-modal" tabindex="-1" role="dialog" aria-labelledby="create-task-label"
     aria-hidden="true" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-task-label">Create Task</h5>
                <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="task-name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="task-name" name="name">
                            <div class="invalid-feedback">
                                Name can not be empty
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="task-description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="task-description" name="description"></textarea>
                            <div class="invalid-feedback">
                                Description can not be empty
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="task-status" class="col-sm-3 col-form-label">Status</label>

                        <div class="col-sm-9">
                            <select id="task-status" class="form-control" name="status">
                                <option selected value="todo">TODO</option>
                                <option value="doing">DOING</option>
                                <option value="done">DONE</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close-modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-create-task">Create</button>
            </div>
        </div>
    </div>
</div>
