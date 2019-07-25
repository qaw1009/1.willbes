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
                    <div class="col-md-6 item form-inline">
                        <select name='rowNum' id='rowNum' class="form-control" title="갯수" style="width: 50px">
                            @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if($i===3)selected="selected"@endif>{{$i}}</option>
                            @endfor
                        </select>
                        <button class="btn btn-sm btn-primary mr-20" type="button" id="btn-add">필드추가</button>
                        <button class="btn btn-success btn-sm mr-10 " type="submit">저장</button>
                        <button class="btn btn-default btn-sm btn_modal_close " id="btn_modal_close_top" type="button">닫기</button>
                    </div>
                    <div class="col-md-6 item form-inline text-right ">
                        <button class="btn btn-success btn-sm mr-10" type="submit">저장</button>
                        <button class="btn btn-default btn-sm btn_modal_close" id="btn_modal_close_top" type="button">닫기</button>
                    </div>

                    <table id="list_table" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                        <tr>
                            <th>순번</th>
                            <th>회차/강<span class="required">*</span></th>
                            <th width="330">영상제목<span class="required">*</span>/보조자료</th>
                            <th>강의시간<span class="required">*</span><BR>/북페이지</th>
                            <th width="370">영상경로<span class="required">*</span></th>
                            <th>영상비율<span class="required">*</span></th>
                            <th  width="150">촬영일/교수<span class="required">*</span></th>
                            <th>활성</th>
                            <th width="100">등록일/등록자</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($data_unit) >= 1)
                            @foreach($data_unit as $row)
                                <tr id="trID{{$loop->index}}">
                                    <input type="hidden" name="seq[]" id="seq{{$loop->index}}" value="{{$loop->index}}" >
                                    <input type="hidden" name="wUnitIdx[]" id="wUnitIdx{{$loop->index}}" value="{{$row['wUnitIdx'] }}" >
                                    <td>
                                        <input type="text" name="wOrderNum[]" value="{{ $row['wOrderNum'] }}" size="3" required="required" class="form-control" >
                                    </td>
                                    <td>
                                        <input type="number" name="wUnitNum[]" id="wUnitNum{{$loop->index}}" required="required"  class="form-control" title="회차" value="{{ $row['wUnitNum'] }}" style="width: 30px">회차
                                        <input type="number" name="wUnitLectureNum[]" id="wUnitLectureNum{{$loop->index}}" required="required"  class="form-control" title="강" value="{{ $row['wUnitLectureNum'] }}" style="width: 30px">강
                                        <BR>
                                        <button class="btn btn-sm btn-danger btn-delete" type="button" onclick="rowDelete('{{$loop->index}}')">삭제</button>
                                    </td>
                                    <td>
                                        <input type="text" name="wUnitName[]" id="wUnitName{{$loop->index}}"  class="form-control" title="영상제목" value="{{ $row['wUnitName'] }}" style="width: 320px;">
                                        <BR>
                                        <b>[설명]</b> <input type="text" name="wUnitInfo[]" id="wUnitInfo{{$loop->index}}"  class="form-control" title="설명" value="{{ $row['wUnitInfo'] }}" style="width: 274px ">
                                        <BR>
                                        <input type="file" name="wUnitAttachFile[]" id="wUnitAttachFile{{$loop->index}}" class="form-control" title="첨부자료">
                                        @if(empty($row['wUnitAttachFile']) !== true)
                                            <br>
                                            <p class="form-control-static ">
                                                [ <a href="{{site_url('/cms/lecture/download/').'?filename='.urlencode(str_replace( '//', '/', $data['wAttachPath'].'/'.$row['wUnitAttachFile'])).'&filename_ori='.urlencode($row['wUnitAttachFileReal']) }}" >{{ $row['wUnitAttachFileReal'] }}</a> ]
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
                                        [와이드] <font color="white">질</font><input type="text" name="wWD[]" id="wWD{{$loop->index}}" class="form-control"  title="와이드" value="{{ $row['wWD'] }}" style="width: 250px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView('WD','{{$loop->index}}')">보기</button>
                                        <BR>
                                        [고화질] <font color="white">질</font><input type="text" name="wHD[]" id="wHD{{$loop->index}}" class="form-control" title="고화질" value="{{ $row['wHD'] }}" style="width: 250px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView('HD','{{$loop->index}}')">보기</button>
                                        <BR>
                                        [일반화질] <input type="text" name="wSD[]" id="wSD{{$loop->index}}" class="form-control"  title="저화질" value="{{ $row['wSD'] }}" style="width: 250px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView('SD','{{$loop->index}}')">보기</button>
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
                                    <td align=center>
                                        <select name="wIsUse[]"  class="form-control is_use" data-idx="{{$loop->index}}" onchange="changeView(this,'{{$loop->index}}')" >
                                            <option value="Y" @if($row['wIsUse'] ==='Y')selected="selected" @endif >활성</option>
                                            <option value="N" @if($row['wIsUse'] ==='N')selected="selected" @endif style='color:red;font-weight:bold;'>비활성</option>
                                        </select>
                                        <BR>
                                        <span id="is_use_view_{{$loop->index}}">{!! $row['wIsUse'] ==='Y' ? '' : '<b><font color=red>[비활성]</font></b>' !!}</span>
                                    </td>
                                    <td>
                                        {{ $row['wRegDatm'] }}
                                        <BR>
                                        {{ $row['wAdminName'] }}
                                    </td>
                                </tr>
                            @endforeach

                        @else

                            @for($i=1; $i<=3; $i++)
                                <tr id="trID{{$i}}">
                                    <input type="hidden" name="seq[]" id="seq{{$i}}" value="{{$i}}" >
                                    <input type="hidden" name="wUnitIdx[]" id="wUnitIdx{{$i}}" value="" >
                                    <td><input type="text" name="wOrderNum[]" value="{{$i}}" size="3" required="required" class="form-control" ></td>
                                    <td>
                                        <input type="number" name="wUnitNum[]" id="wUnitNum{{$i}}" required="required"  class="form-control" title="회차" value="1" style="width: 30px">회차
                                        <input type="number" name="wUnitLectureNum[]" id="wUnitLectureNum{{$i}}" required="required"  class="form-control" title="강" value="{{$i}}" style="width: 30px">강
                                        <BR>
                                        <button class="btn btn-sm btn-danger btn-delete" type="button" onclick="rowDelete('{{$i}}')">삭제</button>
                                    </td>
                                    <td>
                                        <input type="text" name="wUnitName[]" id="wUnitName{{$i}}"  class="form-control" title="영상제목" value="" style="width: 320px">
                                        <BR>
                                        <b>[설명]</b> <input type="text" name="wUnitInfo[]" id="wUnitInfo{{$i}}"  class="form-control" title="설명" value="" style="width: 274px">
                                        <BR>
                                        <input type="file" name="wUnitAttachFile[]" id="wUnitAttachFile{{$i}}" class="form-control" title="첨부자료">
                                    </td>
                                    <td>
                                        <input type="number" name="wRuntime[]" id="wRuntime{{$i}}" class="form-control" maxlength="5" required="required" title="강의시간" value="" style="width: 50px"> 분
                                        <BR>
                                        <input type="text" name="wBookPage[]" id="wBookPage{{$i}}" class="form-control" title="북페이지" value="" style="width: 50px"> P
                                    </td>
                                    <td>
                                        [와이드] <font color="white">질</font><input type="text" name="wWD[]" id="wWD{{$i}}" class="form-control"  title="와이드" value="" style="width: 250px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView('WD','{{$i}}')">보기</button>
                                        <BR>
                                        [고화질] <font color="white">질</font><input type="text" name="wHD[]" id="wHD{{$i}}" class="form-control"  title="고화질" value="" style="width: 250px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView('HD','{{$i}}')">보기</button>
                                        <BR>
                                        [일반화질] <input type="text" name="wSD[]" id="wSD{{$i}}" class="form-control" title="일반화질" value="" style="width: 250px">
                                        <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView('SD','{{$i}}')">보기</button>
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
                                    <td align=center>
                                        <select name="wIsUse[]" class="form-control is_use" data-idx="{{$i}}" onchange="changeView(this,'{{$i}}')">
                                            <option value="Y">활성</option>
                                            <option value="N" style='color:red;font-weight:bold;'>비활성</option>
                                        </select><BR>
                                        <span id="is_use_view_{{$i}}"></span>
                                    </td>
                                    <td></td>
                                </tr>
                            @endfor

                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <script type="text/javascript">

                var $regi_form_modal = $('#_regi_form');
                var $datatable_modal;
                var $list_table_modal = $('#list_table');

                $(document).ready(function() {

                    $datatable_modal = $list_table_modal.DataTable({
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

                        //alert(  $( "input[name='seq[]']" ).length);
                        var wUnitNum_count =$( "input[name='wUnitNum[]']" ).length;
                        var last_wUnitNum = $( "input[name='wUnitNum[]']" ).eq(wUnitNum_count-1).val();
                        var last_wUnitLectureNum = $( "input[name='wUnitLectureNum[]']" ).eq(wUnitNum_count-1).val();

                        last_wUnitNum = last_wUnitNum == "" ? "0" : last_wUnitNum;
                        last_wUnitLectureNum = last_wUnitLectureNum == "" ? "0" : last_wUnitLectureNum;

                        //alert(last_wUnitNum+' - '+last_wUnitLectureNum);return;

                        for (i=0;i<addCnt;i++ ) {
                            $list_table_modal.append(
                                '<tr id="trID'+seq+'">'
                                +'<input type="hidden" name="seq[]" id="seq'+seq+'" value="'+seq+'" >'
                                +'<input type="hidden" name="wUnitIdx[]" id="wUnitIdx'+seq+'" value="">'
                                //+'<td>'+seq+'</td>'
                                +'<td><input type="text" name="wOrderNum[]" value="'+seq+'" size="3" required="required" class="form-control" ></td>'
                                +'<td>'
                                +'<input type="number" name="wUnitNum[]" id="wUnitNum'+seq+'" required="required"  class="form-control" title="회차" value="'+(parseInt(last_wUnitNum))+'" style="width: 30px">회차'
                                +'<input type="number" name="wUnitLectureNum[]" id="wUnitLectureNum'+seq+'" required="required"  class="form-control" title="강" value="'+(parseInt(last_wUnitLectureNum)+(i+1))+'" style="width: 30px">강<BR>'
                                +'<button class="btn btn-sm btn-danger btn-delete" type="button" onclick="rowDelete(\''+seq+'\')">삭제</button>'
                                +'</td>'
                                +'<td>'
                                +'<input type="text" name="wUnitName[]" id="wUnitName'+seq+'" class="form-control" title="영상제목" value="" style="width: 320px">'
                                +'<BR>'
                                +'<b>[설명]</b> <input type="text" name="wUnitInfo[]" id="wUnitInfo'+seq+'"  class="form-control" title="설명" value="" style="width: 274px">'
                                +'<BR>'
                                +'<input type="file" name="wUnitAttachFile[]" id="wUnitAttachFile'+seq+'" class="form-control" title="첨부자료">'
                                +'</td>'
                                +'<td>'
                                +'<input type="text" name="wRuntime[]" id="wRuntime'+seq+'" class="form-control" required="required" title="강의시간" value="" style="width: 50px"> 분'
                                +'<BR>'
                                +'<input type="text" name="wBookPage[]" id="wBookPage'+seq+'" class="form-control" title="북페이지" value="" style="width: 50px"> P'
                                +'</td>'
                                +'<td>'
                                +'[와이드] <font color="white">질</font><input type="text" name="wWD[]" id="wWD'+seq+'" class="form-control" title="와이드" value="" style="width: 250px">'
                                +' <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView(\'WD\',\''+seq+'\')">보기</button>'
                                +'<BR>'
                                +'[고화질] <font color="white">질</font><input type="text" name="wHD[]" id="wHD'+seq+'" class="form-control" title="고화질" value="" style="width: 250px">'
                                +' <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView(\'HD\',\''+seq+'\')">보기</button>'
                                +'<BR>'
                                +'[일반화질] <input type="text" name="wSD[]" id="wSD'+seq+'" class="form-control" title="일반화질" value="" style="width: 250px">'
                                +' <button class="btn btn-sm btn-primary border-radius-reset mr-1" type="button" onclick="vodView(\'SD\',\''+seq+'\')">보기</button>'
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
                                +'</td>'
                                +'<td align=center><select name="wIsUse[]" class="form-control is_use" data-idx="'+seq+'" onchange="changeView(this,\''+seq+'\')">\n' +
                                '               <option value="Y">활성</option>\n' +
                                '               <option value="N" style=\'color:red;font-weight:bold;\'>비활성</option>\n' +
                                '           </select><BR>' +
                                '       <span id="is_use_view_'+seq+'"></span></td>'
                                +'   <td></td>'
                                +'</tr>'
                            );
                            seq = seq + 1;

                        }
                    });

                    // ajax submit
                    $regi_form_modal.submit(function() {
                        var _url = '{{ site_url('/cms/lecture/storeUnit') }}';
                        ajaxSubmit($regi_form_modal, _url, function(ret) {
                            if(ret.ret_cd) {
                                //notifyAlert('success', '알림', ret.ret_msg);
                                //$("#pop_modal").modal('toggle');
                                alert("저장되었습니다.");
                                var _replace_url = '{{ site_url('cms/lecture/createUnitModal/').$lecidx.'/'.$selected_prof_idx }}';
                                replaceModal(_replace_url,'');
                                $datatable.draw();
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    $("#btn_modal_close,#btn_modal_close_top").click(function(){
                        @if(empty($selected_prof_idx) == false)
                        location.replace('{{ site_url('/cms/lecture/create/').$lecidx }}' + getQueryString());
                        @else
                        $('#pop_modal').modal("toggle");
                        @endif
                    })
                });
                /*
                $( ".is_use" ).change(function() {
                    alert("aa");
                    idx = $(this).data("idx");
                    idx_val = $(this).val();
                    view = '';
                    if(idx_val == "N") {
                        view = '<b><font color=red>[비활성]</font></b>'
                    } else {
                        view = '';
                    }
                    $("#is_use_view_"+idx).html(view);
                });
                */
                function changeView(sel,idx) {
                    var idx = idx;
                    var idx_val = sel.value;

                    if(idx_val == "N") {
                        view = '<b><font color=red>[비활성]</font></b>'
                    } else {
                        view = '';
                    }
                    $("#is_use_view_"+idx).html(view);
                }

                function rowDelete(delSeq){
                    if(confirm("삭제하시겠습니까?") != true) {
                        return;
                    }
                    var nowRowCnt = ($("#list_table tr").length - 1); //tr 갯수 추출 : 타이틀부분 제외를 위해 -1
                    //alert(nowRowCnt + ' - ' + delSeq);
                    if(nowRowCnt>0) {
                        var selectwUnitIdx = $("input[id='wUnitIdx"+delSeq+"']").val();
                        $regi_form_modal.append('<input name="delwUnitIdx[]" type="hidden" value="'+selectwUnitIdx+'">');
                        $("#trID"+delSeq).remove();
                    }
                }

                function attachFileDelete(strwUnitIdx) {
                    if(confirm('첨부파일을 삭제하시겠습니까?')) {

                        var data = {
                            '{{ csrf_token_name() }}' : $regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                            'method' : 'POST',
                            'LecIdx' : $('#LecIdx').val(),
                            'wUnitIdx' : strwUnitIdx
                        };

                        sendAjax('{{ site_url('/cms/lecture/storeUnit') }}', data, function(ret) {
                            if (ret.ret_cd) {
                                //notifyAlert('success', '알림', ret.ret_msg);
                                //$("#pop_modal").modal('toggle');
                                alert("삭제되었습니다.");
                                var _replace_url = '{{ site_url('cms/lecture/createUnitModal/').$lecidx.'/'.$selected_prof_idx }}';
                                replaceModal(_replace_url,'');
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
            <button class="btn btn-success btn-sm mr-10 alignleft" type="submit">저장</button>
            <button class="btn btn-default btn-sm btn_modal_close alignleft" id="btn_modal_close_top" type="button">닫기</button>

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