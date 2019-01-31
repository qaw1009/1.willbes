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
                                <a href="#none" onclick="lShow({{ $val['ProdCode'] }},{{ $val['MemIdx'] }},{{$paging['rownum']}})" style="color:#2784db;">{{ $val['ProdName'] }}</a>
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
                            <td class="w-day">{{ $val['PDReg'] }}</td>
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
            <!-- willbes-Leclist -->

            <div id="MOCKTESTPASSFIN" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
                <a class="closeBtn" href="#none" onclick="closeWin('MOCKTESTPASSFIN')">
                    <img src="/public/img/willbes/sub/close.png">
                </a>
                <div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div>
                <div class="passzoneTitInfo tx-light-blue tx-center NG mt20" id="r0"></div>
                <div class="PASSZONE-List widthAutoFull">
                    <div class="PASSZONE-Lec-Section">
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 20%;"/>
                                    <col style="width: 30%;"/>
                                    <col style="width: 20%;"/>
                                    <col style="width: 30%;"/>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th class="w-tit">이름(아이디)</th>
                                    <td class="w-list" colspan="3" id="r1"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시형태</th>
                                    <td class="w-list" id="r2"></td>
                                    <th class="w-tit">응시분야</th>
                                    <td class="w-list" id="r3"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시지역</th>
                                    <td class="w-list" id="r4"></td>
                                    <th class="w-tit">응시번호</th>
                                    <td class="w-list tx-bright-gray" id="r5"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">시험응시일</th>
                                    <td class="w-list" colspan="3" id="r6"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시직렬</th>
                                    <td class="w-list" colspan="3" id="r7"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시필수과목</th>
                                    <td class="w-list" colspan="3" id="K1"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시선택과목</th>
                                    <td class="w-list" colspan="3" id="K2"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">가산점</th>
                                    <td class="w-list" colspan="3" id="r8"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)금액</th>
                                    <td class="w-list" id="r9"></td>
                                    <th class="w-tit">쿠폰적용</th>
                                    <td class="w-list" id="r10"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)루트</th>
                                    <td class="w-list" id="r11"></td>
                                    <th class="w-tit">결제(접수)상태</th>
                                    <td class="w-list" id="r12"></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)수단</th>
                                    <td class="w-list" id="r13"></td>
                                    <th class="w-tit">결제(접수)일</th>
                                    <td class="w-list" id="r14"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <ul class="passzoneListInfo BG tx-gray GM mt20">
                        <li class="txt">· 나의 전국 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황 메뉴에서 확인 가능합니다.</li>
                        <li class="txt">· 나의 전국 모의고사 성적결과는 내강의실 > 모의고사관리 > 성적결과 메뉴에서 확인 가능합니다.</li>
                        <li class="txt">· 단, 해당 모의고사 응시완료 시에만 성적결과 보기 및 문제/해설 다운로드가 가능합니다.</li>
                    </ul>
                    <ul class="passzoneListInfo tx-gray GM mt20 mb20">
                        <li class="tit strong">[온라인 모의고사 유의사항]</li>
                        <li class="txt">· 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시 메뉴에서<br/>
                            &nbsp; 응시해 주시기 바랍니다.</li>
                        <li class="txt">· 시험응시 기간 동안 지정된 시간에만 응시 가능합니다.</li>
                    </ul>
                    <div class="passzonebtn tx-center">
                    <span>
                        <button type="submit" id='printbtn' onclick="printPage();" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">응시표 출력</span>
                        </button>
                    </span>
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-PassBox : 윌비스 전국모의고사 : 결제완료 -->



        </div>
        <div class="Quick-Bnr ml20">
            {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
        </div>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id='prodcode' name="prodcode" />
            <input type="hidden" id='memidx' name="memidx" />
        </form>
        <!-- End Container -->
        <script>

            function lShow(prodcode, memidx, idx){

                $('#prodcode').val(prodcode);
                $('#memidx').val(memidx);

                $('#r0').html($('#prodname'+idx).val());
                $('#r1').html($('#memname'+idx).val());
                $('#r2').html($('#partname'+idx).val());
                $('#r3').html($('#catename'+idx).val());
                $('#r4').html($('#areaname'+idx).val());
                $('#r5').html($('#takenum'+idx).val());
                $('#r6').html($('#taketime'+idx).val());
                $('#r7').html($('#part'+idx).val());
                $('#r8').html($('#point'+idx).val());
                $('#r9').html($('#price'+idx).val());
                $('#r10').html($('#coupon'+idx).val());
                $('#r11').html($('#route'+idx).val());
                $('#r12').html($('#status'+idx).val());
                $('#r13').html($('#paymethod'+idx).val());
                $('#r14').html($('#complete'+idx).val());

                url = "{{ site_url("/classroom/MockReceipt/subjectAjax") }}";
                data = $('#regi_form').serialize();

                sendAjax(url,
                    data,
                    function(d){
                        if(d.data.E != undefined){
                            var str = '';
                            for(var i=0; i<d.data.E.length; i++){
                                if(i == 0) str = d.data.E[i];
                                else       str = str + ', ' + d.data.E[i];
                            }
                            $('#K1').html(str);
                        }
                        if(d.data.S != undefined){
                            var str2 = '';
                            for(var i=0; i<d.data.S.length; i++){
                                if(i == 0) str2 = d.data.S[i];
                                else       str2 = str + ' ' + d.data.S[i];
                            }
                            $('#K2').html(str2);
                        }

                        $('#MOCKTESTPASSFIN').show();
                    },
                    function(ret, status){
                        alert(ret);
                    }, true, 'POST', 'json'
                );
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
                return false;
            }
        </script>
@stop