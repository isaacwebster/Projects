<?php
//connect to database
$connect = mysqli_connect("localhost", "root", "", "ip2location");
 
//select the region name based on the user input
if(empty($_POST["query1"])) {
    //retrieve the country name from index.php
    $country_code = $_POST['country_code'];
    //retrieve user input to do autocomplete
    $request = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "select DISTINCT region_name from ip2location_db3 where country_code = '".$country_code."' AND region_name LIKE '{$request}%' GROUP BY region_name";
    $result = mysqli_query($connect, $query);
    $data = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row["region_name"];
        }
            echo json_encode($data);
    }
}
else{
    //select the city name based on the user input
 
    //retrieve the country name from index.php
    $country_code = $_POST['country_code'];
    //retrieve user input to do autocomplete
    $request = mysqli_real_escape_string($connect, $_POST["query1"]);
    $region_name = mysqli_real_escape_string($connect, $_POST["region_name"]);
    $query = "select DISTINCT city_name from ip2location_db3 where country_code = '".$country_code."' AND region_name = '".$region_name."' AND city_name LIKE '{$request}%' GROUP BY city_name";
    $result = mysqli_query($connect, $query);
    $data = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
        $data[] = $row["city_name"];
        }
        echo json_encode($data);
    }
}
?>