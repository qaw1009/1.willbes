@extends('willbes.m.layouts.master')

@section('page_title', '도서검색')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    @if($total_count < 1)
        {{-- 검색 결과 없을 경우 --}}
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
        {{-- 검색 결과 있을 경우 --}}
        <div class="searchAmount">
            <strong>{{ element('searchfull_text', $arr_search_input) }}</strong>에 대한 교재 검색결과 <strong>{{ number_format($total_count) }}</strong>건
        </div>
        {{-- 교재 목록 --}}
        <div class="wsbook-Search-List">
            @foreach($data['book'] as $row)
                <div class="wsl-box">
                    <div class="wsbookimg">
                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}" onerror="this.height='130';"/>
                        </a>
                    </div>
                    <div class="wsbookinfo">
                        <ul>
                            <li class="NSK-Black">
                                <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a>
                            </li>
                            <li><span>저자</span>{{ $row['wAuthorNames'] }}</li>
                            <li><span>출판사</span>{{ $row['wPublName'] }}</li>
                            <li><span>출간일</span>{{ $row['wPublDate'] }}</li>
                            <li>
                                {{--<span class="@if($row['wSaleCcd'] == '112002' || $row['wSaleCcd'] == '112003') tx-red @endif">[{{ $row['wSaleCcdName'] }}]</span>--}}
                                <span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong class="tx-red strong">{{ number_format($row['rwRealSalePrice']) }}원</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
            {!! $paging['pagination'] !!}
        </div>
    @endif

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script type="text/javascript">
    // 상세 페이지 이동
    function goShow(prod_code) {
        location.href = '{{ front_url('/bookStore/show/pattern/all/prod-code/') }}' + prod_code;
    }
</script>
@stop