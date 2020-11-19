<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(isset($_GET['country'])){
  $country = $_GET['country'];
  $country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

}
if(!isset($_GET['country'])){
  $stmt = $conn->query("SELECT * FROM countries");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<ul>
 <table>
 <tr> 
      <th>NAME</th>
      <th>CONTINENT</th>
      <th>INDEPENDENCE</th>
      <th>HEAD OF STATE</th>
  </tr> 
<?php foreach ($results as $row): ?>
  <?php echo "<tr><td>". $row['name'] . "</td><td>". $row['continent'] . "</td><td>". $row['independence_year'] . "</td><td>". $row['head_of_state'] ."</td></tr>"; ?>
<?php endforeach; ?>
</table>
</ul>
