@extends('lcms.layouts.master_modal')

@section('layer_title')
    문항호출
@stop

@section('layer_header')
    <form class="form-table form-horizontal" id="modal_reg_form" name="modal_reg_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @endsection

        @section('layer_content')
            <div class="mt-15 mb-5">
                <span class="required">*</span> 시험지정보
            </div>
            <table class="table table-bordered" id="quInfoWrap">
                <tr>
                    <th style="width:20%">운영사이트</th>
                    <td></td>
                </tr>
                <tr>
                    <th style="width:20%">카테고리</th>
                    <td></td>
                </tr>
                <tr>
                    <th style="width:20%">과목별 문제지정보</th>
                    <td></td>
                </tr>
            </table>

            <div class="mt-50">
                <div>
                    <div class="pull-left mt-15 mb-10"></div>
                    <div class="pull-right text-right form-inline mb-5">
                        <select class="form-control">
                            @foreach(range(1, 20) as $n)
                                <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary" id="act-call-addRow">필드추가</button>
                    </div>
                </div>
                <table class="table table-bordered" id="modal_reg_table">
                    <thead>
                    <tr>
                        <th class="text-center">문항번호</th>
                        <th class="text-center">연도/회차/문항번호</th>
                        <th class="text-center">문제영역</th>
                        <th class="text-center">문제등록옵션</th>
                        <th class="text-center">문제미리보기</th>
                        <th class="text-center">해설미리보기</th>
                        <th class="text-center">정답</th>
                        <th class="text-center">난이도</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                    <tr data-chapter-idx="">
                        <td class="text-center form-inline"></td>
                        <td class="text-center form-inline">
                            <select class="form-control mr-5" name="qu_year">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <select class="form-control mr-5" name="qu_round">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" name="qu_no">
                                <option value="">문항번호</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm btn-primary" id="act-getQuestion">조회</button>
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"><span class="underline-link act-review" data-review-type="q">확인</span></td>
                        <td class="text-center"><span class="underline-link act-review" data-review-type="e">확인</span></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    // 초기화
                    var quInfo2 = $regi_form.find('#selected_category').text().trim().replace(/\[.+/, '');
                    var quInfo3 = $regi_form.find('#selected_category').text().trim().replace(/^.+>\s/, '').replace(/\s\[.+$/, '') + ' | ' +
                        $regi_form.find('#selected_professor').text().trim().replace(/\|.+/, '') + ' | ' +
                        $regi_form.find('[name="Year"] option:selected').text() + ' | ' +
                        $regi_form.find('[name="RotationNo"] option:selected').text() + '회차 | ' +
                        $regi_form.find('[name="QuestionOption"] option:selected').text() + ' | 보기 ' +
                        $regi_form.find('[name="AnswerNum"] option:selected').text() + '개';

                    $('#quInfoWrap tr:eq(0) > td').text( $regi_form.find('[name="siteCode"] option:selected').text() );
                    $('#quInfoWrap tr:eq(1) > td').text( quInfo2 );
                    $('#quInfoWrap tr:eq(2) > td').text( quInfo3 );


                    var callList = $('#modal_reg_table').find('tbody');
                    var callAddField = callList.find('tr:eq(0)').html();
                    //callList.find('tr:eq(0)').remove();

                    // 필드 추가
                    $('#act-call-addRow').on('click', function () {
                        var i;
                        var count = $(this).closest('div').find('select').val();

                        for (i=0; i < count; i++) {
                            callList.append('<tr data-chapter-idx="">' + callAddField + '</tr>');
                        }

                        callList.find('tr').each(function (index) {
                            $(this).find('td:eq(0)').text(++index);
                        });
                    });

                    // 조회
                    $('.act-getQuestion').on('click', function() {
                        var $mForm = $('#modal_reg_form');
                        var _url = '{{ site_url("/mocktest/regExam/call") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $mForm.find('[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'GET',
                            'qu_year' : $mForm.find('[name="qu_year"]').val(),
                            'qu_round' : $mForm.find('[name="qu_round"]').val(),
                            'qu_no' : $mForm.find('[name="qu_no"]').val(),
                            'moLink' : $regi_form.find('[name="moLink"]').val(),
                            'ProfIdx' : $regi_form.find('[name="ProfIdx"]').val(),
                            'QuestionOption' : $regi_form.find('[name="QuestionOption"]').val(),
                            'AnswerNum' : $regi_form.find('[name="AnswerNum"]').val(),
                        };

                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {

                                alert('문제등록옵션 또는 정답의 보기갯수가 일치하지 않습니다.');
                            }
                        }, showValidateError, false, 'POST');

                    });
                });
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection