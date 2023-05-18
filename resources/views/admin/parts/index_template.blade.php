<div class="py-2">
  <!-- row -->
  <div class="row my-row">
    <div class="bg-white">
      <div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
           role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
        <div class="table-responsive">
          <table class="table table-bordered my-table">
            <thead>
            <tr>
              @foreach($columns as $column)
                @if($column['is_show_anons'])
                  <th>{!! $column['show_name'] !!}</th>
                @endif
              @endforeach
              @if($items->count() > 0)
                <th>Действия</th>
              @endif
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
              <tr>
                @foreach($columns as $column)
                  @if($column['is_show_anons'])
                    <td>
											{!! $item->{$column['origin_name']} !!}
                    </td>
                  @endif
                @endforeach
                <td>
                  @if($link_view)
                    <a class="btn btn-warning mt-1" target="_blank"><i class="bi bi-eye"></i></a>
                  @endif
                  <a href="{{ route('admin.'.$route_name.'.edit', ['id' => $item->id]) }}"
                     class="btn btn-info mt-1"><i class="bi bi-pencil-square"></i></a>
                  <a href="{{ route('admin.'.$route_name.'.destroy', ['id' => $item->id]) }}"
                     class="btn btn-danger mt-1"
                     onclick="return window.confirm('Удалить элемент и все вложенные элементы?')"><i
                        class="bi bi-trash"></i></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
