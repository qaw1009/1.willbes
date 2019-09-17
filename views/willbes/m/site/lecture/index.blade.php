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
                @if(isset($arr_base['category']) === true)
                <li>
                    <select id="cate_code" name="cate_code" title="카테고리" class="select_search">
                            @foreach($arr_base['category'] as $idx => $row)
                                <option value="{{$row['CateCode']}}" @if(element('cate_code', $arr_input) == $row['CateCode']){{'selected'}}@endif>{{$row['CateName']}}</option>
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
                            {{-- 교수별 상품 리스트 loop --}}
                            @if(element('search_order', $arr_input) == 'course')
                                {{-- 정렬방식이 과정순일 경우 배열키 (OrderNumCourse + ProdCode) 순으로 재정렬 --}}
                                @php ksort($data['list'][$subject_idx][$prof_idx]); @endphp
                            @endif

                                <tr class="replyList willbes-Open-Table">
                                    <td class="w-data tx-left">
                                        <div class="w-tit">{{$subject_name}}</div>
                                    </td>
                                    <td class="MoreBtn tx-center">></td>
                                </tr>
                                <tr class="willbes-Open-List">
                                    <td class="w-data tx-left" colspan="2">
                                        @foreach($data['professor_names'][$subject_idx] as $prof_idx => $prof_name)
                                            @foreach($data['list'][$subject_idx][$prof_idx] as $idx => $row)
                                                <div>
                                                    <dl class="w-info">
                                                        <dt>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }} </dt>
                                                    </dl>
                                                    <div class="w-tit tx-blue">
                                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 4) }}', '{{ $pattern }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span>
                                                            <span class="NSK ml10 nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                            <span class="NSK nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span></dt>
                                                    </dl>
                                                    @if($pattern == 'free' && $row['FreeLecTypeCcd'] == '652002')
                                                        <div class="freeLecPass">
                                                            <p>보강동영상 비밀번호 입력</p>
                                                            <input type="password" type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20">
                                                            <a href="#none" name="btn_check_free_passwd" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 4) }}', '{{ $pattern }}');">확인</a>
                                                        </div>
                                                        <div class="w-buy mt15">
                                                            <ul class="two">
                                                            </ul>
                                                        </div>
                                                    @else
                                                        <ul class="h30">
                                                            @if(empty($row['ProdPriceData']) === false)
                                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                                    @if($row['IsCart'] == 'Y' || $pattern == 'free')
                                                                        <li><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                                                    @endif<label class="pl10">{{ $price_row['SaleTypeCcdName'] }} : <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</label></li>
                                                                @endforeach
                                                            @endif
                                                            @if($row['IsCart'] == 'N' && $pattern == 'only')
                                                                <br/><div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                                                            @endif
                                                        </ul>
                                                        <div class="w-buy mt15">
                                                            <ul class="two">
                                                                @if($pattern == 'only')
                                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                                @endif
                                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
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
                    $.each($arr_reset, function(index, item) {
                        $('#url_form').find('input[type="hidden"][name="' + item + '"]').remove();
                    });
                }
                goUrl($(this).attr('id'), $(this).val());
            });

            $('#btn_search').on('click', function() {
                goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
            });

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'a[name="btn_cart"], a[name="btn_direct_pay"]', function() {
                var $is_direct_pay = $(this).data('direct-pay');
                addCartNDirectPay($regi_form, $is_direct_pay, 'Y','{{front_url('')}}');
            });
        });

        function goShow(prod_code, cate_code, pattern) {
            var $free_lec_passwd = $regi_form.find('input[id="free_lec_passwd_' + prod_code + '"]');
            if ($free_lec_passwd.length > 0) {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                if ($free_lec_passwd.val() === '') {
                    alert('보강동영상 비밀번호를 입력해 주세요.');
                    $free_lec_passwd.focus();
                    return;
                }

                var url = frontUrl('/lecture/checkFreeLecPasswd/prod-code/' + prod_code);
                var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                    'free_lec_passwd': $free_lec_passwd.val()
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

    </script>

@stop