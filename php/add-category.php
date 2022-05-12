<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "../db_conn.php";


	if (isset($_POST['category_name'])) {

		$name = $_POST['category_name'];

		if (empty($name)) {
			$em = "Обязательное к заполнению";
			header("Location: ../add-category.php?error=$em");
            exit;
		}else {

			$sql  = "INSERT INTO categories (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);


		     if ($res) {

		     	$sm = "Категория успешно добавилась!";
				header("Location: ../add-category.php?success=$sm");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Ошибка!";
				header("Location: ../add-category.php?error=$em");
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