@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css') }}">
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
                        <!-- Blog post -->
                        @foreach ($post as $row)
                        <div class="blog_post">
							<div class="blog_image" src="">
                                <img src="{{ URL::to($row->post_image) }}" class="blog_image" alt="">
                            </div>
                            <div class="blog_text">
                                @if (Session()->get('lang') == 'hindi')
                                {{ $row->post_title_in }}
                           
                            @else                            
                            {{ $row->post_title_en }}
                            @endif
                        </div>
							<div class="blog_button"><a href="{{ url('blog/single/'.$row->id) }}">
                                @if (Session()->get('lang') == 'hindi')
                                पढ़ना जारी रखें
                                @else
                                Continue Reading
                                @endif
                                </a></div>
						</div>
                        @endforeach
						
						
					</div>
				</div>
					
			</div>
		</div>
	</div>

@endsection