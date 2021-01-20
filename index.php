<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <style>
        .left{
          text-align:center;
        }
        .space{
          margin:0px 40%;
        }
    </style>
</head>
<body>
    <?php   
           
            $servername = "localhost";
            $username = 'root';
            $password = "";
            $dbname = 'bank';

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $today=date("Y-m-d");
            $sender=$_POST['sender'];
            $receiver=$_POST['receiver'];
            $amount=$_POST['amount'];



            $sql="SELECT CURRENT_BALANCE FROM customer WHERE customer.id=$sender";
            $res=$conn -> query($sql);
            while($row=mysqli_fetch_assoc($res)){
                $total_sender=$row['CURRENT_BALANCE'];
            }

            $sql="SELECT CURRENT_BALANCE FROM customer WHERE customer.id=$receiver";
            $res=$conn -> query($sql);
            while($row=mysqli_fetch_assoc($res)){
                $total_receiver=$row['CURRENT_BALANCE'];
            }

            if($amount>$total_sender){
                echo "<p class='lead bg-danger left'>CHECK YOUR AMOUNT.TRANSACTION  UNSUCCESSFUL</p>";
            }else{
                echo "<p class='lead bg-success left' >TRANSACTION SUCCESSFUL.</p>";
                $curr_balance_sender=$total_sender-$amount;
                $curr_balance_receiver=$total_receiver+$amount;
                $update="UPDATE customer SET CURRENT_BALANCE=$curr_balance_sender WHERE ID=$sender";
                $valid=$conn -> query($update);
                $update="UPDATE customer SET CURRENT_BALANCE=$curr_balance_receiver WHERE ID=$receiver";
                $valid=$conn -> query($update);
                $sql = "INSERT INTO transfers (curr_date,sender,receiver,amount) VALUES ('$today',$sender,$receiver,$amount)";

                if ($conn->query($sql) === TRUE) {
                    echo('<table class="table table-striped">
                    <thead class="bg-info">
                      <tr>
                        <th scope="col">DATE</th>
                        <th scope="col">SENDER_ID</th>
                        <th scope="col">RECEIVER_ID</th>
                        <th scope="col">AMOUNT</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">'.$today.'</th>
                        <td>'.$sender.'</td>
                        <td>'.$receiver.'</td>
                        <td>'.$amount.'</td>
                      </tr>
                    ');
                  echo "<a class='btn btn-lg btn-dark space' href='../html/index.html'>Go To Home Page</a>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
        $conn->close();
    ?>
</body>
</html>