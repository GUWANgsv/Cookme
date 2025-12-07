<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/home.css">
    <title>Home page</title>
</head>
<body>
    <?php require_once('header.php'); ?> 

    <br><br><br>
    
    <div class="image">
        <div style="position: relative; text-align: center;">
            <img id="coverimage" src="./image/cover2.jpg" alt="cover" width="100%">
            <div class="welcome-message">
                <h1 id="welcome">Welcome <br>to <br>CookMe</h1>
                <style>
                    .welcome-message {    
                        position: absolute;
                        line-height: 120px;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        color: white;
                        font-family: nunito;
                        font-size: 4vw; 
                        animation: fadeIn 2s ease-in-out;
                    }
                    #welcome {
                        color: white;
                    }
                    @keyframes fadeIn {
                        from { opacity: 0; }
                        to { opacity: 1; }
                    }
                </style>
            </div>
        </div>
    </div>

    <main class="container">
        <section class="section">
            <h2>Recipes in this Category</h2>
            <br>
            <div class="grid">
                <a href="./category.php#c1">
                    <article class="card">
                        <img src="./image/italian.jpg" alt="Recipe Image">
                        <h3>Italian Recipes</h3>
                        <p>Italian cuisine is celebrated for its bold flavors, cooking style and fresh ingredients, featuring dishes like pasta, pizza, risotto, and tiramisu, often enhanced with herbs, olive oil, and regional specialties.</p>
                    </article>
                </a>
                <a href="./category.php#c2">
                    <article class="card">
                        <img src="./image/french.jpg" alt="Recipe Image">
                        <h3>French Recipes</h3>
                        <p>French cuisine is renowned for its sophistication and artistry, featuring dishes like pastries. It emphasizes fresh ingredients, rich flavors, and meticulous cooking techniques, showcasing regional diversity.</p>
                    </article>
                </a>
                <a href="./category.php#c3">
                    <article class="card">
                        <img src="./image/chinese.jpg" alt="Recipe Image">
                        <h3>Chinese Recipes</h3>
                        <p>Chinese cuisine is diverse and flavorful, known for its bold spices and varied cooking techniques. Popular dishes include dim sum, fried rice, noodles, and stir-fries, often featuring fresh vegetables and meats.</p>
                    </article>
                </a>
                <a href="./category.php#c4">
                    <article class="card">
                        <img src="./image/japanese.jpg" alt="Recipe Image">
                        <h3>Japanese Recipes</h3>
                        <p>Japanese cuisine emphasizes harmony and presentation, featuring sushi, sashimi, ramen, and tempura. It celebrates seasonal ingredients and cooking methods, often accompanied by rice and miso soup.</p>
                    </article>
                </a>
                <br>
            </div>
            <a href="./category.php" class="btn">See More</a>
        </section>

        <section class="section">
            <h2>Daily Collection</h2>
            <br>
            <div class="grid">
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/breakfast.jpg" alt="Recipe Image">
                        <h3>Breakfast Recipes</h3>
                        <p>Breakfast is the first meal of the day, typically eaten in the morning. It provides energy and nutrients to start the day, often including items like eggs, toast, cereal, and fruit.</p>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/lunch.jpg" alt="Recipe Image">
                        <h3>Lunch Recipes</h3>
                        <p>Lunch is a midday meal typically eaten between breakfast and dinner. It can range from light to hearty, often consisting of sandwiches, salads, soups, or hot dishes, providing some energy.</p>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/snacks.jpg" alt="Recipe Image">
                        <h3>Snacks Recipes</h3>
                        <p>Snacks are small portions of food typically eaten between meals. They can be sweet or savory, ranging from fruits and nuts to chips and cookies, offering quick energy and satisfying hunger.</p>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/dinner.jpg" alt="Recipe Image">
                        <h3>Dinner Recipes</h3>
                        <p>Dinner is the main meal of the day, typically eaten in the evening. It often includes a variety of dishes, such as proteins, vegetables, and grains, providing nourishment and satisfying.</p>
                    </article>
                </a>
                <br>
            </div>
            <a href="#" class="btn">See More</a>
        </section>

        <section class="section">
            <h2>This Month's Recipe Collections</h2>
            <br>
            <div class="grid">
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/burger.jpg" alt="Recipe Image">
                        <h3>Bugers Recipes</h3>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/rice.jpg" alt="Recipe Image">
                        <h3>Biriyani Recipes</h3>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/soup.jpg" alt="Recipe Image">
                        <h3>Soups Recipes</h3>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/cake.jpg" alt="Recipe Image">
                        <h3>Cake Recipes</h3>
                    </article>
                </a>
                <br>
            </div>
            <a href="#" class="btn">See More</a>
        </section>

        <section class="section">
            <h2>You May Like Other Recipe Category Collection</h2>
            <br>
            <div class="grid">
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/srilankan.jpg" alt="Recipe Image">
                        <h3>Sri Lankan Recipes</h3>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/american.jpg" alt="Recipe Image">
                        <h3>American Recipes</h3>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/arabic.jpg" alt="Recipe Image">
                        <h3>Arabic Recipes</h3>
                    </article>
                </a>
                <a href="#">
                    <article class="card">
                        <img src="./image/recipe/indian.jpg" alt="Recipe Image">
                        <h3>Indian Recipes</h3>
                    </article>
                </a>
                <br>
            </div>
            <a href="#" class="btn">See More</a>
        </section>
    </main>

    <?php require_once('footer.php'); ?>
</body>
</html>
