<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");
?>

    <!--== Start Hero Area Wrapper ==-->
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "URL",
			1 => "TEXT",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "slider"
	),
	false
);?>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"product", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "PRICE_START",
			1 => "DISCONT",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "product"
	),
	false
);?>

    <!--== Start Offer Area Wrapper ==-->
    <section class="offer-area" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="single-offer">
              <div class="thumb">
                <a href="shop-single-product.html">
                  <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/shop/offer-1.webp" alt="Alan-Shop">
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single-offer">
              <div class="thumb">
                <a href="shop-single-product.html">
                  <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/shop/offer-2.webp" alt="Alan-Shop">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Offer Area Wrapper ==-->

    <!--== Start Featured Product Area Wrapper ==-->
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"product_index", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "8",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PRICE_START",
			2 => "DISCONT",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "product_index"
	),
	false
);?>
    <!--== End Featured Product Area Wrapper ==-->

    <!--== Start Newsletter Area Wrapper ==-->
    <section class="newsletter-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 m-auto" data-aos="fade-up" data-aos-duration="1000">
            <div class="section-title text-center">
              <h2 class="title">Присоединяйтесь к нашей рассылке</h2>
              <p>Вы никогда не пропустите наши интересные новости, присоединившись к нашей рассылке.</p>
            </div>
            <form class="input-btn-group">
              <input class="form-control" type="text" placeholder="Введите свою почту">
              <button class="btn btn-theme btn-black" type="button">Подписаться</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--== End Newsletter Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-default-area">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-6 m-auto" data-aos="fade-up" data-aos-duration="1000">
            <div class="section-title text-center">
              <h2 class="title">Новости</h2>
              <p>Следите за нашими новостями</p>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="col-md-6">
            <!--== Start Blog Post Item ==-->
            <div class="post-item mb-md-150 mb-sm-30">
              <div class="thumb">
                <a href="blog-details.html"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/blog/1.webp" alt="Alan-Blog"></a>
              </div>
              <div class="content">
                <div class="inner-content">
                  <h4 class="title">
                    <a href="blog-details.html">Строительство домов «под ключ»</a>
                  </h4>
                  <div class="meta">
                    <a class="post-date" href="blog.html">10.02.2023</a>
                    <span>/</span>
                    <a class="post-author" href="blog.html">Администратор</a>
                  </div>
                  <p>Строительство домов «под ключ» - это одно из ключевых направлений нашей компании. Мы предлагаем нашим клиентам полный комплекс услуг, начиная от проектирования и заканчивая сдачей готового дома в эксплуатацию.</p>
                  <a class="btn-blog" href="blog-details.html">Подробнее</a>
                </div>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
          <div class="col-md-6">
            <!--== Start Blog Post Item ==-->
            <div class="post-item mb-md-150 mb-sm-30">
              <div class="thumb">
                <a href="blog-details.html"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/blog/2.webp" alt="Alan-Blog"></a>
              </div>
              <div class="content">
                <div class="inner-content">
                  <h4 class="title">
                    <a href="blog-details.html">Проектирование и прокладка газопровода</a>
                  </h4>
                  <div class="meta">
                    <a class="post-date" href="blog.html">11.02.2023</a>
                    <span>/</span>
                    <a class="post-author" href="blog.html">Администратор</a>
                  </div>
                  <p>Прокладка газопровода - это один из самых важных этапов строительства. Наша компания использует только высококачественные материалы и оборудование, чтобы обеспечить надежность и безопасность установки газопровода. Мы также обеспечиваем строгое соблюдение всех норм и правил, установленных соответствующими органами, что позволяет предотвратить возможные неприятные ситуации и обеспечить безопасность для жителей и окружающей среды.</p>
                  <a class="btn-blog" href="blog-details.html">Подробнее</a>
                </div>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>