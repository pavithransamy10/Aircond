<?php
    session_start();
    require 'connection.php';
	
	if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customer CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>On Going Project
						<a href="logout.php"  style="background-color:red" "margin:5px;" class="btn btn-primary float-end">Logout</a>
						<h1>Hello, <?php echo $_SESSION['name']; ?></h1>
                           
                        </h4>
                    </div>
					
					<p>
					
					   <td  >
					   <center>
                          <a href="view.php"  style="padding: 20px 62px; background-color:red"  class="btn btn-success btn-sm">Pending </a>
                            <a href="on going.php" style="padding: 20px 62px; background-color:Blue" class="btn btn-success btn-sm">On Going </a>
							 <a href="complete.php"  style="padding: 20px 62px; background-color:Green" class="btn btn-success btn-sm">Completed </a>
                         </center>                  
                        </form>
                      </td>
					 </p>
					  <a href="add.php" style="margin:5px;" class="btn btn-primary float-end">Add Customer</a>
					 
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Comments</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM going";
                                    $query_run = mysqli_query($Connection, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['ID']; ?></td>
                                                <td><?= $student['Name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                <td><?= $student['comments']; ?></td>
                                                <td>
                                                    <a href="show2.php?id=<?= $student['ID']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="edit2.php?id=<?= $student['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
													 <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit"  style="background-color:Blue" name="complete" value="<?=$student['ID'];?>" class="btn btn-success btn-sm">Completed</button>
                                                    </form>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student2" value="<?=$student['ID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php 
}else{
     header("Location: login2.php");
     exit();
}
 ?>