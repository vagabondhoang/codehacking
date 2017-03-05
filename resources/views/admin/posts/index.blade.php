@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-sm-3">
		<h1>Posts</h1>
	</div>
	<div class="col-sm-9">
		<form action="{{ route('posts.index') }}" method="get" role="search" class="navbar-form navbar-left">
			<div class="input-group custom-search-form">
				<input type="text" name="search" class="form-control" placeholder="search" value="{{request('search')}}">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default-sm">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</span>
			</div>
		</form>
	</div>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Owner</th>
			<th>Category</th>
			<th>Title</th>
			<th>Body</th>
			<th>Post Link</th>
			<th>View Comment</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@if($posts)
		@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
			<td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
			<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
			<td>{{$post->title}}</td>
			<td>{{str_limit($post->body, 10)}}</td>
			<td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
			<td><a href="{{route('comments.show', $post->id)}}">View Comment</a></td>
			<td>{{$post->created_at->diffForhumans()}}</td>
			<td>{{$post->updated_at->diffForhumans()}}</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
<div class="row">
	<div class="text-center">
		{!! $posts->links() !!}
	</div>
</div>	
@endsection