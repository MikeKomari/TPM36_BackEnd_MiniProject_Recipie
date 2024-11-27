<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Recipie</title>

  </head>
  <body>

    <x-navbar/>

    <!-- Form -->
    <h1 class="mb-4">Add New Recipe</h1>
    <form action="{{ route('getStoreRecipes') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="RecipeName" class="form-label">Recipe Name</label>
        <input type="text" class="form-control" id="RecipeName" name="RecipeName" required>
    </div>
    
    <div class="mb-3">
        <label for="CategoryId" class="form-label">Category</label>
        <select class="form-select" id="CategoryId" name="CategoryId" required>
            @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->CategoryType }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="Ingredients" class="form-label">Ingredients</label>
        <textarea class="form-control" id="Ingredients" name="Ingredients" rows="3" required></textarea>
    </div>
    
    <div class="mb-3">
        <label for="Steps" class="form-label">Steps</label>
        <textarea class="form-control" id="Steps" name="Steps" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-success">Save Recipe</button>
    </form>

    <h2 class="display-4" style="text-align: center; margin-top: 20rem;">ALL RECIPIES</h2>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; place-items: center;">
      @foreach($recipes as $r)
    <div class="card" style="width: 18rem; height:18rem; grid-column: span 1;">
        <img class="card-img-top" src="" alt="{{$r->RecipeName}}">
        <div class="card-body">
            <h3 class="card-title">{{$r->id}}. {{$r->RecipeName}}</h3>
            <!-- Unreadable for now -->
            <h4 class="card-title">
              @if($r->CategoryId == 1)
                        Appetizer
                    @elseif($r->CategoryId == 2)
                        Main Dish
                    @elseif($r->CategoryId == 3)
                        Dessert
                    @else
                        Unknown Category
                    @endif
            </h4>
            <h5 class="card-text">Recipe Ingredients: {{ $r->Ingredients}}</h5>
            <p>Steps on How to Cook {{$r->Steps}}</p>
        </div>
    </div>
    @endforeach
  </div>

    <!-- Footer Section -->
    <div class="text-center mt-20 py-4 bg-dark text-white">
        <p>&copy; 2024 Recipie | All rights reserved.</p>
    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>