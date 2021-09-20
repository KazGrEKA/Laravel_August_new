@extends('layouts.admin')
@section('content')
@section('title') Список отзывов - @parent @stop

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Список озывов</h1>
		<a href="{{ route('admin.feedback.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-plus fa-sm text-white-50"></i> Добавить отзыв</a>
	</div>
<div class="row">
<div class="col-md-12">
@include('inc.messages')
<div class="table-responsive">
 <table class="table table-bordered">
	<thead>
	 <tr>
	  <th>#ID</th>
	  <th>Новость</th>
	  <th>Имя</th>
	  <th>E-mail</th>
	  <th>Отзыв</th>
	  <th>Управление</th>
	 </tr>
	</thead>

		 <tbody>
		 @forelse($FeedBackList as $FeedBack)
		 <tr>
			 <td>{{ $FeedBack->id }}</td>
			 <td>{{ optional($FeedBack->news)->title }}</td>
			 <td>{{ $FeedBack->name }}</td>
			 <td>{{ $FeedBack->email }}</td>
			 <td>{{ $FeedBack->feedback }}</td>
			 <td>
				  <a href="{{ route('admin.feedback.edit', ['feedback' => $FeedBack->id]) }}">Ред.</a>
				  &nbsp;
				  <a href="">Уд.</a>
			 </td>
		 </tr>
		 @empty
			 <h2>Отзывов нет</h2>
		 @endforelse
		 </tbody>

 </table>
 {!! $FeedBackList->links() !!}
</div>
</div>
</div>
@endsection
