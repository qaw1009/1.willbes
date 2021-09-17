<div class="noticeTabs">
    <ul class="tabWrap noticeWrap two">
        <li><a href="#notice1" class="on">공지사항</a></li>
        <li><a href="#notice2" class="">강의 업데이트</a></li>
    </ul>
    <div class="tabBox noticeBox">
        <div id="notice1" class="tabContent p_re">
            <a href="{{front_url('/support/notice/index')}}" class="f_right btn-add"><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_add.jpg" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['notice']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
                @else
                @foreach($data['notice'] as $row)
                <li>
                    <a href="{{ front_url('/support/notice/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                        @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                    </a>
                    <span class="date">{{$row['RegDatm']}}</span>
                </li>
                @endforeach
                @endif
            </ul>
        </div>

        <div id="notice2" class="tabBox noticeBox p_re">   
        
            <div class="tabContent p_re">      
                <div class="lecup-Notice"><a href="https://ssam.willbes.net/support/notice/show?board_idx=351174&s_cate_code_disabled=Y"><span>공지</span>동영상강의 업데이트 일정 공지</a></div>
                <a href="{{front_url('/updateLectureInfo')}}" class="f_right btn-add"><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_add.jpg" alt="더보기"></a>            
                <ul class="List-Table List-Table2" style="padding-top:36px; height:260px; overflow:hidden;">
                {{--<ul class="List-Table List-Table2">--}}
                    @if(empty($data['lecture_update_info']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                    @else
                    @foreach($data['lecture_update_info'] as $row)
                    <li>
                        {{--<a href="{{front_url('/professor/show/cate/' . $row['CateCode'] . '/prof-idx/' . $row['ProfIdx'])}}">--}}
                        <a href="{{front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode'])}}#Leclist">
                            <strong class="tx-blue">[{{ $row['SubjectName'] }} {{ $row['ProfNickName'] }}]</strong> <strong style="color: #c00;">총 {{ $row['unit_cnt'] }}강 업로드</strong> {{ $row['ProdName'] }}
                            @if(date('Y-m-d') == $row['unit_regdate'])<img src="{{ img_url('cop/icon_new.png') }}" alt="new"/>@endif
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="noticeBanner">
    <div class="title">HOT & NEW</div>
    <div class="ctrbtn">
        <a class="leftBtn" id="HotnNewLeft"><img src="https://static.willbes.net/public/images/promotion/main/2018/arrow_L_27x27.png" alt="배너명"></a>
        <a class="rightBtn" id="HotnNewRight"><img src="https://static.willbes.net/public/images/promotion/main/2018/arrow_R_27x27.png" alt="배너명"></a>
    </div>
    <div class="bSlider">
        {!! banner_html(element('메인_서브배너_01', $data['arr_main_banner'])) !!}
    </div>
</div>