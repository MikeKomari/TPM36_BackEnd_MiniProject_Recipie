<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Recipie</title>

    <style>
        body{
            min-height: 100vh;
        }
        .hero-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            text-align: center;
        }
        .feature-icon {
            font-size: 40px;
            color: #17a2b8;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .feature-description {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .button-cta {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 10px 30px;
            font-size: 1.2rem;
            border-radius: 5px;
            text-decoration: none;
        }
        .button-cta:hover {
            background-color: #138496;
        }
    </style>
  </head>
  <body>

    <x-navbar/>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1 class="display-4">Welcome to <span style="font-weight: 800; color:khaki;">Recipie!</span></h1>
        <p class="lead">Discover, share, and add your favorite recipes all in one place.</p>
        <a href="/recipes/create" class="button-cta">Add your own Recipes!</a>
    </div>

    <!-- Features Section -->
    <div id="features" class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="feature-icon">
                    <i class="bi bi-book"></i>
                </div>
                <h3 class="section-title">Browse Recipes</h3>
                <p class="feature-description">Browse through a collection of diverse recipes and discover something new every day.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h3 class="section-title">Add Your Recipe</h3>
                <p class="feature-description">Submit your own recipes for others to enjoy, and share your culinary knowledge with the community.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon">
                    <i class="bi bi-search"></i>
                </div>
                <h3 class="section-title">Search & Filter</h3>
                <p class="feature-description">Search recipes based on ingredients, categories, and difficulty level to find the perfect dish for any occasion.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center py-4 bg-dark text-white">
        <p>&copy; 2024 Recipie | All rights reserved.</p>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>