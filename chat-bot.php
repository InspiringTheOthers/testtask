<?php

/*$appsConfig = array();

if($_REQUEST['event'] == 'ONIMBOTMESSAGEADD'){
    if(!isset($appsConfig[$_REQUEST['auth']['application_token']])){
        return false;
    }
}
else{
    return false;
}*/

$event = isset($_REQUEST['event']) ? $_REQUEST : '';

switch($event){
    case 'ONAPPINSTALL':
        /*$result = restCommand('imbot.register', Array(
            'CODE' => 'itrbot',
            'TYPE' => 'O',
            'EVENT_MESSAGE_ADD' => $handlerBackUrl,
            'EVENT_WELCOME_MESSAGE' => $handlerBackUrl,
            'EVENT_BOT_DELETE' => $handlerBackUrl,
            'OPENLINE' => 'O',
            'PROPERTIES' => Array(
                'NAME' => 'ITR Bot for Open Channels #'.(count($appsConfig)+1),
                'WORK_POSITION' => "Get ITR menu for you open channel",
                'COLOR' => 'RED',
            )
        ), $_REQUEST["auth"]);*/
        $handlerBackUrl = ;
        $bx24 = new bx24($_REQUEST['auth']['application_token'], $_REQUEST['auth']);
        break;
    case 'ONIMJOINCHAT':
        
        break;
    case 'ONIMBOTMESSAGEADD':
        /*$result = restCommand('imbot.message.add', Array(
            'BOT_ID' => 39, // Идентификатор чат-бота, от которого идет запрос, можно не указывать, если чат-бот всего один
            'DIALOG_ID' => 1, // Идентификатор диалога, это либо USER_ID пользователя, либо chatXX - где XX идентификатор чата, передается в событии ONIMBOTMESSAGEADD и ONIMJOINCHAT
            'MESSAGE' => 'answer text', // Тест сообщения
            'ATTACH' => '', // Вложение, необязательное поле
            'KEYBOARD' => '', // Клавиатура, необязательное поле
            'MENU' => '', // Контекстное меню, необязательное поле
            'SYSTEM' => 'N', // Отображать сообщения в виде системного сообщения, необязательное поле, по умолчанию 'N'
            'URL_PREVIEW' => 'Y' // Преобразовывать ссылки в rich-ссылки, необязательное поле, по умолчанию 'Y'
        ), $_REQUEST["auth"]);*/
        break;
    case 'ONIMBOTDELETE':

        break;
}

class bx24{
    private $event;
    private $application_token;
    private $access_token;
    private $params;

    function saveParams($params) {
        $config = "<?php\n";
        $config .= "\$appsConfig = " . var_export($params, true) . ";\n";
        $config .= "?>";
        $configFileName = '/config_' . trim(str_replace('.', '_', $_REQUEST['auth']['domain'])) . '.php';
        file_put_contents(__DIR__ . $configFileName, $config);
        return true;
    }
}