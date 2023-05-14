<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
        data-bs-target="#exampleModalCenter">Поля
</button>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Настройки полей в админке</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <div class="row my-row">
              <div class="bg-white">
                <div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
                     role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
                  <form action="{{ route($route) }}" method="post">
                    @csrf
                    <div class="table-responsive">
                      <table class="table table-bordered my-table">
                        <tr>
                          <th class="bg-light-primary">Отображаемое имя поля</th>
                          <th class="bg-light-secondary" style="max-width: 150px">Сортировка в
                            списке
                          </th>
                          <th class="bg-light-info" style="max-width: 150px">Сортировка на
                            детальной
                          </th>
                          <th class="bg-light-danger">Показывать в ленте</th>
                          <th class="bg-light-dark">Показывать на детальной</th>
                          <th class="bg-light-secondary">Вкладка</th>
                        </tr>
                        @isset($columns)
                          @foreach($columns as $column)
                            <tr>
                              <td class="bg-light-primary">
                                <input type="text" name="{{ $column['id'] }}[show_name]"
                                       value="{!! $column['show_name'] !!}">
                              </td>
                              <td class="bg-light-secondary">
                                <input type="text" name="{{ $column['id'] }}[sort_list]"
                                       value="{{ $column['sort_list'] }}"
                                       style="max-width: 150px">
                              </td>
                              <td class="bg-light-info">
                                <input type="text"
                                       name="{{ $column['id'] }}[sort_single]"
                                       value="{{ $column['sort_single'] }}"
                                       style="max-width: 150px">
                              </td>
                              <td class="bg-light-danger">
                                <input type="checkbox"
                                       name="{{ $column['id'] }}[is_show_anons]"
                                       @if($column['is_show_anons'] == '1') checked @endif>
                              </td>
                              <td class="bg-light-dark">
                                <input type="checkbox"
                                       name="{{ $column['id'] }}[is_show_single]"
                                       @if($column['is_show_single'] == '1') checked @endif>
                              </td>
                              <td class="bg-light-secondary" style="min-width: 150px">
                                @isset($tabs)
                                  <select name="{{ $column['id'] }}[tab_id]"
                                          class="form-select form-select-sm"
                                          style="width: auto"
                                          aria-label=".form-select-sm пример">
                                    <option value="">Не определено</option>
                                    @foreach($tabs as $tab)
                                      <option value="{{ $tab['id'] }}"
                                              @if($tab['id'] == $column['tab_id']) selected @endif>{{ $tab['name'] }}</option>
                                    @endforeach
                                  </select>
                                @endisset
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Закрыть
                      </button>
                      <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
