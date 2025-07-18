<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Site Title -->
		@yield('title')

		<!-- Fav Icon -->
		<link rel="icon" href="{{ asset($general_setting->favicon) }}">

		<!--  Stylesheet -->
		<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/datatable/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/slick.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/nice-select.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/reset.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/enrollment.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/overview.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/dev.css') }}">
        <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

        <!-- School Theming -->
        @if(Auth::check() && Auth::user()->school)
        <style>
            :root {
                --school-primary-color: {{ Auth::user()->school->primary_color }};
                --school-secondary-color: {{ Auth::user()->school->secondary_color }};
            }
            
            /* Apply school colors to primary elements */
            .crancy-btn,
            .btn-primary {
                background-color: var(--school-primary-color) !important;
                border-color: var(--school-primary-color) !important;
            }
            
            .crancy-btn:hover,
            .btn-primary:hover {
                background-color: var(--school-primary-color) !important;
                border-color: var(--school-primary-color) !important;
                opacity: 0.9;
            }
            
            /* Sidebar active states */
            .crancy-menu-two .active > a {
                background: var(--school-primary-color) !important;
            }
        </style>
        @endif

        @stack('style_section')
	</head>
	<body id="crancy-dark-light">

		<div class="crancy-body-area ">
			<!-- crancy Admin Menu -->
			<div class="crancy-smenu" id="CrancyMenu">
				<!-- Admin Menu -->
				<div class="admin-menu">

					<!-- Logo -->
					<div class="logo crancy-sidebar-padding pd-right-0">
						<div class="crancy-logo">
                            @if(Auth::check() && Auth::user()->school && Auth::user()->school->logo)
                                <img src="{{ Auth::user()->school->logo_url }}" alt="{{ Auth::user()->school->name }}" style="max-height: 50px; max-width: 150px; object-fit: contain; width: auto; height: auto;">
                            @else
                                <img src="{{ asset($general_setting->logo) }}" alt="logo">
                            @endif
						</div>
						<div id="crancy__sicon" class="crancy__sicon close-icon">
					<span>
					<svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 1L1 6.00489L5 11.0098" stroke="#fff" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>

					</span>
						</div>
					</div>

					@include('student.sidebar')


				</div>
				<!-- End Admin Menu -->
			</div>
			<!-- End crancy Admin Menu -->

			<!-- Start Header -->
			<header class="crancy-header">
				<div class="container g-0">
					<div class="row g-0">
						<div class="col-12">
							<!-- Dashboard Header -->
							<div class="crancy-header__inner">
								<div class="crancy-header__middle">
									<div id="crancy__sicon" class="crancy__sicon close-icon d-none">
										<span>
										<svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L5 6.00489L1 11.0098" stroke="#BFCDFF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>

										</span>
									</div>

									<div class="crancy-header__heading">
                                        @yield('body-header')

									</div>


									<div class="crancy-header__right">
										<div class="crancy-header__group">
											<div class="crancy-header__group-two">
												<div class="crancy-header__right">

                                                    @php
                                                        $auth_user = Auth::guard('web')->user();
                                                    @endphp

													<!-- Header Option Group -->
													<div class="crancy-header__options">




														<!-- Header Nav -->
													</div>
													<!-- End Header Option Group-->

                                                    @php
                                                        $auth_user = Auth::guard('web')->user();
                                                    @endphp

													<!-- Header Author -->
													<div class="crancy-header__single">
														<a href="{{ route('student.edit-profile') }}"><div class="crancy-header__author-img">

															<img src="{{ $auth_user->image ? asset($auth_user->image) : asset($general_setting->default_avatar) }}" alt="#">

														</div></a>
														<!-- crancy Profile Hover -->

														<!-- Dropdown List -->
														<div class="crancy-dropdown crancy-dropdown--acount">
															<div class="crancy-dropdown__hover--inner">
																<ul class="crancy-dmenu">
																	<li>
																		<a href="{{ route('student.edit-profile') }}">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M12.1202 12.78C12.0502 12.77 11.9602 12.77 11.8802 12.78C10.1202 12.72 8.72021 11.28 8.72021 9.50998C8.72021 7.69998 10.1802 6.22998 12.0002 6.22998C13.8102 6.22998 15.2802 7.69998 15.2802 9.50998C15.2702 11.28 13.8802 12.72 12.1202 12.78Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																				<path d="M18.7398 19.3801C16.9598 21.0101 14.5998 22.0001 11.9998 22.0001C9.39977 22.0001 7.03977 21.0101 5.25977 19.3801C5.35977 18.4401 5.95977 17.5201 7.02977 16.8001C9.76977 14.9801 14.2498 14.9801 16.9698 16.8001C18.0398 17.5201 18.6398 18.4401 18.7398 19.3801Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																				<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																			</svg>
																			{{ __('translate.My Profile') }}
																		</a>
																	</li>


																	<li>
																		<a href="{{ route('student.logout') }}">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M15 10L13.7071 11.2929C13.3166 11.6834 13.3166 12.3166 13.7071 12.7071L15 14M14 12L22 12M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8" stroke-width="1.5" stroke-linecap="round"/>
																			</svg>
																			{{ __('translate.Logout') }}
																		</a>

																	</li>
																</ul>

															</div>
														</div>
														<!-- End Dropdown List -->
													</div>
													<!-- End Header Author -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header -->

            @yield('body-content')

		</div>

		<!--  Scripts -->
		<script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('global/datatable/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('global/datatable/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('backend/js/jquery-migrate.js') }}"></script>
		<script src="{{ asset('backend/js/popper.min.js') }}"></script>
		<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('backend/js/nice-select.min.js') }}"></script>

		<script src="{{ asset('backend/js/main.js') }}"></script>
        <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

        

        <script>
            (function($) {
                "use strict"
                $(document).ready(function () {

					const session_notify_message = @json(Session::get('message'));
					
					if(session_notify_message != null){
						const session_notify_type = @json(Session::get('alert-type', 'info'));
						switch (session_notify_type) {
							case 'info':
								toastr.info(session_notify_message);
								break;
							case 'success':
								toastr.success(session_notify_message);
								break;
							case 'warning':
								toastr.warning(session_notify_message);
								break;
							case 'error':
								toastr.error(session_notify_message);
								break;
						}
					}

					const validation_errors = @json($errors->all());
					
					if (validation_errors.length > 0) {
						validation_errors.forEach(error => toastr.error(error));
					}

                    $('#dataTable').DataTable({
                        "language": {
                            "decimal": "",
                            "emptyTable": "No hay datos disponibles en la tabla",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                            "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                            "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "No se encontraron registros coincidentes",
                            "paginate": {
                                "first": "Primero",
                                "last": "Último",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            },
                            "aria": {
                                "sortAscending": ": activar para ordenar la columna ascendente",
                                "sortDescending": ": activar para ordenar la columna descendente"
                            }
                        }
                    });

                    $(".switch_to_instructor").on("change", function(){
                        window.location = `{{ route('instructor.dashboard') }}`

                    })

                    $(".join_as_instructor").on("change", function(){
                        window.location = `{{ route('student.become-an-instructor') }}`

                    })


                });
            })(jQuery);

        </script>


        @stack('js_section')

	</body>
</html>

