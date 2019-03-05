<div class="widthAuto">
    <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 캠퍼스</div>
    <div class="noticeTabs campus c_both">
        <ul class="tabWrap noticeWrap_campus">
            @foreach($data['arr_campus'] as $row)
                <li>
                    <a href="#campus{{ $loop->index }}" @if($loop->first == true)class="on"@endif>{{$row['CampusCcdName']}}@if($loop->first == true)(본원)@endif</a>
                    @if($loop->last == false)<span class="row-line">|</span>@endif
                </li>
            @endforeach
        </ul>
        <div class="tabBox noticeBox_campus">
            @foreach($data['arr_campus'] as $row)
                <div id="campus{{ $loop->index }}" class="tabContent">
                    <div class="map_img">
                        <img src="{{$row['MapPath']}}" alt="{{$row['CampusCcdName']}}">
                        <span class="origin">{{$row['CampusCcdName']}}@if($loop->first == true)(본원)@endif</span>
                    </div>
                    <div class="campus_info">
                        <dl>
                            <dt>
                                <div class="c-tit">
                                    <span class="tx-color">{{$row['CampusCcdName']}}</span> 캠퍼스 공지사항
                                    <a href="{{front_url('/support/notice/index?s_campus='.$row['CampusCcd'])}}" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
                                </div>
                                <div class="c-info p_re">
                                    <ul class="List-Table">
                                        @if(empty($data['notice_campus']) === true)
                                            <li>등록된 내용이 없습니다.</li>
                                        @else
                                            @foreach($data['notice_campus'] as $key => $notice_data)
                                                @if($key == $row['CampusCcd'])
                                                    @if (empty($notice_data) === true)
                                                        <li>등록된 내용이 없습니다.</li>
                                                    @else
                                                        @foreach($notice_data as $notice_row)
                                                            <li>
                                                                <a href="{{front_url('/support/notice/show?board_idx='.$notice_row['BoardIdx'])}}">
                                                                    {{$notice_row['Title']}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </dt>
                            <dt>
                                <div class="c-tit"><span class="tx-color">{{$row['CampusCcdName']}}</span> 캠퍼스 오시는 길</div>
                                <div class="c-info">
                                    <div class="address">
                                        <span class="a-tit">주소</span>
                                        <span>
                                                {{$row['Addr']}}
                                            </span>
                                    </div>
                                    <div class="tel">
                                        <span class="a-tit">연락처</span>
                                        <span class="tx-color">{{$row['Tel']}}</span>
                                    </div>
                                </div>
                            </dt>
                        </dl>
                        <div class="btn NSK-Black">
                            <a href="{{front_url('/support/qna/create?s_campus='.$row['CampusCcd'])}}">1:1 상담신청</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{--<div class="tabBox noticeBox_campus">
            <div id="campus1" class="tabContent">
                <div class="map_img">
                    <img src="{{ img_url('gosi_acad/map/mapSeoul.jpg') }}" alt="노량진">
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit">
                                <span class="tx-color">노량진</span> 캠퍼스 공지사항
                                <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                            </div>
                            <div class="c-info p_re">
                                <ul class="List-Table">
                                    <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                    <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                </ul>
                            </div>
                        </dt>
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
                    <div class="btn NSK-Black">
                        <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                        <a href="http://pf.kakao.com/_kcZIu/chat" target="_blank"><img src="{{ img_url('gosi_acad/icon_kakaotalk.png') }}"> 카톡상담신청</a>
                    </div>
                </div>
            </div>
            <div id="campus2" class="tabContent">
                <div class="map_img">
                    <img src="{{ img_url('gosi_acad/map/mapIC.jpg') }}" alt="인천">
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit">
                                <span class="tx-color">인천</span> 캠퍼스 공지사항
                                <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                            </div>
                            <div class="c-info p_re">
                                <ul class="List-Table">
                                    <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                    <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                </ul>
                            </div>
                        </dt>
                        <dt>
                            <div class="c-tit"><span class="tx-color">인천</span> 캠퍼스 오시는 길</div>
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
                    <div class="btn NSK-Black">
                        <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                    </div>
                </div>
            </div>
            <div id="campus3" class="tabContent">
                <div class="map_img">
                    <img src="{{ img_url('gosi_acad/map/mapDG.jpg') }}" alt="대구">
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit">
                                <span class="tx-color">대구</span> 캠퍼스 공지사항
                                <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                            </div>
                            <div class="c-info p_re">
                                <ul class="List-Table">
                                    <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                    <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                </ul>
                            </div>
                        </dt>
                        <dt>
                            <div class="c-tit"><span class="tx-color">대구</span> 캠퍼스 오시는 길</div>
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
                    <div class="btn NSK-Black">
                        <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                    </div>
                </div>
            </div>
            <div id="campus4" class="tabContent">
                <div class="map_img">
                    <img src="{{ img_url('gosi_acad/map/mapBS.jpg') }}" alt="부산">
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit">
                                <span class="tx-color">부산</span> 캠퍼스 공지사항
                                <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                            </div>
                            <div class="c-info p_re">
                                <ul class="List-Table">
                                    <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                    <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                </ul>
                            </div>
                        </dt>
                        <dt>
                            <div class="c-tit"><span class="tx-color">부산</span> 캠퍼스 오시는 길</div>
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
                    <div class="btn NSK-Black">
                        <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                    </div>
                </div>
            </div>
            <div id="campus5" class="tabContent">
                <div class="map_img">
                    <img src="{{ img_url('gosi_acad/map/mapKJ.jpg') }}" alt="광주">
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit">
                                <span class="tx-color">광주</span> 캠퍼스 공지사항
                                <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                            </div>
                            <div class="c-info p_re">
                                <ul class="List-Table">
                                    <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                    <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                </ul>
                            </div>
                        </dt>
                        <dt>
                            <div class="c-tit"><span class="tx-color">광주</span> 캠퍼스 오시는 길</div>
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
                    <div class="btn NSK-Black">
                        <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
</div>