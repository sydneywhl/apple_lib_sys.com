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
    $phoneLen = strlen($_POST['librarian_phone_number']);
    if ($phoneLen < 10 || $phoneLen > 11) {
        die("<script>alert('Phone number must be between 10 and 11 digits.');
        window.history.back();</script>");
    }
    #Get the latest librarian_id starting with 'S' like 'S001'
    #librarian_id generator
    $result = mysqli_query($condb, "SELECT librarian_id FROM librarian 
                                                WHERE librarian_id LIKE 'S%' 
                                                ORDER BY librarian_id DESC LIMIT 1");

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Extract the number portion
        $lastId = (int) substr($row['librarian_id'], 1);
        $newId = "S" . str_pad($lastId + 1, 3, "0", STR_PAD_LEFT);
    } else {
        // If no existing IDs
        $newId = "S001";
    }

    #saving new librarian's data
    $new_librarian = "insert into librarian
    (librarian_id, librarian_name, librarian_type, librarian_phone_number, password)
    values ('$newId','".$_POST['librarian_name']."','".$_POST['librarian_type']."','".$_POST['librarian_phone_number']."', '".$_POST['password']."')";
    #executing the query
    $execute_query_librarian=mysqli_query($condb, $new_librarian);

    if ($execute_query_librarian){
        echo"<script>alert('Librarian successfully registered.');
        window.location.href = 'librarianList.php'</script>;
        ";
    }
    else{
        echo"<script>alert('Registration failed. Please try again.');
        window.location.href = 'registerLibrarian.php';
        ";
    }
}

#if there is empty POST
else{
    echo"<script>alert('Please fill in all text fields');
    window.location.href='registerLibrarian.php';</script>";
}
?>