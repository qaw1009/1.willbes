@extends('willbes.m.layouts.master')

@section('page_title',  '수강신청 > ' .$title)

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
                                <option value="{{$row['CateCode']}}" @if(element('cate_code', $arr_input) == $row['CateCode']  || $arr_base['category_default'] == $row['CateCode']){{'selected'}}@endif>{{$row['CateName']}}</option>
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
                <li>
                    <select id="school_year" name="school_year" title="대비년도" class="select_search">
                        <option value="">대비년도전체</option>
                        @for($i=2017; $i<=date('Y')+1; $i++)
                            <option value="{{ $i }}" @if(element('school_year', $arr_input) == $i){{'selected'}}@endif>{{ $i }}년</option>
                        @endfor
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
            </div>
            <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
                <div class="inputBox width100p p_re">
                    <input type="text" id="prod_name" name="prod_name" maxlength="30" value="{{ element('prod_name', $arr_input) }}" placeholder="강의명" class="labelSearch width100p">
                    <button type="submit" onclick="goUrl('prod_name', document.getElementById('prod_name').value);" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
            </div>

            <div class="lineTabs lecListTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col style="width: 87%;">
                        <col style="width: 13%;">
                    </colgroup>
                    <tbody>
                    @foreach($data['list'] as $row)
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>{{$row['CourseName']}}</dt>
                            </dl>
                            <div class="w-tit">
                                <a href="{{ front_url('/package/show/cate/').$row['CateCode'].'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">{{$row['StudyStartDateYM']}}</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">{{$row['StudyPeriod']}}일</span> <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span></dt><br>
                                <dt>
                                    @if(empty($row['ProdPriceData'] ) === false)
                                        @foreach($row['ProdPriceData'] as $price_row)
                                            @if($loop -> index === 1)
                                                <span class="tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})
                                            @endif
                                        @endforeach
                                    @endif
                                </dt>
                            </dl>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
                var $arr_reset = ['course_idx','school_year'];
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
    </script>
@stop