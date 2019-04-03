@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스에서 제공하는 전체 동영상 강의에 대한 회차별 원천 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>마스터 강의등록</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="LecIdx" id="LecIdx" value="{{$lecidx}}"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="cp_idx">CP사 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                    
                        <select name="CpIdx" id="CpIdx" required="required" class="form-control" title="cp사" style="width: 200px">
                            <option value="">선택</option>
                        @foreach($cp_list as $row)
                            <option value="{{ $row['wCpIdx']}}" @if($row['wCpIdx'] == $data['wCpIdx'] || ($method == 'POST' && $row['wCpIdx']==='105') ) selected="selected"@endif>{{ $row['wCpName']}}</option>
                        @endforeach
                        </select>
                    
                    </div>

                    <label class="control-label col-md-2" for="content_ccd">콘텐츠유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <select name="ContentCcd" id="ContentCcd" required="required" class="form-control" title="콘텐츠유형" style="width: 200px">
                            <option value="">선택</option>
                            @foreach($content_ccd as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['wContentCcd']) selected="selected"@endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_name">마스터강의명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="LecName" name="LecName" required="required" class="form-control" title="마스터강의명" value="{{ $data['wLecName'] }}" style="width: 400px">
                        </div>
                    </div>
                    <label class="control-label col-md-2">마스터강의코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT') <b>{{ $data['wLecIdx'] }}</b>@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="ProfIdx">교수 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item form-inline">
                        <select name="ProfIdx[]" id="ProfIdx1" required="required" class="form-control" title="교수1">
                            <option value="">교수1</option>
                            @foreach($prof_list as $row)
                            <option value="{{$row['wProfIdx']}}"
                                @foreach($data_prof as $data_row )
                                    @if($data_row['wOrderNum'] =='1' && $data_row['wProfIdx'] == $row['wProfIdx'])selected="selected"@endif
                                @endforeach
                            >{{$row['wProfName']}} [ {{ $row['wProfIdx'] }} ]</option>
                            @endforeach
                        </select>
                        <select name="ProfIdx[]" id="ProfIdx2" class="form-control" title="교수2">
                            <option value="">교수2</option>
                            @foreach($prof_list as $row)
                            <option value="{{$row['wProfIdx']}}"
                                @foreach($data_prof as $data_row )
                                    @if($data_row['wOrderNum'] =='2' && $data_row['wProfIdx'] == $row['wProfIdx'])selected="selected"@endif
                                @endforeach
                            >{{$row['wProfName']}} [ {{ $row['wProfIdx'] }} ]</option>
                            @endforeach
                        </select>
                        <select name="ProfIdx[]" id="ProfIdx3" class="form-control" title="교수3">
                            <option value="">교수3</option>
                            @foreach($prof_list as $row)
                            <option value="{{$row['wProfIdx']}}"
                                @foreach($data_prof as $data_row )
                                    @if($data_row['wOrderNum'] =='3' && $data_row['wProfIdx'] == $row['wProfIdx'])selected="selected"@endif
                                @endforeach
                            >{{$row['wProfName']}} [ {{ $row['wProfIdx'] }} ]</option>
                            @endforeach
                        </select>
                         • 다수의 교수가 강의한 마스터강의의 경우 3명까지 선택 가능
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="ShootingCcd">촬영형태 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                        @foreach($shooting_ccd as $key => $val)
                            <input type="radio" id="ShootingCcd{{ $loop->index }}" name="ShootingCcd" class="flat" required="required" title="촬영형태" value="{{ $key }}" @if($data['wShootingCcd'] == $key)checked="checked"@endif>
                            <label for="ShootingCcd{{ $loop->index }}" class="input-label">{{ $val }}</label>
                        @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="ProgressCcd">진행상태 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                        @foreach($progress_ccd as $key => $val)
                            <input type="radio" id="ProgressCcd{{ $loop->index }}" name="ProgressCcd" class="flat" required="required" title="진행상태" value="{{ $key }}" @if($data['wProgressCcd'] == $key)checked="checked"@endif>
                            <label for="ProgressCcd{{ $loop->index }}" class="input-label">{{ $val }}</label>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="MakeYM">제작월 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline ">
                        <select name="MakeY" id="MakeY" class="form-control" title="제작년">
                        @for($i=(date('Y')+1); $i>=2007; $i--)
                            <option value="{{ $i }}" @if( ($method == 'POST' &&  $i == date('Y')) || substr($data['wMakeYM'],0,4) == $i) selected="selected" @endif>{{ $i }}년</option>
                        @endfor
                        </select>
                        <select name="MakeM" id="MakeM" class="form-control" title="제작월">
                            @for($i=1; $i<=12; $i++)
                                @if(strlen($i) == 1) {{ $ii = "0".$i }} @else {{ $ii = $i }} @endif
                            <option value="{{ $ii }}"
                                @if($method == 'POST')
                                    @if($ii == date('m')) selected="selected" @endif
                                @else
                                    @if(substr($data['wMakeYM'],4,2) == $ii) selected="selected" @endif
                                @endif
                             >{{ $i }}월</option>
                            @endfor
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="MediaUrl">미디어경로 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="item inline-block">
                            <input type="text" id="MediaUrl" name="MediaUrl" required="required" class="form-control" title="미디어경로" value="{{ $data['wMediaUrl'] }}" style="width: 350px">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>

                    <label class="control-label col-md-2" for="ScheduleCount">예정강의수 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="ScheduleCount" name="ScheduleCount" class="form-control" title="예정강의수" value="{{ $data['wScheduleCount'] }}" style="width:40px" required="required" numberOnly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="Keyword">키워드
                    </label>
                    <div class="col-md-4 form-inline">
                       <div class="item inline-block">
                            <input type="text" id="Keyword" name="Keyword" class="form-control" title="키워드" value="{{ $data['wKeyword'] }}" style="width: 400px">
                        </div>
                    </div>

                    <label class="control-label col-md-2" for="attachfile">첨부자료
                    </label>
                    <div class="col-md-4 form-inline">

                        <input type="file" name="attachfile" class="form-control" title="첨부자료">
                        @if(empty($data['wAttachFile']) === false)
                            <br>
                            <p class="form-control-static ml-10 mr-10">
                                [
                                <a href="{{site_url('/cms/lecture/download/').'?filename='.urlencode($data['wAttachPath'].$data['wAttachFile']).'&filename_ori='.urlencode($data['wAttachFileReal']) }}" target="_blank">
                                    {{ $data['wAttachFileReal'] }}</a> ]
                            </p>
                            <div class="checkbox">
                                <input type="checkbox" name="attach_delete" value="Y" class="flat"/> <span class="red">삭제</span>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="Memo">메모
                    </label>
                    <div class="col-md-8 form-inline">
                       <div class="item inline-block">
                            <input type="text" id="Memo"  class="form-control" title="메모" value="{{ $data['wMemo'] }}" style="width: 400px"
                                    @if(empty($data['wMemo']) === false) name="Memo_disable" readonly="readonly"
                                    @else name="Memo"
                                    @endif>
                           @if(empty($data['wMemoAdminName'])===false)({{ $data['wMemoRegDatm'] }} | {{ $data['wMemoAdminName'] }}) @endif
                        </div>
                    </div>
                </div>

    @if(empty($lecidx) === false)
                <input type="hidden" name="regdateyear" value="{{date("Y",strtotime($data['wRegDatm']))}}">
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wRegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
                    </div>
                </div>
    @endif

                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>

    @if(empty($lecidx) === false)
            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>회차</th>
                            <th width="400">영상제목/보조자료</th>
                            <th>강의시간<BR>/북페이지</th>
                            <th>영상경로</th>
                            <th>영상비율</th>
                            <th>촬영일/교수</th>
                            <th>활성</th>
                            <th>등록일/등록자</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data_unit as $row)
                            <tr>
                                <td>
                                    {{ $row['wUnitNum'] }}회차 {{ $row['wUnitLectureNum'] }}강
                                </td>
                                <td>
                                    {{ $row['wUnitName'] }}
                                    @if(empty($row['wUnitAttachFile']) === false)
                                        <br>
                                        <p class="form-control-static ml-10 mr-10">
                                            [ <a href="{{site_url('/cms/lecture/download/').'?filename='.urlencode(str_replace( '//', '/', $data['wAttachPath'].'/'.$row['wUnitAttachFile'])).'&filename_ori='.urlencode($row['wUnitAttachFileReal'])}}" target="_blank">{{ $row['wUnitAttachFileReal'] }}</a> ]
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    {{ $row['wRuntime']  }} 분
                                    <BR>
                                    {{ $row['wBookPage']  }} P
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('WD','{{$row['wUnitIdx']}}')">와이드&nbsp;&nbsp;&nbsp;</button> {{ $row['wWD'] }}
                                    <BR>
                                    <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('HD','{{$row['wUnitIdx']}}')">고화질&nbsp;&nbsp;&nbsp;</button> {{ $row['wHD'] }}
                                    <br>
                                    <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="vodViewUnit('SD','{{$row['wUnitIdx']}}')">일반화질</button> {{ $row['wSD'] }}
                                </td>
                                <td>{{$row['wCcdName']}}</td>
                                <td>
                                    {{ $row['wShootingDate'] }}
                                    <Br>
                                    {{ $row['wProfName'] }}
                                </td>
                                <td>{!! $row['wIsUse'] == 'Y' ? '활성' : '<b><font color=red>비활성</font></b>' !!}</td>
                                <td>{{ $row['wRegDatm'] }}<BR>{{ $row['wAdminName'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    @endif

        </div>
    </div>
   
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $datatable;
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {

                var _url = '{{ site_url('/cms/lecture/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/cms/lecture/create/') }}'+ret.ret_data +'/'+ getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/cms/lecture/index') }}' + getQueryString());
            });

            $datatable = $list_table.DataTable({
                serverSide: false,
                ajax : false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 회차등록', className: 'btn-sm btn-primary border-radius-reset btn-unitregist' }
                ]
            });

            $('.btn-unitregist').click(function() {

                $('.btn-unitregist').setLayer({
                    "url" : "{{ site_url('cms/lecture/createUnitModal/') }}"+ $('#LecIdx').val() +"/"+$("#ProfIdx1").val()
                    ,width : "1700"
                });
            });

            $("input:text[numberOnly]").on("keyup", function() {
                $(this).val($(this).val().replace(/[^0-9]/g,""));
            });
        });

        function vodViewUnit(quility, idx) {
            popupOpen(app_url('/cms/lecture/player/?lecidx={{$lecidx}}&unitidx='+idx+'&quility=' + quility , 'wbs'), 'wbsPlayer', '1000', '600', null, null, 'no', 'no');
        }
    </script>
@stop
