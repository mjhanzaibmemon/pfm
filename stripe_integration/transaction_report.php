 <?php
 	// Include the configuration file 
	include_once 'dbConnect.php';  
      
	$transactionInfo=Array();
    $sql = "SELECT * FROM transactions";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

        	$invoiceStatus='No';
        	if($row['invoice_id']!=''){
        		$invoiceStatus='Yes';
        	}
        	$paymentStatus='No';
        	if($row['payment_id']!=''){
        		$paymentStatus='Yes';
        	}
         	$transactionData=Array(
         		'customer_name'=>$row['customer_name'],
         		'customer_email'=>$row['customer_email'],
         		'item_name'=>$row['item_name'],
         		'paid_amount'=>'$'.$row['paid_amount'],
         		'txn_id'=>$row['txn_id'],
         		'payment_status'=>$row['payment_status'],
         		'invoice_id'=>$invoiceStatus,
         		'payment_id'=>$paymentStatus,
         		'created'=>$row['created'],
         	);
         	array_push($transactionInfo,$transactionData);

        }
     }

     $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Table with Bootstrap and PHP</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      // Initialize DataTable
      $('#dataTable').DataTable();
    });
  </script>
</head>
<body>

<div class="container mt-4" style="padding-left: 0px;">
  <div class="row">
  <h3>Stripe Payment Transaction Report</h3>
  <table id="dataTable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Txn Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Item</th>
        <th>Paid Amount</th>
        <th>Payment Status</th>
        <th>Invoice Sync In QBD</th>
        <th>Payment Sync In QBD</th>
        <th>Created AT</th>
        <!-- Add more columns as needed -->
      </tr>
    </thead>
    <tbody>
                                    <?php
                                       $i=0;
                                       if(isset($transactionInfo['0'])){
                                       
                                           foreach ($transactionInfo as $spValue) {
                                               $i++;
                                             
                                               ?>
                                    <tr class="text-center">
                                       <td scope="row"><?php echo $spValue['txn_id']; ?></td>
                                       <td><a class="show_link_btn"><?php echo $spValue['customer_name']; ?></a></td>
                                       <td><?php echo $spValue['customer_email']; ?></td>
                                       <td><?php echo $spValue['item_name']; ?></td>
                                       <td><?php echo $spValue['paid_amount']; ?></td>
                                       <td><?php echo $spValue['payment_status']; ?></td> 
                                       <td><?php echo $spValue['invoice_id']; ?></td>
                                       <td><?php echo $spValue['payment_id']; ?></td>
                                       <td><?php echo $spValue['created']; ?></td>
                                     
                                       </tr>
                                       <?php
                                          }
                                          }
                                          ?>
                                 </tbody>
  </table>
</div>
</div>
</body>
</html>
