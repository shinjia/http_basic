<?php
$ymd = isset($_GET['ymd']) ? $_GET['ymd'] : date('Ymd', time());

// 指定存檔檔名 (日期)
$filename = 'data_' . $ymd . '.csv';

if(!file_exists($filename))
{
    die('File Not Found!<br>' . $filename);
}

// 讀檔
$data = file_get_contents($filename);

// 取出檔案內容
$ary = file($filename);
$num_records = count($ary);
// $str_records = print_r($ary, TRUE);

// 用表格方式顯示資料
$str = '<table border="1">';
$str .= '<tr>';
$str .= '<th>日期時間</th>';
$str .= '<th>溫度</th>';
$str .= '<th>濕度</th>';
$str .= '</tr>';
foreach($ary as $one)
{
    // 拆解字串為陣列 (日期、溫度、濕度)
    $ary = explode(',', $one);

    $str .= '<tr>';
    $str .= '<td>' . $ary[0] . '</td>';
    $str .= '<td style="text-align:right;">' . $ary[1] . '</td>';
    $str .= '<td style="text-align:right;">' . $ary[2] . '</td>';
    $str .= '</tr>';
}
$str .= '<table>';

// 顯示網頁
$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table { border: 1px solid #000000; }
    </style>
</head>
<body>

<h3>資料 {$filename}</h3>
<p>累計資料筆數：{$num_records}</p>
{$str}
<hr>
<h3>以下供測試用</h3>
<p>下載資料檔案：<a href="{$filename}">{$filename}</a></p>

</body>
</html>
HEREDOC;

echo $html;
?>