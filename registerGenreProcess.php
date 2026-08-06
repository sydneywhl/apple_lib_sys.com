<?php
session_start();

#checks if the received data is empty
if(!empty($_POST))
{
    include('connection.php');
    

    #Get the latest member_id starting with 'G' like 'G001'
    #genre_id generator
    $result = mysqli_query($condb, "SELECT genre_id FROM genre 
                                                WHERE genre_id LIKE 'G%' 
                                                ORDER BY genre_id DESC LIMIT 1");

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Extract the number portion
        $lastId = (int) substr($row['genre_id'], 1);
        $newId = "G" . str_pad($lastId + 1, 3, "0", STR_PAD_LEFT);
    } else {
        // If no existing IDs
        $newId = "G001";
    }
    
    #instruction to store the new genre data
    $keep_genre = "insert into genre
    (genre_id, genre_name)
    values
    ('$newId', '".$_POST['genre_name']."')";

    #execute the query
    $execute = mysqli_query($condb, $keep_genre);

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
    window.location.href='registerGenre.php';</script>");
}
?>
