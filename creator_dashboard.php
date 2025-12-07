<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/creator_dashboard.css">
    <title>Creator Dashboard</title>
</head>
<body>
    <header>
        <?php require_once('header.php');
        
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $sql = "DELETE FROM recipe WHERE Recipe_ID='$id'";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Product deleted successfully!');</script>";
            } else {
                echo "<script>alert('Error deleting product: " . mysqli_error($con) . "');</script>";
            }
        }
        
        ?>
    </header>

    <?php
    require 'config.php';

    $all_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Creator_ID = '$sid'";
    $active_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Active' AND Creator_ID = '$sid'";
    $pending_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Pending' AND Creator_ID = '$sid'";
    $rejected_recipes_query = "SELECT COUNT(*) AS total FROM recipe WHERE Status = 'Rejected' AND Creator_ID = '$sid'";

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
            <h1>Creator Dashboard</h1>
            <div class="list">
                <h3 id="no1">My Recipes</h3>
                <select onchange="filterRecipes(this.value)">
                    <option>Select</option>
                    <option value="All">All</option>
                    <option value="Active">Active</option>
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="list">
                <h3 id="no2">Settings</h3>
                <ul id="settings">
                    <li><a href="creator_profile.php">Profile</a></li>
                </ul>
            </div>
            <button class="create-post"><a href="recipe_create.php">+ Create a Recipe</a></button>
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
                $query = "SELECT Recipe_ID, Recipe_Name, Status, Cuisine FROM recipe WHERE Creator_ID = '$sid'";
            } else {
                $query = "SELECT Recipe_ID, Recipe_Name, Status, Cuisine FROM recipe WHERE Status = '$filter' AND Creator_ID = '$sid'";
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
                            echo "<tr>
                                <td>".$row["Recipe_Name"]."</td>
                                <td>".$row["Status"]."</td>
                                <td>".$row["Cuisine"]."</td>
                                <td> <a href='recipe_edit.php?id=" . $row['Recipe_ID'] . "'>Edit</a> | <a href='creator_dashboard.php?delete=" . $row['Recipe_ID'] . "'>Delete</a></td>
                            </tr>";
                            $_SESSION['editID'] = $row['Recipe_ID'];
                        }
                    } else {
                        echo "<tr><td colspan='4'>No results found!</td></tr>";
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
            window.location.href = 'creator_dashboard.php?filter=' + status;
        }
    </script>
</body>
</html>
