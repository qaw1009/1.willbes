<div class="willbes-NoticeWrap p_re mb15 c_both">
    <div class="willbes-listTable widthAuto460 mr20">
        <div class="will-Tit NG">공지사항 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
            <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
        </ul>
    </div>
    <div class="willbes-listTable widthAuto460">
        <div class="will-Tit NG">학습자료실 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
            <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
        </ul>
    </div>
    <div class="willbes-listTable widthAuto460 mr20">
        <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
        <ul class="List-Table GM tx-gray">
            @foreach($tab_data['new_product'] as $idx => $row)
                <li><a href="{{ $__cfg['IsPassSite'] === false ? front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) : front_url('/offLecture/index#' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="willbes-listTable willbes-reply widthAuto460">
        <div class="will-Tit NG">수강후기<a href="#none" class="f_right btn-study" data-board-idx=""><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            @foreach($tab_data['study_comment'] as $idx => $row)
                <li><img src="{{ img_url('sub/star' . $row['LecScore']. '.gif') }}"><a href="#none" class="btn-study" data-board-idx="{{$row['BoardIdx']}}">{{ hpSubString($row['Title'], 0, 25, '...') }}</a></li>
            @endforeach
        </ul>
    </div>

    <div id="WrapReply"></div>
    <!-- willbes-Layer-ReplyBox -->
</div>
<!-- willbes-NoticeWrap -->

@if(isset($data['ProfBnrData']['02']) === true && empty($data['ProfBnrData']['02']) === false)
    <!-- willbes-Bnr -->
    <div class="prof-banner02 bSlider c_both">
        <div class="slider">
            @foreach($data['ProfBnrData']['02'] as $bnr_num => $bnr_row)
                <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
            @endforeach
        </div>
    </div>
    <!-- // willbes-Bnr -->
@endif

@if(isset($data['ProfBnrData']['03']) === true && empty($data['ProfBnrData']['03']) === false)
    <!-- willbes-Bnr2 -->
    <div class="sliderWillbesBnr cSliderTM mt40">
        <div class="sliderControlsTM">
            @foreach($data['ProfBnrData']['03'] as $bnr_num => $bnr_row)
                <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
            @endforeach
        </div>
    </div>
    <!-- // willbes-Bnr2 -->
@endif