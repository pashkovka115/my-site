<div id="sortable" class="row bg-white pt-3">
  @php
    if (!isset($excluded_fields)){
        $excluded_fields = [];
    }
  @endphp
    <?php foreach ($columns as $column){ ?>
        <?php if ($column['is_show_single'] and !in_array($column['origin_name'], $excluded_fields) /*and array_key_exists($column['origin_name'], $item->toArray())*/){ ?>
  <div class="form-group row mb-4">
    <label for="{{ $column['origin_name'] }}"
           class="col-sm-2 col-form-label">{!! $column['show_name'] !!}</label>
    <div class="col-sm-10">
      @includeIf('admin.parts.form.type.' . $column['type'], ['item' => $item ?? null])
    </div>
  </div>
    <?php } ?>
    <?php } ?>
</div>
