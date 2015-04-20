<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/5/15
 * Time: 4:13 PM
 */

namespace App\Custom;


class Helper {


    public static function generate_random_eight_character_access() {
        $character_set_array = array();
        $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
        $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
    public static function generate_random_twelve_character_access() {
        $character_set_array = array();
        $character_set_array[] = array('count' => 6, 'characters' => '0123456789');
        $character_set_array[] = array('count' => 6, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
}