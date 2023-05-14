<div class="">
  <div class="bg-white">

      <div class="table-responsive">
          <table class="table table-bordered my-table">
              <thead>
              <tr>
                  <th>Название</th>
                  <th>Значение</th>
                  <th>Удалить</th>
              </tr>
              </thead>
              <tbody id="content_property">
            @if(isset($item->properties))
          @forelse($item->properties as $prop)
              <tr>
                  <td>
                      <input type="text" name="properties[{{ $prop->id }}][name]" class="form-control"
                             value="{{ $prop->name }}">
                      <input type="hidden" name="properties[{{ $prop->id }}][product_id]" value="{{ $item->id }}">
                  </td>
                  <td>
                      <input type="text" name="properties[{{ $prop->id }}][value]" class="form-control"
                             value="{{ $prop->value }}">
                  </td>
                  <td>
                      <input name="properties[{{ $prop->id }}][delete_property]"
                             class="form-check-input delete-property" type="checkbox" value="{{ $prop->id }}">
                  </td>
              </tr>
          @empty
              <tr>
                  <td>
                      <input type="text" name="properties[new_0][name]" class="form-control">
                      <input type="hidden" name="properties[new_0][product_id]" value="{{ $item->id }}">
                  </td>
                  <td>
                      <input type="text" name="properties[new_0][value]" class="form-control">
                  </td>
                  <td>Добавить</td>
              </tr>
          @endforelse
            @endif
              </tbody>
          </table>
      </div>
      <button id="btn_add_property" type="button" class="btn btn-outline-success mt-2">Добавить свойство</button>
  </div>
</div>

@section('script_buttom')
    @parent
<script>
    let i = 0;
    let button = $('#btn_add_property').on('click', function (e){
        i++;
        let temlate_property = '<tr draggable="false">'+
            "<td>"+
            '<input type="text" name="properties[new_'+i+'][name]" class="form-control">' +
    <?php if (isset($item)) echo "'<input type=\"hidden\" name=\"properties[new_'+i+'][product_id]\" value=\"{{ $item->id }}\">'+"; ?>
            '</td>'+
        '<td>'+
            '<input type="text" name="properties[new_'+i+'][value]" class="form-control">'+
        '</td>'+
        '<td>'+
            '<button type="button" class="btn btn-outline-danger delete_property">Удалить свойство</button>'+
        '</td>'+
    "</tr>";
        let content_props = $('#content_property');
        content_props.append(temlate_property);

        $('button.delete_property').each(function (index, element){
            $(element).off('click');
            $(element).on('click', function (e){
                $(e.target).parents('tr').remove();
            });
        });
    });
</script>
@endsection
