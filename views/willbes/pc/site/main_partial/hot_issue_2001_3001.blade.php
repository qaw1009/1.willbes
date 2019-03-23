<div class="widthAuto">
    <div class="widthAuto smallTit">
        <p><span>학원 최신 소식을 한 눈에! <strong>학원 Hot Issue</strong></span></p>
    </div>
</div>
<ul class="widthAuto mt60">
    <li>{!! banner_html(element('메인_학원배너1', $data['arr_main_banner'])) !!}</li>
    <li>{!! banner_html(element('메인_학원배너2', $data['arr_main_banner'])) !!}</li>
    <li class="sliderHotIssue nSlider pick">
        {!! banner_html(element('메인_학원배너3', $data['arr_main_banner']), 'sliderNum') !!}
    </li>
</ul>
