<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	include "../db_conn.php";



	if (isset($_POST['author_name'])) {

		$name = $_POST['author_name'];


		if (empty($name)) {
			$em = "Обязательное к заполнению";
			header("Location: ../add-author.php?error=$em");
            exit;
		}else {

			$sql  = "INSERT INTO authors (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);

	
		     if ($res) {
	
		     	$sm = "Автор добавился успешно!";
				header("Location: ../add-author.php?success=$sm");
	            exit;
		     }else{
	
		     	$em = "Ошибка!";
				header("Location: ../add-author.php?error=$em");
	            exit;
		     }
		}
	}else {
      header("Location: ../admin.php");
      exit;
	}

}else{
  header("Location: ../login.php");
  exit;
}