@if(empty($data['study_comment']) === false)
    <div class="mainTit mt30 NSK-Black p_re">윌비스 임용 <span class="tx-main">수강후기</span>
        <div class="goBtns NSK">
            <ul>
                <li><a href="{{ front_url('/support/review/index') }}">합격수기 ></a></li>
                <li><a href="{{ front_url('/support/LectureReview/index') }}" onclick="openWin('LayerReply'),openWin('Reply')">수강후기 ></a></li>
            </ul>
        </div>
    </div>

    <div class="replyBox mt10">
        <div class="swiper-container-reply">
            <div class="swiper-wrapper review">
                @foreach($data['study_comment'] as $row)
                    <div class="swiper-slide">
                        <a href="{{ front_url('/support/LectureReview/index?board_idx='.$row['BoardIdx']) }}">
                            <div class="reviewInfo">
                                {{ $row['SubjectName'] }} <span>|</span> {{ $row['ProfName'] }}<br>
                                {{ $row['ProdName'] }}
                            </div>
                            <div class="title"><img src="/public/img/willbes/sub/star{{$row['LecScore']}}.gif"/><span>{{ hpSubString($row['RegName'],0,2,'*') }}</span></div>
                            <div class="reviewTxt">{!! $row['Content'] !!}</div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endif