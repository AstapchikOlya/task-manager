<div class="modal fade" id="add-comment-modal" tabindex="-1" role="dialog" aria-labelledby="add-comment-label"
     aria-hidden="true" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-comment-label">Add Comment</h5>
                <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="comment-content" class="col-sm-3 col-form-label">Comment</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="comment-content" name="name"></textarea>
                            <div class="invalid-feedback">
                                Comment can not be empty
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close-modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-add-comment">Add</button>
            </div>
        </div>
    </div>
</div>
