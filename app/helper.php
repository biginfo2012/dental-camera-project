<?php
function convertSymptomType($symptom){

    if($symptom === null || $symptom === ''){
        return '';
    }
    $symptom = (int)$symptom;
    if($symptom === 1){
        return '구강질환';
    }
    if($symptom === 2){
        return '심미개선';
    }
    if($symptom === 3){
        return '골격/배열';
    }
    if($symptom === 4){
        return '재치료/재성형';
    }
    if($symptom === 5){
        return '어린이 구강';
    }
    if($symptom === 6){
        return '기타';
    }
}

function convertPartType($part_type){

    if($part_type === null || $part_type === ''){
        return '';
    }
    $part_type = (int)$part_type;
    if($part_type === 1){
        return '구강전체';
    }
    if($part_type === 2){
        return '치아의 앞면';
    }
    if($part_type === 3){
        return '치아의 안쪽';
    }
    if($part_type === 4){
        return '어금니 씹는 면';
    }
    if($part_type === 5){
        return '기타';
    }
}

function convertPosId($part_type, $pos_id){
    $string = array(
        array('', '', '', '', '', '90도', '정면', '45도'),
        array('윗니 오른쪽', '윗니 앞니', '윗니 왼쪽', '아랫니 오른쪽', '아랫니 앞니', '아랫니 왼쪽'),
        array('윗니 오른쪽', '윗니 앞니', '윗니 왼쪽', '아랫니 오른쪽', '아랫니 앞니', '아랫니 왼쪽'),
        array('윗니 오른쪽', '윗니 왼쪽', '아랫니 오른쪽', '아랫니 왼쪽'),
        array('혀', '볼살', '입천정', '기타'),
    );
    if($part_type === null || $part_type === ''){
        return '';
    }

    $part_type = (int)$part_type;
    if($pos_id === null || $pos_id === ''){
        return '';
    }
    $pos_id = (int)$pos_id;
    return $string[$part_type-1][$pos_id-1];
}
