@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="mem-Tit mem-Acad-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">학원 방문결제 접수</span>
            </div>
            <div class="widthAuto">
                <div class="curriWrap c_both mb25">
                    <ul class="curriTabs c_both">
                        <li><a href="#none" onclick="goUrl('cate_code', '');" class="@if(empty(element('cate_code', $arr_input)) === true) on @endif">전체</a></li>
                        @foreach($arr_base['category'] as $idx => $row)
                            <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                        @endforeach
                    </ul>
                    <div class="CurriBox">
                        <ul class="btn tx-gray">
                            <li><a href="{{front_url('/VisitOffPackage')}}">종합반</a></li>
                            <li><a class="on" href="{{front_url('/VisitOffLecture')}}">단과반</a></li>
                        </ul>
                        <table cellspacing="0" cellpadding="0" class="curriTable">
                            <colgroup>
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            <tr>
                                <th class="tx-gray">캠퍼스선택</th>
                                <td colspan="9">
                                    <ul class="curriSelect">
                                        <li><a href="#none" onclick="goUrl('campus_ccd', '');" class="@if(empty(element('campus_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                        @foreach($arr_base['campus'] as $idx => $row)
                                            <li><a href="#none" onclick="goUrl('campus_ccd', '{{ $row['CampusCcd'] }}');" class="@if(element('campus_ccd', $arr_input) == $row['CampusCcd']) on @endif">{{ $row['CampusCcdName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="tx-gray">과정선택</th>
                                <td colspan="9">
                                    <ul class="curriSelect">
                                        <ul class="curriSelect">
                                            <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                                            @foreach($arr_base['course'] as $idx => $row)
                                                <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                </td>
                            </tr>
                            @if(isset($arr_base['series']) === true)
                                <tr>
                                    <th class="tx-gray">직렬선택</th>
                                    <td colspan="9">
                                        {{-- 직렬 --}}
                                        <ul class="curriSelect">
                                            <li><a href="#none" onclick="goUrl('series_ccd', '');" class="@if(empty(element('series_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                            @foreach($arr_base['series'] as $idx => $row)
                                                <li><a href="#none" onclick="goUrl('series_ccd', '{{ $row['ChildCcd'] }}');" class="@if(element('series_ccd', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['ChildName'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                            @if(isset($arr_base['subject']) === true)
                                <tr>
                                    <th class="tx-gray">과목선택</th>
                                    <td colspan="9">
                                        {{-- 과목 --}}
                                        <ul class="curriSelect">
                                            <li><a href="#none" onclick="goUrl('subject_idx', '');" class="@if(empty(element('subject_idx', $arr_input)) === true) on @endif">전체</a></li>
                                            @foreach($arr_base['subject'] as $idx => $row)
                                                <li><a href="#none" onclick="goUrl('subject_idx', '{{ $row['SubjectIdx'] }}');" class="@if(element('subject_idx', $arr_input) == $row['SubjectIdx']) on @endif">{{ $row['SubjectName'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th class="tx-gray">과목선택</th>
                                    <td colspan="9" class="tx-blue tx-left">* 카테고리 선택시 카테고리별 과목을 확인하실 수 있습니다. 카테고리를 먼저 선택해 주세요!</td>
                                </tr>
                            @endif
                            @if(isset($arr_base['professor']) === true)
                                <tr>
                                    <th class="tx-gray">교수선택</th>
                                    @if(count($arr_base['professor']) < 1)
                                        <td colspan="9" class="tx-blue tx-left">* 선택하신 과목의 교수진이 없습니다.</td>
                                    @else
                                        <td colspan="9">
                                            {{-- 교수 --}}
                                            <ul class="curriSelect">
                                                @foreach($arr_base['professor'] as $idx => $row)
                                                    <li><a href="#none" onclick="goUrl('prof_idx', '{{ $row['ProfIdx'] }}');" class="@if(element('prof_idx', $arr_input) == $row['ProfIdx']) on @endif">{{ $row['wProfName'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    @endif
                                </tr>
                            @else
                                <tr>
                                    <th class="tx-gray">교수선택</th>
                                    <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- curriWrap -->
                <div class="Content widthAuto810 p_re">
                    <div class="willbes-Lec-Search mb15">
                        <div class="inputBox p_re">
                            @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
                            <div class="selectBox">
                                <select id="search_keyword" name="search_keyword" title="직접입력" class="">
                                    <option value="ProdName" @if($arr_search_text[0] == 'ProdName') selected="selected" @endif>강좌명</option>
                                    <option value="SubjectName" @if($arr_search_text[0] == 'SubjectName') selected="selected" @endif>과목명</option>
                                    <option value="wProfName" @if($arr_search_text[0] == 'wProfName') selected="selected" @endif>교수명</option>
                                    <option value="CourseName" @if($arr_search_text[0] == 'CourseName') selected="selected" @endif>과정명</option>
                                </select>
                            </div>
                            <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ element('1', $arr_search_text) }}">
                            <button type="button" id="btn_search" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                        <div class="InfoBtn"><a href="#none">방문결제 안내 <span>▶</span></a></div>
                    </div>
                    <!-- willbes-Lec-Search -->


                    <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                        @foreach($data['subjects'] as $subject_idx => $subject_name)
                            <div class="willbes-Lec NG c_both mb25">
                                <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                                <!-- willbes-Lec-Subject -->

                                <div class="willbes-Lec-Line">-</div>
                                <!-- willbes-Lec-Line -->

                                @foreach($data['list'][$subject_idx] as $idx => $row)
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 75px;">
                                            <col style="width: 95px;">
                                            <col style="width: 450px;">
                                            <col style="width: 200px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-list">{{ $row['CourseName'] }}</td>
                                            <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['wProfName'] }}</span></td>
                                            <td class="w-data tx-left">
                                                <div class="w-tit w-acad-tit">
                                                    {{ $row['ProdName'] }}<span class="oBox campus_{{$row['CampusCcd']}} ml10 NSK">{{ $row['CampusCcdName'] }}</span>
                                                </div>
                                                <dl class="w-info acad">
                                                    <dt>
                                                        <a href="#none">
                                                            <strong>강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-blue">{{ $row['StudyPatternCcdName'] }}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="acadInfo NSK n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                    <div class="priceWrap chk buybtn p_re">
                                                    <span class="price tx-blue">
                                                        <span class="chkBox"><input type="checkbox" name="prod_code[]" id="{{$row['ProdCode']}}" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                        {{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->

                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-tit tx-black">▷ 강좌정보</div>
                                                <div class="w-txt">
                                                    <strong>{{ $row['ProdName'] }}</strong><br/>
                                                    {!! $row['Content'] !!}<br/>
                                                    * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                </div>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecInfoTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                                @endforeach
                            </div>
                            <!-- willbes-Lec -->
                        @endforeach

                    </form>

                </div>



                <div class="Aside widthAuto290 NG ml20">
                    <div class="Tit tx-light-black">장바구니</div>
                    <div class="Lec-Pocket-Grid">
                        <div id="basket_list"></div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="listTable lecPocketTable tx-black p_re">
                        <tbody>
                        <tr class="AllchkBox"><td><input type="checkbox" id="info_chk" name="info_chk" class="info_chk"></td></tr>
                        <tr class="replyList w-replyList">
                            <td class="w-tit">
                                유의사항을 모두 확인했고 동의합니다
                                <span class="arrow-Btn">></span>
                            </td>
                        </tr>
                        <tr class="replyTxt w-replyTxt bg-light-gray">
                            <td class="w-txt">
                                <div class="w-txt-Grid">
                                    <input type="checkbox" id="info_chk" name="info_chk" class="info_chk">
                                    <div class="info-txt">
                                        수강증 분실시 재발급/변경/환불되지 않으며,<br/>
                                        판매 및 양도되지 않습니다.<br/>
                                        <span class="tx-blue">(절도, 위.변조시 법적 책임이 따릅니다.)</span>
                                    </div>
                                </div>
                                <div class="w-txt-Grid">
                                    <input type="checkbox" id="info_chk" name="info_chk" class="info_chk">
                                    <div class="info-txt">
                                        수강 총 횟수의 1/2 미경과시에만 변경 및<br/>
                                        환불이 가능합니다.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="priceBox">
                        <ul>
                            <li class="p-tit">
                                <span class="a-txt">총</span>
                                <span class="tx-light-blue" id="totalCnt">0</span>건
                            </li>
                            <li class="w-price t-price tx-light-blue NGEB"  id="totalPrice">0원</li>
                        </ul>
                    </div>

                    <div class="btnAuto250 GM h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span class="">방문결제 접수</span>
                        </button>
                    </div>

                </div>


                    <!-- willbes-Layer-CartBox : Coupon -->


    </div>
    <script type="text/javascript">
        var $regi_off_form = $('#regi_off_form');

        $(document).ready(function() {
            // 검색어 입력 후 엔터
            $('#search_value').on('keyup', function() {
                if (window.event.keyCode === 13) {
                    goSearch();
                }
            });

            // 검색 버튼 클릭
            $('#btn_search').on('click', function() {
                goSearch();
            });

            var goSearch = function() {
                goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
            };

            // 방문접수, 바로결제 버튼 클릭
            $('button[name="btn_off_visit_pay"], button[name="btn_off_direct_pay"]').on('click', function() {

                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');

                cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);
            });

            cartList();
            sameContent();
        });



        $regi_off_form.on('change', '.chk_products', function() {
            $_id = $(this).data('prod-code');
            $_val = $(this).val();
            if ($(this).prop('checked') === true) {
                eachProductCart($_id, $_val);
            } else {
                seachCartIdx($_id);
                //eachProductCartRemove($_id, $_val);
            }
        });

        {{-- 개별상품 장바구니 담기 --}}
        function eachProductCart(id,val) {

            $_prod_code_array = [];
            $_learn_pattern = '{{$learn_pattern}}';
            $_is_direct_pay = 'N';
            $_cart_type = 'off_lecture';

            $_prod_code_array.push(val);

            var url = frontUrl('/cart/store');
            var data = $.extend(arrToJson($regi_off_form.find('input[type="hidden"]').serializeArray()), {
                'learn_pattern' : $_learn_pattern,
                'is_direct_pay' : $_is_direct_pay,
                'cart_type' : $_cart_type,
                'prod_code' : $_prod_code_array
            });
            sendAjax(url, data, function(ret) {
                if(ret.ret_cd) {
                    cartList();
                }
            }, function(){
                cartError(id);
            }, false, 'POST');
        }

        {{-- 장바구니 목록 --}}
        function cartList() {
            var url = '{{ front_url('/VisitOffLecture/cartList/')}}';
            var data = {
                '{{ csrf_token_name() }}' : $regi_off_form.find('input[name="{{ csrf_token_name() }}"]').val()
            };
            sendAjax(url, data, function(ret) {
                seq = 0;
                price_sum = 0;
                html = '';
                if(ret.data.length > 0) {
                    $.each(ret.data, function (i, item) {
                        //console.log(item.ProdCode +' -- '+ item.ProdName);
                        html += '<div class="LecPocketlist" id="'+ item.CartIdx + '" data-prod-code="'+item.ProdCode+'">\n';
                        html += '  <span class="oBox campus_'+item.CampusCcd+' ml10 NSK">' + item.CampusCcdName + '</span>\n';
                        html +='  <span class="w-tit p_re">' + item.ProdName + '\n';
                        html +='          <a class="closeBtn" href="javascript:rowDelete(\'' + item.CartIdx + '\')"><img src="{{ img_url('cart/close.png') }}"></a>\n';
                        html +='  </span>\n';
                        html +='  <ul class="NSK"><li class="price tx-blue f_right">' + addComma(item.RealSalePrice) + '원</li></ul>\n';
                        html +='</div>\n';
                        seq += 1;
                        price_sum += parseInt(item.RealSalePrice);
                    });
                } else {
                    html = '<div class="LecPocketlist">\n'
                        + '  장바구니가 비었습니다.\n'
                        + '</div>\n';
                }

                $("#basket_list").html(html);
                $("#totalCnt").html(seq);
                $("#totalPrice").html(addComma(price_sum)+'원');

            }, function(ret){
                cartEtcError('장바구니 목록 조회시 오류가 발생되었습니다.');
            }, false, 'POST');
        }

        {{-- 상품코드로 cartidx 찾기 --}}
        function seachCartIdx(prod_code) {
            var $_basket_cnt = $(".LecPocketlist").length;
            var $_cart_idx = '';

            if($_basket_cnt > 0) {
                for(k=0;k<$_basket_cnt;k++) {
                    if( $( ".LecPocketlist:eq("+k+")" ).data('prod-code') == prod_code) {
                        $_cart_idx = $( ".LecPocketlist:eq("+k+")" ).attr("id");
                    }
                }
            }
            {{-- cartidx 를 찾았으면 삭제하기 --}}
            if ($_cart_idx != '') {
                eachProductCartRemove($_cart_idx)
            }
        }

        {{-- 장바구니 삭제 --}}
        function eachProductCartRemove(cart_idx) {
            //alert(cart_idx+' - '+prod_code);
            var data = {};
            var url = '{{ front_url('/cart/destroy')}}';

            //data = { 0 : cart_idx };
            data = {
                '{{ csrf_token_name() }}' : $regi_off_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                '_del_type' : 'each',
                'cart_idx' : cart_idx
                //'cart_idx' : JSON.stringify(data)
            };
            sendAjax(url, data, function(ret) {
                if (ret.ret_cd) {
                    cartList();
                    sameContent();
                }
            }, function(ret){
                cartEtcError('장바구니 삭제시 오류가 발생되었습니다.');
            }, false, 'POST');
        }

        {{-- 장바구니 입력 오류 --}}
        function cartError(id) {
            alert("장바구니 등록시 오류가 발생되었습니다.");
            $("#"+id).prop('checked',false);
            return;
        }

        {{-- 장바구니 조회.삭제 오류 --}}
        function cartEtcError(err_msg) {
            alert(err_msg);
            return;
        }

        {{-- 장바구니 div 삭제 --}}
        function rowDelete(cart_idx) {
            $_prod_code = $('#'+cart_idx).data('prod-code');
            eachProductCartRemove(cart_idx, $_prod_code)
            $('#'+cart_idx).remove();
        }

        {{-- 목록 과 장바구니 일치시키지 --}}
        function sameContent() {
            $_checkbox_cnt = $("input[name='prod_code[]']").length;
            $_basket_cnt = $(".LecPocketlist").length;
            if($_checkbox_cnt > 0) {
                for(i=0;i<$_checkbox_cnt;i++){
                    for(k=0;k<$_basket_cnt;k++) {
                        if(  $("input[name='prod_code[]']:eq("+i+")").data('prod-code') == $( ".LecPocketlist:eq("+k+")" ).data('prod-code') ) {
                            $("input[name='prod_code[]']:eq("+i+")").prop('checked',true); break ;
                        } else {
                            $("input[name='prod_code[]']:eq("+i+")").prop('checked',false);
                        }
                    }
                }
            }
        }

    </script>
    <!-- End Container -->
@stop
