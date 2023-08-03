@extends('layouts.app-master')
@section('css')
	<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.css') }}" >
	<link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}" >
	<style>
		.iti {
			width: 100%;
			display: block;
		}
	</style>
@endsection 
@section('script')

    <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}" ></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap5.js') }}" ></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.buttons.min.js') }}" ></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.responsive.js') }}" ></script>
	
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}" ></script>
    <script src="{{ asset('assets/js/intlTelInput.js') }}" ></script>
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
			],
			 dom:
                    '<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                
                buttons: [
                    
					{
						extend: "excel",
						text: '<i class="fa-soşid fa-spreadsheet me-2"></i> Excel',
						className: "dropdown-item",
					},
                    {
                        text: '<i class="fa-solid fa-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Yeni Hasta Ekle</span>',
                        className: "sidebar-toggler btn btn-primary",
                    },
                ],
	    });
		
	
	
	$(document).on('click', '.sidebar-toggler', function(){
		if ($("#root").find(".sb--show").length > 0){ 
			$("#root").removeClass("sb--show");
		}else{
			$("#root").addClass("sb--show");
		}
		
		
	});
    
		
$(document).ready(function() {
  var phoneInputID = "#phone";
  var input = document.querySelector(phoneInputID);
  var iti = window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    autoPlaceholder: "on",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    formatOnDisplay: true,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    preferredCountries: ['tr'],
    // separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
  });


  $(phoneInputID).on("countrychange", function(event) {

    // Get the selected country data to know which country is selected.
    var selectedCountryData = iti.getSelectedCountryData();

    // Get an example number for the selected country to use as placeholder.
    newPlaceholder = intlTelInputUtils.getExampleNumber(selectedCountryData.iso2, true, intlTelInputUtils.numberFormat.INTERNATIONAL),

      // Reset the phone number input.
      iti.setNumber("");

    // Convert placeholder as exploitable mask by replacing all 1-9 numbers with 0s
    mask = newPlaceholder.replace(/[1-9]/g, "0");

    // Apply the new mask for the input
    $(this).mask(mask);
  });


  // When the plugin loads for the first time, we have to trigger the "countrychange" event manually, 
  // but after making sure that the plugin is fully loaded by associating handler to the promise of the 
  // plugin instance.

  iti.promise.then(function() {
    $(phoneInputID).trigger("countrychange");
  });

});
		
		
		
		
		
		const forms=document.querySelectorAll(".needs-validation");forms.forEach(form=>{form.addEventListener("submit",e=>{if(!form.checkValidity()){e.preventDefault()
e.stopPropagation()}
form.classList.add("was-validated")},false)})
	</script>
@endsection

@section('content')
    

<div class="content__header content__boxed overlapping">
  <div class="content__wrap">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="/">Anasayfa</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Hastalar</li>
      </ol>
    </nav>
    <!-- END : Breadcrumb -->
    <h1 class="page-title mb-0 mt-2">Hastalar</h1>
    <p class="lead"> Hasta Listesi </p>
  </div>
</div>
<div class="content__boxed">
  <div class="content__wrap">
   
   <div class="row mb-5">
		<div class="col-sm-3">
        
			<div class="card bg-info text-white text-center">
				<div class="p-3 text-center">
					<i class="demo-psi-speech-bubble-3 text-white text-opacity-50 display-3 my-4"></i>
					<div class="display-4">{{ $data['total'] }}</div>
					<p>Toplam Hasta</p>
				</div>
			</div>
		
        </div>
		
		<div class="col-sm-3">
			<div class="card bg-secondary  text-white text-center">
				<div class="p-3 text-center">
					<i class="demo-psi-speech-bubble-3 text-white text-opacity-50 display-3 my-4"></i>
					<div class="display-4">{{ $data['standart'] }}</div>
					<p>Standart</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="card bg-warning  text-white text-center">
				<div class="p-3 text-center">
					<i class="demo-psi-speech-bubble-3 text-white text-opacity-50 display-3 my-4"></i>
					<div class="display-4">{{ $data['tanidik'] }}</div>
					<p>Tanıdık</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="card bg-danger   text-white text-center">
				<div class="p-3 text-center">
					<i class="demo-psi-speech-bubble-3 text-white text-opacity-50 display-3 my-4"></i>
					<div class="display-4">{{ $data['vip'] }}</div>
					<p>VIP</p>
				</div>
			</div>
		</div>

   </div>
  
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
@endif
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped " id="patients" style="width:100%">
						  <thead>
							<tr>
							  <th>AD SOYAD</th>
							  <th>SINIF</th>
							  <th>TELEFON</th>
							  <th>EMAİL</th>
							  <th class="text-truncate">CİNSİYET</th>
							  <th class="cell-fit">İŞLEM</th>
							</tr>
						  </thead>
						</table>
					</div>
				</div>
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
            <form class="add-new-user pt-0 needs-validation" novalidate method="POST" action="{{ route('patients.store') }}">
				@csrf
				<div class="modal-body flex-grow-1">
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-fullname">Adı</label>
						<input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Ad" name="name" required>
					</div>
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-uname">Soyadı</label>
						<input type="text" id="basic-icon-default-uname" class="form-control dt-uname" placeholder="Soyad" name="lastname" required>
					</div>
					<div class="mb-1">
						<label class="form-label" for="basic-icon-default-email">Email</label>
						<input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="E-posta" name="email" >
					</div>
					<div class="mb-1">
						<label class="form-label w-100" for="phone">Telefon</label>
						<input type="text" id="phone" class="form-control dt-contact" placeholder="0555 987 65-43" name="phone" style="width:100%" required>
					</div>
					<div class="mb-1">
						<label class="form-label" for="tcno">T.C. Kimlik No</label>
						<input type="text" id="tcno" class="form-control" placeholder="T.C. Kimlik No" maxlength="11" name="tcno">
					</div>
					<div class="mb-1">
						<label class="form-label" for="adres">Adres</label>
						<textarea id="adres" class="form-control" placeholder="Adres" name="adres"></textarea>
					</div>
					<div class="mb-1">
						<label class="form-label" for="cinsiyet">Cinsiyet</label>
						<select id="cinsiyet" class="form-control" name="cinsiyet" required>
							<option value="Kadın">Kadın</option>
							<option value="Erkek">Erkek</option>
						</select>
					</div>
					
					<div class="mb-1">
						<label class="form-label" for="cinsiyet">Sınıf</label>
						<select id="grup" class="form-control" name="grup" required>
							<option value="Standart">Standart</option>
							<option value="Tanıdık">Tanıdık</option>
							<option value="VIP">VIP</option> 
						</select>
					</div>
				
					<div class="mt-4">
				   
						<button type="submit" class="btn btn-primary me-1 data-submit waves-effect waves-float waves-light">Kaydet</button>
						<button type="reset" class="btn btn-light waves-effect" data-bs-dismiss="modal">İptal</button>
					</div>
				</div>
			</form>
         </div>
      </div>
   </div>
</aside>
	
@endsection


