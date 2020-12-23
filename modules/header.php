<header>
    <div class="header-title navbar-light bg-light">
        <div class="header-title_wrap">
            <img class="header-title_wrap-item header-title_wrap-item_image" src="img/logo.png" alt="Logo">
            <a href="/" class="btn">
                <p class="header-title_wrap-item">Туристическое агентство "Dream Tour"</p>
            </a>
            <img class="header-title_wrap-item header-title_wrap-item_image" src="img/logo.png" alt="Logo">
        </div>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <form method="GET" action="search.php" class="form-inline my-2 my-lg-0 col-3 ml-5">
            <input name="query" class="form-control mr-sm-2" type="search" placeholder="Введите куда хотите съездить" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать</button>
        </form>
        <div class="col-2">
            <a class="btn pt-3">
                <p>Отзывы</p>
            </a>
        </div>
        <div class="col-2">
            <a href="tours.php" class="btn pt-3">
                <p>Страны</p>
            </a>
        </div>
        <div class="col-2">
            <a href="/tours.php" class="btn pt-3">
                <p>Онлайн-бронирование</p>
            </a>
        </div>
        <div class="col-2">
            <a href="/auth.php" class="btn pt-3">
                <p><?= isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'Войти' ?></p>
            </a>
        </div>
    </nav>
</header>