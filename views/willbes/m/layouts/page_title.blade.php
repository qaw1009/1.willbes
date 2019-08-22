{{-- 실서버일 경우 접근불가 (추후 삭제 필수) ==> TODO : 서버 환경별 실행 --}}
@if(ENVIRONMENT == 'production' || ENVIRONMENT == 'testing')
    @php show_alert('서비스 준비 중입니다.', front_url('/home/index')); @endphp
@endif

<div id="Sticky" class="sticky-Title">
    <div class="sticky-Grid sticky-topTit">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            @yield('page_title')
        </div>
    </div>
</div>