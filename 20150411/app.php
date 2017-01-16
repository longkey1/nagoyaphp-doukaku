<?php
require_once __DIR__ . '/vendor/autoload.php';

use NagoyaPHP\Study20150411\App;
use NagoyaPHP\Study20150411\Parser;
use NagoyaPHP\Study20150411\HtmlRenderer;
use NagoyaPHP\Study20150411\MarkdownRenderer;

$inputList = [
    [
        'id' => 1,
        'parent_id' => 0,
        'value' => '親1',
    ],
    [
        'id' => 2,
        'parent_id' => 0,
        'value' => '親2',
    ],
    [
        'id' => 3,
        'parent_id' => 1,
        'value' => '子1-1',
    ],
    [
        'id' => 4,
        'parent_id' => 1,
        'value' => '子1-2',
    ],
    [
        'id' => 5,
        'parent_id' => 2,
        'value' => '子2-1',
    ],
    [
        'id' => 6,
        'parent_id' => 4,
        'value' => '孫1-2-1',
    ],
    [
        'id' => 7,
        'parent_id' => 3,
        'value' => '孫1-1-1',
    ],
    [
        'id' => 8,
        'parent_id' => 7,
        'value' => 'ひ孫1-1-1-1',
    ],
    [
        'id' => 9,
        'parent_id' => 5,
        'value' => '孫2-1-1',
    ],
    [
        'id' => 10,
        'parent_id' => 5,
        'value' => '孫2-1-2',
    ],
    [
        'id' => 11,
        'parent_id' => 2,
        'value' => '子2-2',
    ],
    [
        'id' => 12,
        'parent_id' => 4,
        'value' => '孫1-2-2',
    ],
    [
        'id' => 13,
        'parent_id' => 9,
        'value' => 'ひ孫2-1-1-1',
    ],
    [
        'id' => 14,
        'parent_id' => 5,
        'value' => '孫2-1-3',
    ],
    [
        'id' => 15,
        'parent_id' => 2,
        'value' => '子2-3',
    ],
];

if (php_sapi_name() === 'cli') {
    $app = new App(new Parser, new MarkdownRenderer);
} else {
    $app = new App(new Parser, new HtmlRenderer);
}

echo $app->run($inputList);
