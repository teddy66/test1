<?php

/** @noinspection PhpIncludeInspection */
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

\CModule::IncludeModule("my.taskfirst");

/** @global $APPLICATION \CMain */

global $APPLICATION;
$APPLICATION->SetTitle(GetMessage('MY_TASKFIRST_TITLE'));

if ($APPLICATION->GetGroupRight("my.taskfirst") == "D") {
    $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    CUtil::JSPostUnescape();
}

/** @noinspection PhpIncludeInspection */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");


$arStat = \My\Taskfirst\DbTable::getList(array(
            'select' => array("*"),
            'order' => array("id"=>'asc')
        ));

include __DIR__ . '/includes/interface.php';

//include __DIR__ . '/includes/help.php';
//include __DIR__ . '/assets/assets.php';

/** @noinspection PhpIncludeInspection */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");