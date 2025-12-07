<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe View</title>
    <link rel="stylesheet" href="CSS/recipe_details.css">
</head>
<body>
    <header>
        <?php require_once('header.php'); ?>
    </header>

    <main>
    <?php
        require_once "config.php";

        if (isset($_GET['id'])) {
            $recipe_id = intval($_GET['id']);
            $_SESSION['recipe_id'] = $recipe_id;

            $sql = "SELECT * FROM recipe WHERE Recipe_ID = ? AND Status = 'Active'";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $recipe_id); 
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $recipe_name = $row['Recipe_Name'];
                    $description = $row['Description'];
                    $image = $row['Image'];
                    $difficulty = $row['Difficulty'];
                    $prepare_time = $row['Prepare_Time'];
                    $cook_time = $row['Cook_Time'];
                    $cuisine = $row['Cuisine'];
                    $serves = $row['Serves'];
                    $ingredients = $row['Ingredients'];
                    $method = $row['Method'];
                }
    ?>

    <div class="container">
        <form id="recipeForm" action="" method="post">
            <h1><?php echo htmlspecialchars($recipe_name); ?></h1>

            <img id="img1" src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="Recipe Image" width="400px">

            <h2><?php echo htmlspecialchars($description); ?></h2>

            <br><br><label class="ingredients">Ingredients:<br><br></label>
            <h3 class="ingredients1" id="ingredients1" style="display:none;"><?php echo htmlspecialchars($ingredients); ?></h3>
            <h3 class="ingredients1" id="ingredients2"></h3>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let text = document.getElementById("ingredients1").innerText;
                    let formattedText = text.split(',').join('<br>');
                    document.getElementById("ingredients2").innerHTML = formattedText;
                });
            </script>

            <br><br><label class="method">Method:<br><br></label>
            <h3 class="method1" id="method1" style="display:none;"><?php echo htmlspecialchars($method); ?></h3>
            <h3 class="method1" id="method2"></h3>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let text = document.getElementById("method1").innerText;
                    let formattedText = text.split(';').join('<br><br>');
                    document.getElementById("method2").innerHTML = formattedText;
                });
            </script>

            <h3 class="method1" id="method2"></h3>
            
            <br><br>
            <div id="time">
                <div>
                    <label class="Servings">Servings:</label>
                    <?php echo htmlspecialchars($serves); ?>
                </div>
                
                <div>
                    <label class="Cooking_Time">Cooking Time:</label>
                    <?php echo htmlspecialchars($prepare_time); ?>
                    <span>Min</span>
                </div>
                
                <div>
                    <label class="Preparing_Time">Preparing Time:</label>
                    <?php echo htmlspecialchars($cook_time); ?>
                    <span>Min</span>
                </div>
                
                <div>
                    <label class="Cuisine">Cuisine:</label>
                    <?php echo htmlspecialchars($cuisine); ?>
                </div>
            </div>
            <br>
            <div class="stars" name="difficulty">
                <span id="difficulty">Difficulty:</span>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $selected = ($i == $difficulty) ? 'style="color: gold;"' : '';
                        echo '<span class="star" data-value="' . $i . '" ' . $selected . '>' . $i . '&#9733;</span>';
                    }
                ?>
            </div>

            <input type="hidden" id="difficultyInput" name="difficulty" value="<?php echo $difficulty; ?>">

            <br>
            <?php
                $sid = $_SESSION['id'];
                if (isset($_POST['add'])) {
                    $check_sql = "SELECT * FROM favorite WHERE User_ID = ? AND Recipe_ID = ?";
                    $stmt = $con->prepare($check_sql);
                    $stmt->bind_param("ii", $sid, $recipe_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();

                    $is_favorite = ($result->num_rows > 0);
                    $_SESSION['is_favorite'] = $is_favorite;

                    if ($result->num_rows > 0) {
                        $remove_sql = "DELETE FROM favorite WHERE User_ID = ? AND Recipe_ID = ?";
                        $stmt = $con->prepare($remove_sql);
                        $stmt->bind_param("ii", $sid, $recipe_id);
                        $stmt->execute();
                        $message = "Recipe removed from favorites.";
                    } else {
                        $insert_sql = "INSERT INTO favorite (User_ID, Recipe_ID) VALUES (?, ?)";
                        $stmt = $con->prepare($insert_sql);
                        $stmt->bind_param("ii", $sid, $recipe_id);
                        $stmt->execute();
                        $message = "Recipe added to favorites.";
                    }

                    echo "<script>alert('$message');</script>";
                }
            ?> 
            
            <button type="submit" name="add" id="add" class="add">
                <?php
                 $is_favorite = $_SESSION['is_favorite'];
                 echo ($is_favorite ? "Add to Favorites" : "Remove from Favorites"); ?>
            </button>
            <button type="submit" name="download" id="download" class="download">Download</button>
        </form>
    </div>
    <?php
            } else {
                echo "<p>No recipe found.</p>";
            }

            $stmt->close();
            $con->close();
        } else {
            echo "<p>Invalid recipe ID.</p>";
        }
    ?>
    </main>

    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>
</html>
