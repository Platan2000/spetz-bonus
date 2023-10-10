<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule("sale");

    $userId = IntVal($_POST['id']);
    $budget = $_POST['budget'];

    $saveBudget = CSaleUserAccount::UpdateAccount(
        $userId,
        $budget,
        "RUB",
        false,
        0,
        '',
    );

    if($saveBudget) { 
       $response = CSaleUserAccount::GetByID($saveBudget);
       echo(json_encode($response));
    }


    

?>