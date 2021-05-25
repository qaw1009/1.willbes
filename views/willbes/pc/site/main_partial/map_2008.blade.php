<div class="noticeTabs campus c_both">
    <div class="tabBox noticeBox_campus">
        <div id="campus1" class="tabContent">
            <div class="map_img" id="map"></div>
            <div class="map_img" id="alterMap1" style="display: none;">
                <img src="https://static.willbes.net/public/images/promotion/main/2010_map01.jpg" alt="신림(본원)">
                <span class="origin">신림(본원)</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">경찰간부</span> 학원 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                        서울 관악구 신림로 23길 16 일성트루엘 4층<br/>
                                        (신림동 1523-1)
                                    </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1544-1881 ▶ 1</span>
                            </div>
                        </div>
                    </dt>
                </dl>
                <div class="btn NSK-Black">
                    <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">1:1 상담신청</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
<script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">윌비스 <strong class="tx-color">한림법학원</strong>[신림(본원)]</div>';
        var $kakaomap = new kakaoMap();
        $kakaomap.config.ele_id = 'map';
        $kakaomap.config.alter_id = 'alterMap1';
        $kakaomap.config.level = 4;
        $kakaomap.config.addr = '서울 관악구 신림로 23길 16';
        $kakaomap.config.info_txt = info_txt;
        $kakaomap.config.info_txt_x_anchor = 0.5;
        $kakaomap.config.info_txt_y_anchor = 2.7;
        $kakaomap.run();
    });
</script>