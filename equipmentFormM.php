<div class="form-group">

	<?php
	require("connection.php");
	$query = mysqli_query($con, "select strequipname, intequipquantity from tblequipment;");

  	 while($row = mysqli_fetch_row($query)){
	   
	   	echo "<div class='col-sm-4'>
		<p><font face='cambria' size=4 color='grey'><input type='checkbox' name = equipment[] value='$row[0]'/> $row[0] </font></p>
		<input id='resChairQ' class='form-control input-group-lg reg_name' type='number' name = quantity[] title='Input Quantity' placeholder='Input Quantity' min='1' max='$row[1]' value='';>
	</div>";
	
   	} ?>
	
</div>

<!-- change into correct query of the equipment maintenance -->