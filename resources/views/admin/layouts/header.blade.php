
@if(session()->has('login_data'))
<!-- START X-NAVIGATION VERTICAL -->
<ul class="x-navigation x-navigation-horizontal">
                    <li class="xn-logo" style="margin-right:30px;">
                        <a> <img src="{{ asset('public/logo/logo.jpg') }}" alt="My Atoz" width="100px" height="auto"  style="margin-top:-15px;"/></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                   <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ asset('public/assets/images/users/avatar.jpg') }}" alt="EMR - OPD Software"/>
                        </a>                                                        
                    </li>    
                    @if(session()->get('login_data.dashboard') == 1)
                        <li class="xn-openable">
                            <a href="{{url('dashboard')}}" title="Admin Dashboard"><span class="fa fa-tachometer"></span>Dashboard</a>
                        </li>
                    @endif
                    @if((session()->get('login_data.city') == 1)||(session()->get('login_data.area') == 1)||(session()->get('login_data.insurance') == 1)||(session()->get('login_data.subscription') == 1)||(session()->get('login_data.payment') == 1))

                         <li class="xn-openable">
                            <a href="#" title="Employee"><span class="fa fa-navicon"></span>Master</a>
                             <ul>
                            @if(session()->get('login_data.city') == 1)<li><a href="{{ route('city.index') }}"><span class="fa fa-plus"></span>Add City</a></li>@endif
                            @if(session()->get('login_data.area') == 1)<li><a href="{{ route('area.index') }}"><span class="fa fa-plus"></span> Add Area</a></li>@endif
                            @if(session()->get('login_data.insurance') == 1)<li><a href="{{ route('monthly_insurance.index') }}"><span class="fa fa-plus"></span> Add Monthly Insurance</a></li>@endif
                            @if(session()->get('login_data.subscription') == 1)<li><a href="{{ route('subscription.index') }}"><span class="fa fa-spinner"></span> Add Subscription for customer</a></li>@endif
                            @if(session()->get('login_data.payment') == 1)<li><a href="{{ route('mode_of_payment.index') }}"><span class="fa fa-money"></span> Add Mode of Payment</a></li>@endif
					
								  @if(session()->get('login_data.notes') == 1)
                        <li class="xn-openable">
                            <a href="{{route('notes.index')}}" title="Notes"><span class="fa fa-file"></span>Notes</a>
                        </li>
                    @endif
								   @if(session()->get('login_data.timeslot') == 1)
                        <li class="xn-openable">
                            <a href="{{route('timeslot.index')}}" title="Report"><span class="fa fa-file"></span>Time Slot</a>
                        </li>
                    @endif
							<li class="xn-openable">
                                        <a href="#"><span class="fa fa-car" aria-hidden="true"></span> Vehicle Management</a>
                                            <ul>
                                                <li>
                                                    <a href="{{url('vehicle_type')}}"><span class="fa fa-spotify" aria-hidden="true"></span> Vehicle Type</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('vehicles')}}"><span class="fa fa-road" aria-hidden="true"></span> Vehicles</a>
                                                </li>

                                            </ul>
                                    </li>
								 
 
                        </ul>
                        </li>
                    @endif
                    @if(session()->get('login_data.driver') == 1)
                          <li class="xn-openable">
                            <a href="#" title="Employee"><span class="fa fa-users"></span>Driver</a>
                             <ul>
                            <li><a href="{{route('driver_registration.index')}}"><span class="fa fa-user"></span> Driver Registration</a></li>
                            <li><a href="{{route('driver_management.index')}}"><span class="fa fa-info"></span> Driver Management</a></li>
                        </ul>
                        </li>
                    @endif
                    @if(session()->get('login_data.customer') == 1)
                         <li class="xn-openable">
                            <a href="#" title="Customer"><span class="fa fa-user"></span>Customer</a>
                             <ul>
                            <li><a href="{{route('customer_registration.index')}}"><span class="fa fa-edit"></span> Customer Registration</a></li>
                           
                            <li><a href="{{route('e_pass.index')}}"><span class="fa fa-ticket"></span> E-Pass</a></li>

                            <li><a href="{{url('customer_notifications')}}"><span class="fa fa-bell" aria-hidden="true"></span> Notifications</a></li>
                        </ul>
                        </li>
                    @endif
                        <li class="xn-openable">
                            <a href="#" title="Employee"><spam class="fa fa-bars" aria-hidden="true"></spam> Other</a>
                             <ul>
                           @if(session()->get('login_data.contact_us') == 1)
                        <li class="xn-openable">
                            <a href="{{route('contactus.index')}}" title="Report"><span class="fa fa-file"></span>Contact Us</a>
                        </li>
                    @endif
                               @if(session()->get('login_data.timetable') == 1)
                        <li class="xn-openable">
                            <a href="{{route('timetable.index')}}" title="Report"><span class="fa fa-file"></span>Timetable</a>
                        </li>
                    @endif
                            @if(session()->get('login_data.usermanegment') == 1)
                        <li class="xn-openable">
                            <a href="{{route('usermanagement.index')}}" title="Report"><span class="fa fa-file"></span>User Management</a>
                        </li>
                    @endif
								 @if(session()->get('login_data.account') == 1)
                         <li class="xn-openable">
                            <a href="#" title="Account"><span class="fa fa-university"></span>Account</a>
                             <ul>
                              <li><a href="{{url('employee_payment/index')}}"><span class="fa fa-money"></span> Employee Payment</a></li>
                        </ul>
                        </li>
                    @endif
                            <li><a href="#"><span class="fa fa-road" aria-hidden="true"></span> Add Employee</a></li>
                           
   
                            
                        </ul>
                        </li> 
                        <li class="xn-openable">
                            <a href="#" title="Employee"><spam class="fa fa-file-o" aria-hidden="true"></spam> Reports</a>
                                <ul>

                                    <li class="xn-openable">
                                        <a href="#"><span class="fa fa-road" aria-hidden="true"></span> Rides</a>
                                            <ul>
                                                <li>
                                                    <a href="{{url('current_rides')}}"><span class="fa fa-road" aria-hidden="true"></span> Current Rides</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('completed_rides')}}"><span class="fa fa-road" aria-hidden="true"></span> Completed Rides</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('cancelled_rides')}}"><span class="fa fa-road" aria-hidden="true"></span>Cancelled Rides</a>
                                                </li>

                                            </ul>
                                    </li>
                                    <li>
                                        <a href="{{url('driver_login_logout_report')}}"><span class="fa fa-road" aria-hidden="true"></span> Driver Login Logout Report</a>
                                    </li>
                                    <li>
                                        <a href="{{url('customers_subscription_details/All')}}"><span class="fa fa-road" aria-hidden="true"></span> Customer Subscription &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fa fa-road" aria-hidden="true"></span> Monthly Attendnce</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fa fa-road" aria-hidden="true"></span>Driver Expence Entry</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fa fa-road" aria-hidden="true"></span>Driver Expence Report</a>
                                    </li>
                           
   
                            
                        </ul>
                        </li> 
                     <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right" style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                        Welcome, {{session()->get('login_data.username')}}
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            
            @else
            
            @endif