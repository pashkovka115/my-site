<div class="">
  <div class="btn-group save-group" role="group" aria-label="Basic mixed styles example">
    @if(!isset($list_button))
      <button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список</button>
    @endif
    @if(!isset($new_button))
      <button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый</button>
    @endif
    @if(!isset($edit_button))
      <button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить редактирование</button>
    @endif
  </div>
</div>