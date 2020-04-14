
@extends('willbes.pc.layouts.master')

@section('content')

    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        {{--@include('willbes.pc.layouts.partial.site_menu')--}}
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Section widthAuto">
            <div class="onSearch onSearchBig NG">
                <form id="areaSearch_form" name="areaSearch_form" method="GET">
                    <input type="hidden" name="cate" id="areaSearch_cate" value="{{empty($arr_search_input) ? $__cfg['CateCode'] : element('cate',$arr_search_input)}}">
                    <input type="text" name="" class="d_none">
                    <input type="search" class='areaSearch' data-form="areaSearch_form" id="areaSearch_text" name="searchfull_text" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                    <input type="hidden" name="searchfull_order" id="searchfull_order" value="">
                    <label for="areaSearch_text"><button title="검색" type="button" id="btn_areaSearch" class='btn_areaSearch' data-form="areaSearch_form">검색</button></label>
                </form>
                <div class="c_both"><strong>{{element('searchfull_text',$arr_search_input)}}</strong>에 대한 강좌 검색결과 <strong>{{$total_count}}</strong>건</div>
            </div>
        </div>

        <form id="regi_form" name="regi_form" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <div class="widthAuto p_re">
                {{-- 검색 결과 없을 경우--}}
                @if($total_count === 0)
                    <div class="searchZero">
                        <span><img src="{{ img_url('common/icon_search_big.png')}}"> </span>
                        <h3 class="NG">검색 결과가 없습니다.</h3>
                        <p>검색어를 바르게 입력하셨는지 확인해주세요.<br>
                            검색어의 띄어쓰기를 다르게 해보세요.<br>
                            검색어를 줄이거나 다른 단어로 다시 검색해 보세요.
                        </p>
                    </div>
                @else
                    {{-- 검색 결과 있을 경우--}}
                    <div class="searchList">
                        <ul class="searchListTap NG">
                            <li><a href="#tab01" class="on">단과강좌 [<span>{{count($data['on_lecture'])}}</span>]</a></li>
                            <li><a href="#tab02">무료강좌 [<span>{{count($data['on_free_lecture'])}}</span>]</a></li>
                            <li><a href="#tab03">추천패키지 [<span>{{count($data['adminpack_lecture_648001'])}}</span>]</a></li>
                            <li><a href="#tab04">선택패키지 [<span>{{count($data['adminpack_lecture_648002'])}}</span>]</a></li>
                        </ul>
                        <div class="p_re">
                            <div id="tab01">
                                <div class="willbes-Lec NG c_both">
                                    <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                                        · 단과강좌
                                        <div class="selectBoxForm">
                                            <span class="selectBox ml10">
                                                <select name="searchfull_order_on" title="정렬" class="searchfull_order_by">
                                                    <option value="ProdCode" {{element('searchfull_order',$arr_search_input) === 'ProdCode' ? 'selected' :''}}>최근등록순</option>
                                                    <option value="StudyStartDate" {{element('searchfull_order',$arr_search_input) === 'StudyStartDate' ? 'selected' :''}}>최근개강순</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- willbes-Lec-Subject -->

                                    @if(empty($data['on_lecture']) === false)
                                        @foreach($data['on_lecture'] as $row)
                                            <div class="willbes-Lec-Table">
                                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                                    <colgroup>
                                                        <col style="width: 100px;">
                                                        <col style="width: 100px;">
                                                        <col width="*">
                                                        <col style="width: 250px;">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        <td class="w-list">{{$row['CourseName']}}</td>
                                                        <td class="w-name">{{$row['SubjectName']}}<br/><span class="tx-blue">{{$row['ProfNickName']}}</span></td>
                                                        <td class="w-data tx-left pl20 p_re">
                                                            <div class="OTclass">
                                                                @if($row['LecTypeCcd'] === '607003')
                                                                    <span>직장인/재학생반</span> <a href="#none"  class="lec_type_info">?</a>
                                                                @endif
                                                                {{$row['ProdCateName']}}
                                                            </div>
                                                            <div class="w-tit">
                                                                <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'only', '{{app_to_env_url($row['SiteUrl'])}}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt>강의촬영(실강) :  {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                                    <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                                                </dt>
                                                                <br>
                                                                <dt class="mr10">
                                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('') }}lecture', 'pattern/only/')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                            </dl>
                                                            @if($row['IsCart'] == 'N')
                                                                <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>
                                                            @endif
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            @if(empty($row['LectureSampleData']) === false)
                                                                <div class="w-sp"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
                                                                <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                                                    <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                                    @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                                        <dl class="NSK">
                                                                            <dt class="Tit NG">맛보기</dt>
                                                                            @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                                            @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                                        </dl>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            @if(empty($row['ProdPriceData']) === false)
                                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                                    <ul class="priceWrap">
                                                                        <li>
                                                                            @if($row['IsCart'] == 'Y')
                                                                                <span class="chkBox"><input type="checkbox" class="d_none" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                                            @else
                                                                                <span class="chkBox" style="width:14px;"></span>
                                                                            @endif
                                                                            <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            @endif
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecTable -->

                                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                    <tbody>
                                                    <tr>
                                                        <td class="pl100">
                                                            @if(empty($row['ProdBookData']) === false)
                                                                @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                                    <div class="w-sub">
                                                                        <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                                        <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                                        <span class="chk buybtn p_re">
                                                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                                [{{ $book_row['wSaleCcdName'] }}]
                                                                            </label>
                                                                            @if($row['IsCart'] == 'Y')
                                                                                <input type="checkbox" class="d_none" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                            @endif
                                                                        </span>
                                                                        <span class="priceWrap">
                                                                            <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                            <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                                        </span>
                                                                    </div>
                                                                @endforeach
                                                                <div class="w-sub tx-red">※정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                                                                <div class="w-sub">
                                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2', '{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('') }}lecture', 'pattern/only/')">
                                                                        <strong class="open-info-modal">교재상세정보</strong>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="w-sub">
                                                                    <span class="w-subtit none">
                                                                        {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecInfoTable -->
                                            </div>
                                            <!-- willbes-Lec-Table -->
                                        @endforeach
                                    @endif
                                </div>
                                <!-- willbes-Lec -->
                            </div>

                            <div id="tab02">
                                <div class="willbes-Lec NG c_both">
                                    <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                                        · 무료강좌
                                        <div class="selectBoxForm">
                                            <span class="selectBox ml10">
                                                <select name="searchfull_order_free" title="정렬" class="searchfull_order_by">
                                                    <option value="ProdCode" {{element('searchfull_order',$arr_search_input) === 'ProdCode' ? 'selected' :''}}>최근등록순</option>
                                                    <option value="StudyStartDate" {{element('searchfull_order',$arr_search_input) === 'StudyStartDate' ? 'selected' :''}}>최근개강순</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    @if(empty($data['on_free_lecture']) === false)
                                        @foreach($data['on_free_lecture'] as $row)
                                            <div class="willbes-Lec-Table">
                                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                                    <colgroup>
                                                        <col style="width: 100px;">
                                                        <col style="width: 100px;">
                                                        <col width="*">
                                                        <col style="width: 250px;">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        <td class="w-list">{{$row['CourseName']}}</td>
                                                        <td class="w-name">{{$row['SubjectName']}}<br/><span class="tx-blue">{{$row['ProfNickName']}}</span></td>
                                                        <td class="w-data tx-left pl20 p_re">
                                                            <div class="OTclass">
                                                                @if($row['LecTypeCcd'] === '607003')
                                                                    <span>직장인/재학생반</span> <a href="#none"  class="lec_type_info">?</a>
                                                                @endif
                                                                {{$row['ProdCateName']}}
                                                            </div>
                                                            <div class="w-tit">
                                                                <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt>강의촬영(실강) :  {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                                    <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                                                </dt>
                                                                <br>
                                                                <dt class="mr10">
                                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('') }}lecture', 'pattern/free/')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            @if($row['FreeLecTypeCcd'] == '652002')
                                                                @if(empty($row['FreeLecPasswd']))
                                                                    <div class="w-sp">
                                                                        <input type="hidden" id="free_lec_passwd_{{ $row['ProdCode'] }}"  name="free_lec_passwd" value="" data-chk="p">
                                                                        <a href="javascript:;" class="bg-black tx-white bd-none" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}');">보강동영상 보기</a>
                                                                    </div>
                                                                @else
                                                                    <div class="w-sp100">
                                                                        보강동영상 비밀번호 입력
                                                                        <div>
                                                                            <input type="password" id="free_lec_passwd_{{ $row['ProdCode'] }}" name="free_lec_passwd" placeholder="****" maxlength="20" data-chk>
                                                                            <button type="button" name="btn_check_free_passwd" onclick="goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'free', '{{app_to_env_url($row['SiteUrl'])}}');"><span>확인</span></button>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                @if(empty($row['LectureSampleData']) === false)
                                                                    <div class="w-sp"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
                                                                    <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                                        @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                                            <dl class="NSK">
                                                                                <dt class="Tit NG">맛보기</dt>
                                                                                @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                                                @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                                            </dl>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                @if(empty($row['ProdPriceData']) === false)
                                                                    @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                                        <ul class="priceWrap">
                                                                            <li>
                                                                                @if($row['IsCart'] == 'Y')
                                                                                    <span class="chkBox"><input type="checkbox" class="d_none" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_products chk_only_{{ $row['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/></span>
                                                                                @else
                                                                                    <span class="chkBox" style="width:14px;"></span>
                                                                                @endif
                                                                                <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                                                                <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                                                <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                                            </li>
                                                                        </ul>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecTable -->

                                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                    <tbody>
                                                    <tr>
                                                        <td class="pl100">
                                                            @if(empty($row['ProdBookData']) === false)
                                                                @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                                    <div class="w-sub">
                                                                        <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                                        <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                                        <span class="chk buybtn p_re">
                                                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                                [{{ $book_row['wSaleCcdName'] }}]
                                                                            </label>
                                                                            @if($row['IsCart'] == 'Y')
                                                                                <input type="checkbox" class="d_none" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                            @endif
                                                                        </span>
                                                                        <span class="priceWrap">
                                                                            <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                            <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                                        </span>
                                                                    </div>
                                                                @endforeach
                                                                <div class="w-sub tx-red">※정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                                                                <div class="w-sub">
                                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2', '{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('') }}lecture', 'pattern/free/')">
                                                                        <strong class="open-info-modal">교재상세정보</strong>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="w-sub">
                                                                    <span class="w-subtit none">
                                                                        {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecInfoTable -->
                                            </div>
                                            <!-- willbes-Lec-Table -->
                                        @endforeach
                                    @endif
                                </div>
                                <!-- willbes-Lec -->
                            </div>


                            <div id="tab03">
                                <div class="willbes-Lec NG c_both">
                                    <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                                        · 추천패키지
                                    </div>
                                    <!-- willbes-Lec-Subject -->
                                    @if(empty($data['adminpack_lecture_648001']) === false)
                                        @foreach($data['adminpack_lecture_648001'] as $row)
                                            <div class="willbes-Lec-Table d_block">
                                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                                    <colgroup>
                                                        <col style="width: 120px;">
                                                        <col>
                                                        <col style="width: 200px;">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="OTclass">{{$row['ProdCateName']}}</div>
                                                            <div class="w-tit">
                                                                <a href="{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('')}}package/show/cate/{{$row['CateCode']}}/pack/{{$row['PackTypeCcd']}}/prod-code/{{$row['ProdCode']}}" target="_blank">{{$row['ProdName']}}</a>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt class="mr20">
                                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('') }}package')">
                                                                        <strong>패키지상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice">
                                                            @if(empty($row['ProdPriceData'] ) === false)
                                                                @foreach($row['ProdPriceData'] as $price_row)
                                                                    @if($loop -> index === 1)
                                                                        <div class="priceWrap">
                                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecTable -->
                                            </div>
                                    @endforeach
                                @endif
                                <!-- willbes-Lec-Table -->
                                </div>
                                <!-- willbes-Lec -->
                            </div>

                            <div id="tab04">
                                <div class="willbes-Lec NG c_both">
                                    <div class="willbes-Lec-Subject tx-dark-black bdb-light-gray">
                                        · 선택패키지
                                    </div>
                                    <!-- willbes-Lec-Subject -->

                                    @if(empty($data['adminpack_lecture_648002']) === false)
                                        @foreach($data['adminpack_lecture_648002'] as $row)
                                            <div class="willbes-Lec-Table d_block">
                                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                                    <colgroup>
                                                        <col style="width: 120px;">
                                                        <col>
                                                        <col style="width: 200px;">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="OTclass">{{$row['ProdCateName']}}</div>
                                                            <div class="w-tit">
                                                                <a href="{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('')}}package/show/cate/{{$row['CateCode']}}/pack/{{$row['PackTypeCcd']}}/prod-code/{{$row['ProdCode']}}" target="_blank">{{$row['ProdName']}}</a>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt class="mr20">
                                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{$__cfg['SiteCode'] === '2000' ? '//'.app_to_env_url($row['SiteUrl']).'/' : front_url('') }}package')">
                                                                        <strong>패키지상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice">
                                                            @if(empty($row['ProdPriceData'] ) === false)
                                                                @foreach($row['ProdPriceData'] as $price_row)
                                                                    @if($loop -> index === 1)
                                                                        <div class="priceWrap">
                                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecTable -->
                                            </div>
                                    @endforeach
                                @endif
                                <!-- willbes-Lec-Table -->
                                </div>
                                <!-- willbes-Lec -->
                            </div>

                            <div id="InfoForm" class="willbes-Layer-Box"></div>

                            {{--직장인/재학생 반 안내 팝업--}}
                            <div id="OTclassInfo" class="willbes-Layer-requestInfo2">
                                <a class="closeBtn" href="#none" onclick="closeWin('OTclassInfo')">
                                    <img src="{{ img_url('prof/close.png') }}">
                                </a>
                                <div class="Layer-Tit NG tx-dark-black">직장인/재학생반  <span class="tx-blue">수강 안내</span></div>
                                <div class="Layer-Cont">
                                    <div class="Layer-SubTit tx-gray">
                                        <ul>
                                            <li>
                                                <strong>예) 40일 강좌 수강시</strong><br>
                                                - 수강 시간 : 평일 19~03시만 수강 / 주말, 공휴일 24시간 수강 가능<br>
                                                - 수강 기간 : 원래 수강 기간 X 1.4배수(40일 X 1.4 = 56일)<br>
                                                - 수강 중지 : 3회. 3회의 합은 56일까지<br>
                                                - 수강 연장 : 3회. 1일 연장 수강료는 원래 수강 기간 40일 기준(강의 종료일까지만 연장 가능)<br>
                                                - 수강 환불 : 환불일수는 원래 수강 기간 40일 기준(수강 중지시 환불 불가)<br>
                                                <br>
                                                <span class="tx-red">※ 주말반은 일반강의로 변경이 안됩니다.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @if($__cfg['SiteCode'] === '2000' && count($data['on_lecture']) === 200)
                                <div class="searchTxt">
                                    <div class="mb10 tx-origin-red">통합사이트 검색결과는 200개까지만 노출됩니다. 더 자세한 검색을 원하시면 아래 과정별 사이트에서 검색해주세요.</div>
                                    <a href="//{{app_to_env_url('police.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">신광은경찰</a>
                                    <a href="//{{app_to_env_url('pass.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">공무원</a>
                                    <a href="//{{app_to_env_url('gosi.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">고등고시</a>
                                    <a href="//{{app_to_env_url('job.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">자격증</a>
                                    <a href="//{{app_to_env_url('spo.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">경찰간부</a>
                                    <a href="//{{app_to_env_url('work.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">취업</a>
                                    <a href="//{{app_to_env_url('lang.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">어학</a>
                                    <a href="//{{app_to_env_url('njob.willbes.net')}}/search/result/?searchfull_text={{urlencode(element('searchfull_text',$arr_search_input))}}" target="_new">N잡</a>
                                </div>
                            @endif
                            <div class="TopBtn">
                                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                            </div>
                            <!-- TopBtn-->
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            $('.lec_type_info').on('click', function(){
                var $target_layer = $('#OTclassInfo');
                var top_bn_height = $('#topBannerLayer').height();
                var top = $(this).offset().top - 285;
                if (top_bn_height !== null && typeof top_bn_height !== 'undefined') {
                    top = top - top_bn_height;
                }
                var right = 180;
                $target_layer.css({
                    'display': 'block',
                    'top': top,
                    'right': right,
                    'left': 200,
                    'position': 'absolute'
                }).addClass();
            });

            $(".searchfull_order_by").change(function(){
                $("#searchfull_order").val($(this).val());
                goFullSearch('areaSearch_form');
            })
        });

        function goShow(prod_code, cate_code, pattern, site_url) {
            var $free_lec_passwd = $regi_form.find('input[id="free_lec_passwd_' + prod_code + '"]');
            if ($free_lec_passwd.length > 0) {
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
                        goUrl = $url + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
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