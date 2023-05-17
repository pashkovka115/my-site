<?php
if (!function_exists('all_categories_but_not_self')) {
    function all_categories_but_not_self($item, $current_item_id = false, $current_item_parent_id = false, $parent_name = '')
    {
        if ($item->id == $current_item_id) {
            return;
        }

        if ($parent_name != '') {
            $name = $parent_name . ' → ' . $item->name;
        } else {
            $name = $parent_name . $item->name;
        }

        if ($item->id == $current_item_parent_id) {
            $selected = ' selected';
        } else {
            $selected = '';
        }

        echo "<option value=\"$item->id\"$selected>$name</option>";

        if ($parent_name == '') {
            $parent_name .= $item->name;
        } else {
            $parent_name .= ' → ' . $item->name;
        }

        foreach ($item->children as $child) {
            all_categories_but_not_self($child, $current_item_id, $current_item_parent_id, $parent_name);
        }
    }
}

?>
<select id="{{ $column['origin_name'] }}"
        name="{{ $column['origin_name'] }}"
        title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"
        class="form-select form-select-sm"
        aria-label="Default select example">
  <option value="">Нет родителя</option>
  @if(isset($items_with_children))
    @foreach($items_with_children as $item_with_children)
                <?php
                if (!isset($item)) {
                    $item = new stdClass();
                    $item->id = 0;
                    $item->parent_id = 0;
                }

                all_categories_but_not_self($item_with_children, $item->id, $item->parent_id);
                ?>
    @endforeach
  @else
    <option value="???">Нехватает переменных из контроллера в шаблон</option>
  @endif
</select>
