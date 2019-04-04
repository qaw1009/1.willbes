@extends('lcms.layouts.master_modal')

@section('layer_title')
    마스터강의 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group form-group-bordered pt-10 pb-5">
                <label class="control-label col-md-2 pt-5">마스터강의검색
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                </div>
                <div class="col-md-6">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>

                <label class="control-label col-md-2 pt-5">강사검색
                </label>
                <div class="col-md-3">
                    <input type="text" class="form-control input-sm" id="search_prof" name="search_prof">
                </div>
                <label class="control-label col-md-1 pt-5 pl-30">조건
                </label>
                <div class="col-md-6 form-inline">
                    <select class="form-control" id="search_cp" name="search_cp" style="width:150px;">
                        <option value="">CP사</option>
                        @foreach($cp_list as $row)
                            <option value="{{ $row['wCpIdx'] }}">{{ $row['wCpName'] }}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="search_category" name="search_category" style="width:120px;">
                        <option value="">콘텐츠유형</option>
                        @foreach($content_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="search_progress" name="search_progress" style="width:120px;">
                        <option value="">진행상태</option>
                        @foreach($progress_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="search_is_use" name="search_is_use" style="width:110px;">
                        <option value="Y">사용</option>
                        <option value="N">미사용</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 text-right pr-5 mt-10">
                <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
                <button type="button" class="btn btn-default btn-sm btn-search mr-0" id="_btn_reset">초기화</button>
            </div>

            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>CP사</th>
                            <th>콘텐츠유형 </th>
                            <th>마스터강의명[코드] </th>
                            <th>교수명 </th>
                            <th>업로드 </th>
                            <th>진행상태 </th>
                            <th>제작월 </th>
                            <th>사용여부 </th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#_search_form');
                var $list_table_modal = $('#_list_ajax_table');

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/common/searchWMasterLecture/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    // 리스트 번호
                                    return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'wCpName'},
                            {'data' : 'wContentCcd_Name'},
                            {'data' : 'wLecName', 'render' : function(data, type, row, meta) {
                                    return '<a href="#" class="btn-select" data-row-idx="' + meta.row + '"><u>' + data + '</u></a> ['+row.wLecIdx+ ']';
                                }},
                            {'data' : 'profName_string'},
                            {'data' : 'wUnitLectureCnt'},
                            {'data' : 'wProgressCcd_Name'},
                            {'data' : 'wMakeYM'},
                            {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                                    return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                                }},
                            {'data' : 'wRegAdminName'},
                            {'data' : 'wRegDatm'}
                        ]
                    });

                    // 마스터강의선택
                    $datatable_modal.on('click', '.btn-select', function() {

                        if (!confirm('해당 강의를 선택하시겠습니까?')) {
                            return;
                        }

                        var $parent_masterTitle = $('#masterTitle');  //강의명 코드
                        var $parent_masterInfo = $('#masterInfo');    //강의정보
                        var $parent_cpInfo = $('#cpInfo');  //cp정보

                        var that = $(this);
                        var row = $datatable_modal.row(that.data('row-idx')).data();

                        var $masterInfo = '[촬영형태] '+row.wShootingCcd_Name+' &nbsp;&nbsp; [진행상태] '+row.wProgressCcd_Name+''
                                                + ' &nbsp;&nbsp; [제작월] '+row.wMakeYM;
                        if(!(row.wAttachFile == null) && (row.wAttachFile != '')) {
                            $attach_link = "{{site_url('/product/on/lecture/download/')}}?filename="+encodeURIComponent(row.wAttachPath+row.wAttachFile)+"&filename_ori="+encodeURIComponent(row.wAttachFileReal);
                            $masterInfo = $masterInfo +' &nbsp;&nbsp; [첨부자료] <a href=' + $attach_link + ' target="_blank">' + row.wAttachFileReal +'</a>';
                        }

                        $parent_masterTitle.html(row.wLecName + ' [ ' + row.wLecIdx + ' ] ');   //강의명, 코드명 삽입
                        $('#wLecIdx').val(row.wLecIdx); //강의코드 삽입

                        $parent_masterInfo.html($masterInfo);   //강의기본정보 추출
                        /*$parent_cpInfo.html('<input type="hidden" name="wCpIdx" value="'+row.wCpIdx+'">'
                                                    +'<input type="number" name="CpDistribution" id="CpDistribution" style="width:50px" maxlength="3" class="form-control">% '
                                                    +'&nbsp;&nbsp;[CP사] '+row.wCpName);     */ //CP정보

                        $('#wCpIdx').val(row.wCpIdx);
                        var distribution = "0";
                        if(row.wCpName=='윌비스'){ distribution = "100"}
                        $('#CpDistribution').val(distribution);
                        $('#cpName').html(row.wCpName);


                        $('#ProdName').val(row.wLecName);   //강좌명
                        $('#unitNumCount').val(row.wUnitCnt);   //회차수
                        $('#unitNumLectureCount').val(row.wUnitLectureCnt);   //강의수
                        $('#wScheduleCount').val(row.wScheduleCount);   //예정강의수
                        $('#AllLecTime').val(row.wRuntimeSum); //전체강의시간

                        $("#sampleList span").remove();   //회차 정보 초기화
                        $("#teacherDivision tbody").remove();   //강사 정산 초기화


                        $("#pop_modal").modal('toggle');
                    });

                    $("#_btn_reset").click(function(){
                        $search_form_modal[0].reset();$datatable_modal.draw();
                    });

                });
            </script>

        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection