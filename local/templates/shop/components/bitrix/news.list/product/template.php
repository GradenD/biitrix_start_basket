<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<section class="product-area latest-product-area" data-aos="fade-up" data-aos-duration="1000">

    <div class="container">

        <div class="row">
          	<div class="col-md-8 col-lg-6 m-auto">
            	<div class="section-title text-center">
              		<h2 class="title">Latest product</h2>
             		<p>Our latest item collection of 2021</p>
            	</div>
          	</div>
        </div>

        <div class="row">
          	<div class="swiper-container product4-slider-container">
            	<div class="swiper-wrapper">
              		<div class="swiper-slide">

                		<!-- Start Product Item -->
						<?foreach($arResult["ITEMS"] as $arItem):?>

							<?
								$discont_proc = "";
								$discont_itog = "";

								$price = $arItem["PROPERTIES"]["PRICE_START"]["VALUE"];
								if($arItem["PROPERTIES"]["DISCONT"]["VALUE"] != ""){
									$discont_proc = $arItem["PROPERTIES"]["DISCONT"]["VALUE"];
									$discont_itog = $price - ($price / 100 * $discont_proc);
								}

								if($discont_itog != ""){
									$itog = $discont_itog;
									$old_price = $price;
								}else{
									$itog = $price;
									$old_price = "";
								}
							?>

                		<div class="product-item">
                  			<div class="product-thumb">

                    			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
									<?
										if($arItem["PREVIEW_PICTURE"]["SRC"] != ""){
											?>
												<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
											<?
										}else{
											?>
												<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/shop/1.png" alt="<?=$arItem["NAME"]?>">
											<?
										}
									?>
									<?
										if($arItem["PROPERTIES"]["DISCONT"]["VALUE"] != ""){
											?>
											    <div class="ribbons">
                        							<span class="ribbon ribbon-hot">Sale</span>
                        							<span class="ribbon ribbon-onsale align-right">-<?=$discont_proc?>%</span>
                      							</div>
											<?
										}
									?>
                    			</a>

                    			<div class="product-action">
									<?/*
                      				<a class="action-wishlist" href="shop-wishlist.html" title="Wishlist">
                        				<i class="ion-android-favorite-outline"></i>
                      				</a>
									*/?>
									
                      				<a class="action-quick-view" href="javascript:void(0);" title="Quick View">
                        				<i class="ion-ios-search-strong"></i>
                      				</a>

                      				<a class="action-cart btn-action-basket-item" data-id="<?=$arItem["ID"]?>" href="javascript:void(0);">
                        				<i class="fa fa-opencart"></i>
                      				</a>

                    			</div>

                  			</div>

                  			<div class="product-info">
                    			<h4 class="title">
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
								</h4>
                    			<div class="prices">
											<?
                                                if($old_price != ""){
                                                    ?>
                                                        <span class="price">$<?=$itog?></span>
                                                        <del class="price-old">$<?=$old_price?></del>
                                                    <?
                                                }else{
                                                    ?>
                                                        <span class="price">$<?=$itog?></span>
                                                    <?
                                                }
                                            ?>
                    			</div>
                  			</div>

                		</div>

						<?endforeach;?>
                		<!-- End Product Item -->
              
              		</div>
            	</div>
          	</div>
        </div>

    </div>

</section>
    <!--== End Product Area Wrapper ==-->