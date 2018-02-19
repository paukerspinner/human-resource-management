@extends('layouts.admin')

@section('content')
	@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading text-center">
		<b>Create new employee</b>
	</div>
	<div class="panel-body">
       
                <form class="form-inline" action="{{route('employee.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group col-sm-4" >
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" name="fullname">
                    </div>
                    <div class="form-group col-sm-4">
                        <br>
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email">
                    </div>
                    <div class="form-group col-sm-4">
                        <br>

                        <label for="contact">Contact#:</label>
                        <input type="Number" class="form-control" id="contact" placeholder="Enter Contact Number" name="contact">
                    </div>
                    <div class="form-group col-sm-4">
                        <br>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password"><br>
                    </div><br><br><br>
                    <div class="form-group  col-sm-4">
                        <br>
                     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
                     <label><input type="hidden" name="asana" value="0" />
                            <input type="checkbox" name="asana" value="1" /> Invite to Asana
                    </label>
                    </div>
                    <div class="form-group  col-sm-4">
                        <br>
                     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
                     <label><input type="hidden" name="slack" value="0" />
                            <input type="checkbox" name="slack" value="1" /> Invite to Slack
                    </label>
                    </div>
                    <div class="form-group  col-sm-4" style="margin-bottom: 20px;">
                        <br>
                      &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                      <label>
                        <input type="hidden" name="zoho" value="0" />
                            <input type="checkbox" name="zoho" value="1" /> Invite to Zoho
                    </label>
                    </div>
                    <div style="margin-bottom: 19px;">
                        <br>
                    <button  type="submit" class="btn  btn-primary center-block">Add User</button>
                    </div>
              </form>
                
           
			
	</div>
</div>

@stop