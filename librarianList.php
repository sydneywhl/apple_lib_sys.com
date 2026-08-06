<?php

session_start();


include('connection.php');
include('sessionCheck.php');
include('header.php');

if ($_SESSION['role'] != 'ADMIN'){
    die("<script>alert('Please log in as admin.');
    window.location.href = 'logOut.php';</script>");
}

?>

<h3>List of Librarians</h3>

<center>
    <a href='registerLibrarian.php'>Register New Librarians</a><br>
</center>

<!--table to display the ;ibrarian-->

<br><br>
<table width='100%' border='1' id='size'>
<tr>
<th>Librarian ID</th>
<th>Librarian Type</th>
<th>Name</th>
<th>Phone Number</th>
<th>Password</th>
<th>Actions</th>
</tr>

<?php

#displaying librarian details

$display_librarian = "select * from librarian";

$execute_query_librarian= mysqli_query($condb, $display_librarian);

while ($m = mysqli_fetch_array($execute_query_librarian)){
    $data_get=array(
        'librarian_id' => $m ['librarian_id'],
        'librarian_type' => $m['librarian_type'],
        'librarian_name' => $m['librarian_name'],
        'librarian_phone_number' => $m['librarian_phone_number'],
        'password' => $m['password']
    );

    #make a row for each record
    echo "<tr>
    <td>".$m['librarian_id']."</td>
    <td>".$m['librarian_type']."</td>
    <td>".$m['librarian_name']."</td>
    <td>".$m['librarian_phone_number']."</td>
    <td>".$m['password']."</td>";
    
    #adding buttons for actions (edit, delete)
    echo "<td>
    <a href = 'editLibrarian.php?".http_build_query($data_get)."'>Edit</a>
    <a href = 'deleteLibrarianProcess.php?id=".$m['librarian_id']."'
        onClick=\"return confirm('Are you sure you want to remove this librarian?')\">
        Delete</a>
    </td>
    </tr>";
}
?>
</table>
<?php include('footer.php');?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>