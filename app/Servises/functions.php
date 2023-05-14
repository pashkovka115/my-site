<?php
if (!function_exists('divide_into_parts')){
    /**
     * @param array $data
     * @param integer $count_parts
     * @return array
     * Делит масив на части по значению поля
     * Обязательный ключ "tab" со значением не более $count_parts
     */
    /*function divide_into_parts(array $data, int $count_parts = 4): array
    {
        $arr = [];
        for ($i = 1; $i <= $count_parts; $i++) {
            $arr['tab' . $i] = array_filter($data, function ($entry) use ($i) {
                if (isset($entry['tab_id']))
                    return $entry['tab_id'] == $i;
                return false;
            });
        }

        return $arr;
    }*/
}

