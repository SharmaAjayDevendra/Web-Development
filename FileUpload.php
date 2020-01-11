<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$targetdir="uploads/";
		$filename=basename($_FILES['myfile']['name']);
		$temporaryfilename=$_FILES['myfile']['tmp_name'];
		$salt=date("H").date("i").date("s");
		$finaldestination=$targetdir.$salt.$filename;
		echo $finaldestination."<br>";
		if(file_exists($finaldestination)){
			echo "File Exists";
		}else{
			$ext=pathinfo($filename, PATHINFO_EXTENSION);
			if(move_uploaded_file($temporaryfilename, $finaldestination)){
				echo "Uploaded";
			}else{
				echo "Error Occurred";
			}			
		}
	}
?>
