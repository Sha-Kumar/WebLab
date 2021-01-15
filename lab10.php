<html>
<head>
<title>Lab Program -10 </title>
<style>
table,td,th{
border : 3px solid black;
width:33%;
text-align:center;
border-collapse:collapse;
background-color:lightblue;
}
table{
margin:auto;
}
</style>
</head>
<body>
<?php
echo '<h1><u>Lab Program to retrieve the student data stored in database and apply the Selection-Sort and print</u> :</h1>';

$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "weblab";
$a = [];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn->connect_error) die("Connection failed : ".$conn->connect_error);

$sql = 'SELECT * FROM student';
$result = $conn->query($sql);

echo "<br>";
echo "<center>Before Sorting</center>";
echo "<table border = '2'>";
echo "<tr><th>USN</th><th>Name</th><th>Address</th></tr>";

if($result->num_rows >0){
while($row = $result->fetch_assoc()){
echo "<tr><td>".$row["usn"]."</td><td>".$row["name"]."</td><td>".$row["address"]."</td></tr>";
array_push($a, $row["usn"]);
}
}
else{
echo "Table is Empty";
}

echo "</table>";


$n = count($a);
$b = $a;
for($i = 0; $i<($n-1);$i++){
$pos = $i;
for($j = $i+1; $j<$n; $j++){
if($a[$pos] > $a[$j]){
$pos = $j;
}
}
if($pos != $i){
$temp = $a[$i];
$a[$i] = $a[$pos];
$a[$pos] = $temp;
}
}

$c = [];
$d = [];

$result = $conn->query($sql);
if($result->num_rows>0){
while($row = $result->fetch_assoc()){
for($i = 0; $i < $n; $i++){
if($row["usn"] == $a[$i]){
$c[$i] = $row["name"];
$d[$i] = $row["address"];
}
}
}
}


echo "<br>";
echo "<center>After Sorting</center>";
echo "<table border = '2'>";
echo "<tr><th>USN</th><th>Name</th><th>Address</th></tr>";

for($i = 0; $i<$n; $i++){
echo "<tr><td>".$a[$i]."</td><td>".$c[$i]."</td><td>".$d[$i]."</td></tr>";
}

echo "</table>";

$conn->close();

?>
</body>
</html>
