@php
    use App\Helpers\template as template;
    use App\Helpers\hightlight as hightlight;
@endphp


<div class="x_content">
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Description</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Created at</th>
                    <th class="column-title">Updated at</th>
                    <th class="column-title">Action</th>
                </tr>
                </thead>
                <tbody>

                @if(count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index = $key + 1;
                            $id = $val->id;
                            $name = hightlight::show($val->name, $params['search'], 'name');
                            $description = hightlight::show($val->description, $params['search'], 'description');
                            // $name = $val->name;
                            // $description = $val->description;
                            $status = template::showItemStatus($controllerName, $id, $val->status);
                            $createdHistory = template::showItemHistory($val->created_at);
                            $updatedHistory = template::showItemHistory($val->updated_at);
                            $listButtonAction = template::showActionButton($controllerName, $id);
                        @endphp

                        <tr class="even pointer">
                            <td class="">{{$index}}</td>
        
                            <td width="">
                                {!!$name!!}
                            </td>

                            <td>
                                {!!$description!!}
                            </td>

                            <td>
                                {!!$status!!}
                            </td>
        
                            <td>
                                {!!$createdHistory!!}
                            </td>
        
                            <td>
                                {!!$updatedHistory!!}
                            </td>
        
                            <td class="last" width="10%">
                                {!!$listButtonAction!!}
                            </td>
                        </tr>
                    @endforeach
                @else 
                    {{-- Khong co data --}}
                    @include('admin/templates/list_empty', ['colspan' => 7])
                @endif
                
                </tbody>
            </table>
        </div>
    </div>