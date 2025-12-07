<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/recipe_create.css">
    <title>Edit Recipe</title>
</head>
<body>

<?php 
    require_once('header.php'); 

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
    }
    
    $sql= "SELECT * FROM recipe WHERE Recipe_ID = '$id'";
    $result_select = $con->query($sql);
    $recipe = $result_select->fetch_assoc();
?>
    
<div class="container">
    <h1>Edit Recipe</h1>
    <form id="recipeForm" action="./recipe_editHandler.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="recipe_id" value="<?php echo htmlspecialchars($recipe['Recipe_ID']);?>"> 

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($recipe['Recipe_Name']); ?>" required>

        <label for="image">Featured Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($recipe['Image']); ?>" alt="Current Recipe Image" style="width: 100px;">

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($recipe['Description']); ?></textarea>

        <label for="ingredients">Ingredients:</label>
        <textarea id="ingredients" name="ingredients" required><?php echo htmlspecialchars($recipe['Ingredients']); ?></textarea>

        <label for="method">Method:</label>
        <textarea id="method" name="method" required><?php echo htmlspecialchars($recipe['Method']); ?></textarea>

        <div id="time">
            <div>
                <label for="Servings">Servings:</label>
                <input type="number" id="servings" name="servings" value="<?php echo htmlspecialchars($recipe['Serves']); ?>" required>
            </div>
            <div>
                <label for="Cooking_Time">Cooking Time:</label>
                <input type="text" id="cookingTime" name="PTime" value="<?php echo htmlspecialchars($recipe['Prepare_Time']); ?>" required>
                <span>Min</span> 
            </div>
            <div>
                <label for="Preparing_Time">Preparing Time:</label>
                <input type="text" id="preparingTime" name="CTime" value="<?php echo htmlspecialchars($recipe['Cook_Time']);?>" required>
                <span>Min</span>
            </div>
            <div>
                <label for="Cuisine">Cuisine:</label>
                <input type="text" id="cuisine" name="cuisine" value="<?php echo htmlspecialchars($recipe['Cuisine']); ?>" required>
            </div>
        </div>

        <br>
        
        <div class="stars" name="difficulty">
            <span id="difficulty">Difficulty:</span> 
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    $selected = ($i == $recipe['Difficulty']) ? 'style="color: gold;"' : '';
                    echo '<span class="star" data-value="' . $i . '" ' . $selected . '>' . $i . '&#9733;</span>';
                }
            ?>
        </div>
        <input type="hidden" id="difficultyInput" name="difficulty" value="<?php echo $recipe['Difficulty']; ?>">
        
        <br>
        <button type="submit" name="submitBtn" id="submitBtn">Update</button>
    </form>
</div>
<script src="./JS/recipe_edit.js"></script>
<?php require_once('footer.php'); ?>    
</body>
</html>
