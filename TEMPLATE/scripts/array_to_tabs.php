<html lang="ru">
<?php

$ppl = [
    ["name" => "Ivan1", "sex" => "M", 'tab' => 1],
    ["name" => "Ivan2", "sex" => "M", 'tab' => 1],
    ["name" => "Gloria1", "sex" => "F", 'tab' => 2],
    ["name" => "Gloria2", "sex" => "F", 'tab' => 2],
    ["name" => "Bodua1", "sex" => "M", 'tab' => 3],
    ["name" => "Bodua2", "sex" => "M", 'tab' => 3],
];

/**
 * @param array $data
 * @param $count_parts
 * @return array
 * Делит масив на части по значению поля
 */
function divide_into_parts(array $data, $count_parts = 6){
    $arr = [];
    for ($i = 1; $i <= $count_parts; $i++){
        $arr['tab'.$i] = array_filter($data, function ($entry) use ($i){
            if (isset($entry['tab']))
                return $entry['tab'] == $i;
            return false;
        });
    }

    return $arr;
}


echo '<pre>';
print_r(divide_into_parts($ppl));
echo '</pre>';
