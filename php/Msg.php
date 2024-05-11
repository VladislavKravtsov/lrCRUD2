<?php
 function error_msg($error) {
if($error != '') {
	 $message = "<div class='alert alert-danger'>". $error ."</div>";
   }
else {
     $message = "<div class='alert alert-danger'>". "Ошибка!" ."</div>";
   }
 
  return $message;

}
function success_msg($success){
	if($success != '') {
	 $message = "<div class='alert alert-success'>". $success ."</div>";
   }
else {
     $message = "<div class='alert alert-success'>". "Успешно!" ."</div>";
   }
 
  return $message;
}
$sign_errors = array(); 
?>