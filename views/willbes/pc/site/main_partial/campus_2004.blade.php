<div class="widthAuto">
    <a name="map_campus"></a>
    <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 학원</div>
    <div class="noticeTabs campus c_both">
        <ul class="tabWrap noticeWrap_campus">
            @foreach($data['arr_campus_info'] as $campus_ccd => $row)
                <li>
                    <a href="#campus{{ $loop->index }}" @if($loop->first == true)class="on"@endif>{{$row['CampusReName']}}</a>
                    @if($loop->last == false)<span class="row-line">|</span>@endif
                </li>
            @endforeach
        </ul>
        <div class="tabBox noticeBox_campus">
            @foreach($data['arr_campus_info'] as $campus_ccd => $row)
                <div id="campus{{ $loop->index }}" class="tabContent">
                    <div class="">
                        <div class="map_img">
                            <img src="{{$row['Info'][0]['MapPath']}}" alt="{{$row['Info'][0]['CampusDispName']}}">
                            <span class="origin">{{$row['Info'][0]['CampusDispName']}}</span>
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
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                    {{$info_row['Addr1']}}
                                                    {!! empty($info_row['Addr2']) === false ? '<br/>(' . $info_row['Addr2'] . ')' : '' !!}
                                                </span>
                                            </div>
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
        </div>
    </div>
</div>
