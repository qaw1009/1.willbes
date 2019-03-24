<div class="will-listTit">BEST 강좌</div>
<div class="bestLectBx">
@if(empty($data['best_product']['subjects']) === false)
    <ul class="prof-subject">
    @foreach($data['best_product']['subjects'] as $subject_idx => $subject_name)
        <li id="tab_prof_subject_{{ $loop->index }}"><a href='#tab_prof_subject_{{ $subject_idx }}'><span>|</span>{{ $subject_name }}</a></li>
    @endforeach

    {{-- 과목이 8개 이하라면 모자란만큼 빈 슬라이드 생성 --}}
    @if(count($data['best_product']['subjects']) < 8)
        @for($i = 0; $i < (8 - count($data['best_product']['subjects'])); $i++)
            <li><a href='#none'><span>|</span></a></li>
        @endfor
    @endif
    </ul>

    <div id="prof-professors" class="prof-professors">
        @foreach($data['best_product']['list'] as $subject_idx => $rows)
            <ul id="tab_prof_subject_{{ $subject_idx }}" class="prof-slider">
            @foreach($rows as $row)
                <li>
                    <div><img src="{{ $row['ProfClassImg'] }}" alt="{{ $row['ProfNickName'] }}" class=""/></div>
                    <span class="txt1">{{ $row['SubjectName'] }}</span>
                    <span class="txt2">{{ $row['ProfNickName'] }}</span>
                    <span class="txt3"><a href="{{ front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 32, '...') }}</a></span>
                    @if($row['wUnitIdx'] != 'N')
                        <a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$row['wUnitIdx']}}','HD');">맛보기강좌 ></a>
                    @endif
                </li>
            @endforeach
            </ul>
        @endforeach
    </div>
@endif
</div>
<script type="text/javascript">
    $(function(){
        $('.prof-subject').bxSlider({
            speed:800,
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:78,
            minSlides:1,
            maxSlides:8
        });

        $('.prof-subject').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function () {
                $(this.hash).hide();
            });

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('active');
                $content.show();

                e.preventDefault()
            });
        });

        // 1번째 과목 상품 강제 노출
        $('.prof-subject > #tab_prof_subject_1 > a').trigger('click');
    });
</script>