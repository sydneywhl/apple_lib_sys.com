<?php

session_start();

#checks if there is POST
if(!empty($_POST)){
    include('connection.php');

    #if password is not between 8 to 20 characters then return to register
    $passLen = strlen($_POST['password']);
    if ($passLen < 8 || $passLen > 20) {
        die("<script>alert('Password must be between 8 and 20 characters.');
        window.history.back();</script>");
    }

    #phone number length
    $phoneLen = strlen($_POST['member_phone_number']);
    if ($phoneLen < 10 || $phoneLen > 11) {
        die("<script>alert('Phone number must be between 10 and 11 digits.');
        window.history.back();</script>");
    }
    #Get the latest member_id starting with 'M' like 'M001'
    #member_id generator
    $result = mysqli_query($condb, "SELECT member_id FROM members 
                                                WHERE member_id LIKE 'M%' 
                                                ORDER BY member_id DESC LIMIT 1");

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Extract the number portion
        $lastId = (int) substr($row['member_id'], 1);
        $newId = "M" . str_pad($lastId + 1, 3, "0", STR_PAD_LEFT);
    } else {
        // If no existing IDs
        $newId = "M001";
    }

    #saving new member's data
    $new_member = "insert into members
    (member_id, member_name, member_phone_number, password)
    values ('$newId','".$_POST['member_name']."','".$_POST['member_phone_number']."', '".$_POST['password']."')";

    #executing the query
    $execute_query_member=mysqli_query($condb, $new_member);

    if ($execute_query_member){
        if (isset($_SESSION['role']) and ($_SESSION['role'] === 'ADMIN' or $_SESSION['role'] === 'STAFF'))
            #if successful pop up msg
            echo "<script>alert('Member successfully registered');
            window.location.href='memberList.php';</script>";
        else{
            /*makes it display the ID of the registered member
            at the login page*/
            $_SESSION['newId'] = $newId;
            echo "<script>alert('Member successfully registered!');
            window.location.href='logIn.php';</script>";
        }
    }
    
    else{
        echo"<script>alert('Registration failed');
        window.location.href = 'registerMember.php';</script>";
    }
}
#if there is empty POST
else{
    echo"<script>alert('Please fill in all text fields');
    window.location.href='registerMember.php';</script>";
}
?>