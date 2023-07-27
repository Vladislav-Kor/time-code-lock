<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
    public function actionTest()
    {
    
        $apiUrl = 'https://api.ttlock.com/...'; // URL для доступа к API TTLock
        $apiKey = 'your-api-key'; // Ваш API-ключ

        $data = array(
            'lockId' => 12345, // ID замка
            'startDate' => '2022-09-01', // Дата начала периода
            'endDate' => '2022-09-30', // Дата окончания периода
            // другие необходимые параметры
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Api-Key: ' . $apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        // Обработка ответа от API
        if ($response) {
            $responseData = json_decode($response, true);
            // Дополнительная обработка полученных данных
            var_dump($responseData);
        } else {
            // Обработка ошибок при отправке запроса
            var_dump('--------------------------------Ошибка--------------------------------');
        }
    }
}