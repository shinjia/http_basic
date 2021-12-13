<?php
$t = isset($_GET['t']) ? $_GET['t'] : 0;
$h = isset($_GET['h']) ? $_GET['h'] : 0;

$now = date('Y-m-d H:i:s', time());

$data = <<< HEREDOC
{$now},{$t},{$h}

HEREDOC;

$filename = 'data_' . date('Ymd', time()) . '.csv';

file_put_contents($filename, $data, FILE_APPEND);

$ary = file($filename);
$num_records = count($ary);

$str_records = print_r($ary, TRUE);

$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    pre { background-color: #DDDDDD; }
    </style>
</head>
<body>

<h3>資料已經儲存</h3>
<p>累計資料筆數：{$num_records}</p>
<hr>
<h3>以下供測試用</h3>
<p>下載資料檔案：<a href="{$filename}">{$filename}</a></p>
<pre>
{$str_records}
</pre>

</body>
</html>
HEREDOC;

echo $html;
?>