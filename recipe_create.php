<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/recipe_create.css">
    <title>Recipe Create</title>
</head>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <h1>Create Recipe</h1>
        <form id="recipeForm" action="./recipe_createHandler.php" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="image">Featured Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" required></textarea>
            <label for="method">Method:</label>
            <textarea id="method" name="method" required></textarea>
            <div id="time">
                <div>
                    <label for="servings">Servings:</label>
                    <input type="number" id="servings" name="servings" value="1" required>
                </div>
                <div>
                    <label for="cookingTime">Cooking Time:</label>
                    <input type="text" id="cookingTime" name="PTime" required>
                    <span>Min</span>
                </div>
                <div>
                    <label for="preparingTime">Preparing Time:</label>
                    <input type="text" id="preparingTime" name="CTime" required>
                    <span>Min</span>
                </div>
                <div>
                    <label for="cuisine">Cuisine:</label>
                    <input type="text" id="cuisine" name="cuisine" required>
                </div>
            </div>
            <br>
            <div class="stars" name="difficulty">
                <span id="difficulty">Difficulty:</span>
                <span class="star" data-value="1">1&#9733; </span>
                <span class="star" data-value="2"> 2&#9733; </span>
                <span class="star" data-value="3"> 3&#9733; </span>
                <span class="star" data-value="4"> 4&#9733; </span>
                <span class="star" data-value="5"> 5&#9733; </span>
            </div>
            <input type="hidden" id="difficultyInput" name="difficulty" value="">
            <br>
            <button type="submit" name="submitBtn" id="submitBtn">Submit</button>
        </form>
    </div>
    <script src="./JS/recipe_create.js"></script>
    <?php require_once('footer.php'); ?>    
</body>
</html>
