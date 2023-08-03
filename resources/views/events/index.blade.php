@extends('layouts.app-master')
@section('css')
<link href="{{ asset('assets/pages/calendar.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/flatpickr/flatpickr.css?v=322') }}" rel="stylesheet">
@endsection

@section('script')
	<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/tr.min.js') }}"></script>
    <script src="{{ asset('assets/pages/calendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr/flatpickr.js?v=52') }}"></script>
    <script src="{{ asset('assets/js/moment/moment-with-locales.min.js') }}"></script> 
<script>

const forms=document.querySelectorAll(".needs-validation");forms.forEach(form=>{form.addEventListener("submit",e=>{if(!form.checkValidity()){e.preventDefault()
e.stopPropagation()}
form.classList.add("was-validated")},false)})


$('.btn-toggle-modal').click(function(){
	$('.eAction').val('add');
	var myModal = new bootstrap.Modal(document.getElementById('etkinlikEkle'));
	myModal.show();
})


$('.datetimepicker').flatpickr({ 
	enableTime:true, 
	dateFormat: "d.m.Y H:i",
	minDate: "today",
	time_24hr: true, 
	allowInput:true,
	locale: {
		weekdays: {
			longhand: ['Pazar', 'Pazartesi','Salı','Çarşamba','Perşembe', 'Cuma','Cumartesi'],
			shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
		},
		months: {
			longhand: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos', 'Eylül','Ekim','Kasım','Aralık'],
			shorthand: ['Oca','Şub','Mar','Nis','May','Haz','Tem','Ağu','Eyl','Eki','Kas','Ara']
		},
		today: 'Bugün',
		clear: 'Temizle'
	}
	
});


 function t(e) {
	return e.id ? "<span class='badge badge-dot bg-" + $(e.element).data("label") + " me-2'> </span>" + e.text : e.text
}

 x = $("#eventLabel");
x.length && x.wrap('<div class="position-relative"></div>').select2({
	placeholder: "Select value",
	dropdownParent: x.parent(),
	templateResult: t,
	templateSelection: t,
	minimumResultsForSearch: -1,
	escapeMarkup: function(e) {
		return e
	}
});

var todayDate = moment().startOf("day");
var YM = todayDate.format("YYYY-MM");
var YESTERDAY = todayDate.clone().subtract(1, "day").format("YYYY-MM-DD");
var TODAY = todayDate.format("YYYY-MM-DD");
var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		initialView: 'dayGridMonth',
		locale: 'tr',
		events: '{{ route("events.index") }}',
		displayEventTime: true,
		
		selectable: true,
		headerToolbar: {
			left: "prev,next today",
			center: "title",
			right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
		},
		height: 800,
		contentHeight: 800,
		aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio
		scrollTime: '00:00',
		nowIndicator: true,
		now: TODAY + "T09:25:00",
		views: {
			thisMonth: { buttonText: "Bu Ay" },
			dayGridMonth: { buttonText: "Ay" },
			timeGridWeek: { buttonText: "Hafta" },
			timeGridDay: { buttonText: "Gün" },
			listMonth: { buttonText: "Liste" }
		},

		editable: !0,
		dragScroll: !0,
		dayMaxEvents: 4,
		initialDate: new Date(),

		editable: true,
		dayMaxEvents: true, // allow "more" link when too many events
		navLinks: true,
		eventClassNames: function ({ event: e }) {
			return ["fc-event-" + e._def.extendedProps.calendar];
		},
		eventDidMount: function(arg) { 
			var cs = document.querySelectorAll(".input-filter");
			cs.forEach(function(v) {
				if(v.checked){
					if(arg.event.extendedProps.k_id == v.value) {
						arg.el.style.display = '';
					}
				}else{ 
					if(arg.event.extendedProps.k_id == v.value) {
						arg.el.style.display = 'none';
					}
				}
				
			});


			}

	});


  calendar.render();


var A = document.querySelector(".select-all");
var  F = [].slice.call(document.querySelectorAll(".input-filter"));
A.addEventListener("click", (e) => {
	e.currentTarget.checked ? document.querySelectorAll(".input-filter").forEach((e) => (e.checked = 1)) : document.querySelectorAll(".input-filter").forEach((e) => (e.checked = 0)), calendar.refetchEvents();
});

	F.forEach((e) => {
		e.addEventListener("click", () => {
			document.querySelectorAll(".input-filter:checked").length < document.querySelectorAll(".input-filter").length ? (A.checked = !1) : (A.checked = !0), calendar.refetchEvents();
		});
	});
});



</script>

@endsection

@section('content')


            <div class="content__header content__boxed overlapping">
                <div class="content__wrap">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Homepage') }}</a></li> 
							<li class="breadcrumb-item active" aria-current="page">{{ __('Calendar') }}</li>
                        </ol>
                    </nav>
                    <!-- END : Breadcrumb -->

                    <h1 class="page-title mb-0 mt-2">{{ __('Calendar') }}</h1>

                </div>

            </div>

				<div class="content__boxed">
				  	<div class="content__wrap">
						<div class="card app-calendar-wrapper">
					 		<div class="row g-0">
							
							<div class="col-sm-2 col-12 app-calendar-sidebar" id="app-calendar-sidebar">
									<div class="border-bottom p-4 my-sm-0 mb-3">
										<div class="d-grid">
										<button class="btn btn-primary btn-toggle-modal waves-effect waves-light">
											<i class="fas fa-plus me-1"></i>
											<span class="align-middle">Etkinlik Ekle</span>
										</button>
										</div>
									</div>
								<div class="p-3">
									<div class="mb-3 ms-3">
										<small class="text-small text-muted text-uppercase align-middle">KATEGORİLER</small>
									</div>

									<div class="form-check mb-2 ms-3 form-check-purple">
										<input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" value="all" checked="">
										<label class="form-check-label" for="selectAll">Tümü</label>
									</div>

									<div class="app-calendar-events-filter ms-3">

										@if($data['kategoriler'])
											@foreach($data['kategoriler'] as $row)
												<div class="form-check form-check-{{ $row['color'] }} mb-2">
													<input class="form-check-input input-filter" type="checkbox" id="{{ $row['id'] }}" data-value="{{ $row['name'] }}" value="{{ $row['id'] }}" checked="">
													<label class="form-check-label" for="{{ $row['id'] }}">{{ $row['name'] }}</label>
												</div>
											@endforeach
										@endif
										
									</div>
								</div>
							</div>
						
						 <div class="col-sm-10 col-12 app-calendar-content">
							<div class="card shadow-none border-0">
								<div class="card-body pb-0">
							
									<div id="calendar"></div>
								</div>
							</div>
						</div>



					  </div>
					</div>
				  </div>
				</div>

			

<div class="modal fade" id="etkinlikEkle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-focus="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Etkinlik Ekle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	   <form action="{{route('events.eventsave') }}" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        
			@csrf
			<input type="hidden" name="action" class="eAction">
		     <div class="mb-3">
              <label class="form-label" for="eventTitle">Başlık</label>
              <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Başlık" required="" />
            </div>

		
            <div class="mb-3">
              <label class="form-label" for="eventLabel">Kategori</label>
              <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel" required="">
				@if($data['kategoriler'])
					@foreach($data['kategoriler'] as $row)
						<option  data-label="{{ $row['color'] }}" value="{{ $row['id'] }}">{{ $row['name'] }}</option>
					@endforeach
				@endif
       
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="eventStartDate">Başlangıç Tarihi</label>
              <input type="text" class="form-control datetimepicker" id="eventStartDate" name="eventStartDate" placeholder="Başlangıç Tarihi" required="" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="eventEndDate">Bitiş Tarihi</label>
              <input type="text" class="form-control datetimepicker" id="eventEndDate" name="eventEndDate" placeholder="Bitiş Tarihi" required="" />
            </div>
        
            <div class="mb-3">
              <label class="form-label" for="eventURL">Lokasyon</label>
					<select class="select2 select-lokasyon-label form-select" id="eventLocation" name="eventLocation" data-placeholder="Lokasyon" required="">
						@if($data['lokasyonlar'])
							@foreach($data['lokasyonlar'] as $row)
								<option value="{{ $row['id'] }}">{{ $row['lokasyon'] }}</option>
							@endforeach
						@endif
					</select>
            </div>
           
           
            <div class="mb-3">
              <label class="form-label" for="eventDescription">Açıklama</label>
              	<textarea class="form-control" name="eventDescription" id="eventDescription" placeholder="Açıklama" required=""></textarea>
            </div>
      </div>
      <div class="modal-footer">
		<button class="btn btn-label-danger btn-delete-event d-none">Sil</button>
        <button type="button" class="btn btn-danger eSil" data-bs-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-primary eEkle">Ekle</button> 
      </div>
</form>
    </div>
  </div>
</div>



@endsection