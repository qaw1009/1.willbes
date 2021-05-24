<style>
    .tabWrapCustom.noticeWrap_campus {
        height: 60px;
        border-bottom: none;
        border-top: 2px solid #000;
        clear: both;
    }
    .tabWrapCustom.noticeWrap_campus li {
        float: left;
        width: auto;
        height: 60px;
        margin: 0 10px;
    }
    .tabWrapCustom.noticeWrap_campus li a {
        display: block;
        width: 100%;
        height: 60px;
        line-height: 60px;
        background: none;
        font-size: 13px;
        color: #3a3a3a;
        text-align: center;
        letter-spacing: 0;
        border: none;
        padding-right: 20px;
    }
    .tabWrapCustom.noticeWrap_campus li:first-child a {
        border-left: none;
    }
    .tabWrapCustom.noticeWrap_campus li a.on {
        position: relative;
        z-index: 2;
        background: none;
        height: 60px;
        line-height: 60px;
        font-weight: 600;
        color: #3a3a3a;
        border: none;
    }
    .tabWrapCustom.noticeWrap_campus .row-line {
        float: right;
        background: #b7b7b7;
        width: 1px;
        height: 12px;
        margin: -36px 0 0;
    }
</style>
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
    const map_info = [[],[]];
    map_info[0] = {
        'addr' : '서울 관악구 신림로 23길 16'
        ,'level' : '3'
        ,'info_txt' : '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">욀비스<strong class="tx-color">한림법학원</strong> [신림(본원)]</div>'
        ,'x_anchor' : '0.5'
        ,'y_anchor' : '2.7'
    };
    map_info[1] = {
        'addr':'서울 강남구 테헤란로19길 18'
        ,'level' : '3'
        ,'info_txt' : '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">욀비스<strong class="tx-color">한림법학원</strong> [강남(분원)]</div>'
        ,'x_anchor' : '0.5'
        ,'y_anchor' : '2.7'
    };

    {{--
        카테고리별로 디폴트 탭이 달라지는데 공통스크립트 작동순서를 제어할수 없음.
        그래서 tabWrap 클래스 이벤트 바인딩이 아닌 tabWrapCustom 추가해서 사용.
    --}}
    $(document).ready(function() {
        var $kakaomap = new kakaoMap();

        $('ul.tabWrapCustom').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $content = $($active[0].hash);
            $links.not($active).each(function () {
                $(this.hash).hide().css('display', 'none');
            });
            $(this).on('click', 'a', function (e) {
                $active.removeClass('on');
                $content.hide().css('display', 'none');
                $active = $(this);
                $content = $(this.hash);
                $active.addClass('on');
                $content.show().css('display', 'block');
                e.preventDefault();

                var map_id = $(this).data('map-id');
                $kakaomap.config.ele_id = 'map_'+map_id;
                $kakaomap.config.alter_id = 'alterMap_'+map_id;
                $kakaomap.config.level = map_info[map_id]['level'];
                $kakaomap.config.addr = map_info[map_id]['addr'];
                $kakaomap.config.info_txt = map_info[map_id]['info_txt'];
                $kakaomap.config.info_txt_x_anchor = map_info[map_id]['x_anchor'];
                $kakaomap.config.info_txt_y_anchor = map_info[map_id]['y_anchor'];
                $kakaomap.run();
            });
        });
        @if(empty($__cfg['CateCode']) === false && ($__cfg['CateCode'] == '3098' || $__cfg['CateCode'] == '3099' || $__cfg['CateCode'] == '309004'))
            $('#campus2_btn').click();
        @else
            $('#campus1_btn').click();
        @endif
    });
</script>