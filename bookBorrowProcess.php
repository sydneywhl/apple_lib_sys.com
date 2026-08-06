<?php

session_start();

include ('connection.php');
include ('sessionCheck.php');

$current_date = date("Y-m-d");
$new_date = strtotime("+7 days");

$return_date = date('Y-m-d', $new_date);


if(!empty($_POST)){
    $check_member = "select * from members
    where member_id = '".$_POST['member_id']."'";

    $execute_query_member = mysqli_query($condb, $check_member);

    if(mysqli_num_rows($execute_query_member)==1){
        
        $check_copy = "select * from borrowed_by
        where isbn ='".$_POST['isbn']."'
        and member_id = '".$_POST['member_id']."'";

        $execute_copy = mysqli_query($condb, $check_copy);
    
        if(mysqli_num_rows($execute_copy)==1){
            echo"<script>alert('This member has a copy of the book already.');
            window.location.href = 'bookCatalogue.php';</script>";
        
        }
        else
        {
        #insert a record of book being borrowed
        $borrowbooks = "insert into borrowed_by
        values('".$_POST['isbn']."','".$_POST['member_id']."','$current_date', '$return_date')";
        
            #delete books if its success or fail
            if(mysqli_query($condb,$borrowbooks))
            {
                $subtract_copy = "update books set available_copies = available_copies - 1 where isbn = '".$_POST['isbn']."'";
            
                $execute_subtract = mysqli_query($condb,$subtract_copy);
            
                if ($execute_subtract)
                {
                    echo "<script>alert('Borrowed successfully.');
                    window.location.href='bookCatalogue.php';</script>";
                }
                else
                {
                    echo "<script>alert('Failed to borrow book.');
                    window.location.href='bookCatalogue.php';</script>";
                }
            }
        }
    }
    else
    {
        echo"<script>alert('Wrong member details. Please try again');
        window.history.back();</script>";
    }
}
else
{
    #if the post data is empty
    die("<script>alert('Please try again');
    window.location.href='bookCatalogue.php';<script>");
}
?>
