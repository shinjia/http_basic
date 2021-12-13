<?php
$str_get = print_r($_GET, true);
$str_post = print_r($_POST, true);

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
    pre { background-color: #DDDDDD; }
    </style>
</head>
<body>

<h3>GET 得到的資料如下</h3>
<pre>
{$str_get}
</pre>

<h3>POST 得到的資料如下</h3>
<pre>
{$str_post}
</pre>

</body>
</html>
HEREDOC;

echo $html;
?>