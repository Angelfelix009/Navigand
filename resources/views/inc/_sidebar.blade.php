<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span style="color:#ffffff">User's Management</span>
                    <span class="pull-right-container">

                    </span>
                </a>
                <ul class="treeview-menu">

                        <li><a href="" style="color:#ffffff"><i class="fa fa-plus"></i>Register User</a></li>
                        <li><a href="" style="color:#ffffff"><i class="fa fa-users"></i>View User's Acoount</a></li>


                    <li><a href="" style="color:#ffffff"><i class="fa fa-edit"></i>Change Password</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                    <span>Admin Management</span>
                    <span class="pull-right-container">

            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.create')}}"><i class="fa fa-user-plus"></i>Add New Admin</a></li>
                    <li><a href="{{route('admin.index')}}"><i class="fa fa-eye"></i>View Admin</a></li>
                </ul>
            </li>
            @if(Auth::guard('admin')->user()->role_id >=2)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-product-hunt"></i>
                        <span style="color:#ffffff">Product Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.create')}}"><i class="fa fa-plus"></i>Add Product Category</a></li>
                        <li><a href="{{route('product.create')}}"><i class="fa fa-plus"></i>Add a new Product</a></li>
                    </ul>
                </l
            @endif
            @if(Auth::guard('admin')->user()->role_id >=3)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span style="color:#ffffff">Order Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('view-order')}}" style="color:#ffffff"><i class="fa fa-eye"></i>View Order</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-gear"></i>
                        <span style="color:#ffffff">FootNote Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('update-terms')}}" style="color:#ffffff"><i class="fa fa-save"></i>Terms & Conditions</a></li>
                        <li><a href="{{route('update-privacy')}}" style="color:#ffffff"><i class="fa fa-save"></i>Privacy Infromation</a></li>
                        <li><a href="{{route('update-delivery')}}" style="color:#ffffff"><i class="fa fa-save"></i>Delivery Information</a></li>
                        <li><a href="{{route('update-return-policy')}}" style="color:#ffffff"><i class="fa fa-save"></i>Return Policy</a></li>
                        <li><a href="{{route('faq.create')}}" style="color:#ffffff"><i class="fa fa-save"></i>Frequently asked Questions</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>