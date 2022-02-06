@extends('layouts.layout')

@section('_content')
<section class="container" id="announcements">
	
    <p class="text-center display-6 mb-5"><br>Help</p>
	<!-- Admin Help Page -->	
    <ul class="list-group list-group-flush mb-3 mt-3">
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                Reset Password 
				<p>
					If you have forgotten your password you can reset it by sending a reset link to your email.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/ResetPassword.jpg">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Profile
				<p>
						1- Editing of profile such as name, email address and profile picture.<br>
						2- Changing of password.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/ClientProfile.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Set an Appointment
				<p>
					In order to request and appointment the client needs to provide information such as
					name, contact number, email address, appointment date and time and the purpose of the appointment.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/AppointmentSet.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Adding of Pet Profile
				<p>
					Pet must have name, breed, sex and species.<br>
					1- You can set a picture of your pet as it's profile picture.<br>
					2- Click Insert Record.<br>
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/PetAdding.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Pet Actions
				<p>
					The user can manage multiple pet profile.<br>
					1- The user can add pet.<br>
					2- View pet profile.<br>
					3- Request pet records.<br>
					4- Remove pet records.<br>
					5- Edit pet information.<br>
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Pet.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Pet Profile
				<p>
					The pet profile contains the pet's name, gender, species and breed.
					The uses will also be able to view vaccination record and request for the pet's health record incase needed. 
					All files in pdf format will be available once the clinic has responded to the request. 
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/PetProfile.png" style="height:350px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Requesting a Record
				<p>
					The user can request a health record of their pet in pdf format.<br>
					1- Choose record in the drop-down list.<br>
					2- Send Request.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/RecordRequest.png" style="height:250px;">
				</div>
			</p>
		</li>
	</ul>
</section>
@endsection					