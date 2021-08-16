@extends('Album.layout')
@section('content')
<div id="row"><a href="{{ route('photo.form') }}" class='btn btn-primary'>Photo Add Form</a></div>
 <div class="container mesafe40">
    <div class="row hidden-md-up">
    	<ul id="sortable">
  		@foreach($photos as $value)
				<li class="ui-state-default mesafe20" id="image_{{ $value->id }}">
					<div class="card">
					  <img src="images/{{$value->name }}" id="img{{ $value->id }}" class="view-image">
					  <a href="javascript:void(0);" data-del="button" data-detail="{{ $value->id }}" class=" btn btn-danger btn-sm card-link">del</a>
					</div>
				</li>
			@endforeach
		</ul>
		</div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{ URL::asset ('bower_components/custom/index.js') }}"></script>
<script type="text/javascript">
  let mainpage = new MainPage();
  mainpage.postdeleteURL = "{{ route('photo.destroy') }}";
  mainpage.postsortURL = "{{ route('photo.sort') }}";
  mainpage.csrf = "{{csrf_token()}}";
</script>
@endpush