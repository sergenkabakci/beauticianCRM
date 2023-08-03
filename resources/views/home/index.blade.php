@extends('layouts.app-master')

@section('content')
            <div class="content__header content__boxed overlapping">
                <div class="content__wrap">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active"><a href="/">Kontrol Paneli</a></li>
                        </ol>
                    </nav>
                    <!-- END : Breadcrumb -->

                    <h1 class="page-title mb-0 mt-2">Kontrol Paneli</h1>


                </div>

            </div>

            <div class="content__boxed">
                <div class="content__wrap">
					
					<div class="row mt-3">
						<div class=" col-4">
							<div class="card text-center mb-4 ">
								<div class="card-header text-black">Hoş geldin {{Auth::user()->ad}} {{Auth::user()->soyad}}</div>
								<div class="card-body">

									<h5 class="card-title">Etkinlikler</h5>

									<button class="btn btn-primary" >Takvim</button>

								

								</div>
							</div>
						</div>
						
						<div class=" col-8">
							<div class="card">
                                <div class="card-body text-center">
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="flex-grow-1 text-center ms-3">
                                            <p class="text-muted">Önizleme</p>

                                            <!-- Social media statistics -->
                                            <div class="mt-4 pt-3 d-flex justify-content-around border-top">
                                                <div class="text-center">
                                                    <h4 class="mb-1">1,345</h4>
                                                    <small class="text-muted">Operasyon</small>
                                                </div>
                                                <div class="text-center">
                                                    <h4 class="mb-1">23k</h4>
                                                    <small class="text-muted">Hasta</small>
                                                </div>
                                                <div class="text-center">
                                                    <h4 class="mb-1">278</h4>
                                                    <small class="text-muted">Gider</small>
                                                </div>
												 <div class="text-center">
                                                    <h4 class="mb-1">278</h4>
                                                    <small class="text-muted">Gelir</small>
                                                </div>
                                            </div>
                                            <!-- END : Social media statistics -->
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					
					</div>
                
					
				

                </div>
            </div>
            
			
@endsection