<!--== Start Page Title Area ==-->
<section class="page-title-area" data-bg-img="<?=SITE_TEMPLATE_PATH?>/assets/img/photos/bg-page-title.webp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title text-white">Ваша корзина</h2>
                    <div class="bread-crumbs">
                        <a href="index.html">Главная<span class="breadcrumb-sep">/</span></a>
                        <span class="active">Корзина</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Page Title Area ==-->

 <!--== Start Cart Area Wrapper ==-->
 <section class="cart-page-area">
    <div class="container pt-100 pb-100">
        <div class="row">

            <div class="col-12">
                <div class="cart-table table-responsive">




                    <table>
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Изображение</th>
                                <th class="pro-title">Продукт</th>
                                <th class="pro-price">Цена</th>
                                <th class="pro-quantity">Количество</th>
                                <th class="pro-subtotal">Итог</th>
                                <th class="pro-remove">Удалить</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?
                                foreach ($basket_arr as $key => $value) {
                                    $sum_item = $value["ITOG"] * $value["QANTY"];
                                    ?>
                                        <tr class="order-item order-item-<?=$key?>" data-id="<?=$key?>" data-price="<?=$value["ITOG"]?>">
                                            <td class="pro-thumbnail">
                                                <a href="<?=$value["URL"]?>">
                                                    <img src="<?=$value["IMG"]?>" alt="<?=$value["NAME"]?>">
                                                </a>
                                            </td>
                                            <td class="pro-title">
                                                <h4>
                                                    <a href="<?=$value["URL"]?>"><?=$value["NAME"]?></a>
                                                </h4>
                                            </td>
                                            <td class="pro-price">
                                                <div class="prices">
                                                    <?
                                                        if($value["OLD_PRICE"] != ""){
                                                            ?>
                                                                <span class="price">$<?=$value["ITOG"]?></span>
                                                                <del class="price-old">$<?=$value["OLD_PRICE"]?></del>
                                                            <?
                                                        }else{
                                                            ?>
                                                                <span class="price">$<?=$value["ITOG"]?></span>
                                                            <?
                                                        }
                                                    ?>
                                                </div>
                                            </td>
                                            <td class="pro-quantity">
                                                <div class="quick-product-action">
                                                    <div class="pro-qty">
                                                        <input type="text" class="order-quanty" title="Quantity" value="<?=$value["QANTY"]?>" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal">
                                                <span>$<?=$sum_item?></span>
                                            </td>
                                            <td class="pro-remove">
                                                <a href="javascript:void(0);" class="remove-item">×</a>
                                            </td>
                                        </tr>
                                    <?
                                }
                            ?>

                        </tbody>
                    </table>



                </div>
            </div>

            <div class="col-12">
                <div class="cart-buttons">
                    <a class="btn-shopping continue-shopping" href="/catalog/">Каталог</a>
                    <a class="btn-shopping clear-order" href="javascript:void(0);">Очистить корзину</a>
                </div>
            </div>

            <div class="col-12">
                <div class="cart-payment">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="culculate-shipping">
                                <h3 class="title">Личные данные</h3>
                                <form id="order-confirm" action="javascript:void(0);" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="EMAIL" id="ORDER_EMAIL" name="EMAIL" placeholder="E-mail" required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="TELEPHONE" id="ORDER_TELEPHONE" name="TELEPHONE" placeholder="Телефон" maxlength="18" required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="TEXT" id="ORDER_NAME" name="NAME" placeholder="Ваше имя" required="">
                                    </div>
                                    <input id="submit_register_PAGE" type="submit" class="d-none">
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="cart-subtotal">
                                <h3 class="title">Итого</h3>
                                <table>
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Товаров на:</th>
                                            <td>
                                                <span id="itogo-order" class="price"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="btn-theme order-confirm" href="javascript:void(0);">Оформить заказ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Cart Area Wrapper ==-->

<div id="order-action"></div>

<script>
    jQuery(document).ready(function($) {

        $("#close-form-popup3").click(function () {
			location.reload();
		});

        $("#dark-fon2").click(function () {
			location.reload();
		});

        $(".clear-order").click(function () {
            $.ajax({
				type: "POST",
				url: "/include/order/clear_order.php",
				data: $(this).serialize(),
				success: function (data) {
                    $("#order-action").html(data);
                    location.reload();
				},
			});
        });

        $("#order-confirm").submit(function () {
            $.ajax({
				type: "POST",
				url: "/include/order/order_confirm.php",
				data: $(this).serialize(),
				success: function (data) {
                    if(data == 1){
                        $("#dark-fon2").addClass("dark-active");
                        $("body").addClass("overlow-hidden");
                        $("#feedback-popup3").addClass("popup-form-active");
                    }else{
                        $("#order-action").html(data);
                    }
				},
			});
        });

        function sum_itog(){
            $.ajax({
				type: "POST",
				url: "/include/order/sum_itog.php",
				data: {

				},
				success: function (data) {
					$("#itogo-order").html(data);
				},
			});
        }

        $(".order-confirm").click(function () {
            $("#submit_register_PAGE").click();
        });

        $(".remove-item").click(function () {
            var id = $(this).parents(".order-item").data("id");
            $.ajax({
				type: "POST",
				url: "/include/order/remove.php",
				data: {
					id: id,
				},
				success: function (data) {
					$("#order-action").html(data);
                    $(".order-item-"+id).remove();
                    sum_itog();
				},
			});
        });

        function quanty(id, q){
            $.ajax({
				type: "POST",
				url: "/include/order/quanty.php",
				data: {
					id: id,
                    q: q,
				},
				success: function (data) {
					$("#order-action").html(data);
                    var price = $(".order-item-"+id).data("price");
                    var sum = price * q;
                    $(".order-item-"+id).find(".pro-subtotal span").html("$"+sum);
                    sum_itog();
				},
			});
        }

        $(".order-quanty").change(function() {
            console.log("change");
            var id = $(this).parents(".order-item").data("id");
            var q = $(this).val();

            quanty(id, q);
        });

        $(".qty-btn").click(function() {
            console.log("change-click");
            var id = $(this).parents(".order-item").data("id");
            var q = $(this).parents(".order-item").find(".order-quanty").val();

            quanty(id, q);
        });

        sum_itog();

    });
</script>