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
<script type="text/javascript">
    {{--
        카테고리별로 디폴트 탭이 달라지는데 공통스크립트 작동순서를 제어할수 없음.
        그래서 tabWrap 클래스 이벤트 바인딩이 아닌 tabWrapCustom 추가해서 사용.
    --}}
    $(function() {
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
            });
        });
        @if(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '309004')
            $('#campus2_btn').click();
        @else
            $('#campus1_btn').click();
        @endif
    });
</script>
<div class="Section Section4_hl mb50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">자격증</span> 학원</div>
            <div class="noticeTabs campus c_both">
                {{-- <ul class="tabWrap noticeWrap_campus"> --}}
                <ul class="tabWrapCustom noticeWrap_campus">
                    <li><a id="campus1_btn" href="#campus1" class="on">신림(본원)</a><span class="row-line">|</span></li>
                    <li><a id="campus2_btn" href="#campus2" class="">강남(분원)</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map01.jpg" alt="신림(본원)">
                            <span class="origin">신림(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">신림(본원)</span> 학원 오시는 길</div>
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
                                            <span class="tx-color">1544-4774</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 신림동 //-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map02.jpg" alt="강남(분원)">
                            <span>강남(분원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">강남(분원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 강남구 테헤란로19길 18<br>
                                                (역삼동 645-12)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-3383</span>
                                        </div>                                      
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}x">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 강남 //-->
                </div>
            </div>
        </div>
    </div>