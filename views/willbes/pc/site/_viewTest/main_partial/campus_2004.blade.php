<div class="widthAuto">
    <a name="map_campus"></a>
    <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 학원</div>
    <div class="noticeTabs campus c_both">
        <ul class="tabWrap noticeWrap_campus">
            @foreach($data['arr_campus_info'] as $campus_ccd => $row)
                <li>
                    <a href="#campus{{ $loop->index }}" @if($loop->first == true)class="on"@endif>{{$row['CampusReName']}}</a>
                    {{--@if($loop->last == false)<span class="row-line">|</span>@endif--}}
                    <span class="row-line">|</span>
                </li>
            @endforeach
            <li><a href="#campus{{ count($data['arr_campus_info']) + 1 }}">가산(서울)</a></li>
        </ul>
        <div class="tabBox noticeBox_campus">
            @foreach($data['arr_campus_info'] as $campus_ccd => $row)
                <div id="campus{{ $loop->index }}" class="tabContent">
                    <div class="">
                        <div class="map_img">
                            <img src="{{$row['Info'][0]['MapPath']}}" alt="{{$row['Info'][0]['CampusDispName']}}">
                            @if($campus_ccd != '605001')<span class="origin">{{$row['Info'][0]['CampusDispName']}}</span>@endif
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">{{$row['CampusCcdName']}} </span> 학원 공지사항
                                        <a href="{{front_url('/support/notice/index?s_campus='.$campus_ccd)}}" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            @foreach($data['notice_campus'] as $key => $notice_data)
                                                @if($key == $campus_ccd)
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
                                        </ul>
                                    </div>
                                </dt>
                                @foreach($row['Info'] as $info_row)
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">{{$info_row['CampusDispName']}}</span> 학원 오시는 길</div>
                                        <div class="c-info">
                                            @if($campus_ccd == '605001')
                                                <div class="address">
                                                    <span class="a-tit">본원</span>
                                                    <span>{{$info_row['Addr1']}}</span>
                                                </div>
                                                @if(empty($info_row['Addr2']) === false)
                                                    <div class="address">
                                                        <span class="a-tit">법원/검찰</span>
                                                        <span>{{$info_row['Addr2']}}</span>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="address">
                                                    <span class="a-tit">주소</span>
                                                    <span>
                                                        {{$info_row['Addr1']}}
                                                        {!! empty($info_row['Addr2']) === false ? '<br/>(' . $info_row['Addr2'] . ')' : '' !!}
                                                    </span>
                                                </div>
                                            @endif
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">{{$info_row['Tel']}}</span>
                                            </div>
                                        </div>
                                    </dt>
                                @endforeach
                                <dt class="p_re bd-none">
                                    <div class="btn NSK-Black">
                                        <a href="{{front_url('/support/qna/create?s_campus='.$campus_ccd)}}">1:1 상담신청</a>
                                    </div>
                                </dt>
                            </dl>
                        </div>
                    </div>
                    @if(isset($row['Info'][1]) === true)
                        @foreach(array_slice($row['Info'], 1) as $info_row)
                            <div class="c_both pt30">
                                <div class="map_img">
                                    <img src="{{$info_row['MapPath']}}" alt="{{$info_row['CampusDispName']}}">
                                    <span class="origin">{{$info_row['CampusDispName']}}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach

            <div id="campus{{ count($data['arr_campus_info']) + 1 }}" class="tabContent">
                <div class="map_img">
                    <img src="https://static.willbes.net/public/images/willbes/gosi_acad/map/mapSeoulGasan.jpg" alt="가산(서울)">
                    {{--<span>가산(서울)</span>--}}
                </div>
                <div class="campus_info">
                    <dl>
                        <dt>
                            <div class="c-tit"><span class="tx-color">학원</span> 오시는 길</div>
                            <div class="c-info">
                                <div class="address">
                                    <span class="a-tit">9급/기술직</span>
                                    <span>서울 금천구 벚꽃로 298(대륭포스트타워6차) 707호</span>
                                </div>
                                <div class="address">
                                    <span class="a-tit">소방/기술직</span>
                                    <span>서울 동작구 만양로 105 한성빌딩 2층</span>
                                </div>
                                <div class="address">
                                    <span class="a-tit">법원/검찰직</span>
                                    <span>서울 동작구 노량진로 196 JH빌딩 7층</span>
                                </div>
                                <div class="tel">
                                    <span class="a-tit">연락처</span>
                                    <span class="tx-color">1544-0330</span>
                                </div>
                            </div>
                        </dt>
                    </dl>
                    <div class="btn NSK-Black">
                        <a href="{{front_url('/support/qna/create')}}">1:1 상담신청</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
