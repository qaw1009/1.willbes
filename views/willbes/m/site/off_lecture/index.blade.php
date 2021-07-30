@extends('willbes.m.layouts.master')

@section('page_title', '학원수강신청 > 단과반' )

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        {!! banner('M_수강신청_상단', 'MainSlider mt20 mb20', $__cfg['SiteCode'], element('cate_code', $arr_input)) !!}

        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div>
            <ul class="Lec-Selected NG tx-gray">
                <form id="url_form" name="url_form" method="GET">
                    @foreach($arr_input as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                    @endforeach
                </form>
                @if(isset($arr_base['category']) === true)
                    <li>
                        <select id="cate_code" name="cate_code" title="카테고리" class="select_search">
                            @foreach($arr_base['category'] as $idx => $row)
                                <option value="{{$row['CateCode']}}" @if(element('cate_code', $arr_input) == $row['CateCode'] || $arr_base['category_default'] == $row['CateCode']){{'selected'}}@endif class="{{$row['ParentCateCode']}}">{{$row['CateName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif

                @if(isset($arr_base['campus']) === true)
                    <li>
                        <select id="campus_ccd" name="campus_ccd" title="캠퍼스전체" class="select_search">
                            <option value="">캠퍼스전체</option>
                            @foreach($arr_base['campus'] as $idx => $row)
                                <option value="{{$row['CampusCcd']}}" @if(element('campus_ccd', $arr_input) == $row['CampusCcd']){{'selected'}}@endif>{{$row['CampusCcdName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif

                @if(isset($arr_base['course']) === true)
                    <li>
                        <select id="course_idx" name="course_idx" title="과정" class="select_search">
                            <option value="">과정전체</option>
                            @foreach($arr_base['course'] as $idx => $row)
                                <option value="{{$row['CourseIdx']}}" @if(element('course_idx', $arr_input) == $row['CourseIdx']){{'selected'}}@endif>{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif
                @if(isset($arr_base['series']) === true)
                    <li>
                        <select id="series_ccd" name="series_ccd" title="직렬" class="select_search">
                            <option value="">직렬전체</option>
                            @foreach($arr_base['series'] as $idx => $row)
                                <option value="{{$row['ChildCcd']}}" @if(element('series_ccd', $arr_input) == $row['ChildCcd']){{'selected'}}@endif>{{$row['ChildName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif
                @if(isset($arr_base['subject']) === true)
                    <li>
                        <select id="subject_idx" name="subject_idx" title="과목" class="select_search">
                            <option value="">과목전체</option>
                            @foreach($arr_base['subject'] as $idx => $row)
                                <option value="{{$row['SubjectIdx']}}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx']){{'selected'}}@endif>{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif
                <li>
                    <select id="prof_idx" name="prof_idx" title="교수" class="select_search">
                        <option value="">교수선택</option>
                        @if(isset($arr_base['professor']) === true)
                            @foreach($arr_base['professor'] as $idx => $row)
                                <option value="{{ $row['ProfIdx'] }}" @if(element('prof_idx', $arr_input) == $row['ProfIdx']){{'selected'}}@endif>{{ $row['ProfNickName'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </li>
                @if(isset($arr_base['study_pattern']) === true)
                <li>
                    <select id="study_pattern_ccd" name="study_pattern_ccd" title="수강형태" onchange="goUrl('study_pattern_ccd', this.value);">
                        <option value="">수강형태</option>
                        @foreach($arr_base['study_pattern'] as $key => $val)
                            <option value="{{ $key}}" @if(element('study_pattern_ccd', $arr_input) == $key) selected="selected" @endif>{{ $val }}</option>
                        @endforeach
                    </select>
                </li>
                @endif
                <li class="resetBtn2">
                    <a href="#none" onclick="location.href=location.pathname">초기화</a>
                </li>
            </ul>

            <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
                <select id="search_order" name="search_order" class="seleProcess width30p" onchange="goUrl('search_order', this.value);">
                    <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
                    <option value="course" @if(element('search_order', $arr_input) == 'course') selected="selected" @endif>과정순</option>
                </select>
                @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
                <select id="search_keyword" name="search_keyword" title="" class="seleLec width30p ml1p d_none">
                    <option value="ProdName" @if($arr_search_text[0] == 'ProdName') selected="selected" @endif>강좌명</option>
                    <option value="SubjectName" @if($arr_search_text[0] == 'SubjectName') selected="selected" @endif>과목명</option>
                    <option value="ProfNickName" @if($arr_search_text[0] == 'ProfNickName') selected="selected" @endif>교수명</option>
                    <option value="CourseName" @if($arr_search_text[0] == 'CourseName') selected="selected" @endif>과정명</option>
                </select>
            </div>
            <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
                <div class="inputBox width100p p_re">
                    <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ element('1', $arr_search_text) }}" class="labelSearch width100p">
                    <button type="button" id="btn_search" onclick="" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
            </div>

            <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST' ) !!}
                <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <div class="lineTabs lecListTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <colgroup>
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>

                        @foreach($data['subjects'] as $subject_idx => $subject_name)
                            <tr class="replyList willbes-Open-Table hover">
                                <td class="w-data tx-left">
                                    <div class="w-tit">{{$subject_name}}</div>
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display: table-row;">
                                <td class="w-data tx-left" colspan="2">
                                    {{-- 상품 리스트 loop --}}
                                    @if(element('search_order', $arr_input) == 'course')
                                        {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                                        @php ksort($data['list'][$subject_idx]); @endphp
                                    @endif

                                    @foreach($data['list'][$subject_idx] as $idx => $row)
                                        <div class="oneBox">
                                            <dl class="w-info">
                                                <dt>{{ $row['CampusCcdName'] }}<span class="row-line">|</span>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }}</dt>
                                            </dl>
                                            <div class="w-tit tx-blue">
                                                <a href="#none" onclick="goShowOff('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>개강일~종강일 : <span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span> {{ $row['WeekArrayName'] }} ({{ $row['Amount'] }}회차)</dt><br>
                                                <dt>수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span>
                                                    <span class="NSK ml10 nBox n{{ substr($row['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{ $row['StudyApplyCcdName'] }}</span>
                                                    <span class="NSK nBox n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</span></dt>
                                                </dt><br>
                                                @php
                                                    if(empty($row['ProdPriceData']) == false) {
                                                        $saletypeccd = $row['ProdPriceData'][0]['SaleTypeCcd'];
                                                        $salerate = $row['ProdPriceData'][0]['SaleRate'];
                                                        $salerateunit = $row['ProdPriceData'][0]['SaleRateUnit'];
                                                        $realsaleprice = $row['ProdPriceData'][0]['RealSalePrice'];
                                                    } else {
                                                        $saletypeccd = '';
                                                        $salerate = '';
                                                        $salerateunit = '';
                                                        $realsaleprice = 0;
                                                    }
                                                @endphp
                                                <dt>
{{--                                                    <span class="tx-blue">{{ number_format($realsaleprice, 0) }}원</span>(↓{{ $salerate . $salerateunit }})--}}

                                                    <div class="priceWrap">
                                                        @if($row['ProdPriceData'][0]['SalePrice'] > $realsaleprice)
                                                            <span class="price">{{ number_format($row['ProdPriceData'][0]['SalePrice'], 0) }}원</span>
                                                            <span class="discount">({{ ($salerateunit == '%' ? $salerate : number_format($salerate, 0)) . $salerateunit }}↓)</span>  ▶
                                                        @endif
                                                        <span class="dcprice">{{ number_format($realsaleprice, 0) }}원</span>
                                                    </div>
                                                </dt>
                                            </dl>
                                            <div class="w-buy">
                                                <span class="chkBox d_none"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $saletypeccd. ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N' || $row['StudyApplyCcd'] == '654001' ) disabled="disabled" @endif/></span>
                                                <ul class="three">
                                                    @if($row['IsSalesAble'] == 'Y')
                                                        @if($row['StudyApplyCcd'] != '654002')
                                                            <li><a href="#none" class="btn_white btn-off-visit-pay" data-prod-code="{{ $row['ProdCode'] . ':' . $saletypeccd . ':' . $row['ProdCode'] }}">방문결제</a></li>
                                                        @endif
                                                        @if($row['StudyApplyCcd'] != '654001')
                                                            <li><a href="#none" class="btn_gray" name="btn_off_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $row['ProdCode'] }}">장바구니</a></li>
                                                            <li><a href="#none" class="btn_blue" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{--방문결제 레이어--}}
                    <div id="buy_off_visit_continue_layer" class="willbes-Layer-Black common_buy_layer">
                        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
                            <a class="closeBtn" href="#none" onclick="closeWin('buy_off_visit_continue_layer')">
                                <img src="{{ img_url('m/calendar/close.png') }}">
                            </a>
                            <div class="Message NG">
                                <p>해당 상품이<br> 학원방문결제 접수에 담겼습니다.</p>
                                <p>학원방문결제 접수로<br> 이동하시겠습니까?<p>
                            </div>
                            <div class="MessageBtns">
                                <a href="#none" class="btn_gray answerBox_block">예</a>
                                <a href="#none" class="btn_white waitBox_block">계속구매</a>
                            </div>
                        </div>
                        <div class="dim" onclick="closeWin('buy_off_visit_continue_layer')"></div>
                    </div>

                </div>
            </form>
        </div>
        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')

        {{-- 방문결제 폼 --}}
        <form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{empty($learn_pattern) ? 'off_lecture' : $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value="off_lecture"/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value="N"/>    {{-- 바로결제 여부 --}}
            <input type="hidden" name="is_visit_pay" value="Y"/>    {{-- 방문결제 여부 --}}
            <input type="hidden" name="prod_code[]" value=""/>  {{-- 상품코드 --}}
        </form>
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_off_form = $('#regi_off_form');
        var $regi_visit_form = $('#regi_visit_form');

        $(document).ready(function() {

            $('.select_search').on('change', function(){
                var $arr_reset = ['course_idx','series_ccd','subject_idx','prof_idx'];
                if($(this).attr('id') == 'cate_code') {
                    if($("select[name='cate_code']").val() === '') {
                        return;
                    }
                    $.each($arr_reset, function(index, item) {
                        $('#url_form').find('input[type="hidden"][name="' + item + '"]').remove();
                    });
                }
                goUrl($(this).attr('id'), $(this).val());
            });

            $('#btn_search').on('click', function() {
                goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
            });

            {{--방문결제 버튼 클릭--}}
            $regi_off_form.on('click', '.btn-off-visit-pay', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                var prod_code=$(this).data('prod-code');
                if (prod_code === undefined) {
                    alert('상품을 선택해 주세요.');
                    return;
                }
                eachProductCart(prod_code, $(this), 'layer');
            });

            {{--장바구니, 바로결제 버튼 클릭--}}
            $('a[name="btn_off_cart"], a[name="btn_off_direct_pay"]').on('click', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                $regi_off_form.find('input[name="cart_type"]').val(''); {{--초기화 필요 (뒤로가기시 캐쉬로 인한 문제 발생)--}}
                var $prod_code = $(this).data('prod-code');
                $regi_off_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
                $regi_off_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
                var $is_direct_pay = $(this).data('direct-pay');
                addCartNDirectPay($regi_off_form, $is_direct_pay, 'Y', 'off');
            });

            {{-- 방문결제 장바구니 담기 --}}
            function eachProductCart(val,_this, act_type) {
                var url = frontUrl('/cart/store');
                var data = $.extend(arrToJson($regi_visit_form.find('input[type="hidden"]').serializeArray()), {
                    'prod_code[]' : val
                });
                sendAjax(url, data, function(ret) {
                    if(ret.ret_cd) {
                        if(act_type==='layer') {
                            openWin('buy_off_visit_continue_layer');
                        } else {
                            location.href = frontPassUrl('/offVisitLecture');
                        }
                    }
                }, function(ret){
                    alert(ret.ret_msg);
                }, false, 'POST');
            }
        });

        {{--방문결제 이동 버튼 클릭--}}
        $('#buy_off_visit_continue_layer').on('click', '.answerBox_block', function() {
            alert('유의사항 확인 후 방문결제 버튼을 클릭하셔야 최종 접수가 완료됩니다.');
            location.href = frontPassUrl('/offVisitLecture');
        });

        {{--계속구매 버튼 클릭--}}
        $('#buy_off_visit_continue_layer').on('click', '.waitBox_block', function() {
            $('.common_buy_layer').attr('style', "display:none;");
        });

        {{--상세페이지 이동--}}
        function goShowOff(prod_code, cate_code) {
            location.href = frontPassUrl('/offLecture/show/prod-code/' + prod_code +'{{empty($learn_pattern) ? '' : ($learn_pattern === 'off_lecture_before' ? '/pattern/before' : '')}}' + '?'+$('#url_form').serialize());
        }
    </script>
@stop