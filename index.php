<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Рекламно-информационное агентство</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
  <header class="header-wrapper">
    <div class="container header">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-4 mobile-menu-button">
          <hr class="mobile-menu-button-el">
          <hr class="mobile-menu-button-el">
          <hr class="mobile-menu-button-el">
        </div>
        <div class="col-lg-1 col-md-4 col-sm-4 col-4">
          <a href="#"><img src="img/logo1.svg" alt="лого"></a>
        </div>
        <div class="col-lg-8 menu-block-center">
          <nav>
            <ul class="menu-block">
              <li class="menu-item"><a class="menu-item-link-header" href="#">Услуги</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Портфолио</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Отзывы</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Вакансии</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Контакты</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-4 contacts-block">
          <span><a class="phone" href="tel:+78632431510">8(863)243-15-10</a></span>
          <span class="address">Ростов-на-Дону</span>
        </div>
      </div>
    </div>

    <div class="container-fluid mobile-menu-block">
      <div class="row mobile-menu-block-width">
        <div class="col">
          <nav class="mobile-menu">
            <img class="mobile-menu-close-btn" src="img/close.svg" alt="закрыть">
            <ul>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Услуги</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Портфолио</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Отзывы</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Вакансии</a></li>
              <li class="menu-item"><a class="menu-item-link-header" href="#">Контакты</a></li>
            </ul>
          </nav>
        </div>
        <div class="mobile-menu-contacts">
          <span class="address">Ростов-на-Дону</span>
          <span class="address">Ленина, 21</span>
          <span class="phone-wrapper"><a class="phone" href="tel:+78632431510">8(863)243-15-10</a></span>
        </div>
      </div>
    </div>
  </header>

  <main>
    <section>
      <div class="container-fluid first-block">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-8">
              <h1 class="title">Рекламно-информационное агентство</h1>
              <p class="desc">Будем рады, если Вы обратитесь в наше Агентство. Мы готовы предложить Вам передовые решения для продвижения Вашего бизнеса.</p>
              <form>
                <input class="call-back-input" type="text" placeholder="Номер телефона">
                <button class="btn call-back-btn">Обратный звонок</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <h3 class="news-block-title">Новости</h3>
      <div class="container news-block">
        <div class="row news-block-row">
          <div class="rectangle rectangle-red"></div>

          <?php
            $pdo = null;
            $pageNum = 1;
            if (isset($_GET['page'])) {
              $pageNum = (int)$_GET['page'];
            }
            $pagesCount = 0;
            $postCountOnPage = 3;
            try {
              $pdo = new PDO('mysql:host=localhost;dbname=ad-agency', 'root', '');
              $pdo->exec('SET NAMES "utf8"');
              $sql = 'SELECT * FROM articles';
              $result = $pdo->query($sql);  
              $skipPostCount = $postCountOnPage * ($pageNum - 1);
              $lastPostCount = $skipPostCount + $postCountOnPage;
              $postCount = 0;
                while ($row = $result->fetch()) {
                  // print_r($row);  
                  $postCount++;
                  if ($postCount <= $skipPostCount) {
                    continue;
                  }
                  if ($postCount > $lastPostCount) {
                      break;
                  }                           
                  echo '<div class="col-lg-4 col-md-12">';
                    echo '<div class="card">';
                      echo '<span class="news-date">' . $row['date'] . "</span>";
                      echo '<h5 class="news-title">' . $row['title'] . "</h5>";
                      echo '<button class="btn more-btn">Подробнее</button>';
                    echo '</div>';
                  echo '</div>';          
                }             
            } catch (PDOException $e) {
              echo 'Не удалось подключиться к базе данных';
            }
          ?>
          <div class="rectangle rectangle-purple"></div>
        </div>

        <?php
          
          try {
            $numPosts = $pdo->query('select count(*) from articles')->fetchColumn();
            $pagesCount = $numPosts / $postCountOnPage;
            if ($numPosts % $postCountOnPage != 0) {
              $pagesCount += 1;
            }
          } catch (PDOException $e) {
            echo 'Не удалось подключиться к базе данных';
          }
          function printPaginationOnPage ($pageNum, $pagesCount) {
            for ($i = 1; $i <= $pagesCount; $i++) {
              if ($pageNum == $i) {
                echo '<a href="?page=' . $i . '"><div class="dot active-dot"></div></a>';
              } else {
                echo '<a href="?page=' . $i . '"><div class="dot"></div></a>';
              }
            }
          }
        ?>
        
        <div class="dots">
        <?php
          printPaginationOnPage($pageNum, $pagesCount);
        ?>
        </div> 
        
      </div>  
    </section>
  </main>
  
  <footer>
    <div class="container-fluid footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col footer-logo-col">
            <a href="#"><img src="img/logo2.svg" alt="лого"></a>
          </div>
          <div class="col-lg-8 menu-block-center">
            <nav>
              <ul class="menu-block">
                <li class="menu-item menu-item-footer"><a class="menu-item-link-footer" href="#">Услуги</a></li>
                <li class="menu-item menu-item-footer"><a class="menu-item-link-footer" href="#">Портфолио</a></li>
                <li class="menu-item menu-item-footer"><a class="menu-item-link-footer" href="#">Отзывы</a></li>
                <li class="menu-item menu-item-footer"><a class="menu-item-link-footer" href="#">Вакансии</a></li>
                <li class="menu-item menu-item-footer"><a class="menu-item-link-footer" href="#">Контакты</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
  document.addEventListener('DOMContentLoaded', function(){
    // Toggle button
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
      var menu = document.querySelector('.mobile-menu-block')
      menu.classList.toggle('mobile-menu-block-visible')
    })

    // Close mobile menu
    document.querySelector('.mobile-menu-close-btn').addEventListener('click', function() {
      var menu = document.querySelector('.mobile-menu-block')
      menu.classList.remove('mobile-menu-block-visible')
    })

    // Close mobile menu after going to link
    var links = document.querySelectorAll('.mobile-menu .menu-item a') 
    for (var i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function() {
        var menu = document.querySelector('.mobile-menu-block')
        menu.classList.remove('mobile-menu-block-visible')
      })
    }
  })
  </script>
</body>
</html>