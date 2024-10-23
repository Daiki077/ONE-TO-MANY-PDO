<?php
require_once "core/function.php";
require_once "core/dbconfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICHEL STORE</title>

        <style>
body {
    font-family: Arial, sans-serif;
    background-color: #121212;
    color: #f4f4f4; 
    padding: 20px;
}

h3 {
    color: #e0e0e0; 
    text-align: center;
}

form {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #1e1e1e;
}

th {
    padding: 10px;
    border: 1px solid #333;
    text-align: center;
    background-color: #4CAF50; 
    color: white; 
}

tr:nth-child(even) {
    background-color: #2a2a2a; 
}

tr:nth-child(odd) {
    background-color: #1e1e1e; 
}

a {
    text-decoration: none;
    color: #90caf9; 
    margin: 0 5px;
}

a:hover {
    color: #4CAF50; 
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="submit"] {
    background-color: #333; 
    color: #f4f4f4; 
    border: 1px solid #555; 
    padding: 10px;
    margin-top: 5px;
    width: calc(100% - 22px); 
}

input[type="submit"] {
    background-color: #4CAF50; 
    border: none; 
    color: white; 
    cursor: pointer; 
}

input[type="submit"]:hover {
    background-color: #45a049; 
}

    </style>

</head>
<body>
<h3>WELCOME TO MY  SHOES STORE </h3>
    <form action="core/handleforms.php" method="POST">
        <p><label for="first_name">First Name:</label><input type="text" name="first_name"></p>
        <p><label for="last_name">Last Name:</label><input type="text" name="last_name"></p>
        <p><label for="gender">Gender:</label><input type="text" name="gender"></p>
        <p><label for="age">Age:</label><input type="number" name="age"></p>
        <p><label for="emailaddress">Email Address:</label><input type="email" name="emailaddress"></p>
        <input type="submit" name="entersbmtbtn">
        </form>
        <table>
    <tr>
        <th>Customer_ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Email Address</th>
        <th>Date Added</th>
        <th>Shoes</th>
        <th>Edit/Delete</th>
    </tr>
    <?php 
    $getalltheuserrecords = seeallusersrecord($pdo); 
    foreach ($getalltheuserrecords as $row) { ?>
        <tr>
            <td><?php echo $row['Customer_ID']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['emailaddress']; ?></td>
            <td><?php echo $row['date_added']; ?></td>
            <td><a href="viewstore.php?Customer_ID=<?php echo $row['Customer_ID']; ?>">View shoes</a></td>
            <td>
                <a href="edit.php?Customer_ID=<?php echo $row['Customer_ID']; ?>">Edit</a>
                <a href="delete.php?Customer_ID=<?php echo $row['Customer_ID']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>