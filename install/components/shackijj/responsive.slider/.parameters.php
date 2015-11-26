<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule("fileman");
CMedialib::Init();
$arTypes = CMediaLibCollection::GetList();
foreach ($arTypes as $type) {
	$arParams[$type['ID']] = $type['NAME'];
}
 
$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(

		"SRC_COLLECTION" => array(
			"PARENT" => "BASE",
			"NAME" => "��������� ���������������",
			"TYPE" => "LIST",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"CONTAINER_WIDTH" => array(
			"PARENT" => "BASE",
			"NAME" => "������ ���������� (%)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"MAX_WIDTH" => array(
			"PARENT" => "BASE",
			"NAME" => "������������ ������(px)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"MIN_WIDTH" => array(
			"PARENT" => "BASE",
			"NAME" => "����������� ������(px)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"SCALE_DELAY" => array(
			"PARENT" => "BASE",
			"NAME" => "�������� ������������ (��)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"AUTOPLAY_DELAY" => array(
			"PARENT" => "BASE",
			"NAME" => "�������� �������� � ���������� ������ (��)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
			"DEFAULT" => "3000"
		),
		
		"SLIDE_HEIGHT" => array(
			"PARENT" => "BASE",
			"NAME" => "����������� ������ ������ (px)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"SLIDE_WIDTH" => array(
			"PARENT" => "BASE",
			"NAME" => "����������� ������ ������ (px)",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
		
		"CACHE_TIME" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => "CACHE",
			"TYPE" => "STRING",
			"VALUES" => $arParams,
			"MULTIPLE" => "N",
			"REFRESH" => "N",
		),
	),
);
?>