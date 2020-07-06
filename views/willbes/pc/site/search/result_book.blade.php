@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
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
                    <div class="wsBookWrap">
                        <div class="bookSearch NG">
                            <span>{{element('searchfull_text',$arr_search_input)}}</span>에 대한 교재 검색결과 <span>{{$total_count}}</span>건
                        </div>
                        <div class="wsBookListBox mt20">
                            @foreach($data['book'] as $row)
                                <div class="wsBook">
                                    <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                        <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}"/>
                                    </a>
                                    <div class="wsBookInfo">
                                        <ul>
                                            <li class="bookTitle NSK">
                                                <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}')">{{ $row['ProdName'] }}</a>
                                            </li>
                                            <li><strong>[저자]</strong> {{ $row['wAuthorNames'] }}</li>
                                            <li><strong>[출판사]</strong> {{ $row['wPublName'] }}</li>
                                            <li><strong>[출간일]</strong> {{ $row['wPublDate'] }}</li>
                                            <li><strong class="@if($row['wSaleCcd'] == '112002' || $row['wSaleCcd'] == '112003') tx-red @endif">[{{ $row['wSaleCcdName'] }}]</strong>
                                                <span class="line-through">{{ number_format($row['rwSalePrice']) }}원</span> →
                                                <span class="tx-blue strong">{{ number_format($row['rwRealSalePrice']) }}원</span></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {!! $paging['pagination'] !!}
                    </div>

            @endif
            <!--wsBookWrap//-->
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
         // 상세 페이지 이동
        function goShow(prod_code) {
            location.href = '{{ front_url('/bookStore/show/pattern/all/prod-code/') }}' + prod_code;
        }
    </script>
@stop