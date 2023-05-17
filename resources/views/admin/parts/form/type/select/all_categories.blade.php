<?php
if (!function_exists('all_categories')) {
    function all_categories($item, $parent_item_id = false, $parent_name = '')
    {
        if ($parent_name != '') {
            $name = $parent_name . ' → ' . $item->name;
        } else {
            $name = $parent_name . $item->name;
        }

        $selected = '';
        if ($parent_item_id) {
            if ($item->id == $parent_item_id) {
                $selected = ' selected';
            }
        }

        echo "<option value=\"$item->id\" $selected>$name</option>";

        if ($parent_name == '') {
            $parent_name .= $item->name;
        } else {
            $parent_name .= ' → ' . $item->name;
        }

        foreach ($item->children as $child) {
            all_categories($child, $parent_item_id, $parent_name);
        }
    }
}

?>
<select id="{{ $column['origin_name'] }}"
        name="{{ $column['origin_name'] }}"
        title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"
        class="form-select form-select-sm"
        aria-label="Default select example">
  @if(isset($items_with_children))
            <?php
            if (isset($item)) {
                $id = $item->category_id;
            } else {
                $id = false;
            } ?>
    @foreach($items_with_children as $item_with_children)
                <?php all_categories($item_with_children, $id); ?>
    @endforeach
  @else
    <option value="???">Нехватает переменных из контроллера в шаблон</option>
  @endif
</select>
