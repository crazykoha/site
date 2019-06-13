<?php

use classes\DBConnection;

include 'classes/Order.php';
include 'classes/User.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Донбасс InTime</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div class="grid top">
		<a href="#" class="logo">
			<span>Донбасс</span>
			<span>InTime</span>
		</a>
		<ul class="menu">
			<li><a href="#!">Главная</a></li>
			<li><a href="#!">Узнать стоимость</a></li>
			<li><a href="#!">Заказать доставку</a></li>
			<li><a href="#!">Помощь</a></li>
		</ul>
		<div class="auth">
            <?php if($user=\classes\User::getCurrentUser()):?>
            <?=$user->first_name?>
            <?php endif ?>
		</div>
		<a href="#!" class="lang"><img src="images/rus.png" alt=""></a>
	</div>
	<div class="grid main">

		<div class="content">
			<h1 class="text-center" style="text-align: center;">Быстро и доступно!</h1>
			<p class="text-center" style="font-size: 25px;">Закажем и доставим Вашу посылку из любого интернет-магазина в любой стране мира.</p>
			<button class="btn jsOpenDelivery">Заказать доставку</button>
			<p class="text-center" style="font-size: 21px; margin-top: 70px; margin-bottom: 0">Закажи сейчас и получи промокод на скидку со следующей покупкой.</p>
		</div>
		<div class="right-sidebar">
			<div class="markets">
				<h3>Топ 5 магазинов</h3>
				<ul>
					<li><img src="images/amazon.png"><span>Amazon</span></li>
					<li><img src="images/ebay.png"><span>Ebay</span></li>
					<li><img src="images/saturn.png"><span>Saturn</span></li>
					<li><img src="images/mediamarket.png"><span>Mediamarket</span></li>
					<li><img src="images/6pm.png"><span>6pm</span></li>
				</ul>
			</div>
			<div class="news">
				<h3>Новости сайта</h3>
				<ul>
					<li>В Европе открылся еще один склад, теперь посылки будут доставляться еще быстрее!</li>
					<li>Мы успешно доставили первую
					тысячу посылок!</li>
					<li>Мы открылись!</li>
				</ul>
			</div>
		</div>
		<div class="tracking">
			<form class="form" action="#">
				<input type="number" class="form__input" name="tracking_id" placeholder="Идентификатор отслеживания посылок">
				<input type="submit" class="form__btn" name="submit" value="Отследить">
			</form>
		</div>
	</div>
	<div class="modal jsShowModal">
		<div class="modal__overlay jsCloseModal"></div>
		<form method="post" action="form_order.php" class="modal__form">
			<h3>Заказать товар</h3>
			<input type="text" name="link" placeholder="Ссылка на товар">
			<input type="number" name="sum" placeholder="Количество товара">
			<input type="text" name="name" placeholder="Имя">
			<input type="text" name="lastName" placeholder="Фамилия">
			<input type="tel" name="number" placeholder="Номер телефона">
			<input type="email" name="email" placeholder="E-mail">
			<input type="text" name="passport" placeholder="Номер паспорта">
			<button type="submit">Заказать</button>
		</form>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>