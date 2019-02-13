@extends('lcms.layouts.master_modal')
@section('layer_title')
    회차
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}

        <input type="hidden" name="LecIdx" id="LecIdx" value="{{$lecidx}}" />
        <input type="hidden" name="delwUnitIdx[]" id="delwUnitIdx" value="">

        @endsection

        @section('layer_content')
            <div class="x_title">
                <div class="pull-left">
                    <div class="inline-block bold">마스터강의기본정보</div>
                    · {{ $data['wCpName'] }} > {{ $data['wContentCcdName'] }} > {{ $data['wLecName'] }} > {{ $data['profName_string'] }}
                </div>
                <div class="text-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
            </div>
            {!! form_errors() !!}
            <div class="form-group form-group-sm no-border-bottom">
                <div class="">
                    <div class="item form-inline">
                        <select name='rowNum' id='rowNum' class="form-control" title="갯수" style="width: 50px">
                            @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if($i===3)selected="selected"@endif>{{$i}}</option>
                            @endfor
                        </select>
                        <button class="btn btn-sm btn-primary" type="button" id="btn-add">필드추가</button>
                    </div>
                    <table id="list_table" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>회차/강<span class="required">*</span></th>
                            <th>영상제목<span class="required">*</span>/보조자료</th>
                            <th>강의시간<span class="required">*</span><BR>/북페이지</th>
                            <th>영상경로<span class="required">*</span></th>
                            <th>영상비율<span class="required">*</span></th>
                            <th>촬영일/교수<span class="required">*</span></th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($data_unit) >= 1)
                            @foreach($data_unit as $row)
                                <tr id="trID{{$loop->index}}">
                                    <input type="hidden" name="seq[]" id="seq{{$loop->index}}" value="{{$loop->index}}" >
                                    <input type="hidden" name="wUnitIdx[]" id="wUnitIdx{{$loop->index}}" value="{{$row['wUnitIdx'] }}" >
                                    <td>{{ $loop->index }}</td>
                                    <td>
                                        <input type="number" name="wUnitNum[]" id="wUnitNum{{$loop->index}}" required="required"  class="form-control" title="회차" value="{{ $row['wUnitNum'] }}" style="width: 35px">회차
                                        <input type="number" name="wUnitLectureNum[]" id="wUnitLectureNum{{$loop->index}}" required="required"  class="form-control" title="강" value="{{ $row['wUnitLectureNum'] }}" style="width: 42px">강
                                        <BR>
                                        <button class="btn btn-sm btn-danger btn-delete" type="button" onclick="rowDelete('{{$loop->index}}')">삭제</button>
                                    </td>
                                    <td>
                                        <input type="text" name="wUnitName[]" id="wUnitName{{$loop->index}}" required="required"  class="form-control" title="영상제목" value="{{ $row['wUnitName'] }}" style="width: 230px">
                                        <BR>
                                        <input type="file" name="wUnitAttachFile[]" id="wUnitAttachFile{{$loop->index}}" class="form-control" title="첨부자료">
                                        @if(empty($row['wUnitAttachFile']) !== true)
                                            <br>
                                            <p class="form-control-static ml-10 mr-10">
                                                [ <a href="{{site_url('/cms/lecture/download/').urlencode($data['wAttachPath'].$row['wUnitAttachFile']).'/'.urlencode($row['wUnitAttachFileReal']) }}" target="_blank">{{ $row['wUnitAttachFileReal'] }}</a> ]
                                                &nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="attachFileDelete('{{$row['wUnitIdx'] }}')"><span class="red">[X]</span></a>
                                            </p>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="number" name="wRuntime[]" id="wRuntime{{$loop->index}}" class="form-control" maxlength="5" required="required" title="강의시간" value="{{ $row['wRuntime']  }}" style="width: 50px"> 분
                                        <BR>
                                        <input type="text" name="wBookPage[]" id="wBookPage{{$loop->index}}" class="form-control" title="북페이지" value="{{ $row['wBookPage'] }}" style="width: 50px"> P
                                    </td>
                                    <td>
                                        [와이드] <input type="text" name="wWD[]" id="wWD{{$loop->index}}" class="form-control" required="required" title="와이드" value="{{ $row['wWD'] }}" style="width: 300px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView('WD','{{$loop->index}}')">보기</button>
                                        <BR>
                                        [고화질] <input type="text" name="wHD[]" id="wHD{{$loop->index}}" class="form-control" title="고화질" value="{{ $row['wHD'] }}" style="width: 300px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView('HD','{{$loop->index}}')">보기</button>
                                        <BR>
                                        [일반화질] <input type="text" name="wSD[]" id="wSD{{$loop->index}}" class="form-control"  title="저화질" value="{{ $row['wSD'] }}" style="width: 300px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView('SD','{{$loop->index}}')">보기</button>
                                    </td>
                                    <td>
                                        <select name="wContentSizeCcd[]" id="wContentSizeCcd{{$loop->index}}" class="form-control" title="화면비율" >
                                            @foreach($codes['108'] as $key => $value)
                                                <option value="{{$key}}" @if($row['wCcd'] == $key){{'SELECTED'}}@endif >{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control datepicker"  name="wShootingDate[]" id="wShootingDate{{$loop->index}}" required="required" title="촬영일" value="{{$row['wShootingDate']}}" style="width: 90px" readonly>
                                        <Br>
                                        <select name="wProfIdx[]" id="wProfIdx{{$loop->index}}" required="required" class="form-control" title="교수">
                                            <option value="">교수</option>
                                            @foreach($prof_list as $prof_row)
                                                <option value="{{$prof_row['wProfIdx']}}" @if($prof_row['wProfIdx'] === $row['wProfIdx'])selected="selected"@endif>{{$prof_row['wProfName']}} [ {{ $prof_row['wProfIdx'] }} ]</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>{{ $row['wAdminName'] }}</td>
                                    <td>{{ $row['wRegDatm'] }}</td>
                                </tr>
                            @endforeach

                        @else

                            @for($i=1; $i<=3; $i++)
                                <tr id="trID{{$i}}">
                                    <input type="hidden" name="seq[]" id="seq{{$i}}" value="{{$i}}" >
                                    <input type="hidden" name="wUnitIdx[]" id="wUnitIdx{{$i}}" value="" >
                                    <td>{{ $i }}</td>
                                    <td>
                                        <input type="number" name="wUnitNum[]" id="wUnitNum{{$i}}" required="required"  class="form-control" title="회차" value="" style="width: 35px">회차
                                        <input type="number" name="wUnitLectureNum[]" id="wUnitLectureNum{{$i}}" required="required"  class="form-control" title="강" value="" style="width: 42px">강
                                        <BR>
                                        <button class="btn btn-sm btn-danger btn-delete" type="button" onclick="rowDelete('{{$i}}')">삭제</button>
                                    </td>
                                    <td>
                                        <input type="text" name="wUnitName[]" id="wUnitName{{$i}}" required="required"  class="form-control" title="영상제목" value="" style="width: 230px">
                                        <BR>
                                        <input type="file" name="wUnitAttachFile[]" id="wUnitAttachFile{{$i}}" class="form-control" title="첨부자료">
                                    </td>
                                    <td>
                                        <input type="number" name="wRuntime[]" id="wRuntime{{$i}}" class="form-control" maxlength="5" required="required" title="강의시간" value="" style="width: 50px"> 분
                                        <BR>
                                        <input type="text" name="wBookPage[]" id="wBookPage{{$i}}" class="form-control" title="북페이지" value="" style="width: 50px"> P
                                    </td>
                                    <td>
                                        [와이드] <input type="text" name="wWD[]" id="wWD{{$i}}" class="form-control" required="required"  title="와이드" value="" style="width: 300px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView('WD','{{$i}}')">보기</button>
                                        <BR>
                                        [고화질] <input type="text" name="wHD[]" id="wHD{{$i}}" class="form-control"  title="고화질" value="" style="width: 300px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView('HD','{{$i}}')">보기</button>
                                        <BR>
                                        [일반화질] <input type="text" name="wSD[]" id="wSD{{$i}}" class="form-control" title="일반화질" value="" style="width: 300px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView('SD','{{$i}}')">보기</button>
                                    </td>
                                    <td>
                                        <select name="wContentSizeCcd[]" id="wContentSizeCcd{{$i}}" class="form-control" title="화면비율" >
                                            @foreach($codes['108'] as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control datepicker"  name="wShootingDate[]" id="wShootingDate{{$i}}" required="required" title="촬영일" value="{{date('Y-m-d')}}" style="width: 90px" readonly>
                                        <Br>
                                        <select name="wProfIdx[]" id="wProfIdx{{$i}}" required="required" class="form-control" title="교수">
                                            <option value="">교수</option>
                                            @foreach($prof_list as $prof_row)
                                                <option value="{{$prof_row['wProfIdx']}}" @if($selected_prof_idx == $prof_row['wProfIdx'])selected @endif>{{$prof_row['wProfName']}} [ {{ $prof_row['wProfIdx'] }} ]</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor

                        @endif

                        </tbody>
                    </table>
                </div>
            </div>


            <script type="text/javascript">

                var $regi_form = $('#_regi_form');
                var $datatable_modal;
                var $list_table = $('#list_table');

                $(document).ready(function() {

                    $datatable_modal = $list_table.DataTable({
                        responsive: false,
                        serverSide: false,
                        ajax : false,
                        paging: false,
                        searching: false
                    });

                    $('#btn-add').click(function() {
                        var addCnt = $("#rowNum").val();		//추가할 갯수
                        var nowRowCnt = ($("#list_table tr").length - 1); //tr 갯수 추출 : 타이틀부분 제외를 위해 -1
                        var seq = nowRowCnt+1;

                        for (i=0;i<addCnt;i++ ) {
                            $list_table.append(
                                '<tr id="trID'+seq+'">'
                                +'<input type="hidden" name="seq[]" id="seq'+seq+'" value="'+seq+'" >'
                                +'<input type="hidden" name="wUnitIdx[]" id="wUnitIdx'+seq+'" value="" >'
                                +'<td>'+seq+'</td>'
                                +'<td>'
                                +'<input type="number" name="wUnitNum[]" id="wUnitNum'+seq+'" required="required"  class="form-control" title="회차" value="" style="width: 35px">회차'
                                +'<input type="number" name="wUnitLectureNum[]" id="wUnitLectureNum'+seq+'" required="required"  class="form-control" title="강" value="" style="width: 42px">강<BR>'
                                +'<button class="btn btn-sm btn-danger btn-delete" type="button" onclick="rowDelete(\''+seq+'\')">삭제</button>'
                                +'</td>'
                                +'<td>'
                                +'<input type="text" name="wUnitName[]" id="wUnitName'+seq+'" required="required"  class="form-control" title="영상제목" value="" style="width: 230px">'
                                +'<BR>'
                                +'<input type="file" name="wUnitAttachFile[]" id="wUnitAttachFile'+seq+'" class="form-control" title="첨부자료">'
                                +'</td>'
                                +'<td>'
                                +'<input type="text" name="wRuntime[]" id="wRuntime'+seq+'" class="form-control" required="required" title="강의시간" value="" style="width: 50px"> 분'
                                +'<BR>'
                                +'<input type="text" name="wBookPage[]" id="wBookPage'+seq+'" class="form-control" title="북페이지" value="" style="width: 50px"> P'
                                +'</td>'
                                +'<td>'
                                +'[와이드] <input type="text" name="wWD[]" id="wWD'+seq+'" class="form-control" title="와이드" required="required" value="" style="width: 300px">'
                                +'<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView(\'WD\',\''+seq+'\')">보기</button>'
                                +'<BR>'
                                +'[고화질] <input type="text" name="wHD[]" id="wHD'+seq+'" class="form-control" title="고화질" value="" style="width: 300px">'
                                +'<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView(\'HD\',\''+seq+'\')">보기</button>'
                                +'<BR>'
                                +'[일반화질] <input type="text" name="wSD[]" id="wSD'+seq+'" class="form-control" title="일반화질" value="" style="width: 300px">'
                                +'<button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodView(\'SD\',\''+seq+'\')">보기</button>'
                                +'</td>'
                                +'<td>'
                                +'<select name="wContentSizeCcd[]" id="wContentSizeCcd'+seq+'" class="form-control" title="화면비율" >'
                                    @foreach($codes['108'] as $key => $value)
                                +'<option value="{{$key}}">{{$value}}</option>'
                                    @endforeach
                                +'</select>'
                                +'</td>'
                                +'<td>'
                                +'<input type="text" class="form-control datepicker" name="wShootingDate[]" id="wShootingDate'+seq+'" required="required" title="촬영일" value="{{date('Y-m-d')}}" style="width: 90px" readonly>'
                                +'<Br>'
                                +'<select name="wProfIdx[]" id="wProfIdx" required="required" class="form-control" title="교수">'
                                +'<option value="">교수</option>'
                                    @foreach($prof_list as $prof_row)
                                +'  <option value="{{$prof_row['wProfIdx']}}"  @if($selected_prof_idx == $prof_row['wProfIdx'])selected @endif>{{$prof_row['wProfName']}} [ {{ $prof_row['wProfIdx'] }} ]</option>'
                                    @endforeach
                                +'    </select>'
                                +'   </td>'
                                +'    <td></td>'
                                +'   <td></td>'
                                +'   </tr>'
                            );
                            seq = seq + 1;
                        }
                    });

                    // ajax submit
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/cms/lecture/storeUnit') }}';
                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                //$("#pop_modal").modal('toggle');
                                //location.reload();
                                $datatable.draw();
                            }
                        }, showValidateError, null, false, 'alert');
                    });
                });

                function rowDelete(delSeq){
                    var nowRowCnt = ($("#list_table tr").length - 1); //tr 갯수 추출 : 타이틀부분 제외를 위해 -1
                    //alert(nowRowCnt + ' - ' + delSeq);
                    if(nowRowCnt>0) {
                        var selectwUnitIdx = $("input[id='wUnitIdx"+delSeq+"']").val();
                        $regi_form.append('<input name="delwUnitIdx[]" type="hidden" value="'+selectwUnitIdx+'">');
                        $("#trID"+delSeq).remove();
                    }
                }


                function attachFileDelete(strwUnitIdx) {
                    if(confirm('첨부파일을 삭제하시겠습니까?')) {

                        var data = {
                            '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            'method' : 'POST',
                            'LecIdx' : $('#LecIdx').val(),
                            'wUnitIdx' : strwUnitIdx
                        };

                        sendAjax('{{ site_url('/cms/lecture/storeUnit') }}', data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                //location.reload();
                                $datatable.draw();
                            }
                        }, showError, false, 'POST');

                    }
                }

                function vodView(type, idx) {
                    // 데이타를 저장하지 않고도 확인하기 위해 현제 입력한 URL 을 정보로 강의를 플레이합니다.
                    $url = $('#MediaUrl').val() + '/' + $('#w'+type+idx).val();
                    popupOpen(app_url('/cms/lecture/player/?lecidx={{$lecidx}}&url='+$url+'&ratio='+$('#wContentSizeCcd'+idx).val() , 'wbs'), 'wbsPlayer', '1000', '600', null, null, 'no', 'no');
                }

            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
    <form class="form-horizontal form-label-left" id="_del_form" name="_del_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <input type="hidden" name="LecIdx" id="LecIdx" value="{{$lecidx}}" />
        <input type="hidden" name="del_wUnitIdx" id="del_wUnitIdx" value="">
    </form>
@endsection