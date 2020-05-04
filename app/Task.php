<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];

    public function getStatusLabelAttribute(){

        //状態値
        $status = $this->attributes['status'];

        //定義されてなければ空文字返す
        if (!isset(self::STATUS[$status])){
            return'';
        }
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute(){

        $status = $this->attribute['status'];

        if (!isset(self::STATUS[$status])){
            return'';
        }
        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}

// <?php
// //課題1

//   if (isset($_POST['name'], $_POST["age"])){
//     if ($_POST['age'] >= 120 ){
//       echo "エラーです";
//     } else{
//       echo $_POST['name']."さんは".$_POST['age']."歳です";
//     }

// }


// //課題2



//   $data = ['山田' => ['id' => '1','pass' => '1111'],
//          '田中' => ['id' => '2','pass' => '2222'],
//          '佐藤' => ['id' => '3','pass' => '3333'],
//   ];


//   foreach($data as $name => $val){
//     foreach( $val as $id => $pass);

//     if (isset($_POST['id'], $_POST["pass"])){
//       $params_id = array_search($id, $data);
//       $params_pass = array_search($pass, $data);

//       if($params_id == $_POST['id'] && $params_pass == $_POST['pass']){
//        echo $data[$name] ;
//      } else{
//        echo '一致してません。';
//      }
//     }
//   }


// ?>
