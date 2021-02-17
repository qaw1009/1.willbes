@extends('willbes.pc.layouts.master_popup')

@section('content')
    <img src="{{ (empty($data['FileFullPath']) === false ? $data['FileFullPath'] : '') }}">
@stop