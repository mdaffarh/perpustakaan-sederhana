<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Sistem Pengelolaan Perpustakaan SMKN 1 CIBINONG</title>
    <style>
      body {
        background-size: cover;
      }
    </style>
  </head>

  <body class="bg-primary bg-opacity-25">
    <div class="container py-5">
      <div class="row py-5">
        <div class="card border border-2 border-primary rounded-3 col-md-10 col-lg-4 mx-auto pt-5 p-3">
          <img src="assets/img/logo.png" alt="" class="img-fluid" />
          <h4 class="text-center word-break text-black">Sistem Pengelolaan Perpustakaan</h4>
          <form action="config/process.php?aksi=login" method="post" class="pt-1 pb-5">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="user" name="user" placeholder="Username" required />
              <label for="user">Username</label>
            </div>
            <div class="form-floating mb-4">
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required />
              <label for="pass">Password</label>
            </div>
            <button type="submit" class="btn btn-outline-primary w-100" name="login">Login</button>
            <hr class="my-4" />
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
