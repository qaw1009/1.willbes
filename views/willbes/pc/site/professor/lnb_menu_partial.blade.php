<div class="lnb-List">
    @foreach($arr_subject2professors as $lnb_subject_idx => $lnb_subject_row)
        @php
            $subject_active_class = '';
            $subject_active_style = '';
            if (isset($arr_input['subject_idx']) === true && $arr_input['subject_idx'] == $lnb_subject_idx) {
                $subject_active_class = 'hover';
                $subject_active_style = 'display: block;';
            }
        @endphp

        <div class="lnb-List-Tit {{ $subject_active_class }}">
            <a href="#none"><span class="Txt">{{ key($lnb_subject_row) }}<span class="arrow-Btn">></span></span></a>
        </div>
        <div class="lnb-List-Depth" style="{{ $subject_active_style }}">
            <dl>
                @foreach(current($lnb_subject_row) as $lnb_prof_idx => $lnb_prof_name)
                    @php
                        $show_url = $__cfg['IsPassSite'] === false ? '/professor/show/cate/' . $def_cate_code . '/prof-idx/' . $lnb_prof_idx . '/?' : '/professor/show/prof-idx/' . $lnb_prof_idx . '/?cate_code=' . $def_cate_code . '&';
                        $show_url .= 'subject_idx=' . $lnb_subject_idx . '&subject_name=' . rawurlencode(key($lnb_subject_row));
                    @endphp
                    <dt>
                        <a href="{{ front_url($show_url) }}" class="{{ isset($prof_idx) === true && $lnb_prof_idx == $prof_idx ? 'active' : '' }}">{{ $lnb_prof_name }}</a>
                    </dt>
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>