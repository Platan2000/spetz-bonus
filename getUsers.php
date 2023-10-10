
<?php

    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule("sale");

    // получаем id пользователя
    $inputValue = $_POST['value'];
    // var_dump($inputValue);
    // die();
    $usersID = [];
    $response = [];

    $rsUsers = \Bitrix\Main\UserTable::getList([
        'select' => [
            'ID',
        ],

        'filter' => [
            [
                'LOGIC' => 'OR',
                'NAME' => $inputValue,
                'LAST_NAME' => $inputValue,
                'EMAIL' => $inputValue,
                'PERSONAL_PHONE' => $inputValue,
            ],
        ],

        'order' => ['ID' => 'asc'],
    ]);

    while ($res = $rsUsers->fetch())
    {
        $id = $res['ID'];
        // получаем количество бонусов 
        $userBudget = CSaleUserAccount::GetList(
            array(),
            array("USER_ID" => $id),
            false,
            false,
            array("CURRENT_BUDGET"),
        )->fetch();

        // получаем личные данные пользователя

        $user = CUser::GetByID($id)->Fetch();
        $name = $user['NAME'] ?? '';
        $lastName = $user['LAST_NAME'] ?? '';
        $userInfo = array(
            'id' => $user['ID'],
            'fullname' => $lastName . ' ' . $name,
            'email' => $user['EMAIL'] ?? false,
            // 'phone' => $user[''],
            'phone' => $user['PERSONAL_PHONE'] ?? $user['WORK_PHONE'] ?? false,
            'budget' => $userBudget["CURRENT_BUDGET"] ?? false,
        );
        
        $response[] = $userInfo;
    
    }
    echo(json_encode($response)); 

?>
