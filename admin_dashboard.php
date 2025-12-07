<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/admin_dashboard.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php require_once('header.php'); ?>

    <?php
// imalka part 
    $all_recipes_query = "SELECT COUNT(*) AS total FROM recipe";
    $active_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Active'";
    $pending_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Pending'";
    $rejected_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Rejected'";

    $all_recipes_result = mysqli_query($con, $all_recipes_query);
    $active_recipes_result = mysqli_query($con, $active_recipes_query);
    $pending_recipes_result = mysqli_query($con, $pending_recipes_query);
    $rejected_recipes_result = mysqli_query($con, $rejected_recipes_query);

    $all_recipes = mysqli_fetch_assoc($all_recipes_result)['total'];
    $active_recipes = mysqli_fetch_assoc($active_recipes_result)['total'];
    $pending_recipes = mysqli_fetch_assoc($pending_recipes_result)['total'];
    $rejected_recipes = mysqli_fetch_assoc($rejected_recipes_result)['total'];


// all user count box
    $users_query = "SELECT COUNT(*) AS total FROM user";
    $creators_query = "SELECT COUNT(*) AS total FROM creator";
    $moderators_query = "SELECT COUNT(*) AS total FROM moderator";

    $users_result = mysqli_query($con, $users_query);
    $creators_result = mysqli_query($con, $creators_query);
    $moderators_result = mysqli_query($con, $moderators_query);

    $users = mysqli_fetch_assoc($users_result)['total'];
    $creators = mysqli_fetch_assoc($creators_result)['total'];
    $moderators = mysqli_fetch_assoc($moderators_result)['total'];

    $user_query = "SELECT User_ID, First_Name, Country FROM user";
    $user_result = mysqli_query($con, $user_query);

    $moderator_query = "SELECT Moderator_ID, Moderator_Name, Email FROM moderator";
    $moderator_result = mysqli_query($con, $moderator_query);
    ?>

    <div class="container">
        <div class="sidebar">
            <h1>Admin Dashboard</h1>
            <div class="list">
                <h3 id="no1">Recipes</h3>
                <select onchange="filterRecipes(this.value)">
                    <option>Select</option>
                    <option value="All">All</option>
                    <option value="Active">Active</option>
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="list">
                <h3>Accounts</h3>
                <select onchange="filterUSer(this.value)">
                    <option>Select</option>
                    <option value="all">All</option>
                    <option value="creator">Moderator</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="list">
                <h3 id="no2">Settings</h3>
                <ul id="settings">
                    <li><a href="admin_profile.php">Profile</a></li>
                </ul>
            </div>
        </div>

<!-- data summery -->
        <div class="main-content">
            <div class="stats">
                <div class="box" id="box1">All<br>Recipes<br><?php echo $all_recipes; ?></div>
                <div class="box" id="box2">Active Recipes<br><?php echo $active_recipes; ?></div>
                <div class="box" id="box3">Pending Recipes<br><?php echo $pending_recipes; ?></div>
                <div class="box" id="box4">Rejected Recipes<br><?php echo $rejected_recipes; ?></div>
                <div class="box" id="box5">Users<br><?php echo $users; ?></div>
                <div class="box" id="box6">Creators<br><?php echo $creators; ?></div>
                <div class="box" id="box7">Moderators<br><?php echo $moderators; ?></div>
            </div>

            <?php
            $filter = isset($_GET['filter']) ? $_GET['filter'] : 'All';

            if ($filter == 'All') {
                $query1 = "SELECT Recipe_ID, Recipe_Name, Status, Cuisine FROM recipe";
            } else {
                $query1 = "SELECT Recipe_ID, Recipe_Name, Status, Cuisine FROM recipe WHERE Status = '$filter'";
            }

            $result1 = mysqli_query($con, $query1);
            ?>

            <div class="table-section">
                <div id="tbl_rec">
                    <h2>Recipes</h2>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if ($result1->num_rows > 0) {
                            while ($rows = mysqli_fetch_assoc($result1)) {
                                echo "<tr>
                                    <td>".$rows["Recipe_Name"]."</td>
                                    <td>".$rows["Status"]."</td>
                                    <td>".$rows["Cuisine"]."</td>";
                                echo "<td><a href='recipe_edit.php?id=" . $rows['Recipe_ID'] . "'>Edit</a> | <a href='creator_dashboard.php?delete=" . $rows['Recipe_ID'] . "' onclick='return confirmDelete()'>Delete</a></td>";
                                echo "</tr>";
                                $_SESSION['editID'] = $rows['Recipe_ID'];
                            }
                        } else {
                            echo "<tr><td colspan='4'>No results found!</td></tr>";
                        }

                        if (isset($_GET['delete'])) {
                            $id = intval($_GET['delete']);
                            $sql = "DELETE FROM recipe WHERE Recipe_ID='$id'";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>alert('Recipe deleted successfully!');</script>";
                            } else {
                                echo "<script>alert('Error deleting recipe: " . mysqli_error($con) . "');</script>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <div id="user">
                    <h2>Users</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
        <!-- show user table  -->
                        <?php
                        if ($user_result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($user_result)) {
                                echo "<tr>
                                    <td>".$row["First_Name"]."</td>
                                    <td>".$row["Country"]."</td>";

                                $creatorid = $row['User_ID'];
                                $sql_creator = "SELECT * FROM creator WHERE User_ID = '$creatorid'";
                                $result_creator = $con->query($sql_creator);

                                if ($result_creator->num_rows > 0) {
                                    echo "<td>Creator</td>";
                                } else {
                                    echo "<td>User</td>";
                                }
                                echo "<td><a href='admin_dashboard.php?delete_user=" . $row['User_ID'] . "' onclick='return confirmDelete()'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No results found!</td></tr>";
                        }
            //user delete function
                        if (isset($_GET['delete_user'])) {
                            $id = intval($_GET['delete_user']);
                            $sql = "DELETE FROM user WHERE User_ID='$id'";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>alert('User deleted successfully!');</script>";
                            } else {
                                echo "<script>alert('Error deleting user: " . mysqli_error($con) . "');</script>";
                            }
                        }
                        ?>
                    </table>
                </div>

<!-- moderator table funtion -->
                <div id="creator" >
                    <h2>Moderators</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if ($moderator_result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($moderator_result)) {
                                echo "<tr>
                                    <td>".$row["Moderator_Name"]."</td>
                                    <td>".$row["Email"]."</td>";
                                echo "<td><a href='admin_dashboard.php?delete_moderator=" . $row['Moderator_ID'] . "' onclick='return confirmDelete()'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No results found!</td></tr>";
                        }
       //moderator delete function
                        if (isset($_GET['delete_moderator'])) {
                            $id = intval($_GET['delete_moderator']);
                            $sql = "DELETE FROM moderators WHERE Moderator_ID='$id'";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>alert('Moderator deleted successfully!');</script>";
                            } else {
                                echo "<script>alert('Error deleting moderator: " . mysqli_error($con) . "');</script>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <br><br><br>
                        
            </div>
        </div>
    </div>

    <footer>
        <?php require_once('footer.php'); ?>
    </footer>


<!-- user type table filter -->
    <script>
        function filterRecipes(status) {
            window.location.href = 'admin_dashboard.php?filter=' + status;
        }

        function filterUSer(status) {
            if (status == "all") {
                document.getElementById("creator").style.display = "block";
                document.getElementById("user").style.display = "block";
                document.getElementById("tbl_rec").style.display = "none";
            } else if (status == "creator") {
                document.getElementById("creator").style.display = "block";
                document.getElementById("user").style.display = "none";
                document.getElementById("tbl_rec").style.display = "none";
            } else if (status == "user") {
                document.getElementById("creator").style.display = "none";
                document.getElementById("user").style.display = "block";
                document.getElementById("tbl_rec").style.display = "none";
            } else {
                document.getElementById("creator").style.display = "none";
                document.getElementById("user").style.display = "none";
                document.getElementById("tbl_rec").style.display = "none";
            }
        }

        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</body>
</html>
