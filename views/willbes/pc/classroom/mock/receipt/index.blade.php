@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-TESTZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                - 해당 모의고사명 클릭시 접수내역 확인 및 응시표를 출력할 수 있습니다.(단, 환불 완료된 모의고사는 응시표 출력불가능)<br/>
                                - 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시메뉴에서 응시해 주시기 바랍니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-TESTZONE -->

            <div class="willbes-Leclist c_both mt60">
                <form id="search_form" name="search_form" method="POST" action="{{ site_url('/classroom/MockReceipt/') }}">
                    {!! csrf_field() !!}
                    <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="route" name="search_TakeForm" title="route" class="seleRoute mr10 h30 f_left">
                            <option value="" @if(element('search_TakeForm', $arr_input) == '') selected="selected" @endif>과정</option>
                            <option value="690002" @if(element('search_TakeForm', $arr_input) == '690002') selected="selected" @endif>학원</option>
                            <option value="690001" @if(element('search_TakeForm', $arr_input) == '690001') selected="selected" @endif>온라인</option>
                        </select>
                        <select id="state" name="search_PayStatusCcd" title="search_PayStatusCcd" class="seleState mr10 h30 f_left">
                            <option value="" @if(element('search_PayStatusCcd', $arr_input) == '') selected="selected" @endif>결제상태</option>
                            <option value="676001" @if(element('search_PayStatusCcd', $arr_input) == '676001') selected="selected" @endif>결제완료</option>
                            <option value="676002" @if(element('search_PayStatusCcd', $arr_input) == '676002') selected="selected" @endif>결제대기</option>
                            <option value="676006" @if(element('search_PayStatusCcd', $arr_input) == '676006') selected="selected" @endif>환불완료</option>
                        </select>
                    </span>
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="search_fi" class="labelSearch" placeholder="@if(element('search_fi', $arr_input) == '') 모의고사명을 입력해 주세요 @else {{ element('search_fi', $arr_input) }}@endif" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </span>
                    </div>
                </form>
                <div class="LeclistTable pointTable">
                    <table cellspacing="0" cellpadding="0" class="listTable testTable under-gray bdt-gray tx-gray">
                        <colgroup>
                            <col style="width: 60px;">
                            <col style="width: 80px;">
                            <col style="width: 90px;">
                            <col style="width: 80px;">
                            <col style="width: 150px;">
                            <col style="width: 220px;">
                            <col style="width: 130px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>응시분야<span class="row-line">|</span></li></th>
                            <th>응시형태<span class="row-line">|</span></li></th>
                            <th>시험응시일<span class="row-line">|</span></li></th>
                            <th>모의고사명<span class="row-line">|</span></li></th>
                            <th>접수일<span class="row-line">|</span></li></th>
                            <th>결제상태</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $key => $val)
                        <tr>
                            <td class="w-no">{{$paging['rownum']}}</td>
                            <td class="w-process">{{ $val['CateName'] }}</td>
                            <td class="w-type">{{ $val['TakeMockPart_Name'] }}</td>
                            <td class="w-form">{{ $val['TakeForm_Name'] }}</td>
                            <td class="w-date">{{ $val['TakeStartDatm'] }} ~ <br>{{ $val['TakeEndDatm'] }}</td>
                            <td class="w-list">
                                <a href="#none" onclick="lShow({{ $val['OrderProdIdx'] }})" style="color:#2784db;">{{ $val['ProdName'] }}</a>
                                <input type="hidden" id="memname{{$paging['rownum']}}" value="{{ $val['MemName'] }}( {{ substr($val['MemId'],0,3) }}@for($i=0; $i<$val['IdLength']-3; $i++)*@endfor )" />
                                <input type="hidden" id="partname{{$paging['rownum']}}" value="{{ $val['TakeMockPart_Name'] }}" />
                                <input type="hidden" id="catename{{$paging['rownum']}}" value="{{ $val['CateName'] }}" />
                                <input type="hidden" id="prodname{{$paging['rownum']}}" value="{{ $val['ProdName'] }}" />
                                <input type="hidden" id="areaname{{$paging['rownum']}}" value="{{ $val['TakeAreaName'] }}" />
                                <input type="hidden" id="takenum{{$paging['rownum']}}" value="{{ $val['TakeNumber'] }}" />
                                <input type="hidden" id="taketime{{$paging['rownum']}}" value="{{ $val['TakeStartDatm'] }} ~ <br>{{ $val['TakeEndDatm'] }}" />
                                <input type="hidden" id="part{{$paging['rownum']}}" value="{{ $val['TakeMockPart_Name'] }}" />
                                <input type="hidden" id="point{{$paging['rownum']}}" value="{{ $val['AddPoint'] }}" />
                                <input type="hidden" id="route{{$paging['rownum']}}" value="{{ $val['route'] }}" />
                                <input type="hidden" id="status{{$paging['rownum']}}" value="{{ $paymentStatus[$val['PayStatusCcd']] }}" />
                                <input type="hidden" id="coupon{{$paging['rownum']}}" value="{{ $val['IsUseCoupon'] }}" />
                                <input type="hidden" id="price{{$paging['rownum']}}" value="{{ number_format($val['OrderPrice']) }}원" />
                                <input type="hidden" id="takeform{{$paging['rownum']}}" value="{{ $val['TakeForm_Name'] }}" />
                                <input type="hidden" id="paymethod{{$paging['rownum']}}" value="{{ $val['paymethod'] }}" />
                                <input type="hidden" id="complete{{$paging['rownum']}}" value="{{ $val['CompleteDatm'] }}" />
                            </td>
                            <td class="w-day">{{ $val['CompleteDatm'] }}</td>
                            <td class="w-state">{{ $paymentStatus[$val['PayStatusCcd']] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="Paging">
                        {!! $paging['pagination'] !!}
                    </div>
                </div>
            </div>
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}

        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id='prodcode' name="prodcode" />
            <input type="hidden" id='memidx' name="memidx" />
        </form>
        <!-- End Container -->
    </div>
        <script>
            //https://cop.local.willbes.net/mockTest/apply_order/241
            var win = '';
            function lShow(OrderProdIdx){
                var url = '{{ front_url("/classroom/MockReceipt/apply_order/") }}' + OrderProdIdx;
                window.open(url, 'mockReceiptPopup', 'width=755, height=845, scrollbars=yes, resizable=no');
            }

            //인쇄
            function printPage(){
                var initBody;
                window.onbeforeprint = function(){
                    initBody = document.body.innerHTML;
                    $('.closeBtn').hide();
                    $('#printbtn').hide();
                    $('#r0').css('font-size',25);

                    document.body.innerHTML =  $('#MOCKTESTPASSFIN').html();
                };
                window.onafterprint = function(){
                    $('.closeBtn').show();
                    $('#printbtn').show();
                    $('#r0').css('font-size',16);

                    document.body.innerHTML = initBody;
                };
                window.print();
            }
        </script>
@stop