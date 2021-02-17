@extends('willbes.pc.layouts.master_popup')

@section('content')
    <img src="{{ (empty($data[0]['FileFullPath']) === false ? $data[0]['FileFullPath'] : '') }}" style="max-width: 100%">
@stop