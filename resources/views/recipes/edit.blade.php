<!doctype html>
<html lang="en">
  <head>
    <!--  meta tags -->
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

        .steps-text{
            font-size: 8px;
        }
    </style>
  </head>
  <body>

    <x-navbar/>

    <!-- Form -->
    <h1 class="mb-4 text-center">Edit {{$recipe->RecipeName}}</h1>
    <form action="{{ route('editRecipe', $recipe->id) }}" method="POST" style="display: flex; align-items:center; justify-content:center; flex-direction:column; text-align:center;" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="RecipeName" class="form-label">Recipe Name</label>
        <input type="text" class="form-control" id="RecipeName" name="RecipeName" >

        @error('RecipeName')
          <p style="color: red;">{{ $message }}</p>
      @enderror
    </div>
    
    <div class="mb-3">
        <label for="CategoryId" class="form-label">Category</label>
        <select class="form-select" id="CategoryId" name="CategoryId" >
            @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->CategoryType }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="Ingredients" class="form-label">Ingredients</label>
        <textarea class="form-control" id="Ingredients" name="Ingredients" rows="3" ></textarea>
    </div>
    
    <div class="mb-3">
        <label for="Steps" class="form-label">Steps</label>
        <textarea class="form-control" id="Steps" name="Steps" rows="3" ></textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="RecipeImage">
    </div>

    <button type="submit" class="btn btn-success">Save Recipe</button>
    </form>

    
  </div>

    <!-- Footer Section -->
    <div class="text-center py-4 bg-dark text-white">
        <p>&copy; 2024 Recipie | All rights reserved.</p>
    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>