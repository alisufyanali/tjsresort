@extends('admin.layouts.app')

@section('style')

@endsection




@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-6">
                        <!-- To Do Card List card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>To Do Card List</h5>
                            </div>
                            <div class="card-block">
                                <div class="form-material">
                                    <div class="right-icon-control">
                                        <form class="form-material" id="addToDoCardForm">
                                            @csrf
                                            <div class="mb-3 form-primary">
                                                <input type="text" name="description" class="form-control" required="">
                                                <span class="form-bar"></span>
                                                <label class="form-label float-label">Create
                                                    your task list</label>
                                            </div>
                                        </form>
                                        <div class="form-icon ">
                                            <button class="btn btn-success btn-icon  waves-effect waves-light"
                                                id="create-task">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <section id="task-container">
                                    <ul id="task-list">
                                    </ul>
                                    <div class="text-center">
                                        <button id="clear-all-tasks" class="btn btn-danger m-b-0" type="button">Clear
                                            All Tasks</button>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- To Do Card List card end -->
                    </div>
                    <div class="col-xl-6">
                        <!-- To Do List card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>To Do List
                                </h5>
                                <label class="form-label label label-success">Today</label>

                            </div>
                            <div class="card-block">
                                <div class="form-material">
                                    <div class="right-icon-control">
                                        <form class="form-material" id="addToDoListForm">
                                            @csrf
                                            <div class="mb-3 form-primary">
                                                <input type="text" name="description" class="form-control add_task_todo"
                                                    required="">
                                                <span class="form-bar"></span>
                                                <label class="form-label float-label">Create
                                                    your task list</label>
                                            </div>
                                        </form>
                                        <div class="form-icon ">
                                            <button class="btn btn-success btn-icon  waves-effect waves-light"
                                                id="add-btn">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="new-task">
                                </div>
                            </div>
                        </div>
                        <!-- To Do List card end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>






@endsection



@section('script')


<script>
$(document).ready(function() {

    fetchToDoCards();



    function fetchToDoCards() {
        $.ajax({
            url: '{{ route("admin.to-do-card.fetch") }}',
            method: 'GET',
            success: function(response) {
                let toDoCardsList = '';
                $.each(response, function(index, toDoCard) {
                    complete = '';
                    if (toDoCard.completed == 1) {
                        complete = "complete"
                    }
                    toDoCardsList += `
                        <li class="${complete}" data-id="${toDoCard.id}">
                            <p>${toDoCard.description}</p>
                        </li>     
                    `;
                });
                $('#task-list').html(toDoCardsList);
            }
        });
    }

    //  main button click function
    $('button#create-task').on('click', function() {

        $(".md-form-control").removeClass("md-valid");

        // remove nothing message
        if ('.nothing-message') {
            $('.nothing-message').hide('slide', {
                direction: 'left'
            }, 300)
        };

        // create the new li from the form input
        var task = $('input[name=description]').val();
        // Alert if the form in submitted empty
        if (task.length == 0) {
            alert('please enter a task');
        } else {

            let formData = $("#addToDoCardForm").serialize();

            $.ajax({
                url: '{{ route("admin.to-do-card.store") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    fetchToDoCards();
                    $("#addToDoCardForm")[0].reset();
                    // makes other controls fade in when first task is created
                    $('#controls').fadeIn();
                    $('.task-headline').fadeIn();
                }
            });

        }

    });


    $(document).on('click', '#task-list li', function() {
        id = $(this).attr('data-id');

        if ($(this).hasClass('complete')) {
            complete = 0;
        } else {
            complete = 1;
        }

        $.ajax({
            url: '../to-do-card/completed/' + id,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
                'completed': complete
            },
            success: function(response) {
                fetchToDoCards();
                // makes other controls fade in when first task is created
                $('#controls').fadeIn();
                $('.task-headline').fadeIn();
            }
        });

    });



    // double click to remove
    $(document).on('dblclick', '#task-list li', function() {
        id = $(this).attr('data-id');

        $.ajax({
            url: '../to-do-card/destroy/' + id,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
            },
            success: function(response) {
                fetchToDoCards();
                // makes other controls fade in when first task is created
                $('#controls').fadeIn();
                $('.task-headline').fadeIn();
            }
        });
    });

    // Clear all tasks button
    $('button#clear-all-tasks').on('click', function() {

        $.ajax({
            url: '../to-do-card/destroy_all',
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
            },
            success: function(response) {

                $('#task-list li').remove();
                $('.task-headline').fadeOut();
                $('#controls').fadeOut();
                $('.nothing-message').show('fast');
            }
        });

    });





});


fetchToDoLists();



function fetchToDoLists() {
    $.ajax({
        url: '{{ route("admin.to-do-list.fetch") }}',
        method: 'GET',
        success: function(response) {
            let toDoListsList = '';
            $.each(response, function(index, toDoCard) {
                checked = '';
                done = '';
                if (toDoCard.completed == 1) {
                    checked = "checked";
                    done = 'done-task';
                }
                toDoListsList += `

                <div class="to-do-list"  id="${toDoCard.id}">
                    <div class="checkbox-fade fade-in-primary">
                        <label class="form-label check-task ${done}" >
                            <input type="checkbox" value="" onclick="check_task(${toDoCard.id})" ${checked} id="checkbox${toDoCard.id}">
                            <span class="cr">
                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span>${toDoCard.description}</span>
                        </label>
                    </div>
                    <div class="float-end">
                        <a  onclick="delete_todo(${toDoCard.id});" href="#" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
                    </div>
                </div>
            `;
            });
            $('.new-task').html(toDoListsList);
        }
    });
}




$("#add-btn").on("click", function() {
    $(".md-form-control").removeClass("md-valid");
    var task = $('.add_task_todo').val();
    if (task == "") {
        alert("please enter task");
    } else {
        let formData = $("#addToDoListForm").serialize();

        $.ajax({
            url: '{{ route("admin.to-do-list.store") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                fetchToDoLists();
                $("#addToDoListForm")[0].reset();
                // makes other controls fade in when first task is created
                $('#controls').fadeIn();
                $('.task-headline').fadeIn();
            }
        });

    }
});



function check_task(id) {
    if ($('#checkbox' + id).is(':checked')) {
        complete = 1;
    } else {
        complete = 0;
    }

    $.ajax({
        url: '../to-do-list/completed/' + id,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token for security
            'completed': complete
        },
        success: function(response) {
            fetchToDoLists();
        }
    });

}




function delete_todo(id) {
    $.ajax({
        url: '../to-do-list/destroy/' + id,
        method: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token for security
        },
        success: function(response) {
            fetchToDoLists();
        }
    });
}



</script>

@endsection