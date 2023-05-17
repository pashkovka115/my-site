<div class="form-check" style="margin-top: 10px">
  <input type="hidden" name="{{ $column['origin_name'] }}" value="0">
  <input name="{{ $column['origin_name'] }}"
         title="{{ $column['origin_name'] }} -> {{ $column['type'] }}"
         class="form-check-input"
         type="checkbox"
         value="1"
         id="{{ $column['origin_name'] }}"
  @isset($item)
    @checked($item->is_download)
      @endisset
  >
  <label class="form-check-label" for="{{ $column['origin_name'] }}">
    Цифровой(скачиваемый) товар
  </label>
</div>
