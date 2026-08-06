<?php
session_start();

#checks if the received data is empty
if(!empty($_POST))
{
    include('connection.php');
    

    #Get the latest member_id starting with 'A' like 'A001'
    #author_id generator
    $result = mysqli_query($condb, "SELECT author_id FROM author 
                                                WHERE author_id LIKE 'A%' 
                                                ORDER BY author_id DESC LIMIT 1");

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Extract the number portion
        $lastId = (int) substr($row['author_id'], 1);
        $newId = "A" . str_pad($lastId + 1, 3, "0", STR_PAD_LEFT);
    } else {
        // If no existing IDs
        $newId = "A001";
    }
    
    #instruction to store the new author data
    $keep_author = "insert into author
    (author_id, author_name)
    values
    ('$newId', '".$_POST['author_name']."')";

    #execute the query
    $execute = mysqli_query($condb, $keep_author);

    if($execute)
    {
        # if successful
        die("<script>alert('Registration Successful.');
        window.location.href = 'registerBook.php';</script>");
    }
    else
    {
        #if failed
        die("<script>alert('Registration Failed.');
        window.history.back();</script>");
    }
}
else
{
    #if the POST data isnt complete
    die("<script>alert('Please fill in all text fields.');
    window.location.href='registerAuthor.php';</script>");
}
?>
