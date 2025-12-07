<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/category.css">
</head>
<body>
    <?php
        require_once('header.php');
    ?>
    <div class="container1">
        <section class="section1" id="c1">
            <h2>Italian Recipes</h2>
            <div class="grid1">
                <?php
                require_once('config.php');
                $sql = "SELECT Recipe_ID, Recipe_Name, Image, Description FROM recipe WHERE Cuisine = 'italian' and Status = 'Active'";
                $result = $con->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<article class="card">';
                        echo '<a href="recipe_details.php?id='.$row['Recipe_ID'].'">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="Recipe Image">';
                        echo "<h3>" . htmlspecialchars($row["Recipe_Name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["Description"]) . "</p>";
                        echo '</a>';
                        echo '</article>';
                        $_SESSION['rid'] = $row["Recipe_ID"];
                    }
                } else {
                    echo "<p>No recipes.</p>";
                }
                ?>
            </div>
        </section>

        <section class="section1" id="c2">
            <h2>French Recipes</h2>
            <div class="grid1">
                <?php
                require_once('config.php');
                $sql = "SELECT Recipe_ID, Recipe_Name, Image, Description FROM recipe WHERE Cuisine = 'french' and Status = 'Active'";
                $result = $con->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<article class="card">';
                        echo '<a href="recipe_details.php?id='.$row['Recipe_ID'].'">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="Recipe Image">';
                        echo "<h3>" . htmlspecialchars($row["Recipe_Name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["Description"]) . "</p>";
                        echo '</a>';
                        echo '</article>';
                        $_SESSION['rid'] = $row["Recipe_ID"];
                    }
                } else {
                    echo "<p>No recipes.</p>";
                }
                ?>
            </div>
        </section>

        <section class="section1" id="c3">
            <h2>Chinese Recipes</h2>
            <div class="grid1">
                <?php
                $_SESSION['cp']="chinese";
                require_once('config.php');
                $sql = "SELECT Recipe_ID, Recipe_Name, Image, Description FROM recipe WHERE Cuisine = 'chinese' and Status = 'Active'";
                $result = $con->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<article class="card">';
                        echo '<a href="recipe_details.php?id='.$row['Recipe_ID'].'">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="Recipe Image">';
                        echo "<h3>" . htmlspecialchars($row["Recipe_Name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["Description"]) . "</p>";
                        echo '</a>';
                        echo '</article>';
                        $_SESSION['rid'] = $row["Recipe_ID"];
                    }
                } else {
                    echo "<p>No recipes.</p>";
                }
                ?>
            </div>
        </section>

        <section class="section1" id="c4">
            <h2>Japanese Recipes</h2>
            <div class="grid1">
                <?php
                require_once('config.php');
                $sql = "SELECT Recipe_ID, Recipe_Name, Image, Description FROM recipe WHERE Cuisine = 'japanese' and Status = 'Active'";
                $result = $con->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<article class="card">';
                        echo '<a href="recipe_details.php?id='.$row['Recipe_ID'].'">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="Recipe Image">';
                        echo "<h3>" . htmlspecialchars($row["Recipe_Name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["Description"]) . "</p>";
                        echo '</a>';
                        echo '</article>';
                        $_SESSION['rid'] = $row["Recipe_ID"];
                    }
                } else {
                    echo "<p>No recipes.</p>";
                }
                ?>
            </div>
        </section>
    </div>
    <?php
        include('footer.php');
    ?>
</body>
</html>
