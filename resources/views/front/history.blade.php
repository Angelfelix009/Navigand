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
                            <li>Our  HISTORY</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section start-->
    <div class="about_section mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="about_content">
                        <h1>COMPANY HISTORY</h1>
                        <p class="text-justify">
                            Navigand Nigeria Limited company registration became necessary when Mrs. Ifeanyi Peace Nwagu, CEO of Navigand expanded her farm which started with a single fish pond in 2007. She successfully farmed catfish initially for family consumption, thereafter began to sell to the public. Later on, she started production of fingerlings and cultivation of ginger, turmeric and cassava in Kaduna and Abam Abriba in Abia State. In 2015, she was inspired to start commercial agriculture when her husband Julius Nwagu, a Naval officer and captain of a ship was faced with the challenge of feeding a crew of 150 personnel with limited resources. He  s u r m o u n t e d  this challenge through bulk purchase of  food items. He then reasoned that the problem confronting Nigeria in feeding her teeming population is lack of mechanized farming. He argued that with the vast arable land available for farming and with dedication and assistance from government and banking sector, the Nigerian families will comfortably feed in spite of     meager   resources. Gleaning from this, Mrs Ifeanyi  Nwagu was inspired to take her farming to another level; hence the resolve to get Navigand Nigeria Limited into real time farming. <br>
                            Another motivation was that farming is the only business the Nigerian government allows public servants to be engaged in while in active service, hence an opportunity the senior officer could not allow to pass him by. In the nearest future, Navigand  a s   a n   integrated f a r m  will utilize the waste generated from the poultry, fish and piggery and galvanize same into organic manure for the fish and  crops  there by eliminating use of inorganic fertilizer in the farm. This will further enhance saving money from purchase of inorganic fertilizer thereby  producing healthier food for Nigeria. <br>
                            Mrs Ifeanyi Peace Nwagu and her husband believe that food is the common denominator between the poor and the rich hence food security is essential and achievable.

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <br>
                    <div class="about_thumb border-left">
                        @include('inc._aboutUs-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end-->
@endsection
