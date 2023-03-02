<?session_start();?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	use \Bitrix\Main\Page\Asset;
	use \Bitrix\Main\UI\Extension;
	use Bitrix\Main\Loader;
	CModule::IncludeModule('iblock');
   // $_SESSION['order'] = array();
    if($_SESSION['order'] == ""){
        $_SESSION['order'] = array();
    }
    $order = $_SESSION['order'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,400i,500,600,700" rel="stylesheet">

    <?
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/bootstrap.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/themify-icons.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/font-awesome.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/ionicons.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/animate.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/aos.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/jquery.fancybox.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/slicknav.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/swiper.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");
    ?>

    
	<?
		$APPLICATION->ShowHead();
	?>

</head>

<body>
    <div class="wrapper home-default-wrapper">
<?
	$APPLICATION->ShowPanel();
?>

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  <header class="header-area header-default sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-5 col-sm-3 col-md-3 col-lg-2 pr-0">
          <div class="header-logo-area">
            <a href="/">
              <img class="logo-main" src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt="Logo" />
              <img class="logo-light" src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-7 col-sm-9 col-md-9 col-lg-10">
          <div class="header-align">
            <div class="header-navigation-area">
              <ul class="main-menu nav justify-content-center">
                <li><a href="/">Главная</a></li>
                <li><a href="catalog">Проекты</a></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Новости</a></li>
                <li><a href="#">Клиентам</a></li>
                <li><a href="#">Контакты</a></li>
              </ul>
            </div>
            <div class="header-action-area">
            <div class="header-action-cart">
                <a class="cart-icon" href="/basket/">
                  <span class="cart-count">0</span>
                  <i class="ti-shopping-cart"></i>
                </a>
                <div id="drop-basket" class="cart-dropdown-menu"></div>
              </div>
              <button class="btn-menu d-lg-none">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->
  
  <main class="main-content">