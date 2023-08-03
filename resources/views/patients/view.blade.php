@extends('layouts.app-master')
@section('css')
	<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.css') }}" >
@endsection 
@section('script')

    <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}" ></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap5.js') }}" ></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.responsive.js') }}" ></script>
	<script>
		var table  = $("#patients").DataTable({
			"processing": true,
			"serverSide": true,
			searchDelay: 750,
			"bStateSave": true,
			stateSave: true,
			"language": {
				"url": "{{ asset('assets/vendor/datatables/Turkish.json') }}"
			},
			"ajax":{
				"url": "{{ url('patients/list') }}",
				"dataType": "json",
				"type": "POST",
				"data":{ _token: "{{csrf_token()}}"}
			},
			"columns": [
				{ "data": "full_name" },
				{ "data": "grup" },
				{ "data": "telefon" },
				{ "data": "email" },
				{ "data": "cinsiyet" },
				{ "data": "action" }
			]
	    });
	</script>
@endsection

@section('content')
    

<div class="content__header content__boxed rounded-0">
                <div class="content__wrap d-md-flex align-items-start">

                    <figure class="m-0">
                        <div class="d-inline-flex align-items-center position-relative pt-xl-5 mb-3">
                            <div class="flex-shrink-0">
                                <img class="img-xl rounded" src="{{ asset('assets/img/profile-photos/s2.jpg') }}" alt="Profile Picture" loading="lazy">
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <a href="#" class="h3 btn-link">{{ $patient->ad }} {{ $patient->soyad }}</a>
									<p class="text-muted m-0">
									@if($patient->grup == 1)
										<span class="badge bg-light py-1 px-2 text-dark">Standart</span>
									@elseif($patient->grup == 2)
										<span class="badge bg-secondary  py-1 px-2">Tanıdık</span>
									@elseif($patient->grup == 3)
										<span class="badge bg-danger py-1 px-2">VIP</span>
									@else
										<span class="badge bg-light py-1 px-23 text-dark">Standart</span>
									@endif
									</p>


                            </div>
                        </div>

                    </figure>
                    <div class="d-inline-flex justify-content-end pt-xl-5 gap-2 ms-auto">
                        <button class="btn btn-light text-nowrap">Düzenle</button>
                    </div>
                </div>

            </div>
<div class="content__boxed">
                <div class="content__wrap">
                    <div class="d-md-flex gap-4">

                        <!-- Sidebar -->
                        <div class="w-md-200px flex-shrink-0">

                            <h5>Detaylar</h5>
                            <ul class="list-unstyled mb-3"> 
                                <li class="mb-2"><i class="@if ($patient->cinsiyet == 'Erkek') psi-male @else psi-female @endif fs-5 me-3"></i>{{ $patient->cinsiyet }}</li>
                                <li class="mb-2"><i class="demo-psi-internet fs-5 me-3"></i>{{ $patient->tcno }}</li>
                                <li class="mb-2"><i class="demo-psi-internet fs-5 me-3"></i>{{ $patient->email }}</li>
                                <li class="mb-2"><i class="demo-psi-old-telephone fs-5 me-3"></i>{{ $patient->telefon }}</li>
								<li class="mb-2"><i class="demo-psi-map-marker-2 fs-5 me-3"></i>{{ $patient->adres }}</li>
                            </ul>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perspiciatis debitis aut nobis minima quia quasi aliquid minus consequatur dolore.</p>

                            
                            

                            
                            
                        </div>
                        <!-- END : Sidebar -->

                        <div class="vr d-none"></div>

                        <!-- Content -->
                        <div class="flex-fill">
                            <div class="tab-base">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" >
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" role="button"><i class="@if ($patient->cinsiyet == 'Erkek') psi-male @else psi-female @endif fs-5 me-3 text-black"></i>Genel</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link "><i class=" fas fa-solid fa-wave-square me-3"></i> Muayeneler</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="psi-hand fs-5 me-3 text-black"></i>Tırnak</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-vial me-3"></i>PRP</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-capsules me-3"></i>PP Serum</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-wand-magic-sparkles me-3"></i>Hifu</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-magnifying-glass-plus me-3"></i>Küçük Müdahale</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-magnifying-glass-plus me-3"></i>Burun Aparatı</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-magnifying-glass-plus me-3"></i>Cilt Bakımı</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-regular fa-face-smile me-3"></i>Dolgu</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-crop me-3"></i>İp Askı</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-syringe me-3"></i>Botox</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-scissors me-3"></i>Ameliyatlar</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-image me-3"></i>Galeri</a>
                                    </li>
									<li class="nav-item" role="presentation">
                                        <a class="nav-link " role="button"><i class="fa-solid fa-note-sticky me-3"></i>Notlar</a>
                                    </li>
                                </ul>

                                <!-- Tabs content -->
                                <div class="tab-content">
                                    <div id="_dm-tabsHome" class="tab-pane fade active show" >
                                        <h5 class="card-title">Home tab</h5>
                                        <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                                    </div>
                                 
                                </div>
                            </div>
                            
                        </div>
                        <!-- END : Content -->

                    </div>

                </div>
            </div>



<aside class="sidebar">
   <div class="sidebar__inner scrollable-content">
     
      <div class="modal-header">
		
         <h4 class="mb-0">Hasta Ekle</h4>
		 <button type="button" class="btn-close sidebar-toggler" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="sidebar__wrap">
         <div id="nav-chat" class="">
            <form class="add-new-user pt-0" >
				<div class="modal-body flex-grow-1">
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-fullname">Adı</label>
						<input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Ad" name="user-fullname">
					</div>
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-uname">Soyadı</label>
						<input type="text" id="basic-icon-default-uname" class="form-control dt-uname" placeholder="Soyad" name="user-name">
					</div>
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-email">Email</label>
						<input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" name="user-email">
					</div>
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-contact">Contact</label>
						<input type="text" id="basic-icon-default-contact" class="form-control dt-contact" placeholder="+1 (609) 933-44-22" name="user-contact">
					</div>
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-company">Company</label>
						<input type="text" id="basic-icon-default-company" class="form-control dt-contact" placeholder="PIXINVENT" name="user-company">
					</div>
				
					<div class="mb-1">
				   
						<button type="submit" class="btn btn-primary me-1 data-submit waves-effect waves-float waves-light">Submit</button>
						<button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</form>
         </div>
      </div>
   </div>
</aside>
	
@endsection


