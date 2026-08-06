<?php
session_start();

include('sessionCheck.php');

#checks if there is data in POST
if(!empty($_POST))
{
    include('connection.php');

    #if password is not between 8 to 20 characters then return to register
    $passLen = strlen($_POST['password']);
    if ($passLen < 8 || $passLen > 20) {
        die("<script>alert('Password must be between 8 and 20 characters.');
        window.history.back();</script>");
    }

    #phone number length
    $phoneLen = strlen($_POST['librarian_phone_number']);
    if ($phoneLen < 10 || $phoneLen > 11) {
        die("<script>alert('Phone number must be between 10 and 11 digits.');
        window.history.back();</script>");
    }

    #updating librarian details
    $update_librarian = "update librarian set
    librarian_name='".$_POST['librarian_name']."',
    librarian_type='".$_POST['librarian_type']."',
    librarian_phone_number='".$_POST['librarian_phone_number']."',
    password='".$_POST['password']."'
    where
    librarian_id='".$_GET['old_id']."'";

    #execute and display if update is successful
    if(mysqli_query($condb,$update_librarian))
    {
        #success
        echo"<script>alert('Update successful.');
        window.location.href='librarianList.php';</script>";
    }
    
    else
    {
        #failed
        echo"<script>alert('Update failed.');
        window.history.back();</script>";
    }
}
else
{
    #if there is no GET data (id), return to librarianList
    die("<script>alert('Please complete all text fields.');
    window.location.href='librarianList.php';</script>");
}
?>
