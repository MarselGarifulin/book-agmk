<?php 

# Сервер
$sName = "localhost";
# Логин 
$uName = "cityteuz_book";
# Пароль
$pass = "3524862Marsel";

# Название базы 
$db_name = "cityteuz_online_book_store_db";

/**

**/
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}