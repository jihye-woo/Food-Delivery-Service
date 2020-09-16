<?php

include 'template.php'; 

?>

<!-- Table -->
						<section id="main">
		<div class="inner">
							<h3>Your Info<br></h3>
					<p>UserID <strong><?php echo $_SESSION['username']; ?></strong></p>
					
							<?php $user = $_SESSION['username']; 
					$db = mysqli_connect('localhost', 'root', 'root', 'CSE305_Final');
							$query  = "SELECT coin FROM Users WHERE username = '$user'";
      				$result = $db->query($query);
					$row = $result->fetch_assoc();
					
    				echo "<p>Coin<strong> &emsp;" .$row["coin"] ."</strong> &emsp; <a href='charge.php' class='button'>Charge</a></p> ";
					$result->close();		
							
							echo "<h3>Coupon Info<br></h3>";
							
							$query = "SELECT price, expires FROM COUPON C, OWNS O, USERS U WHERE username = '$user' AND C.coupon_code = O.coupon_code AND O.uid = U.uid";
							$result = $db->query($query);
							echo "<div class='table-wrapper'>";
								echo "<table>
							<thead>
										<tr>
											<th>Coupon Price</th>
											<th>Expire Date</th>
										</tr>
									</thead>
									<tbody>";
							if ($result->num_rows > 0) {
              					while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["price"]. "</td><td>" . $row["expires"]. " </td></tr>";
            				}
							}
							echo <<<_END
							</tbody>
								</table>
							_END;
							?>
					
							</div>
						</section>

	</body>
</html>