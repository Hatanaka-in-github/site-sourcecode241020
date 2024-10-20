<?php

require 'vendor/autoload.php';

function getSsmParameters(array $names)
{
    $config = [
        'version' => '2014-11-06',
        'region' => 'ap-northeast-1'
    ];

    $client = new Aws\Ssm\SsmClient($config);
    $result = $client->getParameters(
        [
            'Names' => $names,
            'WithDecryption' => true
        ]
    );

    if ($result['InvalidParameters']) {
        // 存在しない値
        echo "InvalidParameters: " . implode(', ', $result['InvalidParameters']) . "\n";
    }

    if (!is_array($result['Parameters'])) {
        return null;
    }

    $params = [];

    foreach ($result['Parameters'] as $v) {
        $name = $v['Name'];
        $params[$name] = $v['Value'];
    }

    return $params;
}

$params1 = getSsmParameters(['dbpass']);
$params2 = getSsmParameters(['dbhost']);
$params3 = getSsmParameters(['dbname']);


foreach($params1 as $key => $value){ $pass = $value ;};
$pass = $value ;
 /* うまく取得できてるか確認用。実装前にこの行は削除 */
foreach($params2 as $key => $value){ $hostphrase = $value ;};
$hostphrase = $value ;
 /* うまく取得できてるか確認用。実装前にこの行は削除 */
foreach($params3 as $key => $value){ $name = $value ;};
$name = $value ;
 /* うまく取得できてるか確認用。実装前にこの行は削除 */

