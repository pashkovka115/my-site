<div id="sortable" class="row bg-white pt-3">
  @php
    if (!isset($excluded_fields)){
        $excluded_fields = [];
    }
  @endphp
    <?php foreach ($columns as $column){ ?>
        <?php if ($column['is_show_single'] and !in_array($column['origin_name'], $excluded_fields) /*and array_key_exists($column['origin_name'], $item->toArray())*/){ ?>
  {{--    todo:  изменить условие, избавиться от "langs"       --}}
        <?php if ($column['origin_name'] != 'langs'){ ?>
  <div class="form-group row mb-4">
    <label for="{{ $column['origin_name'] }}"
           class="col-sm-2 col-form-label">{!! $column['show_name'] !!}</label>
    <div class="col-sm-10">
      @includeIf('admin.parts.form.type.' . $column['type'], ['item' => $item ?? null])
    </div>
  </div>
  {{-- Иначе если есть мультиязычность --}}
    <?php }else{ ?>
        <?php
        $cnt_langs = $global_langs->count();
        // Удаляем служебные поля для "langs" из отображения
        if (isset($item)) {
            foreach ($item->langs as $lang) {
                $lang->offsetUnset('id');
                $lang->offsetUnset('created_at');
                $lang->offsetUnset('updated_at');
            }
        }
        ?>

        <?php if (isset($item->langs) and $item->langs->count()){ ?>
        <?php foreach ($global_columns as $col) { ?>
        <?php if ($col['is_show_single'] and isset($item->langs[0]->{$col['origin_name']})){ ?>
  <div class="form-group row mb-4">
    <label for="{{ $col['origin_name'] }}"
           class="col-sm-2 col-form-label">{!! $col['show_name'] !!}</label>
    <div class="col-sm-10">

      <div class="tabs" data-tabs>
              <?php $index_lang = 0; ?>
              <?php if ($cnt_langs > 1){ ?>
        <div class="tabs__list" data-list>
                <?php foreach ($item->langs as $lang){ ?>
          <button class="tabs__button"
                  data-target="tab{{ $loop->iteration }}">{{ $lang->language->name }}</button>
                <?php $index_lang++; ?>
            <?php } ?>
                <?php for ($b = $index_lang; $b < $cnt_langs; $b++){ ?>
          <button class="tabs__button" data-target="tab{{ $b + 1 }}">{{ $global_langs[$b]->name }}</button>
            <?php } ?>
        </div>
          <?php } ?>

              <?php foreach ($item->langs as $lang){ ?>
        <div class="tabs__container" data-tab="tab{{ $loop->iteration }}">
          @includeIf('admin.parts.form.type.' . $col['type'],
          [
              'item' => $lang,
              'column' => $col,
              'lang_name' => 'langs[' . $lang->language->id . '][' . $col['origin_name'] . ']'
          ])
        </div>
          <?php } ?>

              <?php for ($b = $index_lang;
                         $b < $cnt_langs;
                         $b++){ ?>
        <div class="tabs__container" data-tab="tab{{ $b + 1 }}">
          @includeIf('admin.parts.form.type.' . $col['type'],
          [
              'column' => $col,
              'lang_name' => 'langs[' . $global_langs[$b]->id . '][' . $col['origin_name'] . ']'
          ])
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
    <?php } ?>
    <?php } ?>
    <?php }
    // Для страницы create (нет $item)
    else { ?>
        <?php foreach ($global_columns as $col) { ?>

        <?php } ?>
    <?php } ?>
  {{--   Для langs --}}
  @include('admin.parts.helper_langs')
  {{--  Конец Для langs --}}
    <?php } ?>
    <?php } ?>
    <?php } ?>
</div>
