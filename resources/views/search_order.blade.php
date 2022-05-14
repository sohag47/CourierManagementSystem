@extends('index')

@section('content')
{{-- @dd($customer_order_infos) --}}
<div class="team">
    <div class="team_background parallax-window" data-parallax="scroll"
        data-image-src="{{asset('website/images/team_background.jpg')}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h1 class="section_title">Your Order</h1>
                    <div class="section_subtitle">
                        <h4>Order ID: {{$customer_order_infos[0]['order_id']}}</h4>

                    </div>
                </div>
            </div>
        </div>
        <div class="row team_row">

            <!-- Team Item -->

            <div class="col-lg-4 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_body">
                        @if (!empty($customer_order_infos[0]['order_received']))
                        <div class="team_title"><a href="#" style="color: green !important;">Order Received</a></div>
                        <div class="team_subtitle" style="color: green !important;">
                            {{\Carbon\Carbon::parse($customer_order_infos[0]['order_received'])->format('d-m-Y H:i:s
                            A')}}
                        </div>
                        @else
                        <div class="team_title"><a href="#" style="color: red !important;">Order Pending !</a></div>
                        <div class="team_subtitle" style="color: red !important;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>



            <!-- Team Item -->
            <div class="col-lg-4 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_body">
                        @if (!empty($customer_order_infos[0]['arrived_destination']))
                        <div class="team_title"><a href="#" style="color: green !important;">Arrived Destination</a>
                        </div>
                        <div class="team_subtitle" style="color: green !important;">
                            {{\Carbon\Carbon::parse($customer_order_infos[0]['order_received'])->format('d-m-Y H:i:s
                            A')}}
                        </div>
                        @else
                        <div class="team_title"><a href="#" style="color: red !important;">Arrived Destination !</a>
                        </div>
                        <div class="team_subtitle" style="color: red !important;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-4 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_body">
                        @if (!empty($customer_order_infos[0]['status']))
                        <div class="team_title"><a href="#" style="color: green !important;">Order Complete</a></div>
                        <div class="team_subtitle" style="color: green !important;">
                            {{\Carbon\Carbon::parse($customer_order_infos[0]['order_received'])->format('d-m-Y H:i:s
                            A')}}
                        </div>
                        @else
                        <div class="team_title"><a href="#" style="color: red !important;">Order On the Way</a></div>
                        <div class="team_subtitle" style="color: red !important;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop