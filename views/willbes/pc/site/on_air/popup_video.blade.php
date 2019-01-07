@extends('willbes.pc.layouts.master_popup')

@section('content')
<script>
    var popWidth = 800, popHeight = 500;    //팝업창 사이즈
    var mtWidth = window.outerWidth;        //윈도우width
    var mtHeight = window.outerHeight;      //윈도우height
    var scX = window.screenLeft;            //현재 브라우저의 x 좌표
    var scY = window.screenTop;            //현재 브라우저의 y 좌표
    var popX = scX + (mtWidth - popWidth) / 2 - 50;
    var popY = scY + (mtHeight - popHeight) / 2 - 50;

    var _url = '{{ front_url("/onAir/winPopup") }}?oa_idx='+'{{$oa_idx}}';
    window.open(_url,'on_air', 'status=no, width='+ popWidth +', height='+ popHeight +', toolbar=no, menubar=no, scrollbars=no, resizable=no, left='+ popX + ', top='+ popY);
</script>
@stop