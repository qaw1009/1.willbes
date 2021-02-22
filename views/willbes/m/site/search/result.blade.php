@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <form id="areaSearch_form" name="areaSearch_form" method="GET">
            <input type="hidden" name="cate" id="areaSearch_cate" value="{{empty($arr_search_input) ? $__cfg['CateCode'] : element('cate',$arr_search_input)}}">
            <input type="text" name="" class="d_none">
            <div class="onSearch">
                <input type="search" class='areaSearch' data-form="areaSearch_form" id="areaSearch_text" name="searchfull_text" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                <input type="hidden" name="searchfull_order" id="searchfull_order" value="">
                <label for="btn_areaSearch"><button title="검색" type="button" id="btn_areaSearch" class='btn_areaSearch' data-form="areaSearch_form">검색</button>
            </div>
        </form>

        <div class="searchAmount">
            <strong>{{element('searchfull_text',$arr_search_input)}}</strong>에 대한 강좌 검색결과 <strong>{{$total_count}}</strong>건
        </div>

        <form id="regi_form" name="regi_form" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}

            @if($total_count === 0)
                {{--검색 결과 없을 경우--}}
                <div class="searchZero">
                    <span><img src="{{ img_url('common/icon_search_big.png')}}"></span>
                    <h3>검색 결과가 없습니다. </h3>
                    <p>
                        검색어를 바르게 입력하셨는지 확인해주세요.<br>
                        검색어의 띄어쓰기를 다르게 해보세요.<br>
                        검색어를 줄이거나 다른 단어로 다시 검색해 보세요.
                    </p>
                </div>
            @else
                <div class="lineTabs pd-zero c_both">
                    <ul class="tabWrap lineWrap rowlineWrap four mt-zero">
                        <li><a href="#leclist1" class="on">단과강좌 [<span>{{count($data['on_lecture'])}}</span>]</a><span class="row-line">|</span></li>
                        <li><a href="#leclist2">무료강좌 [<span>{{count($data['on_free_lecture'])}}</span>]</a><span class="row-line">|</span></li>
                        <li><a href="#leclist3">추천패키지 [<span>{{count($data['adminpack_lecture_648001'])}}</span>]</a><span class="row-line">|</span></li>
                        <li><a href="#leclist4">선택패키지 [<span>{{count($data['adminpack_lecture_648002'])}}</span>]</a></li>
                    </ul>
                </div>

                <div class="tabBox c_both pt20">
                    <div id="leclist1" class="searchContent">
                        <h5>
                            · 단과강좌
                            <select name="searchfull_order_on"  title="정렬" class="seleProcess width30p searchfull_order_by">
                                <option value="ProdCode" {{element('searchfull_order',$arr_search_input) === 'ProdCode' ? 'selected' :''}}>최근등록순</option>
                                <option value="StudyStartDate" {{element('searchfull_order',$arr_search_input) === 'StudyStartDate' ? 'selected' :''}}>최근개강순</option>
                            </select>
                        </h5>
                        <div class="lineTabs lecListTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <colgroup>
                                    <col>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-data tx-left">
                                        @if(empty($data['on_lecture']) === false)
                                            @foreach($data['on_lecture'] as $row)
                                                <div class="oneBox">
                                                    <div class="OTclass mr10">
                                                        @if($row['LecTypeCcd'] === '607003')
                                                            <span>직장인/재학생반</span>
                                                        @endif
                                                    </div>
                                                    <dl class="w-info">
                                                        <dt>{{$row['ProdCateName']}}<span class="row-line">|</span>{{$row['CourseName']}}
                                                            <span class="row-line">|</span>{{$row['SubjectName']}}<span class="row-line">|</span>{{$row['ProfNickName']}} </dt>
                                                    </dl>
                                                    <div class="w-tit tx-blue">
                                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'only', '{{app_to_env_url($row['SiteUrl'])}}/m');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt><br>
                                                        <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span>
                                                            <span class="NSK ml10 nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                            <span class="NSK nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span></dt>
                                                    </dl>
                                                    <ul class="priceWrap">
                                                        @if(empty($row['ProdPriceData']) === false)
                                                            @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                                <li class="mb10">
                                                                    <label>
                                                                        {{ $price_row['SaleTypeCcdName'] }} :
{{--                                                                        <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>--}}
{{--                                                                        (↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})--}}

                                                                        @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                            <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                                            <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                                        @endif
                                                                        <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                        @if($row['IsCart'] == 'N')
                                                            <li class="tx-red">※ 바로결제만 가능한 상품입니다.</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="oneBox"></div>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="leclist2" class="searchContent">
                        <h5>
                            · 무료강좌
                            <select name="searchfull_order_free" title="정렬" class="seleProcess width30p searchfull_order_by">
                                <option value="ProdCode" {{element('searchfull_order',$arr_search_input) === 'ProdCode' ? 'selected' :''}}>최근등록순</option>
                                <option value="StudyStartDate" {{element('searchfull_order',$arr_search_input) === 'StudyStartDate' ? 'selected' :''}}>최근개강순</option>
                            </select>
                        </h5>
                        <div class="lineTabs lecListTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <colgroup>
                                    <col>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-data tx-left">
                                        @if(empty($data['on_free_lecture']) === false)
                                            @foreach($data['on_free_lecture'] as $row)
                                                <div class="oneBox">
                                                    <dl class="w-info">
                                                        <dt>{{$row['ProdCateName']}}<span class="row-line">|</span>{{$row['CourseName']}}
                                                            <span class="row-line">|</span>{{$row['SubjectName']}}<span class="row-line">|</span>{{$row['ProfNickName']}} </dt>
                                                    </dl>
                                                    <div class="w-tit tx-blue">
                                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}/m');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt><br>
                                                        <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span>
                                                            <span class="NSK ml10 nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                            <span class="NSK nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span></dt>
                                                    </dl>
                                                    @if($row['FreeLecTypeCcd'] == '652002' || $row['FreeLecTypeCcd'] == '652003')
                                                        <div class="freeLecPass">
                                                            @if($row['FreeLecTypeCcd'] == '652002')
                                                                @if(empty($row['FreeLecPasswd']))
                                                                    <input type="hidden" id="free_lec_passwd_{{ $row['ProdCode'] }}"  name="free_lec_passwd" value="" data-chk="p">
                                                                    <a href="javascript:;" class="bg-black tx-white bd-none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}/m');">보강동영상 보기</a>
                                                                @else
                                                                    <p>보강동영상 비밀번호 입력</p>
                                                                    <input type="password" type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20">
                                                                    <a href="#none" name="btn_check_free_passwd" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}/m');">확인</a>
                                                                @endif
                                                            @else
                                                                <input type="hidden" id="free_lec_passwd_{{ $row['ProdCode'] }}"  name="free_lec_passwd" value="" data-chk="o">
                                                                <a href="javascript:;" class="view bg-gray-purple" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}/m');">무료강의 보기</a>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <ul>
                                                            @if(empty($row['ProdPriceData']) === false)
                                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                                    <li class="mb10">
                                                                        <label>{{ $price_row['SaleTypeCcdName'] }} : <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</label>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    @endif

                                                </div>
                                            @endforeach
                                        @else
                                            <div class="oneBox"></div>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="leclist3" class="searchContent">
                        <h5>
                            · 추천패키지
                        </h5>
                        <div class="lineTabs lecListTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <colgroup>
                                    <col>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-data tx-left">
                                        @if(empty($data['adminpack_lecture_648001']) === false)
                                            @foreach($data['adminpack_lecture_648001'] as $row)
                                                <div class="oneBox">
                                                    <dl class="w-info">
                                                        <dt>{{$row['ProdCateName']}}<span class="row-line">|</span>{{$row['CourseName']}}</dt>
                                                    </dl>
                                                    <div class="w-tit tx-blue">
                                                        <a href="{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/m/' : front_url('/')}}package/show/cate/{{$row['CateCode']}}/pack/{{$row['PackTypeCcd']}}/prod-code/{{$row['ProdCode']}}" target="_blank">{{$row['ProdName']}}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span> <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span></dt>
                                                    </dl>
                                                    <ul class="priceWrap">
                                                        @if(empty($row['ProdPriceData'] ) === false)
                                                            @foreach($row['ProdPriceData'] as $price_row)
                                                                @if($loop -> index === 1)
                                                                    <li class="mb10">
{{--                                                                        <span class="tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})--}}

                                                                        @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                            <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                                            <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                                        @endif
                                                                        <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="leclist4" class="searchContent">
                        <h5>
                            · 선택패키지
                        </h5>
                        <div class="lineTabs lecListTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <colgroup>
                                    <col>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-data tx-left">
                                        @if(empty($data['adminpack_lecture_648002']) === false)
                                            @foreach($data['adminpack_lecture_648002'] as $row)
                                                <div class="oneBox">
                                                    <dl class="w-info">
                                                        <dt>{{$row['ProdCateName']}}<span class="row-line">|</span>{{$row['CourseName']}}</dt>
                                                    </dl>
                                                    <div class="w-tit tx-blue">
                                                        <a href="{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/m/' : front_url('/')}}package/show/cate/{{$row['CateCode']}}/pack/{{$row['PackTypeCcd']}}/prod-code/{{$row['ProdCode']}}" target="_blank">{{$row['ProdName']}}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span> <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span></dt>
                                                    </dl>
                                                    <ul class="priceWrap">
                                                        @if(empty($row['ProdPriceData'] ) === false)
                                                            @foreach($row['ProdPriceData'] as $price_row)
                                                                @if($loop -> index === 1)
                                                                    <li class="mb10">
{{--                                                                        <span class="tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})--}}

                                                                        @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                            <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                                            <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                                        @endif
                                                                        <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </form>
    </div>
    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')

    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            $(".searchfull_order_by").change(function(){
                $("#searchfull_order").val($(this).val());
                goFullSearch('areaSearch_form');
            })
        });

        function goShow(prod_code, cate_code, pattern, site_url) {
            var $free_lec_passwd = $regi_form.find('input[id="free_lec_passwd_' + prod_code + '"]');

            if ($free_lec_passwd.length > 0) {
                if ($free_lec_passwd.data('chk') === "o") {
                    location.href = '{{ front_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code+'#tab03';
                    return;
                }

                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                if ($free_lec_passwd.data('chk') !== "p" && $free_lec_passwd.val() === '') {
                    alert('보강동영상 비밀번호를 입력해 주세요.');
                    $free_lec_passwd.focus();
                    return;
                }
                var url = '{{$__cfg['SiteCode'] === '2000' ? '/search/checkFreeLecPasswd/prod-code/' : front_url('/lecture/checkFreeLecPasswd/prod-code/') }}'+ prod_code;
                var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                    'free_lec_passwd': $free_lec_passwd.val(),
                    'free_lec_check' : $free_lec_passwd.data('chk')
                });
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        @if($__cfg['SiteCode'] === '2000')
                            $url = "//"+site_url+"/lecture/show/cate/";
                        @else
                            $url = "{{front_url('/lecture/show/cate/')}}";
                        @endif
                            goUrl = $url + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code+'#tab03';
                        window.open(goUrl, '_blank')
                    }
                }, showAlertError, false, 'POST');
            } else {
                @if($__cfg['SiteCode'] === '2000')
                    $url = "//"+site_url+"/lecture/show/cate/";
                @else
                    $url = "{{front_url('/lecture/show/cate/')}}";
                @endif
                    goUrl = $url + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
                window.open(goUrl, '_blank')
            }
        }
    </script>
@stop