<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$uPrice = 0;
	$qty = 0;
	$totalPrice = 0;
	
	$saleDetailsSearchSql = 'SELECT * FROM sale';
	$purchaseDetailsSearchSql = 'SELECT * FROM purchase'; 

	$saleDetailsSearchStatement = $conn->prepare($saleDetailsSearchSql);
	$saleDetailsSearchStatement->execute();

	$output = '<table id="saleReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>Sale ID</th>
						<th>Order ID</th>
						<th>Serial Number</th>
						<th>Customer ID</th>
						<th>Requester Name</th>
						<th>Item Name</th>
						<th>Issuance Date</th>
						<th>Quantity</th>
						
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $saleDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		// $uPrice = $row['unitPrice'];
		$qty = $row['quantity'];
		// $discount = $row['discount'];
		// $totalPrice = $uPrice * $qty * ((100 - $discount)/100);
		
		$output .= '<tr>' .
						'<td>' . $row['saleID'] . '</td>' .
						'<td>' . $row['unitPrice'] . '</td>' .

						'<td>' . $row['itemNumber'] . '</td>' .
						'<td>' . $row['customerID'] . '</td>' .
						'<td>' . $row['customerName'] . '</td>' .
						'<td>' . $row['itemName'] . '</td>' .
						'<td>' . $row['saleDate'] . '</td>' .
						'<td>' . $row['quantity'] . '</td>' .
						// '<td>' . $row['email'] . '</td>' .

						// '<td>' . $totalPrice . '</td>' .
					'</tr>';
	}
	
	$saleDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
							
						<th>Sale ID</th>
						<th>Order ID</th>
						<th>Serial Number</th>
						<th>Customer ID</th>
						<th>Requester Name</th>
						<th>Item Name</th>
						<th>Issuance Date</th>
						<th>Quantity</th>
						</tr>
					</tfoot>
				</table>';
	echo $output;

	
?>


