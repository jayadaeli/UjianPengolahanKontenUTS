<?php 
require_once("config.php");
if(!empty($_POST["iduser"])) {
	$iduser= $_POST["iduser"];
	$result =mysqli_query($con,"SELECT idUser FROM users WHERE idUser='$iduser'");
	$count=mysqli_num_rows($result);
	if($count>
		0) { echo "<span style='color:white'>iduser already exists .</span>"; echo "
		<script>$('#submit').prop('disabled',true);</script>
		"; } else{ echo "<span style='color:white'>iduser available for Registration .</span>"; echo "
		<script>$('#submit').prop('disabled',false);</script>
		";
	}
}

?>