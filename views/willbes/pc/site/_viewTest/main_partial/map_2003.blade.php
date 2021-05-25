<div class="Section Section4_hl mb50">
    <div class="widthAuto">
        <div class="will-acadTit">윌비스 한림법학원 <span class="tx-color">김동진 법원팀</span></div>
        <div class="noticeTabs campus c_both">
            <div class="tabBox noticeBox_campus">
                <div id="campus1" class="tabContent">
                    <div class="map_img" id="map">지도영역</div>
                    <div class="map_img" id="alterMap1" style="display: none">
                        <img src="https://static.willbes.net/public/images/promotion/main/2003/3035_map.jpg" alt="김동진 법원팀">
                    </div>
                    <div class="campus_info">
                        <dl>
                            <dt>
                                <div class="c-tit"><span class="tx-color">학원</span> 오시는 길</div>
                                <div class="c-info">
                                    <div class="address">
                                        <span class="a-tit">주소</span>
                                        <span>
                                        서울시 동작구 노량진로 196 노량빌딩 7층
                                    </span>
                                    </div>
                                    <div class="tel">
                                        <span class="a-tit">연락처</span>
                                        <span class="tx-color">1544-0330 > 2번</span>
                                    </div>
                                </div>
                            </dt>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
<script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">윌비스 <strong class="tx-color">한림법학원</strong><br>김동진법원팀(7~9층)</div>';
        var $kakaomap = new kakaoMap();
        $kakaomap.config.ele_id = 'map';
        $kakaomap.config.alter_id = 'alterMap1';
        $kakaomap.config.level = 4;
        $kakaomap.config.addr = '서울 동작구 노량진로 196';
        $kakaomap.config.info_txt = info_txt;
        $kakaomap.config.info_txt_x_anchor = 0.5;
        $kakaomap.config.info_txt_y_anchor = 2.2;
        $kakaomap.run();
    });
</script>