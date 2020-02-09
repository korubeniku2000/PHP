<?php

//変数定義
$string = $term;
$count = 0;
$flag = false;

//ajaxから送られたものをpost
$term = strip_tags(substr($_POST['search_term'],0, 100));

// ファイルが存在しているかチェックする
if (($handle = fopen("input.csv", "r")) !== FALSE) {
    // 1行ずつfgetcsv()関数を使って読み込む
    while (($data = fgetcsv($handle))) {
       $rec[] = $data;
       //csvファイルの","の3つ目以降の検索ワードを取得
       for ($i = 1 ; $i < count($rec[$count]); $i++) {
          //入力した文字が検索ワードに含まれている場合
          if( false !== strpos($rec[$count][$i] , $term) ) {
              $flag = true;
              echo $rec[$count][1] . "<br>";
              break;
          }

       }

       $count++;
    }

   fclose($handle);

   //検索条件にヒットしなかった場合
   if ( false === $flag ) {
       echo "該当するURLが存在しません";
    }

}

?>