<?php

class Controller_Controlsystem_Api_Item extends Controller_Rest
{
    public function get_list($category){
        $category_table = array("pizza" => "ピザ","side"=> "サイド","drink"=> "ドリンク");
        $item_list = Model_Item::find('all',array(
            "where" => array(
                array("category" => $category_table[$category])
            )
        ));
        return $this->response($item_list);
    }

    public function post_rowList(){
        $vowel = strtolower($_POST['vowel']);
        $category_table = array("pizza" => "ピザ","side"=> "サイド","drink"=> "ドリンク");
        $category = $category_table[$_POST['category']];
        $row_table = array(
            'a' => array('あ','い','う','え','お',),
            'k' => array('か','き','く','け','こ','が','ぎ','ぐ','げ','ご'),
            's' => array('さ','し','す','せ','そ','ざ','じ','ず','ぜ','ぞ'),
            't' => array('た','ち','つ','て','と','だ','ぢ','づ','で','ど'),
            'n' => array('な','に','ぬ','ね','の'),
            'h' => array('は','ひ','ふ','へ','ほ','ば','び','ぶ','べ','ぼ','ぱ','ぴ','ぷ','ぺ','ぽ'),
            'm' => array('ま','み','む','め','も'),
            'y' => array('や','ゆ','よ'),
            'r' => array('ら','り','る','れ','ろ'),
            'w' => array('わ','を','ん'),
        );
        $row_initials = $row_table[$vowel];
        $query = Model_Item::query()->where('category','=',$category)->and_where_open();
        foreach ($row_initials as $initial) {
            $query = $query->or_where('name','like',$initial . '%')->or_where('name','like',mb_convert_kana($initial,'C') . '%');
        }
        $itemlist = $query->and_where_close()->order_by('name','asc')->get();
        $result = array();
        foreach ($itemlist as $item) {
            if($category == 'ピザ'){
                    $result[] = array(
                        'id' => $item->id,
                        'name' => $item->name,
                        'size' => 'S',
                        'place' => $item->unit_price_s,
                    );
                    $result[] = array(
                        'id' => $item->id,
                        'name' => $item->name,
                        'size' => 'M',
                        'place' => $item->unit_price_m,
                    );
                    $result[] = array(
                        'id' => $item->id,
                        'name' => $item->name,
                        'size' => 'L',
                        'place' => $item->unit_price_l,
                    );
            } else {
                $result[] = array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'size' => '',
                    'place' => $item->unit_price,
                );
            }

        }
        return $result;
    }
}
