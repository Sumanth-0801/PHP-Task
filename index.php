<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .bg-gray {
        background-color: #d2d6de;
    }

    .table-name {
        color: #ffa500;
    }

    button.add-record {
        text-decoration: none;
        background-color: black;
        /* padding: 13px; */
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 50px;
        padding-right: 50px;
        color: white;
    }

    .modal-header {
        border-bottom: 1px solid white;
    }

    .modal-footer {
        margin-right: 175px;
        border-top: none;
    }

    .modal-body {
        padding: 2rem;
    }

    label {
        color: black;
    }

    .user-logo {
        position: absolute;
        bottom: 252px;
        margin-left: 9px;
    }

    .clip-logo {
        position: absolute;
        bottom: 190px;
        margin-left: 9px;
    }

    .marks-logo {
        position: absolute;
        bottom: 128px;
        margin-left: 10px;
    }


    /* Style The Dropdown Button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    a.logout {
        text-decoration: none;
        font-size: 15px;
        color: black;
        font-weight: 500;
    }

    a.home {
        text-decoration: none;
        font-size: 15px;
        color: black;
        font-weight: 500;
    }
</style>

<body class="bg-gray pt-4" style="padding: 27px;">
    <div class="row">
        <div class=" col-9 table-title">
            <h3 class="table-name">tailwebs.</h3>
        </div>
        <div class="col-2 text-end">
            <a href="#" class="home">HOME</a>
        </div>
        <div class="col-1">
            <a href="./login.php" class="logout">LOGOUT</a>
        </div>
    </div>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey </strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['status']);
    }
    ?>

    <div class="bg-white">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">SUBJECT</th>
                    <th scope="col">MARKS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = "localhost:8111";
                $username = "root";
                $password = "";
                $db = "testing";
                $connection  = mysqli_connect($host, $username, $password, $db);
                $fetch_query = "SELECT * FROM student";
                $fetch_query_run = mysqli_query($connection, $fetch_query);

                if (mysqli_num_rows($fetch_query_run) > 0) {
                    while ($row = mysqli_fetch_array($fetch_query_run)) {
                ?>
                        <tr>
                            <td class="user_id"><?= $row['id']; ?></td>
                            <td><?= $row['student_name']; ?></td>
                            <td><?= $row['subject']; ?></td>
                            <td><?= $row['marks']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button style="border: none; background-color: white;"><i class="fa-sharp fa-solid fa-circle-down"></i></button>
                                    <div class="dropdown-content">
                                        <a href="#" class="edit-record edit_data">edit</a>
                                        <a href="#" class="delete-record  delete-btn">delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan='4' class='text-center text-danger'>No data found </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>

    <div class="pull-left">
        <?php  ?>
        <button type="button" class="add-record" style="float: left;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>
        <?php
        ?>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./code.php" id="form">
                        <input type="hidden" name="id" class="id" id="id" />
                        <div class="flex-all-device">

                            <div class="user-logo">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="email-form">
                                <label for="">name</label>
                                <input type="text" name="student_name" id="student_name" class="form-control required valid" placeholder=" name" style="text-indent: 24px;">
                            </div>

                        </div>
                        <div class="flex-all-device">

                            <div class="clip-logo">
                                <i class="fa-solid fa-table-list"></i>
                            </div>
                            <div class="email-form">
                                <label for="">subject</label>
                                <input type="text" name="subject" id="subject" class="form-control required valid" placeholder=" subject" style="text-indent: 24px;">
                            </div>

                        </div>
                        <div class="flex-all-device">

                            <div class="marks-logo">
                                <i class="fa-sharp fa-solid fa-bookmark"></i>
                            </div>
                            <div class="email-form">
                                <label for="">marks</label>
                                <input type="text" name="marks" id="marks" class="form-control required valid" placeholder=" marks" style="text-indent: 24px;">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                            <button type="submit" class="add-record" name="save_data" style="cursor: pointer;">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- EDIT Modal -->
    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./code.php" id="form">
                        <input type="hidden" name="id" class="id" id="id" />
                        <div class="form-group has-feedback">
                            <div class="flex-all-device items-center justify-center">
                                <div class="user-logo">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div class="email-form">
                                    <label for="">name</label>
                                    <input type="text" name="student_name" id="student_name" class="form-control required valid student_name" placeholder=" name" style="text-indent: 24px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="flex-all-device items-center justify-center">
                                <div class="clip-logo">
                                    <i class="fa-solid fa-table-list"></i>
                                </div>
                                <div class="email-form">
                                    <label for="">subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control required valid subject" placeholder=" subject" style="text-indent: 24px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="flex-all-device items-center justify-center">
                                <div class="marks-logo">
                                    <i class="fa-sharp fa-solid fa-bookmark"></i>
                                </div>
                                <div class="email-form">
                                    <label for="">marks</label>
                                    <input type="text" name="marks" id="marks" class="form-control required valid marks" placeholder=" marks" style="text-indent: 24px;">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                            <button type="submit" class="add-record" name="update_data" style="cursor: pointer;">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js
"></script>

<script>
    // $(document).ready(function() {
    //     $("#form").validate({
    //         ignore: ".ignore",
    //         rules: {
    //             student_name: {
    //                 required: true
    //             },
    //             subject: {
    //                 required: true
    //             },
    //             marks: {
    //                 required: true
    //             },

    //         },
    //         messages: {
    //             student_name: "Please enter your Student Name",
    //             subject: "Please enter your subject",
    //             marks: "Please enter your Marks",
    //         }
    //     });
    // $.ajax({
    //     url: "/student/add",
    //     type: "POST",
    //     data: {
    //         "student_name": student_name,
    //         "subject": subject,
    //         "marks": marks,
    //     },
    //     success: function(res) {
    //         alert("inserted successfully");
    //     },
    //     error: function() {
    //         alert('Failed to Load data');
    //     }
    // });
    //});
    $(document).ready(function(e) {
        $('.edit_data').click(function(e) {
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();
            //console.log(user_id);
            $.ajax({
                url: "code.php",
                type: "POST",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {
                    //console.log(response);
                    $.each(response, function(key, value) {
                        console.log(value['id']);
                        $('.id').val(value['id']);
                        $('.student_name').val(value['student_name']);
                        $('.subject').val(value['subject']);
                        $('.marks').val(value['marks']);
                    });
                    //alert("inserted successfully");
                    $('#editdata').modal('show');
                },
                error: function() {
                    alert('Failed to Load data');
                }
            });
        });
    });

    // delete 

    $(document).ready(function(e) {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var res = window.confirm("Are you sure to remove this events ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            // console.log(user_id);
            if (res) {
                $.ajax({
                    url: "code.php",
                    type: "POST",
                    data: {
                        'click_delete_btn': true,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.reload();

                    },
                    error: function() {
                        alert('Failed to Load data');
                    }
                });
            }

        });
    });
</script>

</html>