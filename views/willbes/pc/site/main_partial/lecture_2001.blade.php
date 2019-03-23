<div class="nNoticeBox two">
    <div class="recommendLec Lec widthAuto550 f_left p_re">
        <div class="will-nlistTit">교수별 인기강좌</div>
        <div class="nSliderTM graySlider AbsControls">
            <div class="sliderNumTM">
                <div>
                    @foreach($data['best_product'] as $row)
                        @if($loop->index != 1 && ($loop->index - 1) % 2 == 0)
                            </div><div>
                        @endif

                        <div class="LecBox">
                            <a href="{{ front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode']) }}">
                                <div class="imgBox cover">
                                    <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                    <img src="{{ $row['ProfLecListImg'] }}" width="82" height="82">
                                </div>
                                <div class="infoBox">
                                    <div class="infoTit">{{ $row['SubjectName'] }} {{ $row['wProfName'] }}</div>
                                    <div class="infoTxt">
                                        {{ hpSubString($row['ProdName'], 0, 25, '...') }}<br/>
                                        <span class="small">{{ $row['wUnitLectureCnt'] }}강 / {{ $row['StudyPeriod'] }}일 / {{ $row['wLectureProgressCcdName'] }}</span><br/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="newLec Lec widthAuto550 f_right p_re">
        <div class="will-nlistTit">이 달의 신규강좌</div>
        <div class="nSliderTM graySlider AbsControls">
            <div class="sliderNumTM">
                <div>
                    @foreach($data['new_product'] as $row)
                        @if($loop->index != 1 && ($loop->index - 1) % 2 == 0)
                            </div><div>
                        @endif

                        <div class="LecBox">
                            <a href="{{ front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode']) }}">
                                <div class="imgBox cover">
                                    <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                    <img src="{{ $row['ProfLecListImg'] }}" width="82" height="82">
                                </div>
                                <div class="infoBox">
                                    <div class="infoTit">{{ $row['SubjectName'] }} {{ $row['wProfName'] }}</div>
                                    <div class="infoTxt">
                                        {{ hpSubString($row['ProdName'], 0, 25, '...') }}<br/>
                                        <span class="small">{{ $row['wUnitLectureCnt'] }}강 / {{ $row['StudyPeriod'] }}일 / {{ $row['wLectureProgressCcdName'] }}</span><br/>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>