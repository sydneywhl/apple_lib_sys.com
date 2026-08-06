<?php
session_start();

#if the info submitted is not empty
if(!empty($_POST))
{
    include ('connection.php');
    #the available copies of books cant be < 0
    if ($_POST['available_copies'] < 0)
    {
        die("<script>alert('Available copies of book cannot be less than 0.');
        window.history.back();</script>");
    }

    #changing the name of the uploaded photo
    
    $timestmp = date("Y-m-d-His");
    $file_name = basename($_FILES["images"]["name"]);
    $format_img = pathinfo($file_name, PATHINFO_EXTENSION);
    $location = $_FILES['images']['tmp_name'];
    $new_name = $timestmp.".".$format_img; 
    
    #instruction to store new data of books
    $storebooks = "insert into books
    (book_title, isbn, author_id, genre_id, available_copies, images,librarian_id) values
    ('".$_POST['book_title']."', '".$_POST['isbn']."', '".$_POST['author_id']."', '".$_POST['genre_id']."', '".$_POST['available_copies']."', '$new_name','".$_SESSION['librarian_id']."')";

    
    #execute storing the data into db
    $execute = mysqli_query($condb,$storebooks);
    
    if($execute)
    {
        #upload images
        move_uploaded_file($location,"images/".$new_name);
        
        #successful
        die("<script>alert('Registered successfully.');
        window.location.href='bookCatalogue.php';</script>");
    }
    else
    {
        #failed
        die ("<script>alert('Failed to register.');
        window.history.back();</script>");
    }
}
else
{
    #if data entered is not complete
    die("<script>alert('Please fill up all information.');
    window.location.href='registerBook.php';</script>");
}
?>
