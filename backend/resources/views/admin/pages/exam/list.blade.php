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
                    <th class="column-title">Thumb</th>
                    <th class="column-title">Subject</th>
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
                            $thumb = template::showItemThumb($controllerName, $val->thumb, $val->name);
                            $status = template::showItemStatus($controllerName, $id, $val->status);
                            $subject = $val->subject->name;
                            $createdHistory = template::showItemHistory($val->created_at);
                            $updatedHistory = template::showItemHistory($val->updated_at);
                            $listButtonAction = template::showActionButton($controllerName, $id);
                        @endphp

                        <tr class="even pointer">
                            <td class="" width="5%">{{$index}}</td>
        
                            <td width="25%">
                                {!!$name!!}
                            </td>

                            <td >
                                {!!$thumb!!}
                            </td>

                            <td width="8%">
                                {!!$subject!!}
                            </td>

                            <td width="10%">
                                {!!$status!!}
                            </td>
        
                            <td width="8%">
                                {!!$createdHistory!!}
                            </td width="8%">
        
                            <td width="8%">
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