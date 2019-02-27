@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    일시정지
                </div>
            </div>
        </div>

        <div class="willbes-Txt NGR c_both mt30 mb20">
            <div class="willbes-Txt-Tit NG">· 일시정지 신청 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
            - 일시정지는 강좌별로 <span class="tx-red">최대 3회까지 가능</span>합니다.<br/>
            - 1회 일시정지기간은 수강잔여일을 초과할 수 없습니다.<br/>
            - <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span><br/>
            - 일시정지된 강좌는 '일시정지강좌'에서 확인할 수 있습니다.<br/>
            - 일시정지 신청후 당일 일시정지해제시, 횟수는 차감되며, 기간은 차감 되지않습니다.<br/>
        </div>

        <div class="willbes-List-Tit NG">일시정지 신청</div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
            <tr>
                <td class="w-data tx-left pb-zero">
                    @if(empty($lec['SubjectName']) == false)
                        <dl class="w-info">
                            <dt>
                                {{$lec['SubjectName']}}<span class="row-line">|</span>{{$lec['wProfName']}}교수님
                                <span class="NSK ml10 nBox n2">진행중</span>
                            </dt>
                        </dl>
                    @endif
                    <div class="w-tit">
                        {{$lec['ProdName']}}
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>잔여기간 : <span class="tx-light-blue">{{$lec['remainDays']}}span>일 ({{$lec['LecStartDate']}}~{{$lec['RealLecEndDate']}})</dt>
                    </dl>
                    <div class="w-s-date">
                        @if($lec['PauseCount'] >= $lec['PauseNum'])
                            <div class="grid">일시중지횟수를 초과했습니다.</div>
                        @elseif($lec['PauseRemain'] <= 0)
                            <div class="grid">일시중지기간을 초과했습니다.</div>
                        @else
                            <form name="pauseForm" id="pauseForm">
                                {!! csrf_field() !!}
                                {!! method_field('POST') !!}
                                <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
                                <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
                                <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                                <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
                                <input type="hidden" name="prodtype" value="@if($lec['LearnPatternCcd'] == '615001' || $lec['LearnPatternCcd'] == '615002'){{'S'}}@else{{'P'}}@endif" />
                                <div class="grid">
                                    일시정지 신청기간 :
                                    <input type="text" id="startdate" name="startdate" class="iptDate" maxlength="10" value="{{ date("Y-m-d", time()) }}" readonly="readonly"> (시작)
                                    ~
                                    <input type="text" id="enddate" name="enddate" class="iptDate" maxlength="10" readonly="readonly">&nbsp;
                                    (종료)
                                </div>
                                <div class="grid">변경 수강기간 : <span id="chgdate">{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}</span></div>
                            </form>
                    @endif
                    <!--
                            <div class="grid">
                                일시정지 신청기간 : <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30" > (시작)
                                ~ <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30"> (종료)
                            </div>
                            <div class="grid">변경 수강기간 : 2018-00-00~ 2018-00-00</div> -->
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="AddlecMore" style="border-bottom: 1px solid #ccc;">
            @if($lec['PauseCount'] >= $lec['PauseNum'])

            @elseif($lec['PauseRemain'] <= 0)

            @else
                <a href="javascript:;" onclick="fnSetPause();">신청</a>
            @endif
        </div>

        <div class="daysListTabs willbes-Txt c_both">
            <div class="willbes-Txt-Tit NG">일시정지 신청이력 (
                잔여횟수 : <span class="tx-light-blue">@if($lec['PauseCount'] >= $lec['PauseNum']){{'0'}}@else{{$lec['PauseNum'] - $lec['PauseCount']}}@endif</span>회
                <span class="row-line">|</span>
                잔여기간 : <span class="tx-light-blue">{{$lec['PauseRemain']}}</span>일 ) <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <colgroup>
                    <col style="width: 13%;">
                    <col style="width: 87%;">
                </colgroup>
                <tbody>
                @php $i = $lec['PauseCount']+1; @endphp
                @forelse( $log as $key => $row)
                    @php if($row['IsDel'] == 'N'){ $i = $i-1;} @endphp
                    <tr>
                        <td class="w-num"><strong>{{$row['IsDel'] == 'Y' ? '취소' : $i.'차'}}</strong></td>
                        <td class="w-data tx-left pl2p">
                            <dl class="w-info">
                                <dt>[수강변경일] {{$row['PauseStartDate']}} ~ {{$row['PauseEndDate']}} ({{$row['PauseDays']}}일)</dt>
                            </dl>
                            <dl class="w-info tx-gray">
                                <dt>[변경자] {{$row['Name'] == '' ? sess_data('mem_name') : '관리자' }}<span class="row-line">|</span>[변경일] {{$row['PauseRegDate']}}</dt>
                            </dl>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="w-data tx-center pl2p">일시정지 이력이 없습니다.</td>
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
            $('#enddate').datepicker({
                startDate: "{{ date("Y-m-d", time()) }}",
                endDate: "@if( $lec['RealLecEndDate'] < date("Y-m-d", strtotime(date("Y-m-d", time()).'+'.($lec['PauseRemain']-1).'day'))){{$lec['RealLecEndDate']}}@else{{date("Y-m-d", strtotime(date("Y-m-d", time()).'+'.($lec['PauseRemain']-1).'day'))}}@endif",
                format : "yyyy-mm-dd",
                language : "kr",
                todayHighlight: true,
                autoclose: true
            });

            $('#enddate').on('change', function(){
                var $cdate = $(this).val();

                if($cdate < '{{ date("Y-m-d", time()) }}'){
                    $(this).val('');
                    $('#chgdate').html('{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}');
                    alert("일시중지 종료일은 오늘 이후 날짜만 가능합니다.");
                    return;
                }

                if($cdate > '{{ date("Y-m-d", strtotime(date("Y-m-d", time()).'+'.($lec['PauseRemain']-1).'day')) }}'){
                    $(this).val('');
                    $('#chgdate').html('{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}');
                    alert("일지중지는 남은 기간 안에서만 가능합니다.");
                    return;
                }

                if($cdate > '{{ $lec['RealLecEndDate'] }}'){
                    $(this).val('');
                    $('#chgdate').html('{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}');
                    alert("일지중지는 수강 종료일을 초과할수 없습니다.");
                    return;
                }

                $('#chgdate').html(moment($('#enddate').val()).add(1, 'days').format('YYYY-MM-DD')
                    +' ~ '+
                    moment($('#enddate').val()).add('{{$lec['remainDays']}}', 'days').format('YYYY-MM-DD'));
            });
        });

        function fnSetPause()
        {
            if($("#enddate").val() == ""){
                alert("일시중지 종료일을 선택해주십시요.");
                return;
            }

            if(window.confirm($('#startdate').val() +' 부터 ' + $('#enddate').val() + '까지 일시중지 하시겠습니까?') == false){
                return;
            }

            url = "{{ front_url("/classroom/on/setPause/") }}";
            data = $('#pauseForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert($('#startdate').val() +' 부터 ' + $('#enddate').val() + '까지 일시중지 되었습니다.');
                    document.location.replace('{{front_url('/classroom/on/list/ongoing/')}}');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }
    </script>
@stop