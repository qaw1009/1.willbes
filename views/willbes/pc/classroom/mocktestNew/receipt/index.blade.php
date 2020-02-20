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
                @include('willbes.pc.classroom.mocktestNew.tab_menu_partial')
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re mt30">
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
                <form id="url_form" name="url_form" method="GET">
                    <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="route" name="s_take_form" title="route" class="seleRoute mr10 h30 f_left" onchange="goUrl('s_take_form',this.value)">
                            <option value="" @if(element('s_take_form', $arr_input) == '') selected="selected" @endif>응시형태</option>
                            @foreach($arr_base['apply_type'] as $k => $v)
                                <option value="{{$k}}" @if(element('s_take_form', $arr_input) == $k) selected="selected" @endif>{{$v}}</option>
                            @endforeach
                        </select>
                        <select id="state" name="s_pay_status_ccd" title="s_pay_status_ccd" class="seleState mr10 h30 f_left" onchange="goUrl('s_pay_status_ccd',this.value)">
                            <option value="" @if(element('s_pay_status_ccd', $arr_input) == '') selected="selected" @endif>결제상태</option>
                            @foreach($arr_base['filter_payment_status'] as $k => $v)
                                <option value="{{$k}}" @if(element('s_pay_status_ccd', $arr_input) == $k) selected="selected" @endif>{{$v}}</option>
                            @endforeach
                        </select>
                    </span>
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                            <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
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
                            <th>No<span class="row-line">|</span></th>
                            <th>과정<span class="row-line">|</span></th>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>응시형태<span class="row-line">|</span></th>
                            <th>시험응시일<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>접수일<span class="row-line">|</span></th>
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
                                @if($val['PayStatusCcd'] == '676006')
                                    <a href="javascript:void(0);" onclick="javascript:alert('환불완료된 모의고사는 응시표를 출력할 수 없습니다.');" style="color:#2784db;">{{ $val['ProdName'] }}</a>
                                @else
                                    <a href="javascript:void(0);" onclick="javascript:lShow({{ $val['OrderProdIdx'] }})" style="color:#2784db;">{{ $val['ProdName'] }}</a>
                                @endif
                            </td>
                            <td class="w-day">{{ $val['CompleteDatm'] }}</td>
                            <td class="w-state">{{ $arr_base['payment_status'][$val['PayStatusCcd']] }}</td>
                        </tr>
                        @php $paging['rownum']-- @endphp
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
                var url = '{{ front_url("/classroom/mocktest/receipt/apply_order/") }}' + OrderProdIdx;
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