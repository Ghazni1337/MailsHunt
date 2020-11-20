@extends('beautymail::templates.widgets')

@section('content')
@include('beautymail::templates.widgets.articleStart', ['color' => '#7e57c2'])
<h1>Email verification link</h1>
	Dear {{$data['user']->l_name}}, <br/>
	Please click on the link below to verify your email address and complete your registration process.
@include('beautymail::templates.widgets.articleEnd')

@include('beautymail::templates.widgets.newfeatureStart', ['color'=>'#343a40'])
<b>
	<a href="{{ $data['url']}}">{{ $data['url']}}</a>
</b><br/>
<small>Please copy and paste the link on your browser if you can't click on it.</small>
@include('beautymail::templates.widgets.newfeatureEnd')
@stop



