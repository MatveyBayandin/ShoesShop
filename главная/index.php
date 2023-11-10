<?php

$get = $_GET['ids'] ?? 0;

if ($get > 0) {

  echo '<script src="script/login.js" defer></script>';

  require_once "db.php";
  $img = "SELECT * FROM users where id = '$get'";
  $result = $pdo->query($img);
  foreach ($result as $row) {
    $imgs = $row["photo"];
  }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <title>Website</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="fontawesome-free/css/all.min.css" />
</head>

<body>
  <div class="navigation">
    <div class="logo">
      <img src="logotipe.png" alt="" class="logotype" />
    </div>

    <div class="nav-menu">
      <ul class="menu">
        <li class="nav-item">
          <a href="/catalog.php" class="nav-link">Каталог</a>
        </li>
      </ul>
    </div>

    <div class="personal-item">
      <div class="auth">
        <div class="login">

          <a href="" class="user-cabinet">

            <img src="/img/<?php $imgs ?>" alt="" class="userImg">

          </a>

          <a href="#" class="auth-link signIn" id="signInBtn">
            <i class="fas fa-user-circle"></i>
            Войти
          </a>

          <script>

            function openAuth() {

              document.querySelector(".sign-block").classList.add("sign-block_active");

            }

            signInBtn.addEventListener("click", openAuth);

          </script>

        </div>
        <div class="car">
          <a href="#" class="auth-link"><i class="fas fa-shopping-cart"></i>Корзина</a>
        </div>
      </div>
    </div>
  </div>

  <div class="sign-block">
    <div class="sign">
      <a href="#" class="exit" id="exitBtn"><i class="fas fa-times"></i></a>

      <script>

        function openAuth() {

          document.querySelector(".sign-block").classList.remove("sign-block_active");

        }

        exitBtn.addEventListener("click", openAuth);

      </script>

      <h4 class="sign-head">Вход</h4>

      <form action="/auth.php" method="post">

        <div class="input-data">

          <input name="userEmail" type="text" placeholder="введите логин" />

        </div>

        <div class="input-data">

          <input name="userPass" type="password" placeholder="введите пароль" />

        </div>

        <div class="input-btn">

          <input type="submit" value="Войти" />

        </div>

      </form>

      <p class="notReg">Ещё не зарегистрированы?</p>
      <div class="input-btn notReg-btn">
        <input type="submit" value="Зарегистрироваться" />
      </div>
    </div>
  </div>

  <div class="main-information">
    <div class="text-inform">
      <h1><strong>SNEAKERSBOX</strong></h1>
      <p class="tagline">Заказывай кроссовки по самым выгодным ценам</p>
    </div>

    <div class="photo-model">
      <img src="model.png" alt="" />
    </div>
  </div>
  <div class="social-menu">
    <ul class="social-icon">
      <li>
        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
      </li>
      <li>
        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
      </li>
    </ul>
  </div>
  </div>
</body>

</html>