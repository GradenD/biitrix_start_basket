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


<section class="home-slider-area slider-default">
    <div class="home-slider-content">
        <div class="swiper-container home-slider-container">
          	<div class="swiper-wrapper">

				<?foreach($arResult["ITEMS"] as $arItem):?>

					<?
						if($arItem["PREVIEW_PICTURE"]["SRC"] != ""){
							$img = $arItem["PREVIEW_PICTURE"]["SRC"];
						}else{
							$img = SITE_TEMPLATE_PATH . "/assets/img/slider/1.png";
						}
					?>

            	<div class="swiper-slide">
              		<div class="home-slider-item bg-img-cover" data-bg-img="<?=$img?>">
                		<div class="slider-content-area">
                  			<div class="container">
                    			<div class="row">
                      				<div class="col-12">
                        				<div class="content m-auto">
                          					<div class="inner-content">
                            					<div class="tittle-wrp">
                              						<h2><?=$arItem["NAME"]?></h2>
                            					</div>
												<?if($arItem["PROPERTIES"]["TEXT"]["VALUE"] != "" && $arItem["PROPERTIES"]["URL"]["VALUE"] != ""){?>
                            						<div class="btn-wrp">
                              							<a href="<?=$arItem["PROPERTIES"]["URL"]["VALUE"]?>" class="btn-link"><?=$arItem["PROPERTIES"]["TEXT"]["VALUE"]?></a>
                            						</div>
												<?}?>
                          					</div>
                        				</div>
                      				</div>
                    			</div>
                  			</div>
                		</div>
              		</div>
            	</div>   
				<?endforeach;?>
				
				
          	</div>
        </div>
    </div>
</section>