<a class="closeBtn" href="#none" onclick="closeWin('EXTRAPASS')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">수강연장</div>

<div class="lecMoreWrap">

    <div class="PASSZONE-List widthAutoFull">
        <ul class="passzoneInfo tx-gray NGR">
            <li class="tit strong">· 수강연장</li>
            <li class="txt">- 수강연장된 강의는 일시정지를 신청할 수 없습니다.</li>
            <li class="txt">- 강좌별로 <span class="tx-red">최대{{$lec['ExtenNum']}}회까지</span>만 가능하며, <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span></li>
            <li class="txt">- 수강연장은 종료일까지만 신청이 가능하며 5일단위(5일, 10일, 15일)로 신청할 수 있습니다.</li>
        </ul>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mt40 mb15 tx-gray">· 수강연장 신청</div>
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
                        <th class="w-tit bg-light-white strong">연장일수</th>
                        <td class="w-data tx-left pl15">
                            @if($lec['ExtenCount'] >= $lec['ExtenNum'])
                                연장신청 횟수를 초과했습니다.
                            @elseif($lec['ExtenSum'] >= $lec['ExtenLimit'])
                                연장신청 기간을 초과했습니다.
                            @else
                                <form name="extenForm" id="extenForm">
                                    {!! csrf_field() !!}
                                    {!! method_field('POST') !!}
                                    <input type="hidden" name="orderidx" value="{{$lec['OrderIdx']}}" />
                                    <input type="hidden" name="prodcode" value="{{$lec['ProdCode']}}" />
                                    <input type="hidden" name="prodcodesub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                                    <input type="hidden" name="orderprodidx" value="{{$lec['OrderProdIdx']}}" />
                                    <select id="day" name="day" title="day" class="seleDay" style="width: 60px; height: 20px;">
                                        @for( $d = 5; $d <= ($lec['ExtenLimit']-$lec['ExtenSum']+4); $d = $d +5)
                                            <option value="{{$d}}">{{$d}}일</option>
                                        @endfor
                                    </select>&nbsp; 일 &nbsp;
                                    [연장수강종료일] <span id="expDate">{{date('Y-m-d', strtotime($lec['RealLecEndDate'].'+5day'))}}</span>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">결제금액</th>
                        <td class="w-data tx-left pl15"><span id="expPrice">{{number_format($lec['ExtenPrice'] * 5)}}원</span></td>
                    </tr>
                    </tbody>
                </table>
                @if($lec['ExtenCount'] >= $lec['ExtenNum'])
                    <div class="w-btn"> </div>
                @elseif($lec['ExtenSum'] >= $lec['ExtenLimit'])
                    <div class="w-btn"> </div>
                @else
                    <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnExten();">신청</a></div>
                @endif

            </div>
        </div>
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mb15 tx-gray">· 수강연장 이력 <span class="w-info normal">(
                    잔여횟수 : <span class="strong tx-light-blue">@if($lec['ExtenCount'] >= $lec['ExtenNum']){{'0'}}@else{{$lec['ExtenNum'] - $lec['ExtenCount']}}@endif</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                    잔여기간 : <span class="strong tx-light-blue">@if($lec['ExtenSum'] >= $lec['ExtenLimit']){{'0'}}@else{{$lec['ExtenLimit'] - $lec['ExtenSum']}}@endif</span>일
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
                        <th>연장일수<span class="row-line">|</span></th>
                        <th>신청일자<span class="row-line">|</span></th>
                        <th>신청자</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = count($log); @endphp
                    @forelse( $log as $key => $row)
                        @php $i = $i-1; @endphp
                        <tr>
                            <td class="w-num">{{ $i.'차' }}</td>
                            <td class="w-day">{{$row['ExtenDay']}}</td>
                            <td class="w-modify-day">{{$row['RegDatm']}}</td>
                            <td class="w-user">{{$row['Name'] == '' ? sess_data('mem_name') : '관리자' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">수강연장 이력이 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- PASSZONE-List -->
    <script>
        $(document).ready(function() {
            $('#day').on('change', function() {
               $day = $(this).val();
               $('#expDate').text(moment('{{$lec['RealLecEndDate']}}').add($day, 'days').format('YYYY-MM-DD'));
               $('#expPrice').text(addComma($day * {{$lec['ExtenPrice']}}) + '원');
            });
        });

        function fnExten()
        {
            alert('신청페이지로 넘어가자');
        }
    </script>
</div>