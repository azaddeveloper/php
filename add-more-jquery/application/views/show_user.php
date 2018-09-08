<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="http://reaactiv.com/Agent/assets/plugins/validate/bootstrapValidator.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://reaactiv.com/Agent/assets/plugins/validate/bootstrapValidator.js"></script>
   
</head>
<body>

<div class="container">
	<div class="col-md-6">
		<div class="crcform">
        <h1>Internship Details</h1>
        <form id="abcd" method="post" enctype="multipart/form-data">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <td>
                    	  <div class="form-group">
						    <label for="exampleInputPassword1">Name</label>
						    <input type="text" name="name[]" class="form-control nameClass" id="exampleInputPassword1" placeholder="Password">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="name" name="email[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Image</label>
						    <input type="file" name="img[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
						  </div>

					</td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>
            </table>
            <input type="submit" name="submit" id="submit"  class="btn btn-info" value="Submit" />
        </form>
    </div>
    </div>
	<div class="col-md-6">
  <h2>User Table</h2>
             
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    	<?php $i=1; foreach ($user as  $value) {
    		
    	 ?>
	    	<tr id="<?php echo $i; ?>">
	        <td><?php echo $value->name; ?></td>
	        <td><?php echo $value->email; ?></td>
	        <td><img src="<?php echo "assets/".$value->file; ?>" height="40" width="40" ></td>
	        <td><a href='javascript:void(0);' data-id='<?php echo $value->id; ?>' data-name='<?php echo $value->name; ?>' data-email='<?php echo $value->email; ?>' data-img='<?php echo $value->file; ?>' class="edit-user">Edit</a></td>
	        
	        </tr>
        <?php $i++; }  ?>
    </tbody>
  </table>
</div>
</div>

</body>
</html>
<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Modal title
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form id="edit-form" method="post" enctype="multipart/form-data">
                	<input type="hidden" name="id" class="user-id" value="">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                      <input type="name" name="name" class="form-control name"
                      id="exampleInputEmail1" placeholder="Enter email" value="" />
                  </div>
                  <div class="form-group">
                    <label for="emal">Email address</label> 
                      <input type="email" name="email" class="form-control email"
                      id="email" placeholder="Enter email"/ value="">
                  </div>
                   <label>Upload Cover Photo</label>
                                 <div class="card">
                                    <img id='img' class="user-img" src="" width="50px" height="50px"     />
                                    <div class="form-group">
                                       <label for="user_img" >
                                       <a  class="btn btn-lg btn-info"    style="margin-top: 50px; margin-left:10px;" >Upload Image</a>
                                       </label>
                                       <div class="input-group">
                                          <span class="input-group-btn">
                                          <input type="file" style="visibility: hidden;"  name="userfile" onchange="readURL(this);"  id="user_img">
                                          <input class="old_user_img"  type="hidden" name="old_user_img" value=""  />
                                           <input class="is_user_update"  type="hidden" name="is_user_update" value="0"  />
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                  
                 <input type="submit" name="submit" id="submit"  class="btn btn-info" value="Submit" />
                </form>
                
                
            </div>
            
            
        </div>
    </div>
</div>

<script>

	function readURL(input) {
    if (input.files && input.files[0]) {
        console.log(input.files[0].name);
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#img')
                .attr('src', e.target.result)
                .width(50)
                .height(50);
        };

        reader.readAsDataURL(input.files[0]);
        $(".is_user_update").val('1');
        // $('#imgtext').value(input.files[0].name);
    }
}
	 
        $(document).ready(function(){
        	$(document).on('click','.edit-user', function(){
                var id = $(this).attr("data-id");
                var name = $(this).attr("data-name");
                var email = $(this).attr("data-email");
                var img = $(this).attr("data-img");
                $("#myModalNorm").modal('show');
                $(".user-id").val(id);
                $(".name").val(name);
                $(".email").val(email);
                $(".old_user_img").val(img);
                $(".user-img").attr('src', 'http://localhost/code_test/assets/'+img);


             });
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="form-group"> <label for="exampleInputPassword1">Name</label> <input type="text" name="name[]" class="form-control nameClass" id="exampleInputPassword1" placeholder="Password"> </div><div class="form-group"> <label for="exampleInputEmail1">Email address</label> <input type="name" name="email[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> </div><div class="form-group"><label for="exampleInputEmail1">Image</label><input type="file" name="img[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ></div></td></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
           
           $("#abcd").submit(function(e) {
            	// alert();
			    e.preventDefault();    
			     var formData = new FormData(this);
			 
			    $.ajax({

			        // async: true,
                    url: "Test/add_data",
                    type: "POST",  
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,
					success: function(data){
					  console.log(data);
					}
			    });
             });

           $("#edit-form").submit(function(e) {
            	// alert();
			    e.preventDefault();    
			     var formData = new FormData(this);
			 
			    $.ajax({

			        // async: true,
                    url: "Test/update_data",
                    type: "POST",  
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,
					success: function(data){
					  console.log(data);
					}
			    });
             });

        });

         $('#abcd').bootstrapValidator({
		        message: 'This value is not valid',
		        feedbackIcons: {
		              valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		             
		            'name[]': {
		            	 message: ' ',
		                validators: {
		                    notEmpty: {
		                        message: 'Name  field is required!'
		                    },
		                 }
		            },
		            'email[]': {
		            	 message: ' ',
		                validators: {
		                    notEmpty: {
		                        message: 'Email field is required!'
		                    },
		                 }
		            },
		            'img[]': {
		            	 message: ' ',
		                validators: {
		                    notEmpty: {
		                        message: 'Image field is required!'
		                    },
		                    file: {
                        		extension: 'jpeg,png',
                       			 type: 'image/jpeg,image/png',
                       			 maxSize: 2048 * 1024,
                        		message: 'The selected file is not valid'
                    		}
		                 }
		            },
		             
		          
		            
		        }
		   });

         $('#edit-form').bootstrapValidator({
		        message: 'This value is not valid',
		        feedbackIcons: {
		              valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		             
		            'name': {
		            	 message: ' ',
		                validators: {
		                    notEmpty: {
		                        message: 'Name  field is required!'
		                    },
		                 }
		            },
		            'email': {
		            	 message: ' ',
		                validators: {
		                    notEmpty: {
		                        message: 'Email field is required!'
		                    },
		                 }
		            },
		            'userfile': {
		            	 message: ' ',
		                validators: {
		                    file: {
                        		extension: 'jpeg,png',
                       			 type: 'image/jpeg,image/png',
                       			 maxSize: 2048 * 1024,
                        		message: 'The selected file is not valid'
                    		}
		                 }
		            },
		             
		          
		            
		        }
		   });

    </script>
