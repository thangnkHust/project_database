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
                    <th class="column-title">Subject</th>
                    <th class="column-title">Name Exam</th>
                    <th class="column-title">Question</th>
                    <th class="column-title">Answer</th>
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
                            $nameSubject = $val->exam->subject->name;
                            $nameExam = $val->exam->name;
                            $question = $val->question;
                            $answer_a = $val->answer_a;
                            $answer_b = $val->answer_b;
                            $answer_c = $val->answer_c;
                            $answer_d = $val->answer_d;
                            $correct_answer = $val->correct_answer;
                            $test = ['A', 'B', 'C', 'D'];
                            // $name = hightlight::show($val->name, $params['search'], 'question');
                            $createdHistory = template::showItemHistory($val->created_at);
                            $updatedHistory = template::showItemHistory($val->updated_at);
                            $listButtonAction = template::showActionButton($controllerName, $id);
                        @endphp

                        <tr class="even pointer">
                            <td class="" width="2%">{{$index}}</td>
        
                            <td width="8%">
                                {!!$nameSubject!!}
                            </td>

                            <td width="20%">
                                {!!$nameExam!!}
                            </td>

                            <td width="39%">
                                <p><strong>Question: </strong> {!!$question!!}</p>
                                <p><strong>A: </strong>{!!$answer_a!!}</p>
                                <p><strong>B: </strong>{!!$answer_b!!}</p>
                                <p><strong>C: </strong>{!!$answer_c!!}</p>
                                <p><strong>D: </strong>{!!$answer_d!!}</p>
                            </td>

                            <td width="5%">
                                {!!$test[$correct_answer - 1]!!}
                            </td>
        
                            <td width="8%">
                                {!!$createdHistory!!}
                            </td>
        
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