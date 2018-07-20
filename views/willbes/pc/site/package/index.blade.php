@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="curriWrap c_both">
                {{-- 과정 --}}
                <ul class="curriTabs c_both">
                    <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                    @foreach($arr_base['course'] as $idx => $row)
                        <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                    @endforeach
                </ul>
                <div class="CurriBox">
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
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
                            <span>
                                <input type="radio" id="school_year" name="school_year" value="" onclick="goUrl('school_year', '');" @if(empty(element('school_year', $arr_input)) === true) checked="checked" @endif/>
                                <label for="school_year">전체</label>
                            </span>
                                @for($i=2017; $i<=date('Y')+1; $i++)
                                    <span>
                                    <input type="radio" id="school_year" name="school_year" value="{{ $i }}" onclick="goUrl('school_year', '{{ $i }}');" @if(element('school_year', $arr_input) == $i) checked="checked" @endif/>
                                    <label for="school_year">{{ $i }}년</label>
                                </span>
                                @endfor
                            </td>
                            <td class="All-Clear">
                                <a href="#none" onclick="location.href=location.pathname"><img src="{{ img_url('sub/icon_clear.gif') }}" style="margin: -2px 6px 0 0">전체해제</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- curriWrap -->

            <div class="willbes-Bnr">
                <script src="{{ app_url('/banner/show/site/' . $__cfg['SiteCode'] . '/cate/' . $__cfg['CateCode'] . '/section/00000/location/000000', 'www') }}"></script>
            </div>
            <!-- willbes-Bnr -->

            <div class="willbes-Lec-Search mb60">
                <div class="inputBox p_re">
                    <input type="text" id="prod_name" name="prod_name" maxlength="30" value="{{ element('prod_name', $arr_input) }}" placeholder="강의명">
                    <button type="submit" onclick="goUrl('prod_name', document.getElementById('prod_name').value);" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
                <div class="InfoBtn"><a href="#none">수강신청안내 <span>▶</span></a></div>
            </div>
            <!-- willbes-Lec-Search -->

            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black">{{$title}}</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                <div class="willbes-Lec-Table d_block">
                    <table cellspacing="0" cellpadding="0" class="lecTable">
                        <colgroup>
                            <col style="width: 95px;">
                            <col style="width: 665px;">
                            <col style="width: 180px;">
                        </colgroup>
                        <tbody>

                        @foreach($data['list'] as $row)
                        <tr>
                            <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/package/show/cate/').$__cfg['CateCode'].'/pack/'.$pack }}" class="prod-name-{{ $row['ProdCode']}}">{{$row['ProdName']}}</a>
                                </div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" class="btn-lecture-info" data-prod-code="{{ $row['ProdCode'] }}" data-tab-id="hover1">
                                            <strong>패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="studydate-{{ $row['ProdCode']}} tx-blue">{{$row['StudyStartDate']}}</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="studyperiod-{{ $row['ProdCode']}} tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="multipleapply-{{ $row['ProdCode']}} nBox n1">{{$row['MultipleApply']}}배수</span>
                                    </dt>
                                </dl>
                                @foreach($data['contents'] as $content_row)
                                    @if( $row['ProdCode'] == $content_row['ProdCode'])
                                    <span class="content-{{$content_row['ContentTypeCcd']}}-{{$row['ProdCode']}} d_none">{!! $content_row['Content'] !!}</span>
                                    @endif
                                @endforeach

                            </td>
                            <td class="w-notice">
                                @foreach($row['ProdPriceData'] as $price_row)
                                    <div class="priceWrap">
                                        <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- lecTable -->
                </div>
                <!-- willbes-Lec-Table -->

                <div class="TopBtn">
                    <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                </div>
                <!-- TopBtn-->
            </div>
            <!-- willbes-Lec -->

            <div id="InfoForm" class="willbes-Layer-Box d2">
                <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="target-name Layer-Tit tx-dark-black NG"></div>
                <div class="lecDetailWrap">
                    <div class="classInfo">
                        <dl class="w-info NG">
                            <dt>개강일 : <span class="target-studydate tx-blue"></span></dt>
                            <dt><span class="row-line">|</span></dt>
                            <dt>수강기간 : <span class="target-studyperiod tx-blue"></span></dt>
                            <dt class="NSK ml15">
                                <span class="target-multipleapply nBox n1"></span>
                            </dt>
                        </dl>
                    </div>
                    <div class="classInfoTable">
                        <table cellspacing="0" cellpadding="0" class="classTable tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-list bg-light-white">
                                    강좌유의사항<br/>
                                    <span class="tx-red">(필독)</span>
                                </td>
                                <td class="target-content-633001 w-data tx-left pl25"></td>
                            </tr>
                            <tr>
                                <td class="w-list bg-light-white">강좌소개</td>
                                <td class="target-content-633002 w-data tx-left pl25"></td>
                            </tr>
                            <tr>
                                <td class="w-list bg-light-white">강좌특징</td>
                                <td class="target-content-633003 w-data tx-left pl25"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- willbes-Layer-Box -->
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>

    <!-- willbes-Lec-buyBtn-sm -->
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $buy_layer = $('.willbes-Lec-buyBtn-sm');

        $(document).ready(function() {

            $('.willbes-Lec-Table').on('click', '.btn-lecture-info', function() {
                var $prod_code = $(this).data('prod-code');
                var $location = $('.willbes-Lec-Table');
                var $target = $('#InfoForm');

                /*
                var $prod_title =  $location.find('.prod-name-'+$prod_code).text();
                var $studydate =  $location.find('.studydate-'+$prod_code).text();
                var $studyperiod = $location.find('.studyperiod-'+$prod_code).text();
                var $multipleapply = $location.find('.multipleapply-'+$prod_code).text();
                var $content_633001 = $location.find('.content-633001-'+$prod_code).text();
                var $content_633002 = $location.find('.content-633002-'+$prod_code).text();
                var $content_633003 = $location.find('.content-633003-'+$prod_code).text();
                */

                $target.find('.target-name').text($location.find('.prod-name-'+$prod_code).text());
                $target.find('.target-studydate').text($location.find('.studydate-'+$prod_code).text());
                $target.find('.target-studyperiod').text($location.find('.studyperiod-'+$prod_code).text());
                $target.find('.target-multipleapply').text($location.find('.multipleapply-'+$prod_code).text());
                $target.find('.target-content-633001').text($location.find('.content-633001-'+$prod_code).text());
                $target.find('.target-content-633002').text($location.find('.content-633002-'+$prod_code).text());
                $target.find('.target-content-633003').text($location.find('.content-633003-'+$prod_code).text());


                openWin('InfoForm');
            });

        });
    </script>
@stop
