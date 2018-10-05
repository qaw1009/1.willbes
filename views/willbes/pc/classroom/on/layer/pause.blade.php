<a class="closeBtn" href="#none" onclick="closeWin('STOPPASS')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">일시정지</div>

<div class="lecMoreWrap">

    <div class="PASSZONE-List widthAutoFull">
        <ul class="passzoneInfo tx-gray NGR">
            <li class="tit strong">· 일시정지 신청</li>
            <li class="txt">- 일시정지는 강좌별로 <span class="tx-red">최대 3회</span>까지 가능합니다.</li>
            <li class="txt">- 1회 일시정지 기간은 수강잔여일을 초과할 수 없습니다.</li>
            <li class="txt">- <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span></li>
            <li class="txt">- '일시정지된 강좌는 일시정지강좌' 에서 확인할 수 있습니다.</li>
        </ul>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mt40 mb15 tx-gray">· 일시정지 신청</div>
            <div class="LeclistTable bdt-gray">
                <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                    <colgroup>
                        <col style="width: 135px;">
                        <col style="width: 565px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit bg-light-white strong">강의정보</th>
                        <td class="w-data tx-left pl15">
                            @if(empty($lec['SubjectName']) == false)
                                <dl class="w-info strong">
                                    <dt>
                                        {{$lec['SubjectName']}}<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                                        {{$lec['wProfName']}}교수님
                                    </dt>
                                </dl><br>
                            @endif
                            <div class="w-tit strong">{{$lec['ProdName']}}</div>
                            <dl class="w-info tx-gray">
                                <dt>잔여기간 : <span class="tx-blue">{{$lec['remainDays']}}일</span>({{$lec['LecStartDate']}}~{{$lec['RealLecEndDate']}})</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">일시정지기간</th>
                        <td class="w-data tx-left pl15">
                            @if($lec['PauseCount'] >= $lec['PauseNum'])
                                일시중지횟수를 초과했습니다.
                            @elseif($lec['PauseRemain'] <= 0)
                                일시중지기간을 초과했습니다.
                            @else
                                <form name="pauseForm" id="pauseForm">
                                    {!! csrf_field() !!}
                                    {!! method_field('POST') !!}
                                    <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
                                    <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
                                    <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                                    <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
                                    <input type="hidden" name="prodtype" value="@if($lec['LearnPatternCcd'] == '615001' || $lec['LearnPatternCcd'] == '615002'){{'S'}}@else{{'P'}}@endif" />
                                    <input type="text" id="startdate" name="startdate" class="iptDate" maxlength="10" value="{{ date("Y-m-d", time()) }}" readonly="readonly">&nbsp; ~&nbsp;
                                    <input type="text" id="enddate" name="enddate" class="iptDate" maxlength="10" readonly="readonly">&nbsp;
                                    [변경수강기간] <span id="chgdate">{{ date("Y-m-d", time()) }} ~ {{$lec['RealLecEndDate']}}</span>
                                </form>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                @if($lec['PauseCount'] >= $lec['PauseNum'])
                    <div class="w-btn"> </div>
                @elseif($lec['PauseRemain'] <= 0)
                    <div class="w-btn"> </div>
                @else
                    <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnSetPause();">신청</a></div>
                @endif
            </div>
        </div>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mb15 tx-gray">· 일시정지 이력 <span class="w-info normal">(
                    잔여횟수 : <span class="strong tx-light-blue">@if(count($log) >= $lec['PauseNum']){{'0'}}@else{{$lec['PauseNum'] - count($log)}}@endif</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                    잔여기간 : <span class="strong tx-light-blue">{{$lec['PauseRemain']}}</span>일
                    )</span></div>
            <div class="LeclistTable bdt-gray">
                <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                    <colgroup>
                        <col style="width: 100px;">
                        <col style="width: 270px;">
                        <col style="width: 170px;">
                        <col style="width: 160px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>회차<span class="row-line">|</span></th>
                        <th>일시정지기간<span class="row-line">|</span></th>
                        <th>신청일자<span class="row-line">|</span></th>
                        <th>신청자</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $log as $key => $row)
                        <tr>
                            <td class="w-num">{{$key+1}}차</td>
                            <td class="w-day">{{$row['PauseStartDate']}} ~ {{$row['PauseEndDate']}} ({{$row['PauseDays']}}일)</td>
                            <td class="w-modify-day">{{$row['PauseRegDate']}}</td>
                            <td class="w-user">{{$row['Name'] == '' ? sess_data('mem_name') : '관리자' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">일시정지 이력이 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- PASSZONE-List -->
</div>
<script>
    $(document).ready(function() {
        $('#enddate').datepicker({
            format : "yyyy-mm-dd",
            language : "kr"
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

        url = "{{ site_url("/classroom/on/setPause/") }}";
        data = $('#pauseForm').serialize();

        sendAjax(url,
            data,
            function(d){
                alert($('#startdate').val() +' 부터 ' + $('#enddate').val() + '까지 일시중지 되었습니다.');
                location.reload();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, true, 'POST', 'html');
    }
</script>