<?php 

function getalltheuserrecords ($pdo, $first_name,$last_name,$gender, $age, $emailaddress
,){
    $sql = "INSERT INTO Customer (first_name,last_name,gender, age, emailaddress) VALUES (?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $age, 
                        $emailaddress]);

        if ($executeQuery){
        return true;
        }
        
}
function seeallusersrecord ($pdo){
    $sql = "SELECT * FROM Customer";
    $stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function getuserid($pdo,$Customer_ID){
    $sql = "SELECT * FROM Customer WHERE Customer_ID = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$Customer_ID])) {
		return $stmt->fetch();
	}
}

function deleteuser($pdo,$Customer_ID){
    $sql = "DELETE FROM Customer WHERE Customer_ID = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execut([$Customer_ID]);

    if ($executeQuery){
        true;
    }
}

function updateEmployee ($pdo,$Customer_ID, $first_name , $last_name, $gender, $age,$emailaddress
) {
    $sql = "UPDATE Customer
                SET first_name =?,
                last_name = ?,
                gender = ?,
                age =?,
                emailaddress = ?
            Where Customer_ID =?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt -> execute ([$first_name,$last_name,$gender,$age,$emailaddress,$Customer_ID]);
    if ($executeQuery){
        return true;
    }
}
function deleteEmployee ($pdo,$Customer_ID){
    $sql = "DELETE FROM Customer WHERE Customer_ID =?";
    $stmt = $pdo = $pdo->prepare($sql);

    $executeQuery = $stmt ->execute([$Customer_ID]);
    if ($executeQuery){
        return true;
    }

}
function getshoes ($pdo,$Customer_ID){
    $sql = "SELECT
            Shoes.Shoes_ID AS Shoes_ID,
            Shoes.name_shoes AS name_shoes,
            Shoes.brand_shoes AS brand_shoes,
            Shoes.size_shoes AS size_shoes,
            Shoes.color_shoes AS color_shoes,
            Shoes.date_added  AS date_added,
            CONCAT (Customer.first_name,' ',Customer.last_name)AS customer
            From Shoes
            JOIN Customer ON Shoes.Customer_ID = Customer.Customer_ID
            WHERE Customer.Customer_ID = ?
            ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$Customer_ID]);
    if ($executeQuery){
        return $stmt->fetchAll();
    }

}

function insertshoes ($pdo , $name_shoes,$brand_shoes, $size_shoes, $color_shoes, $Customer_ID){
    $sql = "INSERT INTO Shoes (name_shoes,brand_shoes,size_shoes,color_shoes, Customer_ID) VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$name_shoes,$brand_shoes,$size_shoes,$color_shoes,$Customer_ID]);
    if($executeQuery){
        return true;
    }
}

function getshoesID ($pdo,$Shoes_ID){
    $sql = "SELECT
            Shoes.Shoes_ID AS Shoes_ID,
            Shoes.name_shoes AS name_shoes,
            Shoes.brand_shoes AS brand_shoes,
            Shoes.size_shoes AS size_shoes,
            Shoes.color_shoes AS color_shoes,
            Shoes.date_added  AS date_added,
            CONCAT (Customer.first_name,' ',Customer.last_name)AS customer
            From Shoes
            JOIN Customer ON Shoes.Customer_ID = Customer.Customer_ID
            WHERE Shoes.Shoes_ID = ?
            GROUP BY Shoes.name_shoes;
            ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$Shoes_ID]);
    if ($executeQuery){
        return $stmt->fetch();
    }

}

function updateshoes ($pdo , $name_shoes,$brand_shoes,$size_shoes,$color_shoes,$Shoes_ID){
    $sql = "UPDATE Shoes
        SET name_shoes =?,
        brand_shoes =?,
        size_shoes =?,
        color_shoes =?
        where Shoes_ID =?
        ";
    $stmt = $pdo -> prepare ($sql);
    $executeQuery = $stmt -> execute ([$name_shoes,$brand_shoes,$size_shoes, $color_shoes, $Shoes_ID]);

    if  ($executeQuery){
        return true; 
    }
}
function deleteshoes ($pdo , $Shoes_ID){
    $sql = "DELETE FROM Shoes Where Shoes_ID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt-> execute([$Shoes_ID]);
    if ($executeQuery){
        return true;
    }
}
?>