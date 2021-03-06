<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../fontawesome-free-5.13.0-web/css/all.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-nav fixed-top">
            <div class="container">
                <a class="navbar-brand" href="./index.html">
                    <i class="fas fa-university"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-pills">
                    <li class="nav-item px-4 py-2 mx-2">
                        <a class="nav-link px-3" href="./index.html">Home</a>
                    </li>
                    <li class="nav-item active px-4 py-2 mx-2">
                        <a class="nav-link  px-3 " href="#">View all Customers</a>
                    </li>
                    <li class="nav-item px-4 py-2 mx-2">
                        <a class="nav-link px-3" href="./transfer.html">Transfer Money</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
       
    <?php   
           
        $servername = "localhost";
        $username = 'root';
        $password = "";
        $dbname = 'bank';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql="SELECT * FROM customer";
        $res=$conn -> query($sql);
        echo'<table class="table table-striped">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Current Balance</th>
                    </tr>
                </thead>';
        echo'<tbody>';
         

        while($row=mysqli_fetch_assoc($res)){
            $id=$row['ID'];
            $name=$row['NAME'];
            $email=$row['EMAIL'];
            $balance=$row['CURRENT_BALANCE'];
            echo ' 
            <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$balance.'</td>
            </tr> ';
        }
        echo'</tbody>
        </table>';
       $conn->close();
    ?>
          <footer class="light-green p-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 offset-lg-1">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="./index.html">Home</a></li>
                            <li><a href="#">View all Customers</a></li>
                            <li><a href="./transfer.html">Transfer Money</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <h5>Address</h5>
                        <p class="lead">Gangapur,Duttapukur,
                            North 24 P.G.S</p>
                        PIN-743248
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <h5>The Sparks Bank</h5>
                        Join The Sparks Bank
                        and transfer Money Easily. 
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-auto">2021, ALL &copy; RESERVED.</div>
                </div>
            </div>
        </footer>
       
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>