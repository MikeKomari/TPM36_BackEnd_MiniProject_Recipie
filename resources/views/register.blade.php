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

    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1">Please enter your name</label>
            <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" name="name" placeholder="Enter name">

            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">

            @error('password')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

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