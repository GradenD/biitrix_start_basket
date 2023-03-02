<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule('iblock');
?>


<?
    $order = new Order();

    $basket_arr = $order->basket_arr();

    if(!empty($basket_arr)){

        $sum = $order->basket_sum();

        ?>
            <div class="minicart-action">

                <?
                    foreach ($basket_arr as $key => $value) {
                        $sum_item = $value["ITOG"] * $value["QANTY"];
                        ?>
                            <div data-key="<?=$key?>" class="minicart-item">
                                <div class="thumb">
                                    <img src="<?=$value["IMG"]?>" alt="<?=$value["NAME"]?>">
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="<?=$value["URL"]?>"><?=$value["NAME"]?></a></h4>
                                    <h6 class="nrbQ"><?=$value["QANTY"]?></h6>
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
                                </div>
                            </div>
                        <?

                    }
                ?>

            </div>

            <div class="shopping-cart-total">
                <h4>Итого <span>$<?=$sum?></span></h4>
            </div>

            <div class="shopping-cart-btn">
                <a class="btn-theme m-0" href="/basket/">Оформить заказ</a>
                <a class="btn-theme m-0" href="/catalog/">Каталог</a>
            </div>

        <?

    }else{
        ?>
            <div class="empty-basket d-flex">
                <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/cart_empty.svg">
                <div class="cart-empty__info d-flex">
			        <div class="title">Ваша корзина пуста</div>
                    <p>
                        Исправить это просто: выберите в каталоге интересующий 
                        <br>
                        товар и нажмите кнопку «В корзину». 
                    </p>

                    <a class="btn btn-default round-ignore btn-lg btn-theme" href="/catalog/">
                        <span>Перейти в каталог</span>
                    </a>		
                </div>
            </div>
        <?
    }
?>