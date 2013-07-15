@extends('admin.base')

@section('content')
<div class="page-header">
	<div class="row">
		<div class="large-6 columns">
			<h3>{{ Lang::get('gorilla.posts.title') }} <small>( {{ $posts->count() }} )</small></h3>
		</div>
		<div class="large-6 columns text-right">
			<a href="{{ URL::route('admin_post_create') }}" class="button small success">
				{{ Lang::get('gorilla.actions.create') }} {{ Lang::get('gorilla.posts.sing') }}
			</a>
		</div>
	</div>
</div>

{{ Form::alert('success', 'notify_confirm') }}

@if ($posts->count())
	<table class="full-width">
		<thead>
			<tr>
				<th class="post-title-cell">@lang('gorilla.posts.fields.title')</th>
				<th class="text-center">@lang('gorilla.posts.fields.slug')</th>
				<th class="text-center">@lang('gorilla.posts.fields.publish_date')</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
			<tr>
				<td>
					<a href="{{ URL::route('admin_post_update', array('id' => $post->id)) }}">{{ $post->title }}</a>
				</td>
				<td class="text-center">
					{{ $post->author->username }}
				</td>
				<td class="text-center">
					{{ $post->publish_date->format('d/m/Y H:i') }} <span class="text-muted">( {{ $post->publish_date->diffForHumans() }} )</span>
				</td>
				<td class="actions">
					<a href="{{ URL::route('admin_post_delete', array('id' => $post->id)) }}" class="tiny alert button confirm">@lang('gorilla.actions.delete')</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@else
	<h3 class="text-center subheader">@lang('gorilla.posts.empty')</h3>
@endif

@stop