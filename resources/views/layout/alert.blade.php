@if (session('status'))
			<div class="alert alert-{{session('status')[0]}}" role="alert">
			<h4 class="alert-heading">{{ session('status')[1] }}</h4>

			
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<p>{{ session('status')[2] }}</p>
			</div>
			@endif