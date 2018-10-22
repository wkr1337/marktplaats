<?php 
// if (isset($_SESSION['logged_in'])){
    if ($_SESSION['logged_in'] == true) {
        echo "Welcome " . $_SESSION['userName'];
        echo "You are logged in!";
    }
// }
else {
    echo "Please login";
}

?>


<h1>This is the index page</h1>
