@php
    // xu ly trong Helper/form.php
    use App\Helpers\form as formTemplate;
    use App\Helpers\template as template;

    // Lay du lieu class chung trong config 
    $formInputAttr = config('test.template.form_input');
    $formLabelAttr = config('test.template.form_label');
    $statusValue = ['active' => 'Active', 'inactive' => 'Inactive'];
    $levelValue = [1 => config('test.template.level.admin.name'), 2 => config('test.template.level.client.name')];
    $inputHiddenID = Form::hidden('id', $item['id']);
    $inputHiddenAvatar = Form::hidden('avatar_current', $item['avatar']);
    $inputHiddenTask = Form::hidden('task', 'add');

    $elements = [
        [
            'label' => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr)
        ],
        [
            'label' => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::text('email', $item['email'], $formInputAttr)
        ],
        [
            'label' => Form::label('password', 'Password', $formLabelAttr),
            'element' => Form::password('password', $formInputAttr)
        ],
        [
            'label' => Form::label('password_confirmation', 'Password Confirmation', $formLabelAttr),
            'element' => Form::password('password_confirmation', $formInputAttr)
        ],
        [
            'label' => Form::label('role_id', 'Level', $formLabelAttr),
            'element' => Form::select('role_id', $levelValue, $item['role_id'], ['class' => $formInputAttr['class'], 'placeholder' => 'Select level'])
        ],
        [
            'label' => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], ['class' => $formInputAttr['class'], 'placeholder' => 'Select status'])
        ],
        [
            'label' => Form::label('avatar', 'Avatar', $formLabelAttr),
            'element' => Form::file('avatar', $formInputAttr),
            'avatar' => (!empty($item['id'])) ? template::showItemThumb($controllerName, $item['avatar'], $item['avatar']) : null, 
            'type' => 'avatar'
        ],
        [
            'element' => $inputHiddenID . $inputHiddenAvatar . $inputHiddenTask . Form::submit('Save', ['class' => 'btn btn-success']),
            'type' => 'btn-submit'
        ]
    ]
@endphp

{{-- Phan them le cua page form add--}}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin/templates.x-title', ['title' => 'Form Add'])
            <div class="x_content">
                {{-- <br/> --}}
                {!! Form::open([
                    'url' => route("$controllerName/save"),
                    'method' => 'POST',
                    'accept-charset' => 'UTF-8',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'main-form'
                    ]) !!}

                    {{-- html xu ly trong form -> in ra --}}
                    {!! formTemplate::show($elements) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
