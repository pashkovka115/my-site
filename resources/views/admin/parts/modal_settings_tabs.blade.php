<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalToggleLabel">Настройки вкладок</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
						 role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
					<form action="{{ route($route) }}" method="post">
						@csrf
						<div class="table-responsive">
							<table class="table table-bordered my-table">
								<tr>
									<th class="bg-light-primary">Название</th>
									<th class="bg-light-secondary">Сортировка</th>
									<th class="bg-light-info">Видимость</th>
									<th class="bg-light-danger">Удалить</th>
								</tr>
								@foreach($tabs as $tab)
									<tr>
										<td class="bg-light-primary">
											<input type="text" name="{{ $tab['id'] }}[name]"
														 value="{{ $tab['name'] }}">
										</td>
										<td class="bg-light-secondary">
											<input type="text" name="{{ $tab['id'] }}[sort]"
														 value="{{ $tab['sort'] }}">
										</td>
										<td class="bg-light-info">
											<input type="checkbox" name="{{ $tab['id'] }}[is_show]"
														 @if($tab['is_show'] == '1') checked @endif>
										</td>
										<td class="bg-light-danger">
											<input type="checkbox" name="{{ $tab['id'] }}[delete]">
										</td>
									</tr>
								@endforeach
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
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
					Добавить вкладку
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered  modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalToggleLabel2">Новая вкладка</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<div class="input-group mb-3">
					<form action="{{ route($route_store) }}" method="post">
						@csrf
					<input name="name" type="text" class="form-control" placeholder="Название"  aria-label="Название">
					&nbsp;&nbsp;&nbsp;
					<input name="sort" type="number" class="form-control" placeholder="Сортировка" aria-label="Сортировка">
					&nbsp;&nbsp;&nbsp;
					<div class="form-check">
						<input name="is_show" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
						<label class="form-check-label" for="flexCheckChecked">
							Видимость
						</label>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">
								Назад к списку
							</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
								Закрыть
							</button>
							<button type="submit" class="btn btn-primary">Сохранить изменения</button>
						</div>
					</form>
				</div>
			</div>

			{{--<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">
					Назад к списку
				</button>
			</div>--}}
		</div>
	</div>
</div>
<a class="btn btn-outline-success" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Вкладки</a>