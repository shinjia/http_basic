<?php
// 將取得的 GET 資料編碼為 JSON
$str_get = json_encode($_GET);

// 回傳結果
echo 'Got Data!';
echo $str_get;

?>