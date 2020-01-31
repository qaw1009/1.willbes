@extends('willbes.m.layouts.master')

@section('page_title', ($pattern == 'only' ? '수강신청 > 단강좌' : '무료강좌') )

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div>
            <ul class="Lec-Selected NG tx-gray">
                <form id="url_form" name="url_form" method="GET">
                    @foreach($arr_input as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                    @endforeach
                </form>
                @if(empty($arr_base['category_top']) !== true)
                    <li>
                        <select id="cate_code_top" name="cate_code_top" title="상위 카테고리" class="">
                            @foreach($arr_base['category_top'] as $idx => $row)
                                <option value="{{$row['CateCode']}}" @if($arr_base['category_top_default'] == $row['CateCode']){{'selected'}}@endif>{{$row['CateName']}}</option>
                            @endforeach
                        </select>
                    </li>
                @endif
                @if(isset($arr_base['category']) === true)
                <li>
                    <select id="cate_code" name="cate_code" title="카테고리" class="select_search">
                        @if(empty($arr_base['category_top']) !== true)
                        <option value="">카테고리선택</option>
                        @endif
                        @foreach($arr_base['category'] as $idx => $row)
                            <option value="{{$row['CateCode']}}" @if(element('cate_code', $arr_input) == $row['CateCode'] || $arr_base['category_default'] == $row['CateCode']){{'selected'}}@endif class="{{$row['ParentCateCode']}}">{{$row['CateName']}}</option>
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
                <select id="search_keyword" name="search_keyword" title="직접입력" class="seleLec width30p ml1p">
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

            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
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
                                        @foreach($data['professor_names'][$subject_idx] as $prof_idx => $prof_name)
                                            {{-- 과목별 교수에 해당하는 상품이 없을 경우 --}}
                                            @if(isset($data['list'][$subject_idx][$prof_idx]) === false)
                                                @continue
                                            @endif

                                            {{-- 교수별 상품 리스트 loop --}}
                                            @if(element('search_order', $arr_input) == 'course')
                                                {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                                                @php ksort($data['list'][$subject_idx][$prof_idx]); @endphp
                                            @endif

                                            @foreach($data['list'][$subject_idx][$prof_idx] as $idx => $row)
                                                <div>
                                                    <dl class="w-info">
                                                        <dt>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }} </dt>
                                                    </dl>
                                                    <div class="w-tit tx-blue">
                                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span>
                                                            <span class="NSK ml10 nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                            <span class="NSK nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span></dt>
                                                    </dl>
                                                    @if($pattern == 'free' && $row['FreeLecTypeCcd'] == '652002')
                                                        <div class="freeLecPass">
                                                            @if(empty($row['FreeLecPasswd']))
                                                                <input type="hidden" id="free_lec_passwd_{{ $row['ProdCode'] }}"  name="free_lec_passwd" value="" data-chk="p">
                                                                <a href="javascript:;" class="view" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');">보강동영상 보기</a>
                                                            @else
                                                                <p>보강동영상 비밀번호 입력</p>
                                                                <input type="password" type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20">
                                                                <a href="#none" name="btn_check_free_passwd" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', '{{ $pattern }}');">확인</a>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <ul>
                                                            @if(empty($row['ProdPriceData']) === false)
                                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                                <li class="mb10">
                                                                    @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                                                        <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                                                    @endif<label>{{ $price_row['SaleTypeCcdName'] }} : <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</label>
                                                                 </li>
                                                                 @endforeach
                                                            @endif
                                                            @if($row['IsCart'] == 'N' && $pattern == 'only')
                                                                <li class="tx-red">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해 주세요.</li>
                                                            @endif
                                                        </ul>
                                                        <div class="w-buy">
                                                            <ul class="two">
                                                                @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                                                    @if($pattern == 'only')
                                                                    <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                                    @endif
                                                                    <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </form>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

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

            @if($pattern == 'only')
                {{--장바구니, 바로결제 버튼 클릭--}}
                $regi_form.on('click', 'a[name="btn_cart"], a[name="btn_direct_pay"]', function() {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                    var $is_direct_pay = $(this).data('direct-pay');
                    addCartNDirectPay($regi_form, $is_direct_pay, 'Y','{{front_url('')}}');
                });
            @elseif($pattern == 'free')
                {{-- 바로결제 버튼 클릭--}}
                $regi_form.on('click', 'a[name="btn_direct_pay"]', function() {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                    var $is_redirect = $(this).data('is-redirect');
                    var $layer_type = $regi_form.find('.chk_books:checked').length < 1 ? 'pocketBox1' : 'pocketBox2';

                    // 무료강좌 지급
                    if (applyFreeLecture($regi_form) === true) {
                        if ($is_redirect === 'N') {
                            openWin($layer_type);
                        } else {
                            // 교재상품 바로결제
                            if ($regi_form.find('.chk_books:checked').length > 0) {
                                $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                                {{--cartNDirectPay($regi_form, 'Y', 'Y');--}}
                                addCartNDirectPay($regi_form, 'Y', 'Y','{{front_url('')}}');
                            } else {
                                goClassRoom();
                            }
                        }
                    }
                });
            @endif

            $('#cate_code').chained('#cate_code_top');
        });

        function goShow(prod_code, cate_code, pattern) {
            var $free_lec_passwd = $regi_form.find('input[id="free_lec_passwd_' + prod_code + '"]');
            if ($free_lec_passwd.length > 0) {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                if ($free_lec_passwd.data('chk') !== "p" && $free_lec_passwd.val() === '') {
                    alert('보강동영상 비밀번호를 입력해 주세요.');
                    $free_lec_passwd.focus();
                    return;
                }
                var url = frontUrl('/lecture/checkFreeLecPasswd/prod-code/' + prod_code);
                var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                    'free_lec_passwd': $free_lec_passwd.val(),
                    'free_lec_check' : $free_lec_passwd.data('chk')
                });
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        location.href = '{{ front_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code+'#tab03';
                    }
                }, showAlertError, false, 'POST');
            } else {
                location.href = '{{ front_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
            }
        }

        {{--내 강의실 페이지 이동--}}
        function goClassRoom() {
            location.href = '{{ app_url('/m/classroom/on/list/ongoing', 'www') }}';
        }

        {{--무료강좌 신청--}}
        function applyFreeLecture($regi_form) {
            var $result = false;
            var $confirm_msg = $regi_form.find('.chk_books:checked').length < 1 ? '해당 강좌를 신청하시겠습니까?' : '해당 강좌 및 교재를 신청하시겠습니까?';

            if($regi_form.find('.chk_products:checked').length < 1) {
                alert('강좌를 선택해 주세요.');
                return false;
            }

            if (confirm($confirm_msg)) {
                var $input_prod_code = {};
                $regi_form.find('.chk_products:checked').each(function (idx) {
                    $input_prod_code[idx] = $(this).val();
                });

                var url = '{{ front_url('/order/free') }}';
                var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                    'prod_code': JSON.stringify($input_prod_code)
                });
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        $result = true;
                    }
                }, showAlertError, false, 'POST');
            }
            return $result;
        }
    </script>
@stop