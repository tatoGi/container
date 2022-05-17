@if ($paginator->hasPages())
<!--begin::Pagination-->

<div class="pagination">
	<div class="pagination-box">
		<a href="{{ $paginator->previousPageUrl() }}" class="pagination-arrow">
			<img src="/public/website/img/Iconly-Light-Arrow - Left 2.svg">
		</a>
		@foreach ($elements as $element)
		@if (is_array($element))
		@foreach ($element as $page => $url)
		
		<li @if($paginator->currentPage() == $page) class="pagination-color" @endif ><a href="{{$url}}">{{$page}}</a></li>
		@endforeach
		@endif
		@endforeach
		<a href="{{ $paginator->nextPageUrl() }}" class="pagination-arrow">
			<img src="/public/website/img/Iconly-Light-Arrow - Left 2.svg">
		</a>
	</div>
</div>

@endif