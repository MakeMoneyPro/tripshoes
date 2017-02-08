@extends('frontend.layout.master')

@section('content')
	@foreach($blog as $item)
	@if($tour->id == $item->tour_information_id)
	{!! $item->content !!}
	@endif
	@endforeach
	<!-- <div style="background: rgba(128, 128, 128, 0.16);">
	<div class="head-banner text-center artical">
		<h4>Food</h4>
		<h1>Is it "fur" or "pho"?</h1>
		10 words to learn when ordering food at a Vietnamese restaurant
		<p>November 27 <span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comment-o"></i>&nbsp;&nbsp;34</span></p>

	</div>
	<div class="container">
	<div class="seagull">
		<div class="container">
			<div class="row">
				<div class="seagull-content">
					<div class="col-lg-3">
						<div class="col-lg-5">
							<div class="left-seagull">
								<img src="{{ asset('/frontend/images/Userpic.png') }}" class="duck">
								<div class="seagull-info">
									<span class="seagull-name">Ty Seagull</span>
									<span class="seagull-mail">@tyseagull</span>
								</div>

								<ul class="icon">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-7">
						<div class="main-seagull">
							<div class="head-main-seagull">
								<p>After dabbling in various Bitcoin-related ventures that have gone south in the past couple of years, Cameron and Tyler Winklevoss are betting on themselves by heading up the first regulated Bitcoin exchange</p>
							</div>
							<div class="content-main-seagull">
								<p>The Coinbase exchange will allows individuals and companies to do business in about half the states in the US where the company has regulatory approval. It will take a 0.25 percent cut of most transactions and waive fees for the first two months.</p>

								<p>Coinbase currently has 2.1 million consumer wallets and 38000 merchants processing Bitcoin payments through its platform. The company received $75 million in funding.</p>	
							</div>

							<div class="seagull-border"></div>

							<div class="seagull-message">
								<div class="row">
									<div class="col-lg-1">
										<div class="seagull-step">
											<span>1</span>
										</div>
									</div>
									<div class="col-lg-10">
										<h4 class="header-step">Bulk messaging</h4>
										<p class="seagull-message-step">Messages with the same or similar text can be sent out to a group of people in a short period of time. Several spam accounts can also simultaneously post duplicate messages.</p>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-1">
										<div class="seagull-step">
											<span>2</span>
										</div>
									</div>
									<div class="col-lg-10">
										<h4 class="header-step">Spreading malicious links</h4>
										<p class="seagull-message-step">Malicious links are links created with the intent to harm, mislead or damage a user of their device. When the link is clicked, activities triggered can range from downloading malware to stealing personal information.</p>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-1">
										<div class="seagull-step">
											<span>3</span>
										</div>
									</div>
									<div class="col-lg-10">
										<h4 class="header-step">Sharing undesired or excessive content</h4>
										<p class="seagull-message-step">Fake accounts can also contact and share unwarrented content such as insults, threats and unwanted advertising to genuine users. Bots can be set up to automatically follow new users or automatically message users who post content.</p>
									</div>
								</div>
							</div>
							<div class="border-message-seagull"></div>
						</div>

					</div>
					<div class="row">
						<div class="bitcoin">
							<div class="col-lg-4">
								<div class="small-border"></div>
								<p>Bitcoin wallet service Coinbase will launch the US' first Bitcoin exchange later today.</p>
							</div>
							<div class="col-lg-6">
								<div class="text-bitcoin">
									<p>
										Although Coinbase's exchange will initially do business only in the US, CEO Brian Armstrong said that he plans to expand the exchange to serve markets overseas in the future. Bitcoin is currently valued at about $280, up to $230 only three days ago. The cryptocurrentcy's value is about $3.2 billion in total, with total 80,000 merchants accepting it for payments, according to currency tracker Coindesk.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="bluebird-slide"></div>
			</div>
		
			<div class="row">
				<div class="seagull-content">
					<div class="col-lg-3"></div>
					<div class="col-lg-7">
						<div class="statistic">
							The value of Bitcoin has passed the symbolic $500 mark for the first time in a month, suggesting that the cryptocurrency is stabilizing after a rollercoaster six months. 
						</div>
						<div class="table-statistic">
							<table class="table">
								<thead>
									<th>Market</th>
									<th>Price</th>
									<th>Avg.</th>
									<th>Change</th>
									<th>30d Volume</th>
								</thead>
								<tbody>
									<tr>
										<td>okcoinCNY <i class="fa fa-caret-up"></i></td>
										<td>2965.00</td>
										<td>2830.925</td>
										<td>+4.736%</td>
										<td>5112889</td>
									</tr>
									<tr>
										<td>btcnCNY <i class="fa fa-caret-down"></i></td>
										<td>2540.35</td>
										<td>2733.882</td>
										<td>-7.079%</td>
										<td>1683119</td>
									</tr>
									<tr>
										<td>bitflinexUSD <i class="fa fa-caret-down"></i></td>
										<td>381.98</td>
										<td>409.693</td>
										<td>-6.764%</td>
										<td>863583</td>
									</tr>
									<tr>
										<td>bitstampUSD <i class="fa fa-caret-down"></i></td>
										<td>382.59</td>
										<td>409.340</td>
										<td>-6.535%</td>
										<td>290454</td>
									</tr>
									<tr>
										<td>coinbaseUSD <i class="fa fa-caret-down"></i></td>
										<td>384.11</td>
										<td>410.911</td>
										<td>-6.522%</td>
										<td>245046</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="statistic">
							<p>With the first generation of Bitcoin businesses like Mt. Gox less influential today, the hopes of 'mass-marketizing' virtual currencies are held by venture capital-backed companies like BitPay, which recently raised $30 million, Coinbase, which raise a $25 million Series B round last year, and Circle. Interestingly, it looks like a significant transaction took the cyber currency over today's landmark. That's a reminder that though many people see the future of Bitcoin as leveling the playing field for all, there are still individuals with vast amounts.</p>
						</div>
						<div class="tag">
							<a href="#" class="btn btn-sm btn-tech">Technology</a>
							<a href="#" class="btn btn-sm btn-success">Art</a>
							<a href="#" class="btn btn-sm btn-bird">Birds</a>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
</div> -->
@endsection