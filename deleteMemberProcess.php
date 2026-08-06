<?php
session_start();

/*from the memberList, at the delete button, 
the program is getting (GET) the borrower_ID information 
where the button is pressed, hence deleting that record 
where the ID matches */
if(!empty($_GET))
{
    include('connection.php');

    #delete member data based on the ID that was sent (GET)
    $deletemember="delete from members where member_id='".$_GET['id']."'";
    if(mysqli_query($condb,$deletemember))
    {
        #display message that the data is successfully deleted
        echo "<script>alert('Member is removed successfully.');
        window.location.href='memberList.php';</script>";
    }
    else
    {
        #failed to delete
        echo "<script>alert('Failed to delete record. Please try again.');
        window.location.href='memberList.php';</script>";
    }
}
else
{
    #if there was no data sent to GET, you'll have to delete it manually from the database 
    die("<script>alert('Error, please access the database directly.');
    window.location.href='memberList.php';</script>");
}
?>

