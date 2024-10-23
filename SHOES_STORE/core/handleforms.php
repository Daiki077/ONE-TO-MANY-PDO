
<?php 

require_once 'dbconfig.php'; 
require_once 'function.php';

if (isset($_POST['entersbmtbtn'])) {
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$emailaddress = trim($_POST['emailaddress']);

	if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($age) && !empty($emailaddress)) {
			$query =  getalltheuserrecords($pdo, $first_name, $last_name,
			$gender, $age, $emailaddress);

		if ($query) {
			header("Location:../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['Editstudentbtn'])) {
    $Customer_ID = trim ($_GET['Customer_ID']);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$emailaddress = trim($_POST['emailaddress']);
    
		$query = updateEmployee($pdo, $Customer_ID,  $first_name, $last_name, $gender, $age, $emailaddress, );

		if ($query) {
			header("Location:../index.php");
		}
		else {
			echo "Update failed";
		}

}

if (isset($_POST["Deletebtn"])){
    $query = deleteEmployee ($pdo,$_GET['Customer_ID']);
    if ($query) {
        header("Location:../index.php");
    }
    else {
        echo "Delete  failed";  
}
}

if (isset($_POST['viewsbmtbtn'])){
    $query = insertshoes ($pdo,$_POST['name_shoes'],$_POST['brand_shoes'], $_POST['size_shoes'],$_POST['color_shoes'], $_GET['Customer_ID']);
    if ($query){
        header("Location:../viewstore.php?Customer_ID=".$_GET['Customer_ID']);

    }
    else{
        echo "failed";
    }

}
if (isset($_POST['editshoesbmt'])){
    $query = updateshoes ($pdo,$_POST['name_shoes'],$_POST['brand_shoes'], $_POST['size_shoes'],$_POST['color_shoes'], $_GET['Shoes_ID']);
    if ($query){
        header("Location:../viewstore.php?Customer_ID=".$_GET['Customer_ID']);

    }
    else{
        echo "edit failed";
    }
} 
if (isset($_POST['deleteshoessbmt'])){
    $query = deleteshoes ($pdo, $_GET['Shoes_ID']);
    if ($query){
        header("Location:../viewstore.php?Customer_ID=".$_GET['Customer_ID']);

    }
    else{
        echo "delete field failed";
    }
}   