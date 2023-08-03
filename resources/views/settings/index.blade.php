@extends('layouts.app-master')

@section('css')
<link href="{{ asset('assets/js/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/flatpickr/flatpickr.css?v=322') }}" rel="stylesheet">
@endsection

@section('script')
	<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/tr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr/flatpickr.js?v=52') }}"></script>
    <script src="{{ asset('assets/js/moment/moment-with-locales.min.js') }}"></script> 
@endsection

@section('content')

<div class="content__header content__boxed mb-2 overlapping">
   <div class="content__wrap">
      <div class="d-md-flex">
         <div class="me-auto">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                  <li class="breadcrumb-item"><a href="../../app-views/">Ayarlar</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Genel Ayarlar</li>
               </ol>
            </nav>
            <!-- END : Breadcrumb -->
            <h1 class="page-title mb-0 mt-2">Genel Ayarlar</h1>
         </div>
        
      </div>
   </div>
</div>
<div class="content__boxed">
   <div class="content__wrap">
      <div class="card">
         <div class="card-body">
            <div class="d-md-flex gap-4">
               <!-- File manager sidebar -->
               <div class="w-md-160px w-xl-200px flex-shrink-0">
                  <h5 class="px-3 mb-3">Ayarlar</h5>
                  <div class="list-group list-group-borderless gap-1">
                    
                     <a href="#" class="list-group-item list-group-item-action active">
						<i class="demo-pli-folder fs-5 me-2"></i> Genel Ayarlar
                     </a>
                     <a href="#" class="list-group-item list-group-item-action">
						<i class="demo-pli-folder fs-5 me-2"></i> Takvim Kategorileri
                     </a>
                     <a href="#" class="list-group-item list-group-item-action">
						<i class="demo-pli-folder fs-5 me-2"></i> Lokasyonlar
                     </a>
                  
                  </div>
                  <h5 class="px-3 mt-5 mb-3">Entegrasyonlar</h5>
                  <div class="list-group list-group-borderless gap-1">
                     <a href="#" class="list-group-item list-group-item-action">
                     <i class="demo-pli-folder-with-document fs-5 me-2"></i> SMS
                     </a>
                     <a href="#" class="list-group-item list-group-item-action">
                     <i class="demo-pli-camera-2 fs-5 me-2"></i> Santral
                     </a>
                  </div>
                 
               </div>
               <!-- END : File manager sidebar -->
               <div class="vr"></div>
               <!-- File manager content -->
               <div class="flex-fill">
                  <!-- Folder name and path -->
                  <h2 class="d-flex align-items-center gap-3">
                     <i class="demo-pli-folder-with-document fs-4"></i> Genel Ayarlar
                  </h2>
                 
                
				
                  <div class="table-responsive pb-4">
                     <table class="table table-striped align-middle">
                        <thead>
                           <tr>
                              <th style="width: 40px"></th>
                              <th class="w-100w">Name</th>
                              <th class="text-center">Type</th>
                              <th class="text-center" style="width: 100px">Size</th>
                              <th class="text-center" style="width: 150px">Date Modified</th>
                              <th class="text-center" style="width: 40px">Options</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <input class="form-check-input" type="checkbox">
                              </td>
                              <td>
                                 <div class="d-flex align-items-center position-relative">
                                    <div class="flex-shrink-0">
                                       <i class="demo-psi-folder fs-3 text-orange-400"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                       <a href="#" class="stretched-link text-reset btn-link">. . .</a>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                           </tr>
                           <tr>
                              <td>
                                 <input class="form-check-input" type="checkbox">
                              </td>
                              <td>
                                 <div class="d-flex align-items-center position-relative">
                                    <div class="flex-shrink-0">
                                       <i class="demo-psi-folder fs-3 text-orange-400"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                       <a href="#" class="stretched-link text-reset btn-link">My Project</a>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center">Folder</td>
                              <td class="text-center">225 MB</td>
                              <td class="text-center">Yesterday, 07:55PM</td>
                              <td class="text-center">
                                 <div class="dropdown">
                                    <button class="btn btn-icon btn-xs btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="demo-pli-dot-horizontal"></i>
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                       <li><a class="dropdown-item" href="#">Action</a></li>
                                       <li><a class="dropdown-item" href="#">Another action</a></li>
                                       <li><a class="dropdown-item" href="#">Something else here</a></li>
                                       <li>
                                          <hr class="dropdown-divider">
                                       </li>
                                       <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <input class="form-check-input" type="checkbox">
                              </td>
                              <td>
                                 <div class="d-flex align-items-center position-relative">
                                    <div class="flex-shrink-0">
                                       <i class="demo-psi-folder fs-3 text-orange-400"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                       <a href="#" class="stretched-link text-reset btn-link">Photos</a>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center">Folder</td>
                              <td class="text-center">225 MB</td>
                              <td class="text-center">Yesterday, 10:45PM</td>
                              <td class="text-center">
                                 <div class="dropdown">
                                    <button class="btn btn-icon btn-xs btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="demo-pli-dot-horizontal"></i>
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                       <li><a class="dropdown-item" href="#">Action</a></li>
                                       <li><a class="dropdown-item" href="#">Another action</a></li>
                                       <li><a class="dropdown-item" href="#">Something else here</a></li>
                                       <li>
                                          <hr class="dropdown-divider">
                                       </li>
                                       <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <input class="form-check-input" type="checkbox">
                              </td>
                              <td>
                                 <div class="d-flex align-items-center position-relative">
                                    <div class="flex-shrink-0">
                                       <i class="demo-psi-folder fs-3 text-orange-400"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                       <a href="#" class="stretched-link text-reset btn-link">Downloads</a>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-center">Folder</td>
                              <td class="text-center">498 MB</td>
                              <td class="text-center">Today, 11:23AM</td>
                              <td class="text-center">
                                 <div class="dropdown">
                                    <button class="btn btn-icon btn-xs btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="demo-pli-dot-horizontal"></i>
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                       <li><a class="dropdown-item" href="#">Action</a></li>
                                       <li><a class="dropdown-item" href="#">Another action</a></li>
                                       <li><a class="dropdown-item" href="#">Something else here</a></li>
                                       <li>
                                          <hr class="dropdown-divider">
                                       </li>
                                       <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                 </div>
                              </td>
                           </tr>
                      
						
						</tbody>
                     </table>
                  </div>
                  <!-- END : Folder view -->
               </div>
               <!-- END : File manager content -->
            </div>
         </div>
      </div>
   </div>
</div>



@endsection