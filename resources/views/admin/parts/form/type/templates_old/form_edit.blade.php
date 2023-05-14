<div id="sortable" class="row bg-white pt-3">
    @php
        if (!isset($excluded_fields)){
            $excluded_fields = [];
        }
    @endphp
    @foreach($columns as $column)
        @if($column['is_show_single']  and !in_array($column['origin_name'], $excluded_fields) and array_key_exists($column['origin_name'], $item->toArray()))
{{--    todo:  изменить условие, избавиться от "langs"       --}}
            @if($column['origin_name'] != 'langs')
                <div class="form-group row mb-4">
                    <label for="{{ $column['origin_name'] }}"
                           class="col-sm-2 col-form-label">{!! $column['show_name'] !!}</label>
                    <div class="col-sm-10">
                        @includeIf('admin.parts.form.type.' . $column['type'], ['item' => $item])
                    </div>
                </div>
            @else
                <div class="tabs" data-tabs>
                    <div class="tabs__list" data-list>
                @foreach($item->langs as $lang)
                    <button class="tabs__button" data-target="tab{{ $loop->iteration }}">{{ $lang->language->name }}</button>
                @endforeach
                    </div>

                @foreach($item->langs as $item)
                        <div class="tabs__container" data-tab="tab{{ $loop->iteration }}">
                    @foreach($global_columns as $col)
                        @if($col['is_show_single']  and !in_array($col['origin_name'], $excluded_fields) and array_key_exists($col['origin_name'], $item->toArray()))
                            <div class="form-group row mb-4">
                                <label for="{{ $col['origin_name'] }}"
                                       class="col-sm-2 col-form-label">{!! $col['show_name'] !!} {{ $loop->parent->iteration }} - {{ $loop->iteration }}</label> {{-- Todo: Временно! --}}
                                <div class="col-sm-10">
{{--                                    @php dump($item->toArray(), $col) @endphp--}}
                                    @includeIf('admin.parts.form.type.' . $col['type'], ['item' => $item, 'column' => $col])
                                </div>
                            </div>
                        @endif
                    @endforeach
                        </div>
                @endforeach
                </div>
                    {{--   Для langs --}}
                @include('admin.parts.helper_langs')
                    {{--  Конец Для langs --}}
            @endif
        @endif
    @endforeach
</div>
