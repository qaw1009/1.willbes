<div class="noticeTabs campus c_both NSK mt50">
    <div class="tabBox noticeBox_campus">

    <!-- 노량진 -->
    @if($campus_code == '605001')
        <div id="campus1" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_origin.jpg') }}" alt="노량진">
                <span class="origin">노량진(본원)</span>
            </div>
            <div class="campus_info">
                <dl>                                
                    <dt>
                        <div class="c-tit"><span class="tx-color">노량진</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                    서울시동작구만양로105 2층<br/>
                                    (서울시동작구노량진동116-2 2층)
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1544-0336</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif
    
    <!-- 신림 -->
    @if($campus_code == '605002')
        <div id="campus2" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_sl.jpg') }}" alt="신림">
                <span>신 림</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">신림</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                    서울 관악구 신림로 23길 16 4층
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1544-4006</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif

    <!-- 인천 -->
    @if($campus_code == '605005')
        <div id="campus3" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_ic.jpg') }}" alt="인천">
                <span>인 천</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">인천</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                    인천 부평구 부평동 534-28 중보빌딩 10층
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1544-1661</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif

    <!-- 대구 -->
    @if($campus_code == '605004')
        <div id="campus4" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_dg.jpg') }}" alt="대구">
                <span>대 구</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">대구</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                대구 중구 중앙대로 412(남일동) CGV 2층
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1522-6112</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif

    <!-- 부산 -->
    @if($campus_code == '605003')
        <div id="campus5" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_bs.jpg') }}" alt="부산">
                <span>부 산</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">부산</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                부산 진구 부정동 223-8
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1522-8112</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif

    <!-- 광주 -->
    @if($campus_code == '605006')
        <div id="campus6" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_kj.jpg') }}" alt="광주">
                <span>광 주</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">광주</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                광주 북구 호동로 6-11
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">062-514-4560 / 070-7606-6060</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif

    <!-- 제주 -->
    @if($campus_code == '605009')
        <div id="campus7" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_jj.jpg') }}" alt="제주">
                <span>제 주</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">제주</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                제주도 제주시 동광로 56 3층
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">064-722-8140</span>
                            </div>
                        </div>
                    </dt>
                </dl>
            </div>
        </div>
    @endif

    <!-- 전북 -->
    @if($campus_code == '605007')
        <div id="campus8" class="tabContent">
            <div>
                <div class="map_img">
                    <img src="{{ img_url('cop_acad/map/map_cop_jbjj.jpg') }}" alt="전북 전주">
                    <span>전북 전주</span>                       
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit"><span class="tx-color">전북 전주</span> 캠퍼스 오시는 길</div>
                            <div class="c-info">
                                <div class="address">
                                    <span class="a-tit">주소</span>
                                    <span>
                                        전북 전주시 덕진동2가 전북대학교 농생대1호관 303호
                                    </span>
                                </div>
                                <div class="tel">
                                    <span class="a-tit">연락처</span>
                                    <span class="tx-color">063-270-4144</span>
                                </div>
                            </div>
                        </dt>
                        <dt>
                            <div class="c-tit"><span class="tx-color">전북 익산</span> 캠퍼스 오시는 길</div>
                            <div class="c-info">
                                <div class="address">
                                    <span class="a-tit">주소</span>
                                    <span>
                                    전북 익산시 신용동 원광대학교 학생지원관 4층
                                    </span>
                                </div>
                                <div class="tel">
                                    <span class="a-tit">연락처</span>
                                    <span class="tx-color">063-270-4144</span>
                                </div>
                            </div>
                        </dt>
                    </dl>
                </div>
            </div>

            <div class="c_both pt30">
                <div class="map_img">
                    <img src="{{ img_url('cop_acad/map/map_cop_jbis.jpg') }}" alt="전북 익산">
                    <span>전북 익산</span>                       
                </div>
            </div>
        </div>
    @endif

    <!-- 전주 -->
    @if($campus_code == '605008')
        <div id="campus9" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_jinj.jpg') }}" alt="진주">
                <span>진 주</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">진주</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                    경남 진주시 칠암동 490-8 엠코아빌딩 4층
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">055-755-7771</span>
                            </div>
                        </div>
                    </dt>
                </dl>

            </div>
        </div>
    @endif

    <!-- 경기광주 -->
    @if($campus_code == '605010')
        <div id="campus9" class="tabContent">
            <div class="map_img">
                <img src="{{ img_url('cop_acad/map/map_cop_kkkj.jpg') }}" alt="경기광주">
                <span>경기 광주(기숙형)</span>
            </div>
            <div class="campus_info">
                <dl>
                    <dt>
                        <div class="c-tit"><span class="tx-color">경기 광주(기숙형)</span> 캠퍼스 오시는 길</div>
                        <div class="c-info">
                            <div class="address">
                                <span class="a-tit">주소</span>
                                <span>
                                    경기도 광주시 퇴촌면 탑선길 46-22
                                </span>
                            </div>
                            <div class="tel">
                                <span class="a-tit">연락처</span>
                                <span class="tx-color">1599-9361</span>
                            </div>
                        </div>
                    </dt>
                </dl>

            </div>
        </div>
    @endif
    </div>
</div>