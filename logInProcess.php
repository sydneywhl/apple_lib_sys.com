<?php

session_start();

if (!empty($_POST['ID']) and !empty($_POST['password']))
{
    include ('connection.php');

    $query_login_member = "select * from members
    where member_id = '".$_POST['ID']."'
    and password = '".$_POST['password']."'";

    $query_login_librarian = "select * from librarian
    where librarian_id = '".$_POST['ID']."'
    and password = '".$_POST['password']."'";

    $execute_query_member = mysqli_query(mysql:$condb, query:$query_login_member);

    $execute_query_librarian = mysqli_query(mysql:$condb, query:$query_login_librarian);

    if (mysqli_num_rows(result: $execute_query_librarian)==1)
    {
        $m = mysqli_fetch_array(result:$execute_query_librarian);
        $_SESSION['librarian_id'] = $_POST['ID'];

        if (strtoupper($m ['librarian_type']) == 'ADMIN')
        {
            $_SESSION['librarian_type'] = 'ADMIN';
        }
        elseif (strtoupper($m ['librarian_type']) == 'STAFF' )
        {
            $_SESSION['librarian_type'] = 'STAFF';
        }

        echo "<script>window.location.href = 'bookCatalogue.php';</script>";
    }

    elseif (mysqli_num_rows(result:$execute_query_member)==1)
    {
        $m = mysqli_fetch_array(result: $execute_query_member);
        $_SESSION['member_id'] = $_POST['ID'];
        echo "<script>window.location.href = 'index.php';</script>";
    }

    else
    {
        echo"<script>alert('Wrong log in details. Please try again');
        window.location.href = 'logIn.php'</script>";
    }
    

}
else
{
    echo "<script>alert('Please enter your Library ID and Password');
    window.location.href = 'logIn.php'</script>";
}
