@extends('lcms.layouts.master_modal')

@section('layer_title')
    회차 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>CP사</th>
                        <th>콘텐츠유형 </th>
                        <th>마스터강의명[코드] </th>
                        <th>교수명 </th>
                        <th>업로드 </th>
                        <th>진행상태 </th>
                        <th>제작월 </th>
                        <th>사용여부 </th>
                    </tr>
                    <tr>
                        <td>{{$data_lecture['wCpName']}}</td>
                        <td>{{$data_lecture['wContentCcd_Name']}}</td>
                        <td>{{$data_lecture['wLecName']}} [{{$data_lecture['wLecIdx']}}]</td>
                        <td>{{$data_lecture['profName_string']}}</td>
                        <td>{{$data_lecture['wUnitLectureCnt']}}</td>
                        <td>{{$data_lecture['wProgressCcd_Name']}}</td>
                        <td>{{$data_lecture['wMakeYM']}}</td>
                        <td>@if($data_lecture['wIsUse']=='Y')사용@else<<span class="red">미사용</span>@endif</td>
                    </tr>
                    </thead>
                </table>
            </div>

            <div class="form-group">
                <div class="col-md-3 text-left">
                    • 맛보기 회차를 선택해 주세요.
                </div>
                <div class="col-md-9 text-right">
                    <button class="btn btn-sm btn-primary btn-select mb-0" type="button" id="btn-select">적용</button>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 clearfix">
                    <table id="_list_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>선택</th>
                            <th>회차/강<span class="required">*</span></th>
                            <th>영상제목<span class="required">*</span>/보조자료</th>
                            <th>강의시간<span class="required">*</span><BR>/북페이지</th>
                            <th>영상경로<span class="required">*</span></th>
                            <th>촬영일/교수<span class="required">*</span></th>
                            <th>등록자/등록일</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data_unit as $row)
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input type="checkbox" name="wUnitCode" id="wUnitCode{{$loop->index}}" class="flat" value="{{$row["wUnitIdx"]}}$[{{$row["wUnitNum"]}}회차 {{$row["wUnitLectureNum"]}}강] {{$row["wUnitName"]}}"/>
                                </div>
                            </td>
                            <td>
                                {{ $row['wUnitNum'] }}회차<BR>{{ $row['wUnitLectureNum'] }}강
                            </td>
                            <td>
                                {{ $row['wUnitName'] }}
                                @if(empty($row['wUnitAttachFile']) === false)
                                    <br>
                                    <p class="form-control-static ml-10 mr-10">
                                       [ <a href="{{site_url('/product/on/lecture/download/').'?filename='.urlencode($data_lecture['wAttachPath'].$row['wUnitAttachFile']).'&filename_ori='.urlencode($row['wUnitAttachFileReal']) }}" target="_blank">{{ $row['wUnitAttachFileReal'] }}</a> ]
                                    </p>
                                @endif
                            </td>
                            <td>
                                {{ $row['wRuntime']  }}
                                <BR>
                                {{ $row['wBookPage']  }}
                            </td>
                            <td>
                                [와이드] {{ $row['wWD'] }}
                                <br>
                                [고화질] {{ $row['wHD'] }}
                                <br>
                                [일반화질] {{ $row['wSD'] }}
                            </td>
                            <td>
                                {{ $row['wShootingDate'] }}
                                <Br>
                                {{ $row['wProfName'] }}
                            </td>
                            <td>
                                {{ $row['wRegDatm'] }}<br>
                                {{ $row['wAdminName'] }}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <script type="text/javascript">
                var $datatable;
                var $list_table = $('#_list_table');

                $(document).ready(function() {

                    $datatable = $list_table.DataTable({
                        serverSide: false,
                        ajax : false,
                        paging: false,
                        searching: false
                    });

                    // 카테고리 선택
                    //$datatable.on('click', '.btn-select', function() {
                    $("#btn-select").click(function(){

                        var addCnt = $("input[name='wUnitCode']:checked").length;		//적용할 갯수
                        var allCnt = $("input[name='wUnitCode']").length;						//노출된 전체 갯수

                        if (addCnt == 0) {
                            alert("회차를 선택해 주세요.");return;
                        }
                        if (!confirm('해당 회차를 적용하시겠습니까?')) {
                            return;
                        }

                        var nowRowCnt = ($(document).find("#sampleList span")).length;
                        var seq = nowRowCnt+1;

                        for (i=1;i<=allCnt;i++)	 {
                            if ( $("input:checkbox[id='wUnitCode"+i+"']").is(":checked") == true ) {

                                temp_data = $("#wUnitCode" + i).val();		//해당 id값 추출
                                temp_data_arr = temp_data.split("$")		//문자열 분리

                                $(document).find("#sampleList").append(
                                    "<span class='mb-5' id='unit" + seq + "'>"
                                    + "     <input type='hidden' name='wUnitCode[]' value='" + temp_data_arr[0] + "'>"
                                    + "      " + temp_data_arr[1] + " <a href='javascript:;' onclick='rowDelete(\"unit" + seq + "\")'><i class='fa fa-times red'></i></a>"
                                    + "</span>&nbsp;&nbsp;"
                                );
                                seq = seq + 1;
                            }
                        }
                        $("#pop_modal").modal('toggle');
                    });

                    $("#_btn_reset").click(function(){
                        $search_form[0].reset();$datatable.draw();
                    });

                });
            </script>

        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection