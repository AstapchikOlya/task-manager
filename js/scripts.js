$(document).ready(function() {

    var closeModalBtn = $('.btn-close-modal'),
        createTaskBtn = $('#btn-create-task');

    $('#task-name').bind('focus', function() {
        $(this).removeClass('is-invalid');
    });

    $('#task-description').bind('focus', function() {
        $(this).removeClass('is-invalid');
    });

    closeModalBtn.click(function() {
        var currentModal = $(this).parents('.modal');

        currentModal.find('form')[0].reset();
    });

    createTaskBtn.click(function() {

        var validData = true,
            nameControl = $('#task-name'),
            descriptionControl = $('#task-description'),
            statusControl = $('#task-status'),
            name = $.trim(nameControl.val()),
            description = $.trim(descriptionControl.val()),
            status = statusControl.val();

        if (!name) {
            nameControl.addClass('is-invalid');
            validData = false;
        }

        if (!description) {
            descriptionControl.addClass('is-invalid');
            validData = false;
        }

        if (validData) {
            $.ajax({
                url: '/task/create',
                type: 'POST',
                data: {
                    name: name,
                    description: description,
                    status_code: status
                },
                success: function(response) {
                    location.href='/';
                }
            });
        }

    });

    /////

    var editTaskBtn = $('#btn-edit-task');

    editTaskBtn.click(function() {

        var validData = true,
            nameControl = $('#task-name'),
            descriptionControl = $('#task-description'),
            statusControl = $('#task-status'),
            name = $.trim(nameControl.val()),
            description = $.trim(descriptionControl.val()),
            status = statusControl.val(),
            taskId= $(this).data('task-id');

        if (!name) {
            nameControl.addClass('is-invalid');
            validData = false;
        }

        if (!description) {
            descriptionControl.addClass('is-invalid');
            validData = false;
        }

        if (validData) {
            $.ajax({
                url: '/task/edit',
                type: 'POST',
                data: {
                    task_id: taskId,
                    name: name,
                    description: description,
                    status_code: status
                },
                success: function(response) {
                    location.reload();
                }
            });
        }

    });

    /////

    var addCommentBtn = $('#btn-add-comment');

    $('#comment-content').bind('focus', function() {
        $(this).removeClass('is-invalid');
    });

    addCommentBtn.click(function() {
        var validData = true,
            commentControl = $('#comment-content'),
            comment = $.trim(commentControl.val()),
            taskId = $('#btn-edit-task').data('task-id');

        if (!comment) {
            commentControl.addClass('is-invalid');
            validData = false;
        }

        if (validData) {
            $.ajax({
                url: '/comment/add',
                type: 'POST',
                data: {
                    task_id: taskId,
                    content: comment
                },
                success: function(response) {
                    location.reload();
                }
            });
        }

    });

});