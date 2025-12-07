<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/moderator_dashboard.css">
    <title>Moderator Dashboard</title>
</head>
<body>
    <?php require_once('header.php'); ?>

    <?php
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
    ?>

    <div class="container">
        <div class="sidebar">
            <h1>Moderator Dashboard</h1>
            <div class="list">
                <h3>Recipes</h3>
                <select onchange="filterRecipes(this.value)">
                    <option>Select</option>
                    <option value="All">All</option>
                    <option value="Active">Active</option>
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="notifications">
                <h3>Notifications</h3>
                <ul>
                    <li><a href="#">Notification 1</a></li>
                    <li><a href="#">Notification 2</a></li>
                    <li><a href="#">Notification 3</a></li>
                </ul>
            </div>
            <div class=>
                <h3>Settings</h3>
                <ul id="settings">
                    <li><a href="moderator_profile.php">Profile</a></li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="stats">
                <div class="box" id="box1">All<br><?php echo $all_recipes; ?></div>
                <div class="box" id="box2">Active<br><?php echo $active_recipes; ?></div>
                <div class="box" id="box3">Pending<br><?php echo $pending_recipes; ?></div>
                <div class="box" id="box4">Rejected<br><?php echo $rejected_recipes; ?></div>
            </div>

            <?php
            $filter = isset($_GET['filter']) ? $_GET['filter'] : 'All';

            if ($filter == 'All') {
                $query = "SELECT Recipe_ID, Recipe_Name, Status, Cuisine FROM recipe";
            } else {
                $query = "SELECT Recipe_ID, Recipe_Name, Status, Cuisine FROM recipe WHERE Status = '$filter'";
            }

            $result = mysqli_query($con, $query);
            ?>

            <div class="table-section">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["Recipe_Name"] . "</td>";
                            echo "<td>" . $row["Status"] . "</td>";
                            echo "<td>" . $row["Cuisine"] . "</td>";
                            echo "<td>";
                            if ($row["Status"] == 'Pending') {
                                echo "<a href='moderator_dashboard.php?Accept=" . $row['Recipe_ID'] . "'>Accept</a> | <a href='moderator_dashboard.php?Reject=" . $row['Recipe_ID'] . "'>Reject</a>";
                            }
                            echo "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No results found!</td></tr>";
                    }

                    if (isset($_GET['Accept'])) {
                        $id = intval($_GET['Accept']);
                        $sql = "UPDATE recipe SET Status='Active' WHERE Recipe_ID='$id'";
                        if (mysqli_query($con, $sql)) {
                            echo "<script>alert('Recipe Accept successfully!');</script>";
                        } else {
                            echo "<script>alert('Error deleting recipe: " . mysqli_error($con) . "');</script>";
                        }
                    }

                    if (isset($_GET['Reject'])) {
                        $id = intval($_GET['Reject']);
                        $sql = "UPDATE recipe SET Status='Rejected' WHERE Recipe_ID='$id'";
                        if (mysqli_query($con, $sql)) {
                            echo "<script>alert('Recipe Reject successfully!');</script>";
                        } else {
                            echo "<script>alert('Error deleting recipe: " . mysqli_error($con) . "');</script>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <?php require_once('footer.php'); ?>
    </footer>

    <script>
        function filterRecipes(status) {
            window.location.href = 'moderator_dashboard.php?filter=' + status;
        }
    </script>
</body>
</html>
