<!DOCTYPE html>
          <?php session_start();
		  require('header.php');?>
    <?php require('sidebar.php');
	$street = $_SESSION['street'];
	$query = "Select * from tblStreet where intStreetId = '$street'";
	$sql = mysqli_query($con,$query);
	$row = mysqli_fetch_object($sql);
	$StreetName = $row->strStreetName;
	$zoneid = $row->intForeignZoneId;
	$query = "Select * from tblZone where intZoneId = '$zoneid'";
	$sql = mysqli_query($con,$query);
	$row = mysqli_fetch_object($sql);
	$ZoneName = $row->strZoneName;
	?>
	<script>
	function a(){
		var zone = <?php echo $ZoneName;?>;
		  var selectobject = document.getElementById("Purok");
			 for (var i=0; i<selectobject.length; i++){
if(selectobject.options[i].value == zone){
	
	document.getElementById("Purok").value = selectobject.options[i].value;}
	}
	</script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
         <br>
          <section class="wrapper site-min-height">
 <button  class="btn btn-info" onclick="window.location.href='StreetMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>

<legend ><font face = "cambria" size = 8 color = "grey"> Edit Street</font></legend>
		
		<form method = POST>
						

		<p><font face = "cambria" size = 5 color = "grey"> Street Name </font></p>
		<div class = "form-group">
			<div class="col-sm-5">
				<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  required <?php echo "value = '".$StreetName."'"?>>			 
           </div>
		</div><br><br><br>
		
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Purok Name</font></p>
			<div class="col-sm-5">		
			<select class="form-control input-group-lg reg_name" id = "Purok" name = "Purok">
                
				<?php
							require('connection.php');
								$sql = "select * from tblZone";
								$query = mysqli_query($con, $sql);
					
								if(mysqli_num_rows($query) > 0){
									$i = 1;
									while($row = mysqli_fetch_object($query)){?>
										<option value=<?php echo $row->intZoneId ?>><?php echo $row->strZoneName ?></option>
										<?php }} ?>
			</select>
			</div>
		</div>
	<br><br><br>	
  
		<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
		<br><br></center>
		
		<?php
		 if (isset($_POST['btnAdd'])){

			 $strStreet = $_POST['StreetName'];
			 $strPurok = $_POST['Purok'];
			 if($strStreet == NULL ){
				 echo "<script>alert('Please Complete the form');</script>";
			 }
			 else{
				 require('connection.php');
			
				mysqli_query($con,"Update tblStreet set strStreetName = '$strStreet', intForeignZoneId = '$strPurok' where intStreetId = $street");
					 echo "<script>alert('Success');
					 window.location = 'StreetMaintenance.php';</script>";
			 }
		}
		?>
</form>
                    </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
     
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

