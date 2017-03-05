@extends('layouts.admin')
@section('content')
<h1>MEdia</h1>
@if($photos)
<form action="{{route('deleteMedia')}}" method="post" class="form-inline">
	{{ csrf_field() }}
	{{ method_field('delete')}}
	<div class="form-group">
		<select name="checkBoxArray" class="form-control">
			<option value="delete">Delete</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary">
	</div>

	<table class="table">
		<thead>
			<tr>
				<th><input type="checkbox" id="options"></th>
				<th>ID</th>
				<th>Name</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($photos as $photo)
			<tr>
				<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
				<td>{{$photo->id}}</td>
				<td><img height="50" src="{{$photo->file?$photo->file:'http://placehold.it/400x400'}}"></td>
				<td>{{$photo->created_at?$photo->created_at->diffForHumans():'no date'}}</td>
				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id], 'class'=>'dropzone']) !!}

					{!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}

					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</form>
@endif
@endsection

@section('footer')
<script>
	
	$(document).ready(function() {

		$("#options").click(function() {

			if(this.checked) {
				$(".checkBoxes").each(function() {
					this.checked = true;
				});
			} else {
				$(".checkBoxes").each(function() {
					this.checked = false;
				});
			}
		});

	})
</script>
@endsection