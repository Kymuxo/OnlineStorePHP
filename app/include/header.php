<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo "http://localhost/OnlineStore/" ?>">Online Store</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo "http://localhost/OnlineStore/" ?>">Главная</a> </li>
                    <li><a href="<?php echo "http://localhost/OnlineStore/" ?>">О нас</a> </li>
                    <li><a href="<?php echo "http://localhost/OnlineStore/" ?>">Корзина</a> </li>

                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['userroot']): ?>
                                    <li><a href="<?php echo "http://localhost/OnlineStore/" . "admin/users/index.php"; ?>">Админ панель</a> </li>
                                <?php endif; ?>
                                <li><a href="<?php echo "http://localhost/OnlineStore/" . "logout.php"; ?>">Выход</a> </li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo "http://localhost/OnlineStore/" . "log.php"; ?>">
                                <i class="fa fa-user"></i>
                                Войти
                            </a>
                            <ul>
                                <li><a href="<?php echo "http://localhost/OnlineStore/" . "reg.php"; ?>">Регистрация</a> </li>
                            </ul>
                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
