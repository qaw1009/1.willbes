    <style type="text/css">
        .cts02_top {background:url(https://static.willbes.net/public/images/promotion/2020/05/1555_cts02_top_bg.jpg) no-repeat center top;}
        .cts02_01 {background:#eaeaea}
        .cts02_02 {background:#fff}
    </style>
    <div>
        <div class="evtCtnsBox cts02_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1555_cts02_top.jpg" alt="합격예측 풀서비스" usemap="#Map1555cts0201" border="0">
            <map name="Map1555cts0201">
                {{--<area shape="rect" coords="288,1285,833,1375" href="#none" onClick='alert("COMING SOON!!")' alt="합격예측 풀서비스 참여하기">--}}
                {{--<area shape="rect" coords="288,1285,833,1375" href="{{ site_url('/promotion/index/cate/3001/code/1629') }}" target="_blank" alt="합격예측 풀서비스 참여하기">--}}
                @if (empty($arr_promotion_params['start_active_tab2']) === false && empty($arr_promotion_params['end_active_tab2']) === false)
                    @if (date('YmdHi') < $arr_promotion_params['start_active_tab2'])
                        <area shape="rect" coords="288,1285,833,1375" href="#none" onClick='alert("COMING SOON!!")' alt="합격예측 풀서비스 참여하기">
                    @elseif (date('YmdHi') >= $arr_promotion_params['start_active_tab2'] && date('YmdHi') < $arr_promotion_params['end_active_tab2'])
                        <area shape="rect" coords="288,1285,833,1375" href="{{ site_url('/promotion/index/cate/3001/code/1629') }}" target="_blank" alt="합격예측 풀서비스 참여하기">
                    @elseif (date('YmdHi') >= $arr_promotion_params['end_active_tab2'])
                        <area shape="rect" coords="288,1285,833,1375" href="#none" onClick='alert("서비스가 종료되었습니다.")' alt="합격예측 풀서비스 참여하기">
                    @endif
                @else
                    <area shape="rect" coords="288,1285,833,1375" href="#none" onClick='alert("COMING SOON!!")' alt="합격예측 풀서비스 참여하기">
                @endif
            </map>
        </div>

        <div class="evtCtnsBox cts02_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1555_cts02_01.jpg" alt="라이브 토크쇼" usemap="#Map1555cts0202" border="0">
            <map name="Map1555cts0202">
                {{--<area shape="rect" coords="346,1912,778,2013" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" alt="라이브 토크쇼 신청하기" />--}}
                <area shape="rect" coords="346,1912,778,2013" href="#none" onclick="javascript:alert('라이브 토크쇼가 종료되었습니다');" alt="라이브 토크쇼 신청하기" />
            </map>
        </div>

        <div class="evtCtnsBox cts02_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1555_cts02_02.jpg" alt="적중이벤트 바로가기" usemap="#Map1555cts0203" border="0">
            <map name="Map1555cts0203">
                @if (date('YmdHi') >= '202006050000')
                    <area shape="rect" coords="360,1205,762,1331" href="#none" onclick="javascript:alert('적중이벤트가 마감되었습니다');" alt="적중이벤트 바로가기" />
                @else
                    <area shape="rect" coords="360,1205,762,1331" href="https://police.willbes.net/promotion/index/cate/3001/code/1628" target="_blank" alt="적중이벤트 바로가기" />
                @endif
            </map>
        </div>
	</div>
