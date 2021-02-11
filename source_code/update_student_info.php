<?php
  session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_admin.php';

?>

<html lang="en">
<head>
  <title>Update/Add student info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    	<div class="container" style="margin-top: 60px">
    		<h3>All students list</h3>

    		<table class="table">

    			<thead>
    				<tr>
							<th>Student ID</th>
							<th>Department Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone Number</th>
    				</tr>
    			</thead>
    			
    			<tbody>

    <?php

    require 'connection.php';

      			$table= mysqli_query($connection, "select * from student");
      			while($row=mysqli_fetch_array($table))
      			{
      				?>

      				<tr id="<?php echo $row['s_id']; ?>">
      					<td data-target="id"><?php echo $row['s_id']; ?></td>
                <td data-target="dept_name"><?php echo $row['dept_name']; ?></td>
      					<td data-target="s_mail"><?php echo $row['s_mail']; ?></td>
      					<td data-target="s_address"><?php echo $row['s_address']; ?></td>
      					<td data-target="phone_number"><?php echo $row['phone_number']; ?></td>

      					<td><a href="#" data-role="update" data-id="<?php echo $row['s_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

      				</tr>

      				<?php

      			}

        			?>

    			</tbody>

    		</table>

    	</div>


    	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Form</h4>
      </div>
      <div class="modal-body">

      	
      	<input type="hidden" id="s_id" class="form-control">

      	<div class="form-group">
          <label>Department Name</label>
          <select Name="List1" size="1" id="dept_name" class="form-control">
            <option value="EEE">EEE</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
          </select>
      	</div>

        <div class="form-group">
        <label>Email</label>
          <input type="text" id="s_mail" class="form-control">
        </div>

        <div class="form-group">
        <label>Address</label>
          <input type="text" id="s_address" class="form-control">
        </div>

        <div class="form-group">
        <label>Phone Number</label>
          <input type="text" id="phone_number" class="form-control">
        </div>

      </div>
      <div class="modal-footer">

      	<a href="#" id="save" class="btn btn-primary pull-right">update</a>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



    <script>
    	$(document).ready(function(){


// append values

    		$(document).on('click','a[data-role=update]',function(){
    			var s_id = $(this).data('id');
          
		      var dept_name =$('#'+s_id).children('td[data-target=dept_name]').text();
    			var s_mail =$('#'+s_id).children('td[data-target=s_mail]').text();
    			var s_address =$('#'+s_id).children('td[data-target=s_address]').text();
    			var phone_number =$('#'+s_id).children('td[data-target=phone_number]').text();

          $('#s_id').val(s_id);
          $('#dept_name').val(dept_name);
          $('#s_mail').val(s_mail);
          $('#s_address').val(s_address);
          $('#phone_number').val(phone_number);
          $('#myModal').modal('toggle');

    		});
//now create event to get data

$('#save').click(function(){


              var s_id = $('#s_id').val();
              var dept_name = $('#dept_name').val();
              var s_mail = $('#s_mail').val();
              var s_address = $('#s_address').val();
              var phone_number = $('#phone_number').val();

              var sim_operator= phone_number[0]+phone_number[1]+phone_number[2];

              var flag=1;


              //Email Validation
              if(!(/\S+@\S+\.\S+/.test(s_mail)))
              {
                alert("Invalid Email Address");
                flag=0;

              }

              //Mobile Number Validation
              else if(sim_operator=='017' || sim_operator=='019' || sim_operator=='018' || sim_operator=='014' || sim_operator=='016')
              {
                if(phone_number.length!=11)
                {
                  alert("Invalid Mobile Number");
                  flag=0;

                }
                
              }

              //if mobile number doest't match with any mobile phone operator then else condition will be exicute
              else
              {
                alert("Invalid Mobile Number");
                flag=0;
              }

              if(flag==1)
              {
                  $.ajax({
                  url    : 'update_student_info_backend.php',
                  method : 'post',
                  data   : {s_id : s_id ,  dept_name : dept_name , s_mail : s_mail , s_address : s_address , phone_number : phone_number},

                  success : function(response){

                  $('#'+s_id).children('td[data-target=s_id]').text(s_id);
                  $('#'+s_id).children('td[data-target=dept_name]').text(dept_name);
                  $('#'+s_id).children('td[data-target=s_mail]').text(s_mail);
                  $('#'+s_id).children('td[data-target=s_address]').text(s_address);
                  $('#'+s_id).children('td[data-target=phone_number]').text(phone_number);

                  $('#myModal').modal('toggle');

                  }


                });

            }


          
      

      });


});

    </script>

</body>

</html>

<?php

  }//end of first if


      else
      {
      echo"<h3>Access Denined</h3>";
      }

  ?>