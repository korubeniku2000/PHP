<?php

//�ϐ���`
$string = $term;
$count = 0;
$flag = false;

//ajax���瑗��ꂽ���̂�post
$term = strip_tags(substr($_POST['search_term'],0, 100));

// �t�@�C�������݂��Ă��邩�`�F�b�N����
if (($handle = fopen("input.csv", "r")) !== FALSE) {
    // 1�s����fgetcsv()�֐����g���ēǂݍ���
    while (($data = fgetcsv($handle))) {
       $rec[] = $data;
       //csv�t�@�C����","��3�ڈȍ~�̌������[�h���擾
       for ($i = 1 ; $i < count($rec[$count]); $i++) {
          //���͂����������������[�h�Ɋ܂܂�Ă���ꍇ
          if( false !== strpos($rec[$count][$i] , $term) ) {
              $flag = true;
              echo $rec[$count][1] . "<br>";
              break;
          }

       }

       $count++;
    }

   fclose($handle);

   //���������Ƀq�b�g���Ȃ������ꍇ
   if ( false === $flag ) {
       echo "�Y������URL�����݂��܂���";
    }

}

?>