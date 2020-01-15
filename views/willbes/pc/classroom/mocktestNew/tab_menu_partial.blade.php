<ul class="tabMock three">
    <li><a class="@if($page_type=='receipt') on @endif" href="{{front_url('/classroom/mocktest/receipt/index')}}">접수현황</a></li>
    <li><a class="@if($page_type=='exam') on @endif" href="{{front_url('/classroom/mocktest/exam/index')}}">온라인모의고사 응시</a></li>
    <li><a class="@if($page_type=='result') on @endif" href="{{front_url('/classroom/mocktest/result/index')}}">성적결과</a></li>
    <li><a class="@if($page_type=='board' || $page_type=='board_etc') on @endif" href="{{front_url('/classroom/mocktest/board/index')}}">이의제기/정오표</a></li>
</ul>