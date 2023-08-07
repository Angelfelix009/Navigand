@extends('layouts.main')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Frequently Asked Questions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--faq area start-->
    <div class="faq_content_area mt-57">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq_content_wrapper">
                        <h4>Below are frequently asked questions, you may find the answer for yourself</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Accordion area-->
    <div class="accordion_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="accordion" class="card__accordion">
                        @if(count($data)>0)
                            @foreach($data as $record)
                                <div class="card  card_dipult">
                                    <div class="card-header card_accor" id="headingTwo{{$record->id}}">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo{{$record->id}}" aria-expanded="false" aria-controls="collapseTwo{{$record->id}}">
                                            {{$record->title}}
                                            <i class="fa fa-plus"></i>
                                            <i class="fa fa-minus"></i>

                                        </button>
                                    </div>
                                    <div id="collapseTwo{{$record->id}}" class="collapse" aria-labelledby="headingTw{{$record->id}}o" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                @php echo html_entity_decode($record->body); @endphp
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>We are updating our Frequently asked questions, we will be back shortly</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Accordion area end-->
    <!--faq area end-->
@endsection
