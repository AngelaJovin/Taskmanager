<?php
      include('connect.php');
 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: signin.html');
  }else{
    $priv=$_SESSION["priv"];
    $emailOwner=$_SESSION["email"];
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="./css/styles.css">
<link rel="stylesheet" href="./css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>taskmanager</title>
    </head>
    <body>
      <!--  -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <!--   -->
        <section>
            <div class="container">
              <div class="row justify-content-center align-items-center">
            
                  <div class="col-sm-12">
                <div action="" class="card p-4 rounded addnew shadow">
<div class="row">

</div>
<div class="row">
    <div class="col-md-4"><h2>You've got<span class="no-of-tasks"> 4</span> tasks</h2></div>
    <div class="col-md-4"><button type="submit" class="mx-auto button2" data-toggle="modal" data-target="#loginModal"><i class="fa fa-plus-square" aria-hidden="true"></i>Add New</button></div>
    <div class="col-md-4"> <img src="images/logo.png" alt="responsive image" class="logo-on-tasks"></div> 
    
    
    
</div>
<div class="row">
    <div class="col-sm-12">
        <p class="on-hold">On Hold</p>
        <div class="table-responsive">
        <table class="table">
            <tbody>
            <tr>             
                
            <?php                    




if($priv==0){
  
  // $sql="SELECT `Title`, `AssignedTo`, `AssignedBy` FROM `tasks` WHERE `Owner`=`$emailOwner` ";
  $sql = "SELECT * FROM `tasks` WHERE Owner=\"$emailOwner\"";
}
if($priv==1){
  $sql="SELECT  `Title`, `AssignedTo`, `AssignedBy` FROM `tasks` ";
}



$result=$conn->query($sql);
// $result= mysqli_query($conn, $sql);  


if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
      extract($row);

      ?>
                   <td> <?php echo $row['Title'];?></td>
                   <td> <span class="label-yellow mx-auto status"><?php echo $row['AssignedTo'];?></span></td>
                   <td><?php echo $row['AssignedBy']; ?></td>
                   <td><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
					   <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
  				   </td>
             <td><button type="submit" class="mx-auto button3">Done</button></td>
                 </tr>




                 <?php                      
                              }
                      }
                      else {
                        echo"<div class='alert alert-danger'>No tasks assigned</div>";
                      }
                      ?>
               </tbody>
          </table>
        </div>
    </div>

  
</div>
<div class="row">
    <div class="col-sm-12" >
        <p class="on-hold">Completed</p>
        <div class="table-responsive completed">
            <table class="table">
                <tbody>
                  <tr>
                   
                    <td>Evaluate the addition and deletion of user IDs.</td>
                    <td> <span class="label-green mx-auto status">completed</span></td>
                    <td>@aneth</td>
                  </tr>
                  <tr>
                  
                    <td>Identify the implementation team.</td>
                    <td> <span class="label-red mx-auto status">deleted</span></td>
                    <td>@me</td>
                  </tr>
                  <tr>
                  
                    <td>Install console machines and prerequisite software.</td>
                    <td> <span class="label-green mx-auto status">completed</span></td>
                    <td>@me</td>
                  </tr>
                  <tr>
                    <td>Design a relatively simple business system</td>
                    <td> <span class="label-green mx-auto status">completed</span></td>
                    <td>@me</td>
                  </tr>
                </tbody>
              </table>
          
        </div>
    </div>
   
</div>

</div>
            </div>
            </div>
            </div>
        </section>

        
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
        <div class="d-flex flex-column text-center">
          <form action="addnew.php" method="POST">
            <div class="addnew-form">
              <button type="button" class="close btn-dark" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
            </div>
            <div class="addnew-form">
              <input type="text" class="" placeholder="Title" name="title" aria-describedby="emailHelp" required>        
            </div>
            <div class="addnew-form">
              <input type="email" class="" placeholder="Assigned to" name="assignedto" aria-describedby="emailHelp" required>        
            </div>
            <div class="addnew-form">
              <input type="email" class="" placeholder="Assigned by" name="assignedby" aria-describedby="emailHelp">        
            </div>
             <div class="addnew-form">
              <button  type="submit" class="mx-auto button" name="submit">Add Task</button>
            </div>
          </form>
          </div>
      </div>
    </div>
  </div>

  	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form action="addnew.php" method="POST">
        <div class="addnew-form" >
              <button type="button" class="close btn-dark" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
            </div>
            <div class="addnew-form">
            <input type="hidden" name="id" >
            </div>
            <div class="addnew-form">
              <input type="text" class="" placeholder="Title" name="title" aria-describedby="emailHelp" required>        
            </div>
            <div class="addnew-form">
              <input type="email" class="" placeholder="Assigned to" name="assignedto" aria-describedby="emailHelp" required>        
            </div>
            <div class="addnew-form">
              <input type="email" class="" placeholder="Assigned by" name="assignedby" aria-describedby="emailHelp">        
            </div>
             <div class="addnew-form">
              <button  type="submit" class="mx-auto button" name="edit">Edit Task</button>
            </div>
				</form>
			</div>
		</div>
	</div>

    	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Task</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete" name="delete">
					</div>
				</form>
			</div>
		</div>
	</div>

    

        <script src="https://kit.fontawesome.com/939695db0f.js" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<!-- Bootstrap JS -->
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    </body>
</html>