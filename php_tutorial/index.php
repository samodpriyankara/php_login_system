<?php
include_once 'header.php';
?>


<div class="container" style="margin:10px;" >

	<h1>Hello ! <?php 
	if(isset($_SESSION["username"])){
		echo $_SESSION["username"];
	}else{
		echo "User";
	}
	 ?> </h1>
	<p>Microsoft and our third-party vendors use cookies to store and access information such as unique IDs to deliver, maintain and improve our services and ads. If you agree, MSN and Microsoft Bing will personalise the content and ads that you see. You can select ‘I Accept’ to consent to these uses or click on ‘Manage preferences’ to review your options and exercise your right to object to Legitimate Interest where used.  You can change your selection under ‘Manage Preferences’ at the bottom of this page.</p>
	
</div>

<?php
include_once 'footer.php';
?>


