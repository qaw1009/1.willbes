@if(empty($stab_list) === false)
    <div class="tabContent">
        <div class="ssamTabGrid">
            <ul class="tabWrap tabDepthAcad">
                @foreach($stab_list as $stab_id => $stab_name)
                    <li style="width: {{ $stab_width }}%">
                        <a href="#none" onclick="goTabUrl('tab', '{{ $stab_id }}');" class="{{ $arr_input['tab'] == $stab_id ? 'on' : '' }}">
                            {{ $stab_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
