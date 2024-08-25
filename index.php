<?php
    
    include "app/controllers/topics.php";
		$goods = selectAllFromGoodsWithTopicsOnIndex('goods', 'topics');
	
   # $page = isset($_GET['page']) ? $_GET['page']: 1;
    #$limit = 2;
    #$offset = $limit * ($page - 1);
   # $total_pages = round(countRow('posts') / $limit, 0);

   # $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
   # $topTopic = selectTopTopicFromPostsOnIndex('posts');


?>


<!DOCTYPE html>

<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous"
		/>

		<!-- Font Awesome (иконки)-->
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
			crossorigin="anonymous"
		/>

		<!-- Custom Styling (шрифты от Google)-->
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link
			href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
			rel="stylesheet"
		/>

		<title>Online Store</title>
	</head>

	<body>
		<!--header-->
		<?php include("app/include/header.php"); ?>
		<!-- header-->

		<!-- блок карусели START-->
		<div class="container">
			<div class="row">
				<h2 class="slider-title">Скидки и акции</h2>
			</div>
			<div
				id="carouselExampleCaptions"
				class="carousel slide"
				data-bs-ride="carousel"
			>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="assets/images/170.jpg" class="d-block w-100" alt="..." />
					</div>
					<div class="carousel-item">
						<img
							src="assets/images/cyber.jpg"
							class="d-block w-100"
							alt="..."
						/>
					</div>
					<div class="carousel-item">
						<img
							src="assets/images/delivery.jpg"
							class="d-block w-100"
							alt="..."
						/>
					</div>
				</div>
				<button
					class="carousel-control-prev"
					type="button"
					data-bs-target="#carouselExampleCaptions"
					data-bs-slide="prev"
				>
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button
					class="carousel-control-next"
					type="button"
					data-bs-target="#carouselExampleCaptions"
					data-bs-slide="next"
				>
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
		<!-- блок карусели END-->

		<!-- блок main-->
		<div class="container">
			<div class="content row">
				<!-- Main Content -->
				<div class="main-content col-md-9 col-12">
					<h2>Новинки для Вас</h2>
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
		<!-- footer -->


		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous"
		></script>

	</body>
</html>
