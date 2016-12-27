<?php

spl_autoload_register(function ($class_name) {
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class_name . '.php';
});

/**
 * Вариант Response с сайта funpay.
 */
$str = 'Пароль: 6124<br />
Спишется 12,07р.<br />
Перевод на счет 410011547785529';

/**
 * Произвольный вариант формирования строки ответа, из которой нужно вычленить
 * YD кошелек, код и сумму к списанию. Порядок следования слов и т.п. существенно изменен,
 * однако это не влияет на результат. В сумме (в кач-ве разделителя копеек)
 * использована вместо запятой точка.
 */
$str2 = <<<'STR'
Для перевода на счет YD 410011547785529
спишется сумма 4565.82р.
Чтобы подтвердить,
 введите пароль: 7777.
STR;

try {
    $result = TestSms::parseResponse($str);
    $result2 = TestSms::parseResponse($str2);
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($result);
var_dump($result2);