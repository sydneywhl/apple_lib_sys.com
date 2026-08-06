<?php

session_start();


include('connection.php');
include('sessionCheck.php');
include('header.php');

if ($_SESSION['role'] != 'ADMIN' and $_SESSION['role']  != 'STAFF'){
    die("<script>alert('Please log in as admin.');
    window.location.href = 'logOut.php';</script>");
}

?>

<h3>List of Members</h3>

<center>
    <a href='registerMember.php'>Register New Members</a><br>
</center>

<!--table to display the members-->

<br><br>
<table width='100%' border='1' id='size'>
<tr>
<th>Library ID</th>
<th>Name</th>
<th>Phone Number</th>
<th>Password</th>
<th>Actions</th>
</tr>

<?php

#displaying member details

$display_members = "select * from members";

$execute_query_member= mysqli_query($condb, $display_members);

while ($m = mysqli_fetch_array($execute_query_member)){
    $data_get=array(
        'member_id' => $m ['member_id'],
        'member_name' => $m['member_name'],
        'member_phone_number' => $m['member_phone_number'],
        'password' => $m['password']
    );

    #make a row for each record
    echo "<tr>
    <td>".$m['member_id']."</td>
    <td>".$m['member_name']."</td>
    <td>".$m['member_phone_number']."</td>
    <td>".$m['password']."</td>";
    
    #adding buttons for actions (edit, delete)
    echo "<td>
    <a href = 'editMember.php?".http_build_query($data_get)."'>Edit</a>
    <a href = 'deleteMemberProcess.php?id=".$m['member_id']."'
        onClick=\"return confirm('Are you sure you want to remove this member?')\">
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
