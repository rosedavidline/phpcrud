<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CRUD with Bootstrap Modal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    
</head>
<body>

 

<!-- First Modal -->
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

<!-- #############################################################################-->
<!-- Update or Edit Form Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="updatecode.php" method="POST">
      <div class="modal-body">
        
        <input type="hidden" name="update_id" id="update_id">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
        </div>
        <div class="form-group">                
            <label>Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">  
        </div>
        <div class="form-group">                
            <label>Course</label>
            <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course">  
        </div>
        <div class="form-group">                
            <label>Phone Number</label>
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Phone Number">  
        </div>
               
        

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
        </div>

      </form>

    </div>
  </div>
</div>




<!--#############################################################################-->

<!-- Delete Data in Form Modal -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="deletecode.php" method="POST">
      <div class="modal-body">
        
        <input type="hidden" name="delete_id" id="delete_id">

        
        <h4>Do you want to delete this Data??</h4>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" name="deletedata" class="btn btn-primary">Yes! Delete it.</button>
        </div>

      </form>

    </div>
  </div>
</div>




<!--#############################################################################-->

<!-- Jumbotron-->
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

<!--#############################################################################-->

            <!-- Read-Retrieve Data from database PHP -->
            <div class="card">
                <div class="card-body">
            

                <?php
                
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'crud2');

                    $query = "SELECT * FROM student";
                    $query_run = mysqli_query($connection, $query);
                ?>



                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Contact</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
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
                            <td> <?php echo $row['id']; ?> </td>
                            <td> <?php echo $row['fname']; ?> </td>
                            <td> <?php echo $row['lname']; ?> </td>
                            <td> <?php echo $row['course']; ?> </td>
                            <td> <?php echo $row['contact']; ?> </td>
                            <td>
                                <button type="button" class="btn btn-success editbtn">EDIT</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger deletebtn">DELETE</button>
                            </td>
                            
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
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<!--#############################################################################-->

<!-- Create Search & Pagination using Datatables.com -->
<script>

$(document).ready(function() {
    $('#datatableid').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search your data",
        }
    });
} );                       

</script>

<!--#############################################################################-->

<!-- Javascript for Delete -->

<script>

$(document).ready(function () {
    $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
          

    });
});

</script>



<!-- Javascript code for Update -->
<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#course').val(data[3]);
            $('#contact').val(data[4]);

    });
});

</script>

</body>
</html>