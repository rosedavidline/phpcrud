<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CRUD with Bootstrap Modal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

 

<!-- Modal -->
<div class="modal fade" id="studentaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="insertcode.php" method="POST">
      <div class="modal-body">
            
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
        </div>
        <div class="form-group">                
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">  
        </div>
        <div class="form-group">                
            <label>Course</label>
            <input type="text" name="course" class="form-control" placeholder="Enter Course">  
        </div>
        <div class="form-group">                
            <label>Phone Number</label>
            <input type="number" name="contact" class="form-control" placeholder="Enter Phone Number">  
        </div>
               
        

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
        </div>

      </form>

    </div>
  </div>
</div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>PHP CRUD Bootstrap Modal</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddModal">
                        ADD DATA
                    </button>
                </div>
            </div>

            <!-- Read-Fetch Data from database PHP -->
            <div class="card">
                <div class="card-body">
            
            
             

            
            

                <?php
                
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'crud2');

                    $query = "SELECT * FROM student";
                    $query_run = mysqli_query($connection, $query);
                ?>



                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Contact</th>
                        </tr>
                    </thead>

                <?php
                    if($query_run)
                    {
                        foreach($query_run as $row)
                    {
                ?>

                    <tbody>
                        <tr>
                            <th> <?php echo $row['id']; ?> </th>
                            <th> <?php echo $row['fname']; ?> </th>
                            <th> <?php echo $row['lname']; ?> </th>
                            <th> <?php echo $row['course']; ?> </th>
                            <th> <?php echo $row['contact']; ?> </th>
                            
                        </tr>                        
                    </tbody>

                <?php
                    }
                        }
                        else
                        {
                            echo "No Record Found";
                        }

                ?>       
                    </table>
                </div>
            </div>
        </div>
    </div>











<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>