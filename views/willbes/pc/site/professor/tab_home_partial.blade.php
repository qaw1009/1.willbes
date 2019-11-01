<div class="willbes-NoticeWrap p_re mt30 mb15 c_both">
    <div class="willbes-listTable widthAuto460 mr20">
        <div class="will-Tit NG">공지사항 <a class="f_right" href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&tab=notice')}}"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            @if (empty($tab_data['notice']) === true)
                <li>등록된 내용이 없습니다.</li>
            @else
                @foreach($tab_data['notice'] as $idx => $row)
                    <li><a href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&board_idx='.$row['BoardIdx'].'&tab=notice')}}">{{ hpSubString($row['Title'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="willbes-listTable widthAuto460">
        <div class="will-Tit NG">학습자료실 <a class="f_right" href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&tab=material')}}"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            @if (empty($tab_data['material']) === true)
                <li>등록된 내용이 없습니다.</li>
            @else
                @foreach($tab_data['material'] as $idx => $row)
                    <li><a href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&board_idx='.$row['BoardIdx'].'&tab=material')}}">{{ hpSubString($row['Title'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="willbes-listTable widthAuto460 mt30 mr20">
        <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
        <ul class="List-Table GM tx-gray">
            @foreach($tab_data['new_product'] as $idx => $row)
                <li>
                    {{-- 상품상세 링크 --}}
                    @if($__cfg['IsPassSite'] === false)
                        <a href="{{ front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a>
                    @else
                        @if($row['LearnPattern'] == 'off_lecture')
                            <a href="{{ front_url('/offLecture/show/cate/'. $row['CateCode'].'/prod-code/'. $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a>
                        @else
                            <a href="{{ front_url('/offPackage/show/prod-code/' . $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <div class="willbes-listTable willbes-reply mt30 widthAuto460">
        <div class="will-Tit NG">수강후기<a href="#none" class="f_right btn-study" data-board-idx=""><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            @if (empty($tab_data['study_comment']) === true)
                <li>등록된 베스트 수강후기가 없습니다.</li>
            @else
                @foreach($tab_data['study_comment'] as $idx => $row)
                    <li><img src="{{ img_url('sub/star' . $row['LecScore']. '.gif') }}"><a href="#none" class="btn-study" data-board-idx="{{$row['BoardIdx']}}">{{ hpSubString($row['Title'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
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