
<?php 
session_start();
$host = "localhost:8111";
$username = "root";
$password = "";
$db = "testing";
$connection  = mysqli_connect($host,$username,$password,$db);
// $name = '';
// $subject = '';
// $marks = '';
// if(isset($_POST['save_data'])){
//     $name = $_POST['student_name'];
//     $subject = $_POST['subject'];
//     $marks = $_POST['marks'];

//     // Escape variables to prevent SQL injection
//     $name = mysqli_real_escape_string($connection, $name);
//     $subject = mysqli_real_escape_string($connection, $subject);
//     $marks = mysqli_real_escape_string($connection, $marks);

//     $insert_query = "INSERT INTO student(student_name, subject,marks) VALUES ('$name','$subject','$marks')";
//     $insert_query_run = mysqli_query($connection,$insert_query);

//     if( $insert_query_run){
//         $_SESSION['status'] = "Data Inserted successfully";
//         header(('location: index.php'));
//     }else{
//         $_SESSION['status'] = "Insertion of Data Failed";
//         header(('location: index.php'));
//     }
// }else{
//     //echo "one";die;
// }

// edit data

if(isset($_POST['click_edit_btn'])){
    $id = $_POST['user_id'];
    $arrayresult = [];
    $fetch_query = "SELECT * FROM student WHERE id='$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);
    if(mysqli_num_rows($fetch_query_run) > 0){
        while($row = mysqli_fetch_array($fetch_query_run)){

            array_push($arrayresult, $row);
            header('content-type: application/json');
            echo json_encode($arrayresult);
        }
    }

}else{
    //echo '<h4>No record found </h4>';
}

// ends

// update 
if(isset($_POST['update_data'])){
    $id = $_POST['id'];
    $name = $_POST['student_name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $update_query = "UPDATE student SET student_name = '$name', subject = '$subject',marks = '$marks' where id = '$id'";
    $update_query_run = mysqli_query($connection, $update_query);
    if($update_query_run){
        $_SESSION['status'] = "Data Updated successfully";
        header(('location: index.php'));
    }else{
        $_SESSION['status'] = "Data Not Updated successfully";
        header(('location: index.php'));
    }
}

//ends

// delete


if(isset($_POST['click_delete_btn'])){
    $id = $_POST['user_id'];
    $delete_query = "DELETE FROM student WHERE id = '$id'";
    $delete_query_run = mysqli_query($connection,$delete_query);
    if($delete_query_run){
        echo "data deleted successfully";
    }else{
        echo " data deleted failed";
    }
}

// login
// Check if form was submitted
if (isset($_POST['submit'])) {
    // Sanitize and escape user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($connection, $_POST['user_name']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Query to check username and password in database
    $query = "SELECT * FROM logins WHERE user_name = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    // Check if query executed successfully
    if ($result) {
        // Check if there is a matching row
        if (mysqli_num_rows($result) > 0) {
            // Redirect to index.php
            $_SESSION['status'] = "login successfully";
            header('Location: index.php');
            exit; // Ensure script execution stops after redirection
        } else {
            $_SESSION['status'] = "Login failed";
            header('Location: login.php');
        }
    } else {
        // Query execution failed
        echo "<script>alert('login Failed');</script>";
    }
}



// Assuming form submission with student name, subject, and marks
if (isset($_POST['save_data'])) {
    $student_name = mysqli_real_escape_string($connection, $_POST['student_name']);
    $subject = mysqli_real_escape_string($connection, $_POST['subject']);
    $marks = (int)$_POST['marks']; // Ensure marks is an integer

    // Check if a record already exists for the student with the same name and subject
    $check_query = "SELECT * FROM student WHERE student_name = '$student_name' AND subject = '$subject'";
    $check_result = mysqli_query($connection, $check_query);

    if ($check_result) {
        // If a record exists, update the marks
        if (mysqli_num_rows($check_result) > 0) {
            $existing_record = mysqli_fetch_assoc($check_result);
            $existing_marks = (int)$existing_record['marks'];
            $new_marks = $existing_marks + $marks;

            // Update query to add new marks
            $update_query = "UPDATE student SET marks = $new_marks WHERE student_name = '$student_name' AND subject = '$subject'";
            $update_result = mysqli_query($connection, $update_query);

            if ($update_result) {
                $_SESSION['status'] = "Marks updated successfully";
                 header(('location: index.php'));
            } else {
                $_SESSION['status'] = "Error updating marks";
                 header(('location: index.php'));
            }
        } else {
            // Insert new record if no existing record found (optional)
            $insert_query = "INSERT INTO student (student_name, subject, marks) VALUES ('$student_name', '$subject', $marks)";
            $insert_result = mysqli_query($connection, $insert_query);
            if ($insert_result) {
                $_SESSION['status'] = "New record inserted successfully";
                 header(('location: index.php'));
            } else {
                $_SESSION['status'] = "Error inserting new record";
                 header(('location: index.php'));
            }
            $_SESSION['status'] = "New record inserted successfully";
            header(('location: index.php'));
        }
    } else {
        $_SESSION['status'] = "Error checking record";
        header(('location: index.php'));
    }
}




?>
