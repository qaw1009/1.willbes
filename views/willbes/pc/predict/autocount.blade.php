@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<script>
    $(document).ready(function() {
        var cnt = '{{ $cnt }}';
        $(top.document).find("#autonumber").html(cnt);
    });
</script>
@stop