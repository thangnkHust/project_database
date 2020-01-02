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
                    <th class="column-title">Profile</th>
                    <th class="column-title">Avatar</th>
                    <th class="column-title">Level</th>
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
                            $email = hightlight::show($val->email, $params['search'], 'email');
                            $avatar = template::showItemThumb($controllerName, $val->avatar, $val->avatar);
                            $status = template::showItemStatus($controllerName, $id, $val->status);
                            $role = config('test.template.level.' . $val->role->name . '.name');
                            $createdHistory = template::showItemHistory($val->created_at);
                            $updatedHistory = template::showItemHistory($val->updated_at);
                            $listButtonAction = template::showActionButton($controllerName, $id);
                        @endphp

                        <tr class="even pointer">
                            <td class="" width="3%">{{$index}}</td>
        
                            <td width="30%">
                                <p><strong>Name: </strong>{!!$name!!}</p>
                                <p><strong>Email: </strong> {!!$email!!}</p>
                            </td>

                            <td width="20%">
                                {!!$avatar!!}
                            </td>

                            <td width="15%">
                                {!!$role!!}
                            </td>

                            <td width="">
                                {!!$status!!}
                            </td>
        
                            <td width="8%">
                                {!!$createdHistory!!}
                            </td width="8%">
        
                            <td width="8%">
                                {!!$updatedHistory!!}
                            </td>
        
                            <td class="last" width="5%">
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