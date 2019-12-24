{{-- Phan cau truc chinh khi route goi view --}}
@extends('admin.main')

@php
    // xu ly trong Helper/form.php
    use App\Helpers\form as formTemplate;
    use App\Helpers\template as template;

    // Lay du lieu class chung trong config 
    $formInputAttr = config('test.template.form_input');
    $formLabelAttr = config('test.template.form_label');
    $formCkeditor = config('test.template.form_ckeditor');
    $subjectSelect = ($item != null) ? $item->exam->subject->id : null;
    $examSelect = ($item != null) ? $item->exam->id : null;
    $answerItems = [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D'];
    $inputHiddenID = Form::hidden('id', $item['id']);


    $elements = [
        [
            'label' => Form::label('subject', 'Subject', $formLabelAttr),
            'element' => Form::select('subject', $subjectItems, $subjectSelect, ['class' => $formInputAttr['class'], 'placeholder' => 'Select subject'])
        ],
        [
            'label' => Form::label('exam_id', 'Exam', $formLabelAttr),
            'element' => Form::select('exam_id', $examItems, $examSelect, ['class' => $formInputAttr['class'], 'placeholder' => 'Select exam'])
        ],
        [
            'label' => Form::label('question', 'Question', $formLabelAttr),
            'element' => Form::textArea('question', $item['question'], $formCkeditor)
        ],
        [
            'label' => Form::label('answer_a', 'Answer A', $formLabelAttr),
            'element' => Form::textArea('answer_a', $item['answer_a'], $formCkeditor)
        ],
        [
            'label' => Form::label('answer_b', 'Answer B', $formLabelAttr),
            'element' => Form::textArea('answer_b', $item['answer_b'], $formCkeditor)
        ],
        [
            'label' => Form::label('answer_c', 'Answer C', $formLabelAttr),
            'element' => Form::textArea('answer_c', $item['answer_c'], $formCkeditor)
        ],
        [
            'label' => Form::label('answer_d', 'Answer D', $formLabelAttr),
            'element' => Form::textArea('answer_d', $item['answer_d'], $formCkeditor)
        ],
        [
            'label' => Form::label('correct_answer', 'Correct Answer', $formLabelAttr),
            'element' => Form::select('correct_answer', $answerItems, $item['correct_answer'], ['class' => $formInputAttr['class'], 'placeholder' => 'Select answer'])
        ],
        [
            'element' => $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-success']),
            'type' => 'btn-submit'
        ]
    ]
@endphp

{{-- Phan them le cua page form --}}
@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Subject Management</h3>
        </div>
        <div class="zvn-add-new pull-right">
            <a href="{{route($controllerName)}}" class="btn btn-info"><i
                    class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    @include('admin/templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin/templates.x-title', ['title' => 'Form'])
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
@endsection
