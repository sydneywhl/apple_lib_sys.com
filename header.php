<h1>Apple Library System</h1>

<!--there will be three types of users:
1. members who are able to borrow books
2. librarians (staff) who are able to manage books and members
3. librarians (admin) who are able to manage staffs, books (delete) and members
-->

<?php

#member menu  after logging in
if (isset($_SESSION['member_id']))
{
    echo"
    | <a href = 'index.php'>Random Book of the Day</a>
    | <a href = 'bookCatalogue.php'>Book Catalogue</a>
    | <a href = 'booksBorrowed.php'>Books Borrowed</a>
    | <a href = 'booksPastDue.php'>Books To Return</a>
    | <a href = 'accountDetails.php'>Account</a>
    | <a href = 'logOut.php'>Log Out</a>
    |
    <hr>";
}

#librarian (staff) menu after logging in
# %%%find a way to make it detect if its a staff or admin
# something like 'and librarian_type = staff
elseif (
    isset($_SESSION['librarian_id']) and
    isset($_SESSION['librarian_type']) and
    strtoupper($_SESSION['librarian_type'])== 'STAFF'
)
{
    echo"
    | <a href = 'bookCatalogue.php'>Book Catalogue</a>
    | <a href = 'booksBorrowed.php'>Books Borrowed</a>
    | <a href = 'booksPastDue.php'>Books To Return</a>
    | <a href = 'membersList.php'>Member List</a>
    | <a href = 'accountDetails.php'>Account</a>
    | <a href = 'logOut.php'>Log Out</a>
    |
    <hr>
    ";
}

/*librarian (admin) menu after logging in 
%%%find a way to make it detect if its a staff or admin
something like 'and librarian_type = admin*/

elseif (
    isset($_SESSION['librarian_id']) and
    isset($_SESSION['librarian_type']) and
    strtoupper($_SESSION['librarian_type']) =='ADMIN'
)
{
    echo"
    | <a href = 'bookCatalogue.php'>Book Catalogue</a>
    | <a href = 'booksBorrowed.php'>Books Borrowed</a>
    | <a href = 'booksPastDue.php'>Books To Return</a>
    | <a href = 'memberList.php'>Member List</a>
    | <a href = 'librarianList.php'>Staff List</a>
    | <a href = 'accountDetails.php'>Account</a>
    | <a href = 'logOut.php'>Log Out</a>
    |
    <hr>
    ";
}

?>

<head>
    <link rel="stylesheet"
href="astyle.css"> 
</head>