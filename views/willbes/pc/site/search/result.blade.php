@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Section widthAuto">
            <div class="onSearch onSearchBig NG">
                <form id="areaSearch_form" name="areaSearch_form" method="GET">
                    <input type="hidden" name="cate" id="areaSearch_cate" value="{{empty($arr_search_input) ? $__cfg['CateCode'] : element('cate',$arr_search_input)}}">
                    <input type="text" name="" class="d_none">
                    <input type="search" class='areaSearch' data-form="areaSearch_form" id="areaSearch_text" name="searchfull_text" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                    <label for="onsearch"><button title="검색" type="button" id="btn_areaSearch" class='btn_areaSearch' data-form="areaSearch_form">검색</button></label>
                    <!--<span>
                       <input type="checkbox" id="research" name="" value="" />
                       <label for="research">결과 내 재검색</label>
                   </span>-->
                </form>
                <div><strong>{{element('searchfull_text',$arr_search_input)}}</strong>에 대한 강좌 검색결과 <strong>{{$total_count}}</strong>건</div>
            </div>
        </div>

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
                        <li><a href="#tab01" class="on">단강좌 [<span>{{count($data['on_lecture'])}}</span>]</a></li>
                        <li><a href="#tab02">무료강좌 [<span>{{count($data['on_free_lecture'])}}</span>]</a></li>
                        <li><a href="#tab03">추천패키지 [<span>{{count($data['adminpack_lecture_648001'])}}</span>]</a></li>
                        <li><a href="#tab04">선택패키지 [<span>{{count($data['adminpack_lecture_648002'])}}</span>]</a></li>
                    </ul>
                    <div class="searchView">
                        <div id="tab01">
                            <div>
                                @if(empty($data['on_lecture']) === false)
                                    <h4 class="NG">단강좌</h4>
                                    <ul>
                                        @foreach($data['on_lecture'] as $row)
                                            <li>
                                                <a href="{{front_url('/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode'])}}" class="NG" target="_new">{{$row['ProdName']}}</a>
                                                <dl class="w-info">
                                                    <dt>{{$row['CourseName']}} · {{$row['SubjectName']}} · {{$row['ProfNickName']}} · 강의수 : {{ $row['wUnitLectureCnt'] }}강 · 수강기간 : {{ $row['StudyPeriod'] }}일 · </dt>
                                                    <dt class="NSK">
                                                        <span class="nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                        <span class="nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                                    </dt>
                                                    <dt> · 수강료 :
                                                        @if(empty($row['ProdPriceData']) === false)
                                                            @foreach(json_decode($row['ProdPriceData'],true) as $price_idx => $price_row)
                                                                @if($price_row['SaleTypeCcd'] === '613001').
                                                                    [{{ $price_row['SaleTypeCcdName'] }}] {{ number_format($price_row['RealSalePrice'], 0) }}원
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                </dl>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div id="tab02">
                            <div>
                                @if(empty($data['on_free_lecture']) === false)
                                    <h4 class="NG">무료강좌</h4>
                                    <ul>
                                        @foreach($data['on_free_lecture'] as $row)
                                            <li>
                                                <a href="{{front_url('/lecture/show/cate/'.$row['CateCode'].'/pattern/free/prod-code/'.$row['ProdCode'])}}" class="NG" target="_new">{{$row['ProdName']}}</a>
                                                <dl class="w-info">
                                                    <dt>{{$row['CourseName']}} · {{$row['SubjectName']}} · {{$row['ProfNickName']}} · 강의수 : {{ $row['wUnitLectureCnt'] }}강 · 수강기간 : {{ $row['StudyPeriod'] }}일 · </dt>
                                                    <dt class="NSK">
                                                        <span class="nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                        <span class="nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                                    </dt>
                                                </dl>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div id="tab03">
                            <div>
                                @if(empty($data['adminpack_lecture_648001']) === false)
                                    <h4 class="NG">추천패키지</h4>
                                    <ul>
                                        @foreach($data['adminpack_lecture_648001'] as $row)
                                            <li>
                                                <a href="{{front_url('/package/show/cate/'.$row['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'])}}" class="NG" target="_new">{{$row['ProdName']}}</a>
                                                <dl class="w-info">
                                                    <dt>개강일 : {{$row['StudyStartDateYM']}} · 수강기간 : {{$row['StudyPeriod']}}일 ·</dt>
                                                    <dt class="NSK">
                                                        <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                    </dt>
                                                    <dt> · 수강료 :
                                                        @if(empty($row['ProdPriceData']) === false)
                                                            @foreach(json_decode($row['ProdPriceData'],true) as $price_idx => $price_row)
                                                                @if($price_row['SaleTypeCcd'] === '613001').
                                                                [{{ $price_row['SaleTypeCcdName'] }}] {{ number_format($price_row['RealSalePrice'], 0) }}원
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                </dl>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div id="tab04">
                            <div>
                                @if(empty($data['adminpack_lecture_648002']) === false)
                                    <h4 class="NG">선택패키지</h4>
                                    <ul>
                                        @foreach($data['adminpack_lecture_648002'] as $row)
                                            <li>
                                                <a href="{{front_url('/package/show/cate/'.$row['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'])}}" class="NG" target="_new">{{$row['ProdName']}}</a>
                                                <dl class="w-info">
                                                    <dt>개강일 : {{$row['StudyStartDateYM']}} · 수강기간 : {{$row['StudyPeriod']}}일 ·</dt>
                                                    <dt class="NSK">
                                                        <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                    </dt>
                                                    <dt> · 수강료 :
                                                        @if(empty($row['ProdPriceData']) === false)
                                                            @foreach(json_decode($row['ProdPriceData'],true) as $price_idx => $price_row)
                                                                @if($price_row['SaleTypeCcd'] === '613001').
                                                                [{{ $price_row['SaleTypeCcdName'] }}] {{ number_format($price_row['RealSalePrice'], 0) }}원
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                </dl>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End Container -->
@stop