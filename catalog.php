<?php

session_start();

require_once "db.php";

$id = $_SESSION['id'];

if ($id > 0) {

  echo '<script src="главная/script/login.js" defer></script>';

}

$goodsQuery = "SELECT * FROM goods"; 
$goods = $pdo->query($goodsQuery);

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SneakersBox</title>
    <link rel="stylesheet" href="css/mystyle.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="logo">
      <img src="logotipe.png" alt="" class="logotype" />
    </div>
    <center>
      <header class="header">
        <div class="container">
          <nav class="header__nav nav">
            <ul class="nav__list">
              <li class="nav__item">
                <a href="" class="user-cabinet">
                  <img src="img/<?=$_SESSION['avatar']?>" alt="" class="userImg">
                </a>
              </li>
              <li class="nav__item">
                <a href="index.php" class="nav__link">Главная</a>
              </li>
              <li class="nav__item">
                <a href="" class="nav__link">Поддержка</a>
              </li>
              <li class="nav__item">
                <a href="" class="nav__link">Социальные сети</a>
              </li>
            </ul>
            <div class="header__cart cart" tabindex="0">
              <div class="cart__text">
                Корзина
                <span class="cart__quantity">0</span>
              </div>
              <div class="cart-content">
                <ul class="cart-content__list" data-simplebar></ul>
                <div class="cart-content__bottom">
                  <div class="cart-content__fullprice">
                    <span>Итого:</span>
                    <span class="fullprice">568 789 ₽</span>
                  </div>
                  <div class="cart-content__btn btn">Перейти в корзину</div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
    </center>
    <main class="content">
      <div class="container">
        <div class="products-content grid-container">
          <ul class="products-grid">

          <?php foreach($goods as $item): ?>

            <?php 
            
              $goods_id = $item['id'];
              $goodsImgQuery = "SELECT img FROM goods_img where goods_id = '$goods_id'"; 
              $goodsImg = $pdo->query($goodsImgQuery);

            ?>

            <li class="products-grid__item">
              <article class="product">
                <a href="#" class="product__image">
                  <div class="product__switch image-switch">

                    <?php foreach($goodsImg as $img) :?>

                    <div class="image-switch__item">
                      <div class="image-switch__img">
                        <img src="img/<?=$img['img']?>" alt="Sneakers" />
                      </div>
                    </div>

                    <?php endforeach;?>

                  </div>
                  <ul
                    class="product__image-pagination image-pagination"
                    aria-hidden="true"
                  ></ul>
                </a>
                <h3 class="product__title">
                  <a href="#"><?=$item['name']?></a>
                </h3>
                <div class="product__price product-price">
                  <span class="product-price__current"><?=$item['price']?> ₽</span>
                </div>
                <button class="product__btn btn">Добавить в корзину</button>
              </article>
            </li>
           
          <?php endforeach;?>

          </ul>
        </div>
        <div class="height"></div>
      </div>
    </main>
    <script src="js/simplebar.js"></script>
    <script src="js/product.js"></script>
    <script src="js/fixed-block.js"></script>
    <script src="js/cart.js"></script>
  </body>
</html>