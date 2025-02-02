{{-- Extends layout --}}
@extends('layouts.fullview')

{{-- CSS Section --}}
@section('innercss')
<link href="{{ asset('assets/css/intlTelInput.min.css') }}" rel="stylesheet" type="text/css" />

<style>
	.div1 {
		width: 240px;
		height: 75px;
		padding: 10px;
		border: 1px solid black;
		background-color: #F5F5F5;
	}
	p {
		font-size:20px;
		font-weight:bold;
	}
	.gfg {
		font-size:40px;
		color:#009900;
		font-weight:bold;
	}
</style>
@endsection

@section('content')
<div class="container-fluid p-0">
	<div class="my-custom-body-wrapper">

		<form method="POST" id="saveConsultationForm" action="{{ route('saveConsultationFormDetails') }}">
			@csrf
			
			<input type="hidden" name="country_code" id="country_code" value="1">
			<input type="hidden" name="total_section" id="total_section" value="0">
		
			<div class="my-custom-header">
				<div class="p-4 d-flex justify-content-between align-items-center border-bottom">
					<span class="d-flex">
						<p class="cursor-pointer m-0 px-6" onclick="history.back();"><i class="text-dark fa fa-times icon-lg"></i></p>
						<p class="cursor-pointer text-blue previous" onclick="nextPrev(-1)"><i class="border-left mx-4"></i>Previous</p>
					</span>
					<span class="text-center">
						<p class="m-0">steps <span class="steps">1</span> of 2</p>
						<h1 class="font-weight-bolder main-title">Add sections to your consultation form</h1>
					</span>
					<button class="btn btn-primary next-step detailsFormBtn" onclick="nextPrev(1)" disabled type="button" id="submitConsultationFormBtn">Next Step</button>
				</div>
			</div>
		
			<div class="my-custom-body">
				<div class="container-fluid">
					<div class="add-voucher-tab">
						<div class="row">
							<div class="col-12 col-md-2 p-0 border-right" style="height: calc(100vh - 90px);overflow-y: scroll;overflow-x: hidden;">
								<div class="">
									<h3 class="font-weight-bolder text-uppercase my-3">Sections</h3>
									<div class="card shadow-sm w-50 mx-auto mb-4 cursor-pointer"  data-toggle="modal" data-target="#addClientDetailModal" modal_id="addClientDetailModal" ondragstart="dragStartCustom(event)" draggable="true">
										<div class="card-body px-4 py-6">
											<div class="mx-auto" style="height: 32px;width: 32px;">
												<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
													<path
														d="M16 3.872a2.743 2.743 0 012.737 2.737v2.48h6.741a2.65 2.65 0 012.645 2.483l.005.167v13.74a2.65 2.65 0 01-2.482 2.644l-.168.005H6.522a2.65 2.65 0 01-2.645-2.482l-.005-.168V11.74a2.65 2.65 0 012.482-2.645l.168-.005h6.74l.001-2.48a2.747 2.747 0 012.393-2.714l.172-.018zm-2.737 6.517H6.522a1.35 1.35 0 00-1.344 1.22l-.006.13v13.74a1.35 1.35 0 001.22 1.343l.13.006h18.956a1.35 1.35 0 001.344-1.22l.006-.13V11.74a1.35 1.35 0 00-1.22-1.344l-.13-.006h-6.741v2.087h-5.474V10.39zm.694 4.961c.91 0 1.65.739 1.65 1.65v4.26a1.65 1.65 0 01-1.65 1.65H9.696a1.65 1.65 0 01-1.65-1.65V17c0-.911.738-1.65 1.65-1.65zm9.347 5.217a.65.65 0 01.096 1.293l-.096.007H19.13a.65.65 0 01-.096-1.293l.096-.007h4.174zm-9.347-3.917H9.696a.35.35 0 00-.35.35v4.26c0 .194.156.35.35.35h4.26a.35.35 0 00.35-.35V17a.35.35 0 00-.35-.35zm9.347-.257a.65.65 0 01.096 1.293l-.096.007H19.13a.65.65 0 01-.096-1.292l.096-.008h4.174zM16.01 5.171l-.111.004a1.444 1.444 0 00-1.335 1.434v4.567h2.873l.001-4.567c0-.743-.574-1.36-1.3-1.43l-.128-.008z">
													</path>
												</svg>
											</div>
											<p class="font-weight-bolder text-center m-0" style="font-size:14px">Client details</p>
										</div>
									</div>
									<hr>
									<!--  ondrag="draggingCustom(event)" -->
									<div  class="card shadow-sm w-50 mx-auto mb-4 cursor-pointer" data-toggle="modal" data-target="#addCustomSectionModal" modal_id="addCustomSectionModal" ondragstart="dragStartCustom(event)" draggable="true" id="dragDragCustom" >
										<div class="card-body px-4 py-6">
											<div class="mx-auto" style="height: 32px;width: 32px;">
												<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
													<path d="M16 3l4.326 8.56L30 12.93l-7 6.662L24.652 29 16 24.558 7.348 29 9 19.593l-7-6.662 9.674-1.372L16 3zm3.472 9.751L16 5.882l-3.472 6.869-7.686 1.09 5.559 5.291L9.08 26.65 16 23.096l6.919 3.553-1.32-7.517 5.558-5.291-7.685-1.09z">
													</path>
												</svg>
											</div>
											<p class="font-weight-bolder text-center m-0" style="font-size:14px">Custom Section</p>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-12 col-md-10 bg-content"  style="height: calc(100vh - 90px);overflow-y: scroll;overflow-x: hidden;">
								
								<!-- default view of add section div --> 
								
								<div class="defaultView">
									<div class="card w-50 mx-auto my-6 checkClientSection" data-toggle="modal" data-target="#addNewSectionModal" ondragover="allowDropCustom(event)">
										<div class="rounded cursor-pointer" ondrop="dragDropCustom(event)" style="background-color: #e5f1ff;border: 1px solid #037aff !important;">
											<div class="mx-auto my-10" style="width: 200px;">
												<img alt="drag-img" src="{{ asset('./assets/images/drag.png') }}" width="100%" />
											</div>
											<h2 class="text-center font-weight-bolder">Add your first section</h2>
											<h6 class="text-center mb-4">Drag and drop or <span class="text-blue">click here</span> to add a section</h6>
										</div>
									</div>
									<div class="card w-50 mx-auto my-6 customSection" id="customFormSection"></div>
									<div class="card w-50 mx-auto my-6 customSection" id="clientFormSection"></div>
								</div>
								
								<!-- form and preview started here -->
								
								<div class="afterView" style="display:none;">
									<ul class="nav nav-pills round-nav mx-auto" id="myTab1" role="tablist" style="width:240px">
										<li class="nav-item font-weight-bolder">
											<a class="nav-link active" id="builder-tab-1" data-toggle="tab" href="#builder">
											<span class="nav-text">Builder</span>
											</a>
										</li>
										<li class="nav-item font-weight-bolder">
											<a class="nav-link" id="preview-tab-1" data-toggle="tab" href="#preview" aria-controls="preview">
											<span class="nav-text">Preview</span>
											</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent1">
										<div class="tab-pane fade active show" id="builder" role="tabpanel" aria-labelledby="builder-tab-1">
										
											<div class="appendTheContentHere">
												
											</div>
										
											<div class="card w-70 mx-auto my-6 checkClientSection" ondragover="allowDropCustom(event)" ondrop="dragDropCustom(event)" data-toggle="modal" data-target="#addNewSectionModal">
												<div class="rounded cursor-pointer py-2" style="background-color: #e5f1ff;border: 1px solid #037aff !important;">
													<h6 class="text-center font-weight-bolder">Drag and drop or <span class="text-blue">click here</span> to add a section </h6>
												</div>
											</div>
											
										</div>
										<div class="tab-pane fade" id="preview" role="tabpanel" aria-labelledby="preview-tab-1">
											<div class="card w-50 mx-auto my-4">
												<div class="card-header text-center">
													<h6 class="mb-4 badge badge-secondary">CONSULTATION FORM PREVIEW </h6>
													<h6>step <span class="preview-current-steps">1</span> of <span class="total-preview-tab">1</span></h6>
													<h3 class="font-weight-bolder showSectionTitleName">Title</h3>
													<h6 class="showSectionDescriptionText">Description</h6>
												</div>
												
												<div class="sectionTabDiv">
														
												</div>
												
												<!--div class="preview-tab">
													<div class="card-body">
														<div class="form-group">
															<label class="font-weight-bolder">First name</label>
															<input type="text" class="form-control" name="fname">
														</div>
														<div class="form-group">
															<label class="font-weight-bolder">Last name</label>
															<input type="text" class="form-control" name="lname">
														</div>
														<div class="form-group">
															<label class="font-weight-bolder">Email</label>
															<input type="email" class="form-control" name="email">
														</div>
														<div class="form-group">
															<label class="font-weight-bolder">Mobile Number</label>
															<input type="text" class="form-control" name="phone">
														</div>
														<div class="form-group">
															<label class="font-weight-bolder">Address</label>
															<textarea rows="4" class="form-control" name="address"></textarea>
														</div>
													</div>
												</div>
												<div class="preview-tab">
													<div class="card-body">
														<div class="form-group">
															<label class="font-weight-bolder">New Question</label>
															<input type="text" class="form-control" name="question">
														</div>
													</div>
												</div-->
												<div class="card-footer text-right">
													<button class="preview-next btn btn-primary" onclick="nextPrevPreview(1)" type="button">Next Step</button>
													<button class="preview-previous btn btn-white" onclick="nextPrevPreview(-1)" type="button">Previous Step</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Final Form submission step -->
					
					<div class="add-voucher-tab">
						<div class="row">
							<div class="col-12 col-md-4 border-right" style="height: calc(100vh - 90px);overflow-y: scroll;overflow-x: hidden;">
								<h2 class="font-weight-bolder my-3">Consultation form details</h2>
								<div class="form-group">
									<label class="font-weight-bolder">Consultation form name</label>
									<input type="text" class="form-control" id="consultation_form_name" name="consultation_form_name">
								</div>
								<hr>
								<h3 class="font-weight-bolder">Complete consultation form</h3>
								<div class="form-group">
									<div class="form-group ml-2 w-100 d-flex extra-time">
										<label class="option m-3">
											<span class="option-control">
												<span class="radio">
													<input type="radio" name="consultation_form_type" value="0" checked="checked">
													<span></span>
												</span>
											</span>
											<span class="option-label">
												<span class="option-head">
													<span class="option-title">Before appointment</span>
												</span>
												<span class="option-body text-dark">
													Automatically send to clients to fill out before their appointment.
												</span>
											</span>
										</label>
										<!--label class="option m-3">
											<span class="option-control">
												<span class="radio">
													<input type="radio" disabled name="status" value="manually">
													<span></span>
												</span>
											</span>
											<span class="option-label">
												<span class="option-head">
												<span class="option-title"> Manually <span class="badge badge-success">Soon</span></span>
												</span>
												<span class="option-body text-dark">
													You decide when to send to your clients.
												</span>
											</span>
										</label-->
									</div>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder">Ask clients to complete</label>
									<select class="form-control" name="consultation_form_when">
										<option value="0">Every time they book an appointment </option>
										<option value="1">Only once</option>
									</select>
								</div>
								<div class="form-group" style="position: relative;">
									<label class="font-weight-bolder">Ask clients to complete when booking</label>
									<input type="text" id="serviceInput" readonly="" class="form-control form-control-lg" placeholder="All services" data-toggle="modal" data-target="#servicesModal" style="cursor: pointer;">
									
									<input type="hidden" id="selectedServices" name="selectedServices">
									
									<a href="" class="chng_popup" data-toggle="modal" data-target="#servicesModal">
										Edit
									</a>
								</div>
								<hr>
								<h3 class="font-weight-bolder">Signature</h3>
								<div class="form-group mb-0">
									<div class="switch switch-md switch-icon switch-success" style="line-height: 28px;">
										<label class="d-flex align-item-center font-weight-bolder">
											<input type="checkbox" checked="checked" name="consultation_form_is_signature">
											<span></span>&nbsp; Require client signatures
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-8 p-4" style="height: calc(100vh - 90px);overflow-y: scroll;overflow-x: hidden;">
								<div class="card w-70 mx-auto">
									<div class="card-header text-center">
										<h6 class="mb-4 badge badge-secondary">CONSULTATION FORM PREVIEW</h6>
										<h6>step <span class="forms-current-steps">1</span> of <span class="total-forms-tab">1</span></h6>
										<h3 class="font-weight-bolder showSectionTitleNameForm">Title</h3>
										<h6 class="showSectionDescriptionTextForm">Description</h6>
									</div>
									
									<div class="sectionTabDivForm">
									</div>
									
									<div class="card-footer text-right">
										<button class="forms-next btn btn-primary" onclick="nextPrevForms(1)" type="button">Next Step</button>
										<button class="forms-previous btn btn-white" onclick="nextPrevForms(-1)" type="button">Previous Step</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNewSectionModal" tabindex="-1" role="dialog" aria-labelledby="addNewSectionModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addNewSectionModalLabel">Add a section</h5>
				<p class="cursor-pointer m-0 px-6" data-dismiss="modal" aria-label="Close"><i class="text-dark fa fa-times icon-lg"></i>
				</p>
			</div>
			<div class="modal-body">
				<p>Add a standard section or start from scratch with a custom section.</p>
				<h6 class="font-weight-bolder text-uppercase">STANDARD SECTION</h6>
				<div>
					<ul class="ks-cboxtags ">
						<li>
							<input type="radio" name="section" id="clientSectionRadio" value="client-section">
							<label class="text-center" for="clientSectionRadio">
								<div class="m-auto" style="width: 50px;height: 50px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M16 3.872a2.743 2.743 0 012.737 2.737v2.48h6.741a2.65 2.65 0 012.645 2.483l.005.167v13.74a2.65 2.65 0 01-2.482 2.644l-.168.005H6.522a2.65 2.65 0 01-2.645-2.482l-.005-.168V11.74a2.65 2.65 0 012.482-2.645l.168-.005h6.74l.001-2.48a2.747 2.747 0 012.393-2.714l.172-.018zm-2.737 6.517H6.522a1.35 1.35 0 00-1.344 1.22l-.006.13v13.74a1.35 1.35 0 001.22 1.343l.13.006h18.956a1.35 1.35 0 001.344-1.22l.006-.13V11.74a1.35 1.35 0 00-1.22-1.344l-.13-.006h-6.741v2.087h-5.474V10.39zm.694 4.961c.91 0 1.65.739 1.65 1.65v4.26a1.65 1.65 0 01-1.65 1.65H9.696a1.65 1.65 0 01-1.65-1.65V17c0-.911.738-1.65 1.65-1.65zm9.347 5.217a.65.65 0 01.096 1.293l-.096.007H19.13a.65.65 0 01-.096-1.293l.096-.007h4.174zm-9.347-3.917H9.696a.35.35 0 00-.35.35v4.26c0 .194.156.35.35.35h4.26a.35.35 0 00.35-.35V17a.35.35 0 00-.35-.35zm9.347-.257a.65.65 0 01.096 1.293l-.096.007H19.13a.65.65 0 01-.096-1.292l.096-.008h4.174zM16.01 5.171l-.111.004a1.444 1.444 0 00-1.335 1.434v4.567h2.873l.001-4.567c0-.743-.574-1.36-1.3-1.43l-.128-.008z">
										</path>
									</svg>
								</div>
								clients details
							</label>
						</li>
						<!--li>
							<input type="radio" name="section" disabled id="medical" value="medical">
							<label class="text-center" for="medical">
								<span class="badge badge-info px-2 py-1" style="position: absolute;top:0;right:0">soon</span>
								<div class="m-auto" style="width: 50px;height: 50px;">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path
											d="M51.1 62.5H36.6c-1.1 0-2.3-.9-2.5-2-.5-2.5-.2-5.5.8-8.9 0-.1 0-.1.1-.2.8-2.7 2.1-5.6 3.8-8.9l-.2-2.2c-.3-3.6-.7-7.1-1-10.4-.1-1.4.7-2.7 1.9-3.3 2.7-1.2 5.8-1.2 8.6 0 1.3.6 2.1 1.9 1.9 3.3-.3 3.2-.6 6.5-.9 9.9l-.3 2.8c1.7 3.2 2.9 6 3.8 8.6.1.2.2.3.2.6v.1c1 3.3 1.2 6.1.8 8.6-.2 1-1.4 2-2.5 2zm-14.6-9.8c-.8 2.9-1 5.3-.6 7.5 0 .2.5.5.8.5h14.5c.3 0 .7-.3.8-.5.4-2.1.2-4.6-.6-7.4H36.5zm.6-1.8h13.6c-.8-2.3-2-4.9-3.5-7.7-.1-.2-.1-.4-.1-.6l.3-2.9c.3-3.4.6-6.7.9-9.9.1-.6-.3-1.2-.9-1.5-2.3-1-4.8-1-7.1 0-.6.3-.9.9-.9 1.5.3 3.3.6 6.8 1 10.4l.2 1.7h3.3c.5 0 .9.4.9.9s-.4.9-.9.9h-3.6c-1.4 2.6-2.5 5-3.2 7.2zm-8.6 11.6c-.5 0-.9-.4-.9-.9V37c0-1.8-.6-3.5-1.7-4.9-.6-.8-1.4-1.4-2.2-1.9-.4-.2-.6-.8-.3-1.2.2-.4.8-.6 1.2-.3 1 .6 1.9 1.4 2.7 2.3 1.4 1.7 2.1 3.9 2.1 6.1v24.6c0 .4-.4.8-.9.8zm-17.6 0c-.5 0-.9-.4-.9-.9V37c0-2.2.8-4.4 2.1-6.1.6-.8 1.4-1.5 2.2-2v-2.4c0-1.6.7-3.2 2.1-4.2.4-.3 1-.2 1.3.2.3.4.2 1-.2 1.3-.9.7-1.4 1.7-1.4 2.8V38c0 .4.4.8.8.8h5.4c.4 0 .8-.4.8-.8v-5.8c0-.5.4-.9.9-.9s.9.4.9.9V38c0 1.4-1.2 2.6-2.6 2.6H17c-1.4 0-2.6-1.2-2.6-2.6v-6.8c-.3.3-.6.6-.8.9-1.1 1.4-1.7 3.1-1.7 4.9v24.6c-.1.5-.5.9-1 .9zm11.3-33.1c-.2 0-.5-.1-.6-.3-.4-.4-.4-.9 0-1.3l2-2c.7-.7.7-1.7 0-2.4-.3-.3-.7-.5-1.2-.5-.4 0-.9.2-1.2.5l-2 2c-.4.4-.9.4-1.3 0s-.4-.9 0-1.3l2-2c.7-.7 1.5-1 2.5-1 .6 0 1.2.2 1.7.5l6.3-6.3-2.6-2.6c-.4-.4-.4-.9 0-1.3l6.8-6.8c1-1 2.4-1.6 3.9-1.6s2.8.6 3.8 1.6c2.1 2.1 2.1 5.5 0 7.7l-6.8 6.8c-.2.2-.4.3-.6.3-.2 0-.5-.1-.6-.3l-2.6-2.6-6.3 6.5c.3.5.5 1.1.5 1.7 0 .9-.4 1.8-1 2.5l-2 2c-.2.1-.5.2-.7.2zm7.5-17.2l5.2 5.2 6.1-6.1c1.4-1.4 1.4-3.7 0-5.1-.7-.8-1.6-1.2-2.6-1.2s-1.9.4-2.6 1.1l-6.1 6.1zm-9.3 15.4c-.2 0-.5-.1-.6-.3-.4-.4-.4-.9 0-1.3l1.9-1.9c.4-.4.9-.4 1.3 0s.4.9 0 1.3l-2 1.9c-.1.2-.4.3-.6.3z">
										</path>
									</svg>
								</div>
								Medical history
							</label>
						</li>
						<li>
							<input type="radio" name="section" disabled id="marketing" value="marketing" checked="">
							<label class="text-center" for="marketing">
								<span class="badge badge-info px-2 py-1" style="position: absolute;top:0;right:0">soon
								</span>
								<div class="m-auto" style="width: 50px;height: 50px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M13.495 19.673l.055.09 2.459 4.937c.59 1.194-.112 2.527-1.472 2.97-1.24.403-2.651-.047-3.26-1.064l-.077-.142-3.074-6.119a.65.65 0 011.107-.674l.055.09 3.074 6.12c.253.509 1.058.786 1.773.554.608-.199.884-.66.745-1.07l-.036-.087-2.458-4.935a.65.65 0 011.109-.67zM23.279 4v18.19l-8.483-4.135h-6.17c-2.485 0-4.514-2.102-4.621-4.74L4 13.096l.005-.221c.104-2.562 2.021-4.62 4.41-4.735l.212-.005h6.17L23.278 4zm-1.301 2.079l-6.882 3.355h-6.47c-1.7 0-3.14 1.422-3.309 3.267l-.013.2-.004.194c0 1.973 1.411 3.552 3.146 3.655l.18.005h6.47l6.882 3.354V6.079zm3.229 4.299c1.434 0 2.577 1.226 2.577 2.717 0 1.49-1.143 2.717-2.577 2.717a.65.65 0 01-.096-1.293l.096-.007c.695 0 1.277-.625 1.277-1.417 0-.746-.516-1.343-1.156-1.41l-.121-.007a.65.65 0 110-1.3z">
										</path>
									</svg>
								</div>
								Marketing preferences
							</label>
						</li>
						<hr-->
						<li>
							<input type="radio" name="section" id="custom-section" value="custom-section" checked="">
							<label class="text-center" for="custom-section">
								<div class="m-auto" style="width: 50px;height: 50px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M16 3l4.326 8.56L30 12.93l-7 6.662L24.652 29 16 24.558 7.348 29 9 19.593l-7-6.662 9.674-1.372L16 3zm3.472 9.751L16 5.882l-3.472 6.869-7.686 1.09 5.559 5.291L9.08 26.65 16 23.096l6.919 3.553-1.32-7.517 5.558-5.291-7.685-1.09z">
										</path>
									</svg>
								</div>
								Custom Section
							</label>
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="addCustomSectionBtn">Add Section</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addNewQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addNewQuestionModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addNewQuestionModalLabel">Select an answer type or item</h5>
				<p class="cursor-pointer m-0 px-2" data-dismiss="modal" aria-label="Close"><i class="text-dark fa fa-times icon-lg"></i></p>
			</div>
			<div class="modal-body">
				<h6 class="font-weight-bolder text-uppercase">ANSWER TYPES</h6>
				
				<input type="hidden" name="new_unique_id" id="new_unique_id">
				<input type="hidden" name="new_section_id" id="new_section_id">
				
				<div>
					<ul class="ks-cboxtags question">
						<li>
							<input type="radio" name="newQuestionType" id="short-ans" value="shortAnswer" checked>
							<label class="text-center" for="short-ans">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M17 18.85a.65.65 0 01.096 1.293L17 20.15H6a.65.65 0 01-.096-1.293L6 18.85h11zm9-6a.65.65 0 01.096 1.293L26 14.15H6a.65.65 0 01-.096-1.293L6 12.85h20z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Short Answer
							</label>
						</li>
						<li>
							<input type="radio" name="newQuestionType" id="long-ans" value="longAnswer">
							<label class="text-center" for="long-ans">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M15 24.85a.65.65 0 01.096 1.293L15 26.15H6a.65.65 0 01-.096-1.293L6 24.85h9zm11-6a.65.65 0 01.096 1.293L26 20.15H6a.65.65 0 01-.096-1.293L6 18.85h20zm-11-6a.65.65 0 01.096 1.293L15 14.15H6a.65.65 0 01-.096-1.293L6 12.85h9zm11-6a.65.65 0 01.096 1.293L26 8.15H6a.65.65 0 01-.096-1.293L6 6.85h20z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Long Answer
							</label>
						</li>
						<li>
							<input type="radio" name="newQuestionType" id="single-ans" value="singleAnswer">
							<label class="text-center" for="single-ans">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M16 4.35c6.434 0 11.65 5.216 11.65 11.65S22.434 27.65 16 27.65 4.35 22.434 4.35 16 9.566 4.35 16 4.35zm0 1.3C10.284 5.65 5.65 10.284 5.65 16c0 5.716 4.634 10.35 10.35 10.35 5.716 0 10.35-4.634 10.35-10.35 0-5.716-4.634-10.35-10.35-10.35zm0 5.7a4.65 4.65 0 110 9.3 4.65 4.65 0 010-9.3zm0 1.3a3.35 3.35 0 100 6.7 3.35 3.35 0 000-6.7z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Single Answer
							</label>
						</li>
						<li>
							<input type="radio" name="newQuestionType" id="single-checkbox" value="singleCheckbox">
							<label class="text-center" for="single-checkbox">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M24 4.35A3.65 3.65 0 0127.65 8v16A3.65 3.65 0 0124 27.65H8A3.65 3.65 0 014.35 24V8A3.65 3.65 0 018 4.35zm0 1.3H8A2.35 2.35 0 005.65 8v16A2.35 2.35 0 008 26.35h16A2.35 2.35 0 0026.35 24V8A2.35 2.35 0 0024 5.65zm-2.565 6.867a.65.65 0 01.112.834l-.064.084-6.726 7.473-3.182-2.75a.65.65 0 01.765-1.046l.085.063 2.218 1.916 5.874-6.526a.65.65 0 01.918-.048z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Single checkbox
							</label>
						</li>
						<li>
							<input type="radio" name="newQuestionType" id="multi-choice" value="multipleCheckbox">
							<label class="text-center" for="multi-choice">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M6.5 22.35a3.15 3.15 0 110 6.3 3.15 3.15 0 010-6.3zm0 1.3a1.85 1.85 0 100 3.7 1.85 1.85 0 000-3.7zm18.148 1.7a.65.65 0 01.096 1.293l-.096.007H14.054a.65.65 0 01-.096-1.293l.096-.007h10.594zM9.428 13.01a.65.65 0 01.124.833l-.063.085-3.931 4.493-1.99-1.769a.65.65 0 01.78-1.035l.084.064 1.009.897 3.07-3.506a.65.65 0 01.917-.061zm11.367 2.34a.65.65 0 01.096 1.293l-.096.007h-6.741a.65.65 0 01-.096-1.293l.096-.007h6.741zM9.428 3.51a.65.65 0 01.124.833l-.063.085-3.931 4.493-1.99-1.769a.65.65 0 01.78-1.035l.084.064 1.009.897 3.07-3.506a.65.65 0 01.917-.061zM28.5 5.85a.65.65 0 01.096 1.293l-.096.007H14.054a.65.65 0 01-.096-1.293l.096-.007H28.5z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Multiple Choise
							</label>
						</li>
						<li>
							<input type="radio" name="newQuestionType" id="drop-down" value="dropdown">
							<label class="text-center" for="drop-down">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M29 6a3 3 0 013 3v14a3 3 0 01-3 3H3a3 3 0 01-3-3V9a3 3 0 013-3h26zm0 1.3H3a1.7 1.7 0 00-1.694 1.553L1.3 9v14a1.7 1.7 0 001.553 1.694L3 24.7h26a1.7 1.7 0 001.694-1.553L30.7 23V9a1.7 1.7 0 00-1.553-1.694L29 7.3zm-1.492 7.294a.65.65 0 01-.025.841l-.077.073L22 19.832l-5.406-4.324a.65.65 0 01.724-1.075l.088.06L22 18.166l4.594-3.675a.65.65 0 01.914.102z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Drop Down
							</label>
						</li>
						<li>
							<input type="radio" name="newQuestionType" id="yesorno" value="yesOrNo">
							<label class="text-center" for="yesorno">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M16 4.35c6.434 0 11.65 5.216 11.65 11.65S22.434 27.65 16 27.65 4.35 22.434 4.35 16 9.566 4.35 16 4.35zm0 1.3C10.284 5.65 5.65 10.284 5.65 16c0 5.716 4.634 10.35 10.35 10.35z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Yes or No
							</label>
						</li>
					</ul>
				</div>
				<hr>
				<h6 class="font-weight-bolder text-uppercase">ITEMS</h6>
				<div>
					<ul class="ks-cboxtags question">
						<li>
							<input type="radio" name="newQuestionType" id="description-text" value="des">
							<label class="text-center" for="description-text">
								<div class="m-auto" style="width: 30px;height: 30px;">
									<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M6.492 22.845a.68.68 0 00.646-.444l1.333-3.343h6.395l1.333 3.343a.774.774 0 00.239.319.655.655 0 00.417.125h1.492L12.648 9h-1.95L5 22.845h1.492zm7.837-5.14H9.01l2.237-5.623c.146-.348.288-.782.428-1.304a12.556 12.556 0 00.417 1.294l2.238 5.633zM21.888 23c.384 0 .734-.034 1.05-.101a4.41 4.41 0 001.685-.754 9.81 9.81 0 00.776-.633l.199.928c.053.16.126.269.218.323.093.055.226.082.398.082H27v-6.26a4.74 4.74 0 00-.229-1.508 3.169 3.169 0 00-.676-1.169 3.081 3.081 0 00-1.104-.753c-.438-.18-.938-.27-1.502-.27-.782 0-1.495.128-2.138.386a5.768 5.768 0 00-1.8 1.169l.318.55c.06.09.133.166.219.227a.519.519 0 00.308.092.819.819 0 00.462-.16c.156-.106.342-.225.557-.357.216-.132.471-.25.766-.357.295-.106.662-.16 1.1-.16.65 0 1.143.195 1.481.585.338.39.507.964.507 1.725v.763c-1.147.026-2.115.127-2.904.304-.789.177-1.429.404-1.92.681-.49.277-.845.595-1.063.952-.22.358-.329.73-.329 1.116 0 .444.075.83.224 1.155.15.325.352.594.607.806.255.213.555.372.9.479.345.106.713.159 1.104.159zm.527-1.208c-.232 0-.45-.027-.651-.082a1.433 1.433 0 01-.528-.26 1.243 1.243 0 01-.353-.46 1.58 1.58 0 01-.129-.666c0-.27.081-.516.244-.735.162-.219.424-.409.785-.57.362-.16.83-.291 1.403-.391.573-.1 1.268-.163 2.083-.188v2.029c-.198.206-.402.39-.611.55-.21.161-.428.3-.657.416a3.282 3.282 0 01-.73.265 3.716 3.716 0 01-.856.092z"
											fill="#101928" fill-rule="evenodd"></path>
									</svg>
								</div>
								Description Text
							</label>
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="addQuestionType">Add</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addCustomSectionModal" tabindex="-1" role="dialog" aria-labelledby="addCustomSectionModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addCustomSectionModalLabel">Add a custom section</h5>
				<p class="cursor-pointer m-0 px-2" data-dismiss="modal" aria-label="Close"><i class="text-dark fa fa-times icon-lg"></i></p>
			</div>
			<form id="addSubSectionForm" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label class="font-weight-bolder">Section title</label>
						<input type="text" name="subSectionTitle" id="subSectionTitle" placeholder="add title" class="form-control">
					</div>
					<div class="form-group">
						<label class="font-weight-bolder">Section description <span class="text-muted">(Optional)</span></label>
						<input type="text" name="subSectionDescription" id="subSectionDescription" placeholder="add description" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="addSubSectionBtn">Add Section</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editCustomSectionModal" tabindex="-1" role="dialog" aria-labelledby="editCustomSectionModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addCustomSectionModalLabel">Edit a custom section</h5>
				<p class="cursor-pointer m-0 px-2" data-dismiss="modal" aria-label="Close"><i class="text-dark fa fa-times icon-lg"></i></p>
			</div>
			<form id="editSubSectionForm" method="POST">
			
				<input type="hidden" name="divUniqueId" id="divUniqueId">
				
				<div class="modal-body">
					<div class="form-group">
						<label class="font-weight-bolder">Section title</label>
						<input type="text" name="eidtSubSectionTitle" id="eidtSubSectionTitle" placeholder="add title" class="form-control">
					</div>
					<div class="form-group">
						<label class="font-weight-bolder">Section description <span class="text-muted">(Optional)</span></label>
						<input type="text" name="editSubSectionDescription" id="editSubSectionDescription" placeholder="add description" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="editSubSectionBtn">Edit Section</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="addClientDetailModal" tabindex="-1" role="dialog" aria-labelledby="addClientDetailModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addClientDetailModalLabel">Add a client details section</h5>
				<p class="cursor-pointer m-0 px-2" data-dismiss="modal" aria-label="Close"><i class="text-dark fa fa-times icon-lg"></i></p>
			</div>
			
			<form id="addClientSectionForm" method="POST">
			
				<input type="hidden" name="clientUniqueDivID" id="clientUniqueDivID" >
			
				<div class="modal-body">
					<div class="form-group">
						<label class="font-weight-bolder">Section title</label>
						<input type="text" placeholder="add title" class="form-control" name="addClientSectionTitle" id="addClientSectionTitle">
					</div>
					<div class="form-group">
						<label class="font-weight-bolder">Section description <span class="text-muted">(Optional)</span></label>
						<input type="text" placeholder="add description" class=" form-control" name="addClientSectionDescription" id="addClientSectionDescription">
					</div>
					<hr>
					<h3 class="font-weight-bolder">Client details fields</h3>
					<p>Choose the information you’d like your clients to provide.</p>
					<div class="">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionFirstName" name="clientDetailFields[]" type="checkbox">
											<span></span> First Name
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionLastName" name="clientDetailFields[]" type="checkbox">
											<span></span> Last Name
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionEmail" name="clientDetailFields[]" type="checkbox">
											<span></span> Email
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionBirthday" name="clientDetailFields[]" type="checkbox">
											<span></span> Birthday
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionMobileNumber" name="clientDetailFields[]" type="checkbox">
											<span></span> Mobile Number
										</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionGender" name="clientDetailFields[]" type="checkbox">
											<span></span> Gender
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-6">
								<div class="form-group">
									<div class="checkbox-list">
										<label class="checkbox font-weight-bolder">
											<input checked="" id="clientSectionAddress" name="clientDetailFields[]" type="checkbox">
											<span></span> Address
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="addClientSectionBtn">Add Section</button>
				</div>
			</form>
			
			<input type="hidden" name="utilScript" id="utilScript" value="{{ asset('js/utils.js') }}"> 
		</div>
	</div>
</div>

<div class="modal" id="servicesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header d-flex justify-content-between">
				<h4 class="modal-title">Select services</h4>
				<button type="button" class="text-dark close" data-dismiss="modal">×</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<div class="input-icon input-icon-right">
						<input type="text" class="rounded-0 form-control searchForCategory" placeholder="Scan barcode or search any item">
						<span>
						<i class="flaticon2-search-1 icon-md"></i>
						</span>
					</div>
				</div>
				<hr class="m-0">
				<div class="multicheckbox">
					<ul id="treeview">
						<li>
							<label for="all" class="checkbox allService">
								<input type="checkbox" name="all" id="all" checked>
								<span></span>
								All Services
							</label>
							<ul>
								@foreach($Services as $serviceKey => $serviceValue)
									<li>
										<label for="all-{{ $serviceValue['category_title'] }}" class="checkbox">
											<input type="checkbox" id="all-{{ $serviceValue['category_title'] }}" checked>
											<span></span>
											{{ $serviceValue['category_title'] }}
										</label>
										<ul>
											@foreach ($serviceValue['service'] as $serviceData)
												@foreach ($serviceData['service_price'] as $priceKey => $servicePrice)
													<li>
														<label for="all-{{ $serviceValue['category_title'] }}-{{ $serviceData['id'] }}-{{ $priceKey }}" class="checkbox">
															<input class="servicePriceIds" type="checkbox" name="value_checkbox[]" id="all-{{ $serviceValue['category_title'] }}-{{ $serviceData['id'] }}-{{ $priceKey }}" value="{{ $serviceData['id'] }}" checked>
															<span></span>
															<div class="d-flex align-items-center w-100">
																<span class="m-0">
																	<?php
																	$totalMinutes = $servicePrice['duration'];
																	$hours = intval($totalMinutes/60);
																	$minutes = $totalMinutes - ($hours * 60);
																	$duration = $hours."h ".$minutes."min";
																	?>
																	{{ $serviceData['service_name'] }}
																	<p class="m-0 text-muted">p{{ $priceKey + 1 }},{{ $duration }}</p>
																</span>
																<span class="ml-auto">
																	CA ${{ $servicePrice['price'] }}
																</span>
															</div>
														</label>
													</li>
												@endforeach
											@endforeach
										</ul>
									</li>	
								@endforeach
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary selectedServices" data-dismiss="modal">Select Services</button>
			</div>
		</div>
	</div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/js/hummingbird-treeview-1.3.js') }}"></script>
<script src="{{ asset('js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('js/saveConsultationForm.js') }}"></script>
 <!-- Drag and Drop -->
<script>
	window.draggedModal = '';
	function dragStartCustom(event) {
		window.draggedModal = event.target.attributes.modal_id.value;
		// event.dataTransfer.setData('text', event.target.attributes.modal_id.value);
	}

	function draggingCustom(event) {
		document.getElementById("test").innerHTML = "The p element is being dragged";
	}

	function allowDropCustom(event) {
		event.preventDefault();
	}

	function dragDropCustom(event) {
		console.log(event.target);
		if(window.draggedModal != '') {
			$('#'+window.draggedModal).modal('show');
			window.draggedModal = '';
		}
		event.preventDefault();
		// var data = 'myForm';
		// document.getElementById("droptarget").appendChild(data);
		// document.getElementById("test").innerHTML = "The p element was dropped";
	}
</script>
<script>
	$(document).on('keyup','.searchForCategory',function(){	
		var searchKeyWord = $(this).val();
		var csrf = $("input[name=_token]").val();
		$.ajax({
			type: "POST",
			url: "{{ route('searchForServiceCategory') }}",
			dataType: 'json',
			data: {searchKeyWord : searchKeyWord,_token : csrf},
			success: function (data) {
				$(".multicheckbox").html(data.html);
				
				$("#treeview").hummingbird();
				$("#treeview").on("CheckUncheckDone", function() {
					var count = $('input[name="value_checkbox[]"]:checked').length;
					var allCount = $('input[type="checkbox"]:checked').length;
					var allCheck = $('input[type="checkbox"]').length;

					if (allCheck == allCount) {
						$("#serviceInput").val('All Service Selected')
					} else {
						$("#serviceInput").val(count + ' service Selected')
					}
				});
			}
		});
	});
</script>
@endsection