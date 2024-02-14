<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Signin Template · Bootstrap v5.1</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="<?= ROOT ?>/assets/css/signin.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">


  <main class="form-signin">
    <form method="post">
      <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input value="<?= old_value('email') ?>" type="email" name="email" class="form-control" id="floatingInput"
          placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        <div>
          <?= $user->getErrors('email') ?>
        </div>
      </div>
      <div class="form-floating">
        <input value="<?= old_value('username') ?>" type="text" name="username" class="form-control" id="floatingPassword" placeholder="Username">
        <label for="floatingPassword">UserName</label>
        <div>
          <?= $user->getErrors('username') ?>
        </div>
      </div>
      <div class="form-floating">
        <input value="<?= old_value('password') ?>" type="password" name="password" class="form-control"
          id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        <div>
          <?= $user->getErrors('password') ?>
        </div>
      </div>

     
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
      <div>
        <a href="<?= ROOT ?>/user">Users</a>
      </div>
    </form>
  </main>



</body>

</html>