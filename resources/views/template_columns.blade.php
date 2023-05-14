
@foreach($columns as $column)
    @if($column['is_show_anons'])
        <th>{{ $column['show_name'] }}</th>
    @endif
@endforeach




@foreach($categories as $category)
    <tr>
        @foreach($columns as $column)
            @if($column['is_show_anons'])
                <td>
                    @if($column['origin_name'] == 'actions_column')
                        <a class="btn btn-warning mb-2" target="_blank"><i
                                class="bi bi-eye"></i></a>
                        <a class="btn btn-info mb-2"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-danger mb-2"
                           onclick="return window.confirm('Удалить?')"><i
                                class="bi bi-trash"></i></a>
                    @else
                        {{ $category->{$column['origin_name']} }}
                    @endif

                </td>
            @endif
        @endforeach
    </tr>
@endforeach
