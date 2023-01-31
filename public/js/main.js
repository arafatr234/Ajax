$(document).ready(function(){

    fetchTask();

    function fetchTask(){
         $.ajax({
              type: "GET",
              url: "/task/fetch",
              dataType: "json",
              success: function(response){
                   $('tbody').html("");
                   $.each(response.tasks, function(key, item){
                        $('tbody').append(
                             '<tr>\
                                  <td>'+item.id+'</td>\
                                  <td>'+item.name+'</td>\
                                  <td><button type="button" value="'+item.id+'" class="edit_task btn btn-primary">Edit</button></td>\
                                  <td><button type="button" value="'+item.id+'" class="delete_task btn btn-danger">Delete</button></td>\
                             </tr>'
                        );
                   });
              }
         });
    }


    $(document).on('click', '.edit_task', function(e){
         e.preventDefault();
         var task_id = $(this).val();
        //  console.log(task_id);
         $('#editTaskModal').modal('show');
         $.ajax({
              type: "GET",
              url: "/task/"+task_id+"/edit",
              success: function(response){
                   //console.log(response);
                   if(response.status == 404){
                        $('#editForm_errList').html("");
                        $('#success_message').addClass("alert alert-danger");
                        $('#success_message').text(response.message);
                   }
                   else{
                        $('#edit_name').val(response.task.name);
                        $('#edit_task_id').val(task_id);
                   }
                   
              }
         })
    });


    $(document).on('click', '.update_task', function(e){
         e.preventDefault();
         
         $(this).text("Updating");
         var task_id = $('#edit_task_id').val();
         var data = {
              'name': $('#edit_name').val(),
         }
         $.ajaxSetup({
              headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
         });
         $.ajax({
              type: "PUT",
              url: "/task/"+task_id+"/update",
              data: data,
              dataType: "json",
              success: function(response){
                   // console.log(response);
                   if(response.status == 400){
                        $('#editForm_errList').html("");
                        $('#editForm_errList').addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_values){
                             $('#editForm_errList').append('<li>'+err_values+'</li>');
                        });
                        $('.update_task').text("Update");
                   }
                   else{
                        $('#editForm_errList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                        $('#editTaskModal').modal('hide');
                        $('#editTaskModal').find('input').val("");
                        $('.update_task').text("Update");
                        fetchTask();
                   }
              }
         });
    });

    $(document).on('click', '.add_task', function(e){
         e.preventDefault();
         // console.log("Hello");
         var data = {
              'name': $('.name').val(),
         }
         //console.log(data);
         $.ajaxSetup({
              headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
         });
         $.ajax({
              type: "POST",
              url: "/task/store",
              data: data,
              dataType: "json",
              success: function(response){
                   // console.log(response);
                   if(response.status == 400){
                        $('#saveForm_errList').html("");
                        $('#saveForm_errList').addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_values){
                             $('#saveForm_errList').append('<li>'+err_values+'</li>');
                        })
                   }
                   else{
                        $('#saveForm_errList').html("");
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                        $('#addTaskModal').modal('hide');
                        $('#addTaskModal').find('input').val("");
                        fetchTask();
                   }
              }
         });
    });
    
    $(document).on('click', '.delete_task', function(e){
         e.preventDefault();
         
         var task_id = $(this).val();
         $('#delete_task_id').val(task_id);
         $('#deleteTaskModal').modal('show');
    });
    $(document).on('click', '.delete_task_btn', function(e){
         e.preventDefault();
         
         $(this).text('Deleting');
         var task_id = $('#delete_task_id').val();
         $.ajaxSetup({
              headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
         });
         $.ajax({
              type: "DELETE",
              url: "/task/"+task_id+"/destroy",
              success: function(response){
                   // console.log(response);
                   $('#success_message').addClass("alert alert-success");
                   $('#success_message').text(response.message);
                   $('#deleteTaskModal').modal('hide');
                   $('.delete_task_btn').text('Yes Delete');
                   fetchTask();
              }
         });
    });
});