﻿<?php   
    include "app/controllers/topics.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
        $goods = seacrhInTitileAndContent($_POST['search-term'], 'goods', 'topics');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Online Store</title>
</head>
<body>

<?php include("app/include/header.php"); ?>


<!-- блок main-->
<div class="container">
			<div class="content row">
<div class="main-content col-md-9 col-12">
					<h2>Результаты поиска</h2>
					<section class="product-box">
				<div class="row">
				<?php foreach ($goods as $good): ?>
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-4 product-parent">
                    <div class="product">
										<div class="img col-12 col-md-20">
                        <img src="<?="http://localhost/OnlineStore/" . 'assets/images/products/' . $good['img'] ?>" height="300" width="300" alt="<?=$good['title']?>" class="img-thumbnail">
                    </div>
                        <h4>
                            <a href="<?="http://localhost/OnlineStore/" . 'single.php?good=' . $good['id'];?>"><?=substr($good['title'], 0, 80)  ?></a>
                        </h4>
												<h3>
                            <a href="<?="http://localhost/OnlineStore/" . 'single.php?good=' . $good['id'];?>"><?=substr($good['price'], 0, 80) . ' р.' ?></a>
                        </h3>
                        <i> <?=$good['name'];?></i>
                       
                        <p class="preview-text">
                            <?=mb_substr($good['content'], 0, 55, 'UTF-8') . '...' ?>
                        </p>

												<button class="buy-btn">Купить</button>
                    </div>
                </div>
        <?php endforeach; ?>
</div></section>
				</div>	
<!-- sidebar Content -->
				<div class="sidebar col-md-3 col-12">
					<div class="section search">
						<h3>Поиск</h3>
						<form action="search.php" method="post">
							<input
								type="text"
								name="search-term"
								class="text-input"
								placeholder="Введите искомое слово..."
							/>
						</form>
					</div>

					<div class="section topics">
						<h3>Категории</h3>
						<ul>
							<?php foreach ($topics as $key => $topic): ?>
                    <li>
                        <a href="<?="http://localhost/OnlineStore/" . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a>
                    </li>
                    <?php endforeach; ?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
<!-- блок main END-->
<!-- footer -->
<?php include("app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>