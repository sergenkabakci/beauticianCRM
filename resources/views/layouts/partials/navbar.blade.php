<nav id="mainnav-container" class="mainnav">
    <div class="mainnav__inner">
		<div class="mainnav__top-content scrollable-content pb-5">
			<div class="mainnav__profile mt-3 d-flex3">
				<div class="mt-2 d-mn-max"></div>

				<div class="mininav-toggle text-center py-2 collapsed">
					<img class="mainnav__avatar img-md rounded-circle border" src="{{ asset('assets/img/profile-photos/1.png') }}" alt="Profile Picture">
				</div>

				<div class="mininav-content collapse d-mn-max" style="">
					<div class="d-grid">

						<button class="d-block btn shadow-none p-2">
							<span class="text-center"> 
								<h6 class="mb-0">{{Auth::user()->ad}} {{Auth::user()->soyad}}</h6>
							</span>
							<small class="text-muted">Administrator</small>
						</button>

						

					</div>
				</div>

			</div>
			
			<div class="mainnav__categoriy py-3">
				<ul class="mainnav__menu nav flex-column">

					<li class="nav-item">

						<a href="{{ route('dashboard.index') }}" class="mininav-toggle nav-link "><i class="demo-pli-home fs-5 me-2"></i>
							<span class="nav-label ms-1">Kontrol Paneli</span>
						</a>
					</li>
				

				</ul>
			</div>

			<!-- Components Category -->
			<div class="mainnav__categoriy py-3">
				<h6 class="mainnav__caption mt-0 px-3 fw-bold">HASTA YÖNETİM</h6>
				<ul class="mainnav__menu nav flex-column">

					<li class="nav-item">

						<a href="{{ route('patients.index') }}" class="mininav-toggle nav-link "><i class="demo-pli-male fs-5 me-2"></i>
							<span class="nav-label ms-1">{{ __('Patients') }}</span>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="#" class="mininav-toggle nav-link "><i class="demo-pli-receipt-4 fs-5 me-2"></i>
							<span class="nav-label ms-1">{{ __('Appointments') }}</span>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="#" class="mininav-toggle nav-link "><i class="pli-smile fs-5 me-2"></i>
							<span class="nav-label ms-1">Yüz Estetik İşlemleri</span>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="#" class="mininav-toggle nav-link "><i class="demo-pli-repair fs-5 me-2"></i>
							<span class="nav-label ms-1">Ameliyatlar</span>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="#" class="mininav-toggle nav-link "><i class="pli-environmental fs-5 me-2"></i>
							<span class="nav-label ms-1">Ameliyat Notları</span>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="#" class="mininav-toggle nav-link "><i class="fas fa-search fs-5 me-2"></i>
							<span class="nav-label ms-1">Hasta Bulucu</span>
						</a>
					</li>
					
				</ul>
			</div>
			
			
			<div class="mainnav__categoriy py-3">
				<h6 class="mainnav__caption mt-0 px-3 fw-bold">KLİNİK</h6>
				<ul class="mainnav__menu nav flex-column">

					<li class="nav-item">

						<a href="{{ route('events.index') }}" class="mininav-toggle nav-link"><i class="pli-calendar-4 fs-5 me-2"></i>
							<span class="nav-label ms-1">{{ __('Calendar') }}</span>
						</a>
					</li>
					
					<li class="nav-item">

						<a href="#" class="mininav-toggle nav-link"><i class="pli-calendar-3 fs-5 me-2"></i>
							<span class="nav-label ms-1">TAKOP</span>
						</a>
					</li>
					
					<li class="nav-item">

						<a href="#" class="mininav-toggle nav-link"><i class="pli-check-2 fs-5 me-2"></i>
							<span class="nav-label ms-1">Yapılacak İşler</span>
						</a>
					</li>
					
					<li class="nav-item">

						<a href="#" class="mininav-toggle nav-link "><i class="pli-file-text-image fs-5 me-2"></i>
							<span class="nav-label ms-1">Giderler</span>
						</a>
					</li>
					
					<li class="nav-item">

						<a href="#" class="mininav-toggle nav-link "><i class="pli-dollar-sign-2 fs-5 me-2"></i>
							<span class="nav-label ms-1">Muhasebe</span>
						</a>
					</li>
					
				</ul>
			</div>
			
			<div class="mainnav__categoriy py-3">
				<h6 class="mainnav__caption mt-0 px-3 fw-bold">PORTAL</h6>
				<ul class="mainnav__menu nav flex-column">
							<li class="nav-item">

						<a href="#" class="mininav-toggle nav-link "><i class="pli-business-man-woman fs-5 me-2"></i>
							<span class="nav-label ms-1">{{ __('Users') }}</span>
						</a>
					</li>
					
					<li class="nav-item">

						<a href="{{ route('settings.index') }}" class="mininav-toggle nav-link "><i class="demo-pli-gear fs-5 me-2"></i>
							<span class="nav-label ms-1">{{ __('Settings') }}</span>
						</a>
					</li>
				
				</ul>
			</div>
			
		 
		 
              

		</div>
                <!-- End - Navigation menu -->

                <!-- Bottom navigation menu -->
		<div class="mainnav__bottom-content border-top pb-2">
			<ul id="mainnav" class="mainnav__menu nav flex-column">
				<li class="nav-item ">
					<a href="{{ route('logout') }}" class="nav-link mininav-toggle collapsed" aria-expanded="false">
						<i class="demo-pli-unlock fs-5 me-2"></i>
						<span class="nav-label ms-1">{{ __('Logout') }}</span>
					</a>
				 
				</li>
			</ul>
		</div>
	</div>
</nav>