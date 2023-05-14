@isset($item->additionalFields)
<div class="">
  <div class="bg-white">

    <div class="table-responsive">
      <table class="table table-bordered my-table">
        <thead>
        <tr>
          <th>Имя</th>
          <th>Тип</th>
          <th>Ключ<span class="red">*</span></th>
          <th>Значение</th>
          <th>Удалить</th>
        </tr>
        </thead>
        <tbody id="content_additional_fields">
          @foreach($item->additionalFields as $field)
            <tr>
              <td>
                <input type="text" name="additional_fields[{{ $field->id }}][name]" class="form-control"
                       value="{{ $field->name }}">
              </td>
              <td>
                <input type="text" name="additional_fields[{{ $field->id }}][type]" class="form-control"
                       value="{{ $field->type }}">
              </td>
              <td>
                <input type="text" name="additional_fields[{{ $field->id }}][key]" class="form-control"
                       value="{{ $field->key }}" required>
              </td>
              <td>
          <textarea name="additional_fields[{{ $field->id }}][value]" class="form-control"
                    title="Произвольно"
                    rows="1">{{ $field->value }}</textarea>
              </td>
              <td>
                <input name="additional_fields[{{ $field->id }}][delete_additional_field]"
                       class="form-check-input delete-property" type="checkbox">
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      <button type="button"
              class="btn btn-outline-success mt-2"
              onclick="addAdditionalField()"
      >Добавить поле</button>
  </div>
</div>

@section('script_buttom')
    @parent
    <script>
        let cntAdditionalField = 0;
        function addAdditionalField(){
            cntAdditionalField++;
            let template = '<tr><td>'+
                '<input type="text" name="additional_fields[new_'+cntAdditionalField+'][name]" class="form-control">'+
                '</td><td>'+
                '<input type="text" name="additional_fields[new_'+cntAdditionalField+'][type]" class="form-control">'+
            '</td><td>' +
                '<input type="text" name="additional_fields[new_'+cntAdditionalField+'][key]" class="form-control" required>'+
            '</td><td>'+
          '<textarea name="additional_fields[new_'+cntAdditionalField+'][value]" class="form-control" title="Произвольно" rows="1"></textarea>'+
            '</td><td>'+
                '<button type="button" class="btn btn-outline-danger" onclick="deleteAdditionalField(this)">Удалить поле</button>'+
            '</td></tr>';

            let container = $('#content_additional_fields');
            container.append(template);
        }
        function deleteAdditionalField(element){
            $(element).parents('tr').remove();
        }
    </script>
@endsection
@endisset
