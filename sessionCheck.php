<?php
include('connection.php');

$is_admin = false;
$is_staff = false;
$is_member = false;

#check if librarian
if (isset($_SESSION['librarian_id'])) {

    $id = $_SESSION['librarian_id'];

    $q = mysqli_query($condb, 
        "SELECT librarian_type FROM librarian WHERE librarian_id = '$id'"
    );

    if ($q and mysqli_num_rows($q) == 1) {
        $row = mysqli_fetch_assoc($q);
        $type = strtoupper($row['librarian_type']);
        
        #checks if the librarian is admin or staff
        if ($type === 'ADMIN') $is_admin = true;
        if ($type === 'STAFF') $is_staff = true;
    }
}

#check if member
if (isset($_SESSION['member_id'])) {

    $id = $_SESSION['member_id'];

    $q = mysqli_query($condb, 
        "SELECT member_id FROM members WHERE member_id = '$id'"
    );

    if ($q and mysqli_num_rows($q) == 1) {
        $is_member = true;
    }
}

#assigning role (admin, staff or member)
if ($is_admin) {
    $_SESSION['role'] = 'ADMIN';
} elseif ($is_staff) {
    $_SESSION['role'] = 'STAFF';
} elseif ($is_member) {
    $_SESSION['role'] = 'MEMBER';
} else {
    die("<script>alert('Please log in again.');
    window.location.href = 'logOut.php';</script>");
}

