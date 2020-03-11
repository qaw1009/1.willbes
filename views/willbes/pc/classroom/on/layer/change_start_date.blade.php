<a class="closeBtn" href="#none" onclick="closeWin('STARTPASS')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">수강시작일 변경</div>
<div class="lecMoreWrap">
    <div class="PASSZONE-List widthAutoFull">
        <ul class="passzoneInfo tx-gray NGR">
            <li class="tit strong">· 수강시작일 설정</li>
            <li class="txt">- 수강시작일은 개강일 전까지만 변경 가능합니다.</li>
            <li class="txt">- '시작일변경' 버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지</span>만 변경이 가능합니다.</li>
            <li class="txt">- 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.</li>
            <li class="txt">- 수강시작이 이루어진 강좌는 시작일 변경이 불가능 합니다.</li>
        </ul>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mt40 mb15 tx-gray">· 수강시작일 변경</div>
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
                                <dt>잔여기간 : <span class="tx-blue">{{$lec['RealLecExpireDay']}}일</span>({{$lec['LecStartDate']}}~{{$lec['RealLecEndDate']}})</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">수강 시작일 변경</th>
                        <td class="w-data tx-left pl15">
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
                                    <input type="text" id="startdate" name="startdate" class="iptDate" maxlength="10" value="" data-maxdate="{{ $lec['setEndDate'] }}" data-study-period="{{ $lec['RealLecExpireDay'] }}" readonly="readonly">&nbsp; ~&nbsp;
                                    <input type="text" id="enddate" class="iptDate" maxlength="10" readonly="readonly">
                                    시작일 입력시, 종료일이 자동 변경됩니다
                                </form>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                @if($lec['ChgStartNum'] >= 3)
                    <div class="w-btn">&nbsp;</div>
                @else
                    <div class="w-btn"><a class="answerBox_block NSK" href="javascript:;" onclick="change_date();">변경</a></div>
                @endif
            </div>
        </div>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mb15 tx-gray">· 수강시작일 변경이력
                <span class="w-info normal">(
                    잔여횟수 : <span class="strong tx-light-blue">@if($lec['ChgStartNum'] >= 3){{'0'}}@else{{3-$lec['ChgStartNum']}}@endif</span>회
                    <!--<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                    잔여기간 : <span class="strong tx-light-blue">15</span>일 --> )
                </span>
            </div>
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
                        <th>수강시작일<span class="row-line">|</span></th>
                        <th>변경일자<span class="row-line">|</span></th>
                        <th>변경자</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $log as $key => $row)
                        <tr>
                            <td class="w-num">{{$key+1}}차</td>
                            <td class="w-day">{{$row['UpdStudyStartDate']}} ~ {{$row['UpdStudyEndDate']}}</td>
                            <td class="w-modify-day">{{$row['UpdDatm']}}</td>
                            <td class="w-user">{{$row['Name'] == '' ? sess_data('mem_name') : '관리자' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">수강시작일 변경 이력이 없습니다.</td>
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
                alert("수강시작일은 주문일(개강일)로부터 30일 이내만 변경 가능합니다.");
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
                location.reload();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, true, 'POST', 'html');
    }
</script>