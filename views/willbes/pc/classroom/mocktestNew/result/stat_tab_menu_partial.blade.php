<script src="/public/vendor/jquery/print/jquery.print.min.js"></script>
<ul class="tabSty {{ (($productInfo['PaperType'] == 'P') ? 'tabSty50' : '') }}">
    <li class="@if($page_type=='total') active @endif"><a href="{{ site_url('/classroom/mocktest/result/winStatTotal?prod_code='.$productInfo['ProdCode'].'&mr_idx='.$productInfo['MrIdx']) }}">전체 성적 분석</a></li>
    <li class="@if($page_type=='subject') active @endif"><a href="{{ site_url('/classroom/mocktest/result/winStatSubject?prod_code='.$productInfo['ProdCode'].'&mr_idx='.$productInfo['MrIdx']) }}">과목별 문항분석</a></li>
    @if($productInfo['PaperType'] == 'I')
        <li class="@if($page_type=='answer') active @endif"><a href="{{ site_url('/classroom/mocktest/result/winAnswerNote?prod_code='.$productInfo['ProdCode'].'&mr_idx='.$productInfo['MrIdx']) }}">오답노트</a></li>
    @endif
</ul>
@if ($page_type == 'total' || $page_type == 'subject')
<!-- //tab -->
<div class="btnAgR mgT1 mgB1 mb-zero">
    <a class="btnlineGray"href="javascript:void(0);" onclick="printPage();">출력</a>
</div>
@endif