<?php 


 function download_image($image) {

$link = '../img/collectors/'. $image["name"];


move_uploaded_file($image['tmp_name'], $link);

return $link;
}

?>




