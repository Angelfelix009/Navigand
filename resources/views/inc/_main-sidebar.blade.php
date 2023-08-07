<!--slider area start-->
@if(count($category)>0)
    <div class="col-lg-3">
        <div class="categories_menu">
            <div class="categories_title bg-success">
                <h2 class="categori_toggle">Categories</h2>
            </div>
            <div class="categories_menu_toggle">
                <ul>
                    @foreach($category as $data)
                        <li class="menu_item_children categorie_list"><a href="/my-product/{{$data->id}}"><span><i class="zmdi zmdi-menu"></i></span> {{$data->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
