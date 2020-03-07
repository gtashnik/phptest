<?php

namespace database;


class database {
    
    public function theBase() {
        
        $servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

// создаем базу
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Ошибка при создании базы данных: " . $conn->error;
}


// создаем таблицу и записываем данные
$sql2 = "CREATE TABLE sometext (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
text VARCHAR(256) NOT NULL
)";

if ($conn->query($sql2) === TRUE) {
   
} else {
    echo "Невозможно создать таблицу: " . $conn->error;
}

$message = 'Hello from Safarov';
$sql3 = "INSERT INTO sometext (text) VALUES ({'$message'})";
if ($conn->query($sql3) === TRUE) {
   
} else {
    echo "Невозможно создать таблицу: " . $conn->error;
}

$sql4 = "SELECT text FROM sometext WHERE text = {'$message'}";
if ($conn->query($sql3) === TRUE) {
   
    $result = $conn->query($sql4);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $show_message = $row['text'];
        echo $show_message;
    }
} else {
    echo "нечего показывать";
}
    
    
} else {
    echo "Невозможно сделать запрос к бд: " . $conn->error;
}


$conn->close(); 

    }
    
} // конец класса database







class randomQuotes {
    
    public function getRandomQuotes() {
        
        // get quotes
        
    $quotes = file_get_contents( __DIR__ . '/../inc/quotes.json');
    
    // decoding quotes 
        
     $quotes = json_decode($quotes, true);    
    
    // get a random index number 
        
    $index = mt_rand( 0, count( $quotes ) );
        
    // return the random quote
    return $quotes[ $index ];
    
        
    }
    
    public function generate() {
    
    return $this->getRandomQuotes();
    
}
    
}


    
    