<!--   or die (mysqli_connect_error() -->
<!---?php
try{
  $base = new PDO('mysql:host=172.28.100.206;port=3306;dbname=Chat','Amjad','Amjad123');
} catch (Exception $e){
  die('Erreur : ' . $e->getMessage());
}
?>-->
<?php
$conn = mysqli_connect('172.28.100.206' , 'Amjad' , 'Amjad123', 'Chat') or die (mysqli_connect_error());
  ?>
