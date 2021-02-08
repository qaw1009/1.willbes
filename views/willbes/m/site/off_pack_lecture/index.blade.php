@extends('willbes.m.layouts.master')

@section('page_title', '학원수강신청 > 종합반' )

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        {!! banner('M_수강신청_종합반상단', 'MainSlider mt20 mb20', $__cfg['SiteCode'], element('cate_code', $arr_input)) !!}

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
                                <dt>{{$row['CampusCcdName']}}<span class="row-line">|</span>{{$row['CourseName']}}
                            </dl>
                            <div class="w-tit">
                                <a href="#none" onclick="goShowOffPack('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강월 <span class="tx-blue">{{$row['SchoolStartYear']}}년 {{$row['SchoolStartMonth']}}월</span> <span class="row-line">|</span></dt>
                                <dt>수강형태 <span class="tx-blue">{{$row['StudyPatternCcdName']}}</span>
                                    <span class="NSK ml10 nBox n{{ substr($row['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{ $row['StudyApplyCcdName'] }}</span>
                                    <span class="NSK nBox n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</span></dt><br>
                                @php
                                    if(empty($row['ProdPriceData']) == false) {
                                        $saletypeccd = $row['ProdPriceData'][0]['SaleTypeCcd'];
                                        $salerate = $row['ProdPriceData'][0]['SaleRate'];
                                        $salerateunit = $row['ProdPriceData'][0]['SaleRateUnit'];
                                        $realsaleprice = $row['ProdPriceData'][0]['RealSalePrice'];
                                    } else {
                                        $saletypeccd = 0;
                                        $salerate = 0;
                                        $salerateunit = 0;
                                        $realsaleprice = 0;
                                    }
                                @endphp
                                <dt><span class="tx-blue">{{ number_format($realsaleprice, 0) }}원</span>(↓{{ $salerate . $salerateunit }})</dt>
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
        });

        {{--상세페이지 이동--}}
        function goShowOffPack(prod_code, cate_code) {
            location.href = frontPassUrl('/offPackage/show/prod-code/' + prod_code + '?'+$('#url_form').serialize());
        }
    </script>
@stop