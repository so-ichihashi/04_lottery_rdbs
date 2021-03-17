<?PHP
ini_set('display_errors',1);
  // MySQLへ接続する準備。DB名や認証に必要な情報を格納
  $url = "localhost";
  $user = "root";
  $pass = "php-7/@ugh";
  $db = "goToTravel";

  // MySQLへ接続する
  $connect = mysqli_connect($url, $user, $pass) or die("MySQLへの接続に失敗しました。");

  // 手を加えるデータベースを選択する
  $sdb = mysqli_select_db($connect, $db) or die("データベースの選択に失敗しました。");

  // DBからデータを取得
  $sql_select = "SELECT * FROM destination ORDER BY id desc LIMIT 5";
  $result_select = $connect -> query($sql_select) or die("SELECTクエリの送信に失敗しました。".$result_select);

  // DB内の行数カウント
  $row_cnt = $result_select->num_rows;

  // 連想配列用の配列作成
  $destination_list = array();

  // 実行結果を配列に格納
while ($row = $result_select->fetch_assoc()) {
    $destination_list[] = $row;
    /* printf("%s (%s)\n", $row["id"], $row["destination"]); */
}

  // MySQLへの接続を閉じる
  mysqli_close($connect) or die("MySQL切断に失敗しました。");

?>
