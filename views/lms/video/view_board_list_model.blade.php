@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{$boardInfo[$bm_idx]}}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
@endsection

@section('layer_content')
    <div class="form-group form-group-sm">
        <ul class="nav nav-tabs">
            @foreach($boardInfo as $key => $val)
                <li class="cs-pointer @if($key == $bm_idx) active @endif"><a data-toggle="tab" href="#board_idx_{{$key}}" class="btn-board-model" data-bm-idx="{{$key}}">{{$val}}</a></li>
            @endforeach
        </ul>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-board-model').click(function (){
                console.log($(this).data('bm-idx'));

                /*$regi_form.find('input[name="send_type"]').val($(this).data('content-type'));*/
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection