<?php
require_once('config.php');

if (isset($_POST['submitBtn'])) {
    $recipe_id = $_POST['recipe_id'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $ingredients = $_POST['ingredients'] ?? '';
    $method = $_POST['method'] ?? '';
    $servings = $_POST['servings'] ?? '';
    $cookingTime = $_POST['PTime'] ?? '';
    $preparingTime = $_POST['CTime'] ?? '';
    $cuisine = $_POST['cuisine'] ?? '';
    $difficulty = $_POST['difficulty'] ?? '';

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $imageData = base64_encode($imageData);

        $sql = "UPDATE recipe SET Recipe_Name = ?, Image = ?, Description = ?, Ingredients = ?, Method = ?, Serves = ?, Cook_Time = ?, Prepare_Time = ?, Cuisine = ?, Difficulty = ? WHERE Recipe_ID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssssiissii', $title, $imageData, $description, $ingredients, $method, $servings, $cookingTime, $preparingTime, $cuisine, $difficulty, $recipe_id);
    } else {
        $sql = "UPDATE recipe SET Recipe_Name = ?, Description = ?, Ingredients = ?, Method = ?, Serves = ?, Cook_Time = ?, Prepare_Time = ?, Cuisine = ?, Difficulty = ? WHERE Recipe_ID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssssiissii', $title, $description, $ingredients, $method, $servings, $cookingTime, $preparingTime, $cuisine, $difficulty, $recipe_id);
    }

    if ($stmt->execute()) {
        header("Location: creator_dashboard.php?message=Recipe updated successfully");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "No recipe data submitted.";
}
?>
