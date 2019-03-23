@if(isset($data['arr_main_banner']['메인_이벤트띠배너']) === true)
    <div class="widthAuto">
        <div class="widthAuto smallTit">
            <p><span>신광은경찰 Hot Pick! <strong>온라인특강/이벤트</strong></span></p>
        </div>
        <div class="willbes-Bnr mt60">
            {!! banner_html(element('메인_이벤트띠배너', $data['arr_main_banner'])) !!}
        </div>
    </div>
@endif