<div class="lnb-List">
    @foreach($arr_subject2professors as $subject_idx => $subject_row)
        <div class="lnb-List-Tit">
            <a href="#none"><span class="Txt">{{ key($subject_row) }}<span class="arrow-Btn">></span></span></a>
        </div>
        <div class="lnb-List-Depth">
            <dl>
                @foreach(current($subject_row) as $prof_idx => $prof_name)
                    @php
                        $show_url = $__cfg['IsPassSite'] === false ? '/professor/show/cate/' . $def_cate_code . '/prof-idx/' . $prof_idx . '/?' : '/professor/show/prof-idx/' . $prof_idx . '/?cate_code=' . $def_cate_code;
                        $show_url .= 'subject_idx=' . $subject_idx . '&subject_name=' . rawurlencode(key($subject_row));
                    @endphp
                    <dt>
                        <a href="{{ front_url($show_url) }}">{{ $prof_name }}</a>
                    </dt>
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>