<?php
class AuthController extends Controller {
    public static function login() {
        
        $db = Controller::config("dbConnect");
        $errors = Controller::config("errors");

        $myUserName = mysqli_real_escape_string($db, $_POST["userNameLogin"]);
        $myPassword = mysqli_real_escape_string($db, $_POST["passwordLogin"]);
        if (!isset($myUserName)) {
            array_push($errors, "Username is required");
        }
        if (!isset($myPassword)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($myPassword);
            $sqlQuery = "SELECT ID FROM users WHERE user_name = '$myUserName' AND password = '$password'";
            $results = mysqli_query($db, $sqlQuery);

            $user = mysqli_fetch_assoc($results);
            
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['logged_in'] = true;
                $_SESSION['userName'] = $myUserName;
                $_SESSION['userID'] = $user["ID"];
            } else {
                $_SESSION['logged_in'] = false;
                array_push($errors, "Your login name or password is invalid!");
            }
        }
        Controller::$errors = $errors;

        // return $_SESSION['logged_in'];
    
    }

    public static function register() {
        $db = Controller::config("dbConnect");
        $errors = Controller::config("errors");

        // recieve the input values of the form
        $userName = mysqli_real_escape_string($db, $_POST['userName']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password2 = mysqli_real_escape_string($db, $_POST['password_2']);
        // Form validation. Check if each form field is filled in.
        // Add corresponding Errors to array.
        if (empty($userName)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password1)) {
            array_push($errors, "Password is required");
        }
        if ($password1 != $password2) {
            array_push($errors, "The two passwords do not match");
        }
        if (count($errors == 0)) {
            // first check the database to make sure
            // a user does not already exists with the same username and/or email
            $userCheckQuery = "SELECT * FROM users WHERE user_name = '$userName' OR email = '$email' LIMIT 1";
            $result = mysqli_query($db, $userCheckQuery);
            $user = null;
            $user = mysqli_fetch_assoc($result);
            // Check if user already exists
            if ($user["user_name"] === $userName) {
                array_push($errors, "Username already exists");
            }
            if ($user["email"] === $email) {
                array_push($errors, "Email already exists");
            }
            // Finally register the user if there are no errors in the form
            if (count($errors) == 0) {
                $password = md5($password1);
                $query = "INSERT INTO users (user_name, email, password) VALUES ('$userName', '$email', '$password')";
                // Excecute the sql query
                mysqli_query($db, $query);
                // Registerd!!
                return true;
        }
        
        }
        Controller::$errors = $errors;
        return false;


    
    }


    public static function logout() {
        $_SESSION['logged_in'] = false;
        echo $_SESSION['logged_in'];
    }




}


?>
