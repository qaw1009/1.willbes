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
                    수강연장
                </div>
            </div>
        </div>

        <div class="willbes-Txt NGR c_both mt30 ">
            <div class="willbes-Txt-Tit NG">· 수강연장 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
            - 수강연장된 강의는 일시정지를 신청할 수 없습니다.<br/>
            - 강좌별로 <span class="tx-red">최대3회까지</span>만 가능하며, <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span><br/>
            - 수강연장은 종료일까지만 신청이 가능하며 5일단위(5일, 10일, 15일)로 신청할 수 있습니다.
        </div>

        <div class="willbes-List-Tit NG">수강연장 신청</div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
            <tr>
                <td class="w-data tx-left pb-zero">
                    @if(empty($lec['SubjectName']) == false)
                    <dl class="w-info">
                        <dt>
                            {{$lec['SubjectName']}}<span class="row-line">|</span>
                            {{$lec['wProfName']}}교수님
                            <span class="NSK ml10 nBox n2">{{$lec['wLectureProgressCcdName']}}</span>
                        </dt>
                    </dl>
                    @endif
                    <div class="w-tit">
                        <a href="#none">{{$lec['ProdName']}}</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>잔여기간 : <span class="tx-light-blue">{{$lec['remainDays']}}</span>일
                            ({{$lec['LecStartDate']}}~{{$lec['RealLecEndDate']}})</dt>
                    </dl>
                    <div class="bdt-m-gray pt10 pb10">
                        <strong class="mr10">연장일수</strong>
                        @if($lec['RebuyCount'] >= $lec['ExtenNum'])
                            연장신청 횟수를 초과했습니다.
                        @elseif($lec['RebuySum'] >= $lec['ExtenLimit'])
                            연장신청 기간을 초과했습니다.
                        @else
                            <form name="extenForm" id="extenForm" method="POST" action="//{{$lec['SiteUrl']}}/m/cart/store">
                                {!! csrf_field() !!}
                                {!! method_field('POST') !!}
                                <input type="hidden" name="sale_pattern" value="extend" />
                                {{-- @if(empty($lec['TargetOrderIdx']) == true) --}}
                                @if($lec['SalePatternCcd'] == '694001' || $lec['SalePatternCcd'] == '694002')
                                    <input type="hidden" name="target_order_idx" value="{{$lec['OrderIdx']}}" />
                                    <input type="hidden" name="target_prod_code" value="{{$lec['ProdCode']}}" />
                                    <input type="hidden" name="target_prod_code_sub" value="{{empty($lec['ProdCodeSub']) == true ? '' : $lec['ProdCodeSub'] }}" />
                                @else
                                    <input type="hidden" name="target_order_idx" value="{{$lec['TargetOrderIdx']}}" />
                                    <input type="hidden" name="target_prod_code" value="{{$lec['TargetProdCode']}}" />
                                    <input type="hidden" name="target_prod_code_sub" value="{{empty($lec['TargetProdCodeSub']) == true ? '' : $lec['TargetProdCodeSub'] }}" />
                                @endif
                                <select id="day" name="extend_day" title="day" class="seleProcess">
                                    @for( $d = 5; $d <= ($lec['ExtenLimit']-$lec['RebuySum']+4); $d = $d +5)
                                        <option value="{{$d}}">{{$d}}일</option>
                                    @endfor
                                </select>&nbsp; 일 &nbsp;
                                <strong class="mr10 ml10">[연장수강종료일]</strong> <span id="expDate">{{date('Y-m-d', strtotime($lec['RealLecEndDate'].'+5day'))}}</span>
                            </form>
                        @endif
                    </div>
                    <div class="bdt-m-gray pt15 pb15">
                        <strong>결제금액</strong>
                        <span id="expPrice">{{number_format(floor($lec['ExtenPrice'] * 5))}}원</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="AddlecMore">
            @if($lec['RebuyCount'] >= $lec['ExtenNum'])
            @elseif($lec['RebuySum'] >= $lec['ExtenLimit'])
            @else
                <a href="javascript:;" onclick="fnExten();">신청하기</a>
            @endif
        </div>

        <div class="daysListTabs willbes-Txt c_both">
            <div class="willbes-Txt-Tit NG">수강연장 이력
                ( 잔여횟수 <span class="tx-light-blue">@if($lec['RebuyCount'] >= $lec['ExtenNum']){{'0'}}@else{{$lec['ExtenNum'] - $lec['RebuyCount']}}@endif</span>회
                <span class="row-line">|</span>
                잔여기간 <span class="tx-light-blue">@if($lec['RebuySum'] >= $lec['ExtenLimit']){{'0'}}@else{{$lec['ExtenLimit'] - $lec['RebuySum']}}@endif</span>일 )
                <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div>
            </div>
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <colgroup>
                    <col style="width: 13%;">
                    <col style="width: 87%;">
                </colgroup>
                <tbody>
                @php $i = count($log); @endphp
                @forelse( $log as $key => $row)
                <tr>
                    <td class="w-num"><strong>{{ $i.'차' }}</strong></td>
                    <td class="w-data tx-left pl2p">
                        <dl class="w-info">
                            <dt>[연장일수] {{$row['LecExpireDay']}}일</dt>
                        </dl>
                        <dl class="w-info">
                            <dt>[신청일자] {{$row['OrderDate']}}</dt>
                        </dl>
                    </td>
                </tr>
                @php $i = $i-1; @endphp
                @empty
                    <tr>
                        <td colspan="3">수강연장 이력이 없습니다.</td>
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
            $('#day').on('change', function() {
                $day = $(this).val();
                $('#expDate').text(moment('{{$lec['RealLecEndDate']}}').add($day, 'days').format('YYYY-MM-DD'));
                $('#expPrice').text(addComma(Math.floor($day * {{$lec['ExtenPrice']}})) + '원');
            });
        });

        function fnExten()
        {
            if(window.confirm('연장신청을 진행하시겠습니까?')){
                $("#extenForm").submit();
            }
        }
    </script>
@stop