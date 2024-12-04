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

        .steps-text{
            font-size: 8px;
        }
    </style>
  </head>
  <body>

    <x-navbar/>

    <!-- VIEW ALL RECIPES  -->
    <h2 class="display-4" style="text-align: center;">ALL RECIPIES</h2>
    <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px;">
      @foreach($recipes as $r)
    <div class="card" style="width: 18rem; grid-column: span 1;">
        <img class="card-img-top" src="{{ url('/private-file/' . $r->RecipeImage) }}" alt="{{$r->RecipeName}}">
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
            <p class="steps-text">Steps on How to Cook: {{$r->Steps}}</p>

            <a href="{{  route('getEditRecipePage',$r->id) }}" class="btn btn-primary">Edit</a>
           
            <form action="{{ route('deleteRecipe', $r->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
        </div>
    </div>
    @endforeach
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