<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Laravel & Ajax CRUD Application!</title>
  </head>
  <body>
    <header class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1> Laravel & Ajax CRUD Application! </h1>
                    <!-- <hr> -->
                </div>
            </div>
        </div>
    </header>
    <section class="body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Alll Task</h3>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">Create Task</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Task Name </th>
                                        <th style="width:150px"> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Create Modal -->
  <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <form>
            <div class="modal-header">
            <h5 class="modal-title" id="createTaskTitle">Create Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div id="createTaskMessage"></div>
                <div class="form-group">
                    <label for="">Enter task name</label>
                    <input type="text" class="name form-control" name="name" placeholder="Enter task name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="add_task btn btn-success">Create Task</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editTaskTitle">Edit Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <ul id="editForm_errList"></ul>
                <input type="hidden" id="edit_task_id">

                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Task Name:</label>
                    <input type="text" name="name" class="task_name form-control" id="edit_name" placeholder="Enter Task Name">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="update_task btn btn-success">Update Task</button>
            </div>

            
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteTaskModal" tabindex="-1" role="dialog" aria-labelledby="deleteTaskTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <form id="deleteTaskForm">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteTaskTitle">Delete Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <input type="hidden" id="delete_task_id">
            <div class="modal-body text-center">
                <div id="deleteTaskMessage"></div>
                <h4>Are you you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="delete_task_btn btn btn-danger">Yes, Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>
  </body>
</html>
