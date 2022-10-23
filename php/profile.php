<?php
header('Access-Control-Allow-Origin: *');

echo 'PHP version: ' . phpversion();
$mongoClient = new MongoClient();
$mongoDB = $mongoClient->Users;
$collection = $mongoDB->Profile;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $document = array( 
        "Age" => $_POST['age'], 
        "DOB" => $_POST['dob'], 
        "Contact" => $_POST['contact'],
        "Address" => $_POST['address'],
        "Email" => $_POST['email']
    );
    $collection->insert($document);

}else{
    $email = $_GET['email'];
    $filter = ['email' => $email];
    $options = [
       'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter, $options);
    $rows = $mongo->executeQuery('db_name.my_collection', $query); 
    foreach($rows as $r){
       echo $r;
    }
}

?>