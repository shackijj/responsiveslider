<?
IncludeModuleLangFile(__FILE__);
class shackijj_responsiveslider extends CModule
{
	var $MODULE_ID = 'shackijj.responsiveslider';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;

	function __construct()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}

		$this->MODULE_NAME = GetMessage("RS_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("RS_MODULE_DESCRIPTION");
		$this->PARTNER_NAME = "Kirill Shatskiy";
	}

	function InstallFiles($arParams = array())
	{
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/shackijj.responsiveslider/install/components",
					 $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		return true;
	}

	function UnInstallFiles()
	{
		DeleteDirFilesEx("/bitrix/components/shackijj");
		return true;
	}

	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->InstallFiles();
		RegisterModule("shackijj.responsiveslider");
		$APPLICATION->IncludeAdminFile(GetMessage("RS_INSTALL_RESULT"), $DOCUMENT_ROOT."/bitrix/modules/shackijj.responsiveslider/install/step.php");
	}

	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->UnInstallFiles();
		UnRegisterModule("shackijj.responsiveslider");
		$APPLICATION->IncludeAdminFile(GetMessage("RS_UNINSTALL_RESULT"), $DOCUMENT_ROOT."/bitrix/modules/shackijj.responsiveslider/unstep.php");
	}
}
?>