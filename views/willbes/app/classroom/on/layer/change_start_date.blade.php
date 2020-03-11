@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    시작일변경
                </div>
            </div>
        </div>

        <div class="willbes-Txt NGR c_both mt30 mb50 @if(get_cookie('moreInfo') == 'off') on @endif">
            <div class="willbes-Txt-Tit NG">· 수강시작일 설정 <div class="MoreBtn underline"><a href="javascript:;">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
            - 수강시작일은 개강일 전까지만 변경 가능합니다.<br/>
            - '시작일변경'버튼을 클릭하면 강의별 <span class="tx-red">최대 3회, 개강일기준 30일까지</span>만 변경이 가능합니다.<br/>
            - 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.<br/>
            - 수강시작이 이루어진 강좌는 시작일 변경이 불가능합니다.<br/>
        </div>
        <div class="willbes-List-Tit NG">수강시작일 설정</div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
            <tr>
                <td class="w-data tx-left pb-zero">
                    @if(empty($lec['SubjectName']) == false)
                        <dl class="w-info">
                            <dt>{{$lec['SubjectName']}}<span class="row-line">|</span>{{$lec['wProfName']}}교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                        </dl>
                    @endif
                    <div class="w-tit">
                        {{$lec['ProdName']}}
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>잔여기간 : <span class="tx-light-blue">{{$lec['RealLecExpireDay']}}</span>일 ({{$lec['LecStartDate']}}~{{$lec['RealLecEndDate']}})</dt>
                    </dl>
                    <div class="w-s-date">
                        <div class="grid calendarPickerBtn">
                            @if($lec['ChgStartNum'] >= 3)
                                수강시작일 변경횟수를 초과했습니다.
                            @else
                                <form name="chg_start_form" id="chg_start_form">
                                    {!! csrf_field() !!}
                                    {!! method_field('POST') !!}
                                    <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
                                    <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
                                    <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                                    <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
                                    <input type="hidden" name="prodtype" value="@if($lec['LearnPatternCcd'] == '615001' || $lec['LearnPatternCcd'] == '615002'){{'S'}}@else{{'P'}}@endif" />
                                    <a class="pl20" href="javascript:" xonclick="openWin('DATAPICKERPASS')">
                                        시작일 변경 : <input type="text" id="startdate" name="startdate" class="iptDate" maxlength="10" data-maxdate="{{ $lec['setEndDate'] }}" data-study-period="{{ $lec['RealLecExpireDay'] }}" readonly="readonly"> (시작)
                                        ~ <input type="text" id="enddate" class="iptDate" maxlength="10" readonly="readonly"> (종료)

                                </form>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="AddlecMore">
            @if($lec['ChgStartNum'] >= 3)
            @else
                <a href="javascript:;" onclick="change_date();">변경</a>
            @endif
        </div>

        <div class="daysListTabs willbes-Txt c_both">
            <div class="willbes-Txt-Tit NG">수강시작일 변경이력 ( 잔여횟수 : <span class="tx-light-blue">@if($lec['ChgStartNum'] >= 3){{'0'}}@else{{3-$lec['ChgStartNum']}}@endif</span>회 <span class="row-line">|</span> <span class="tx-light-blue">10</span>일 ) <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <colgroup>
                    <col style="width: 13%;">
                    <col style="width: 87%;">
                </colgroup>
                <tbody>
                @forelse( $log as $key => $row)
                    <tr>
                        <td class="w-num"><strong>{{$key+1}}차</strong></td>
                        <td class="w-data tx-left pl2p">
                            <dl class="w-info">
                                <dt>[수강변경일] {{$row['UpdStudyStartDate']}} ~ {{$row['UpdStudyEndDate']}}</dt>
                            </dl>
                            <dl class="w-info tx-gray">
                                <dt>[변경자] {{$row['Name'] == '' ? sess_data('mem_name') : '관리자' }}<span class="row-line">|</span>[변경일] {{$row['UpdDatm']}}</dt>
                            </dl>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="w-data tx-center pl2p">변경이력이 없습니다.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->
    <script>
        $(document).ready(function() {
            $('#startdate').datepicker({
                startDate: "{{ $lec['setStartDate'] }}",
                endDate: "{{ $lec['setEndDate'] }}",
                format : "yyyy-mm-dd",
                language : "kr",
                todayHighlight: true,
                autoclose:true
            });

            $('#startdate').on('change', function(){
                var $cdate = $(this).val();

                if($cdate > '{{ $lec['setEndDate'] }}'){
                    $(this).val('');
                    $('#enddate').val('');
                    alert("수강시작일은 주문일로부터 30일 이내만 변경 가능합니다.");
                    return;
                }

                if($cdate < '{{ $lec['setStartDate'] }}' || $cdate < '{{ date('Y-m-d') }}'){
                    $(this).val('');
                    $('#enddate').val('');
                    alert("시작일은 {{ date('d월 m일', strtotime($lec['setStartDate'])) }} 이전 날짜는 불가능합니다.");
                    return;
                }

                $('#enddate').val(moment($(this).val()).add({{$lec['RealLecExpireDay'] -1}}, 'days').format('YYYY-MM-DD'));

            });
        });

        function change_date()
        {
            if($("#startdate").val() == ""){
                alert("시작일을 선택해주십시요.");
                return;
            }

            if(window.confirm('시작일을 '+ $("#startdate").val() +'로 설정하시겠습니까?') == false){
                return;
            }

            url = "{{ site_url("/classroom/on/setStartDate/") }}";
            data = $('#chg_start_form').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert("시작일이 "+ $("#startdate").val() +" 로 설정되었습니다.");
                    document.location.replace('{{front_url('/classroom/on/list/standby/')}}');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }
    </script>
@stop