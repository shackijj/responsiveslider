<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$APPLICATION->AddHeadScript($componentPath.'/jssor.slider.min.js');
if ($this->StartResultCache($arParams["CACHE_TIME"])) {
	CModule::IncludeModule("fileman");
	CMedialib::Init();
	$arResult['COLLECTION_ITEMS'] = CMediaLibItem::GetList(array('arCollections' => array("0" => $arParams['SRC_COLLECTION'])));
	$this->IncludeComponentTemplate();
}
?>