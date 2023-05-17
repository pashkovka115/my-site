<div class="">
  <div class="bg-white">
    <div class="table-responsive">
      <table class="table table-bordered my-table">
        <thead>
        <tr>
          <th>Опция</th>
          <th>Значения</th>
        </tr>
        </thead>
        <tbody id="content_options">
        @if(isset($item->options))
          @foreach($item->options as $option)
            <tr>
              <td>
                <input type="text"
                       name="options[{{ $option->id }}][name]"
                       title="options[{{ $option->id }}][name] -> {{ $column['type'] }}"
                       class="form-control"
                       value="{{ $option->name }}">
              </td>
              <td class="td-with-inputs" data-option_id="{{ $option->id }}">
                @foreach($option->values as $value)
                  <input type="text"
                         name="options[{{ $value->option_id }}][values][{{ $value->id }}][name]"
                         title="options[{{ $value->option_id }}][values][{{ $value->id }}][name] -> {{ $column['type'] }}"
                         class="form-control"
                         value="{{ $value->name }}"
                  >
                @endforeach
                <button data-option_id="{{ $option->id }}"
                        type="button"
                        class="btn btn-outline-success"
                        onclick="addValueToOption(this)"
                >Добавить значение
                </button>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
    <button type="button"
            class="btn btn-outline-success mt-2"
            onclick="addOption()"
    >Добавить опцию
    </button>
  </div>
</div>

@section('script_buttom')
  @parent
  <script>
      let cnt_values = 0;
      let cnt_options = 0;

      function addValueToOption(elem) {
          cnt_values++;
          let option_id = elem.dataset.option_id;
          let template_value = '<input type="text" ' +
              'name="options[' + option_id + '][values][new_' + cnt_values + '][name]" ' +
              'class="form-control mx-1" ' +
              'value="">';
          $(template_value).insertBefore(elem);
      }

      function addOption() {
          cnt_options++;
          let content_options = $('#content_options');
          let template_option = '<tr><td>' +
              '<input type="text"' +
              'name="options[new_' + cnt_options + '][name]"' +
              'class="form-control"' +
              'value="">' +
              '</td>' +
              '<td class="td-with-inputs">' +
              '<button data-option_id="new_' + cnt_options + '" ' +
              'type="button" ' +
              'class="btn btn-outline-success" ' +
              'onclick="addValueToOption(this)" ' +
              '>Добавить значение</button>' +
              '</td></tr>';
          content_options.append(template_option);
      }
  </script>
@endsection
