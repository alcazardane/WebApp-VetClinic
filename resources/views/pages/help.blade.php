@extends('layouts.layout')

@section('_content')
<section class="container" id="announcements">
	<!-- Admin Help Page -->
    <p class="text-center display-6 mb-5"><br>Help</p>

    <ul class="list-group list-group-flush mb-3 mt-3">
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                Accounts
				<p>
					1- Search for a user.<br>
					2- Back.<br>
					3- Edit user info.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/Accounts.jpg " style="height:250px;>
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Dashboard
				<p>
					This feature shows the overview of the upcoming appointments and unattended requests. 
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/Dashboard.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Admin Profile
				<p>
					1- Editing of profile such as name, email address and profile picture.<br>
					2- Changing of password.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/AdminProfile.png" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Records
				<p>
					Management of pet health records.<br>
					1- User can search through the records.<br>
					2- Refresh.<br>
					3- Add new record.<br>
					4- Delete record.<br>
					5- View record history.<br>
					6- Edit record.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/AdminRecords.jpg" style="width:600px">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 History
				<p>
					Once the user click the history button.<br>
					1- Add history.<br>
					2- Download history in pdf format.<br>
					3- Delete history.<br>
					4- Edit history.
	
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/History.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Posts
				<p>
					This feature allows user to manage the posts and announcements.<br>
					1- Add new post.<br>
					2- Delete post.<br>
					3- View post.<br>
					4- Publish post. <br>
					5- Edit post.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/Posts.png" style="height:250px;">
				</div>
			</p>
		</li>
		
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Public Posts
				<p>
					This feature contains all of the public posts and announcements once it is published.<br>
					1- Hide button to make it disappear from homepage's announcement area.<br>
					2- View button to make it appear in the homepage's announcement area.<br>
					3- Delete Post.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/PublicPosts.png" style="height:250px;">
				</div>
			</p>
		</li>
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Vets and Staff
				<p>
					List of the Veterinarians and Staffs.<br>
					1- Search for record.<br>
					2- Refresh.<br>
					3- Add new record.<br>
					4- Delete record.<br>
					5- View record.<br>
					6- Edit record.
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/VetsandStaff.jpg" style="height:250px;">
				</div>
			</p>
		</li>
		<li class="list-group-item  w-100 mb-5" aria-current="true">
            <p class="h6" style="color: #58753C; text-decoration: none;">
                 Requests
				<p>
					The user can send a response to a client's request by attaching a file.<br>
					1- Respond to request.<br>
					2- Remove request.
		
				</p>
				<div class="feature bg-transparent bg-gradient text-white rounded-3 mb-3">
					<img class="img-fluid rounded" src="/img/Help/Admin/AdminRequests.jpg" style="height:250px;">
				</div>
			</p>
		</li>
	</ul>
</section>
@endsection					