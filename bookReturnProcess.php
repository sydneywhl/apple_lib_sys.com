<?php

session_start();

include ('connection.php');
include ('sessionCheck.php');

if(!empty($_GET))
{
        #delete selected books
        $returnbooks = "delete from borrowed_by 
        where isbn = '".$_GET['isbn']."'
        and member_id = '".$_GET['member_id']."'
        ";
        
        #delete books if its success or fail
        if(mysqli_query($condb,$returnbooks))
        {
            $add_copy = "update books set available_copies = available_copies + 1 where isbn = '".$_GET['isbn']."'";
            
            $execute_add = mysqli_query($condb,$add_copy);
            
            if ($execute_add)
            {
                echo "<script>alert('Returned successfully.');
            window.location.href='booksBorrowed.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Failed to return book.');
            window.location.href='booksBorrowed.php';</script>";
        }
}
else
{
    #if the GET data is empty
    die("<script>alert('Error, please approach a librarian.');
    window.location.href='booksBorrowed.php';<script>");
}
?>

