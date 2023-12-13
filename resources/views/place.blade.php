@extends('layouts.place')
@section('content')
	<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>explore</h2>
					<p>Explore New place, food, culture around the world and many more</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
						@each('includes.exploreDiv', $rows, 'row')
					</div>
				</div>						
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->

@endsection

		

		

		
		
		
	