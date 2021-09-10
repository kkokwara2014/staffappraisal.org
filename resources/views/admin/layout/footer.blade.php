<footer class="main-footer">
    <div class="pull-right hidden-xs">
        Powered by Done-Right Systems.
    </div>
    <strong>Copyright &copy; 2020 - 
        <script>
            var y=new Date(); 
            document.write(y.getFullYear());
        </script> 
        staffappraisal.org
    </strong> All rights reserved.
</footer>

<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->

<div class="control-sidebar-bg"></div>
<div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin_assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin_assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('admin_assets/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin_assets/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin_assets/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}">
</script>
<!-- bootstrap time picker -->
<script src="{{asset('admin_assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin_assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin_assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin_assets/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin_assets/dist/js/demo.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@section('footer-scripts')
    @show;

<!-- page script -->
<script>
    $(function() {
// for state and lga
$('select[name="state_id"]').on('change', function() {
    var stateID = $(this).val();
    if(stateID) {
        $.ajax({
            url: '/admin/myform/ajax/'+stateID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="lga_id"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="lga_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                });
            }
        });
    }else{
        $('select[name="lga_id"]').empty();
    }
});

// for classlevel and subclasslevel
$('select[name="classlevel_id"]').on('change', function() {
    var classlevelID = $(this).val();
    if(classlevelID) {
        $.ajax({
            url: '/admin/myform/ajax2/'+classlevelID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="subclasslevel_id"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="subclasslevel_id"]').append('<option value="'+ value.id +'">'+ value.level +'</option>');
                });
            }
        });
    }else{
        $('select[name="subclasslevel_id"]').empty();
    }
});

});


    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);

  $(function () {
      //Initialize Select2 Elements
    $('.select2').select2();

      $('#example1').DataTable({
        'sort':false,
      });
      $('#example2').DataTable({
        'sort':false,
      });


      //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
    });
      //Date picker1
    $('#datepicker1').datepicker({
      autoclose: true,
    });
      //Date picker2
    $('#datepicker2').datepicker({
      autoclose: true,
    });
      //Date picker2
    $('#datepicker3').datepicker({
      autoclose: true,
    });
      //Date picker2
    $('#datepicker4').datepicker({
      autoclose: true,
    });
      //Date picker2
    $('#datepicker5').datepicker({
      autoclose: true,
    });

    //Only picking year
    $('#datepickeryear').datepicker({
      autoclose: true,
      format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
    });
    });

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
    });
    //Timepicker1
    $('.timepicker1').timepicker({
      showInputs: false,

    });
</script>

<script>
    //adding location toastr
       @if (Session::has('location_added'))
         toastr.success("{{Session::get('location_added')}}");
       @endif
    //updating location toastr
       @if (Session::has('location_updated'))
         toastr.success("{{Session::get('location_updated')}}");
       @endif
    //deleting location toastr
       @if (Session::has('location_deleted'))
         toastr.success("{{Session::get('location_deleted')}}");
       @endif

    //adding warehouse toastr
       @if (Session::has('warehouse_added'))
         toastr.success("{{Session::get('warehouse_added')}}");
       @endif
    //updating warehouse toastr
       @if (Session::has('warehouse_updated'))
         toastr.success("{{Session::get('warehouse_updated')}}");
       @endif
    //deleting warehouse toastr
       @if (Session::has('warehouse_deleted'))
         toastr.success("{{Session::get('warehouse_deleted')}}");
       @endif

    //adding supplier toastr
       @if (Session::has('supplier_added'))
         toastr.success("{{Session::get('supplier_added')}}");
       @endif
    //updating supplier toastr
       @if (Session::has('supplier_updated'))
         toastr.success("{{Session::get('supplier_updated')}}");
       @endif
    //deleting supplier toastr
       @if (Session::has('supplier_deleted'))
         toastr.success("{{Session::get('supplier_deleted')}}");
       @endif

    //adding product toastr
       @if (Session::has('product_added'))
         toastr.success("{{Session::get('product_added')}}");
       @endif
    //updating product toastr
       @if (Session::has('product_updated'))
         toastr.success("{{Session::get('product_updated')}}");
       @endif
    //deleting product toastr
       @if (Session::has('product_deleted'))
         toastr.success("{{Session::get('product_deleted')}}");
       @endif

    //order failed toastr
       @if (Session::has('tansactfailed'))
         toastr.success("{{Session::get('tansactfailed')}}");
       @endif

    //staff created toastr
       @if (Session::has('staff_added'))
         toastr.success("{{Session::get('staff_added')}}");
       @endif
    //staff deleted toastr
       @if (Session::has('staff_deleted'))
         toastr.success("{{Session::get('staff_deleted')}}");
       @endif
    //Order success toastr
       @if (Session::has('order_success'))
         toastr.success("{{Session::get('order_success')}}");
       @endif
       
    //Supplier added toastr
       @if (Session::has('supplier_added'))
         toastr.success("{{Session::get('supplier_added')}}");
       @endif
    //Supplier updated toastr
       @if (Session::has('supplier_updated'))
         toastr.success("{{Session::get('supplier_updated')}}");
       @endif
    //Supplier deleted toastr
       @if (Session::has('supplier_deleted'))
         toastr.success("{{Session::get('supplier_deleted')}}");
       @endif

    //profile updated toastr
       @if (Session::has('profile_updated'))
         toastr.success("{{Session::get('profile_updated')}}");
       @endif
    
       //admin added toastr
       @if (Session::has('admin_added'))
         toastr.success("{{Session::get('admin_added')}}");
       @endif
       //admin updated toastr
       @if (Session::has('admin_updated'))
         toastr.success("{{Session::get('admin_updated')}}");
       @endif
       //admin deleted toastr
       @if (Session::has('admin_deleted'))
         toastr.success("{{Session::get('admin_deleted')}}");
       @endif
       
    
</script>

<script>

        var msg='{{ Session::get('lowprodalert') }}';
        var exist='{{ Session::has('lowprodalert') }}';

        if(exist){
            alert(msg);
        }

        var info='{{ Session::get('highqtyrequested') }}';
        var it_exist='{{ Session::has('highqtyrequested') }}';

        if(it_exist){
            alert(info);
        }
</script>

<script>
    $(document).ready(function() {
        // for school and department
        $('select[name="school_id"]').on('change', function() {
            var schoolID = $(this).val();
            if(schoolID) {
                $.ajax({
                    url: '/dashboard/myform/ajax/'+schoolID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="department_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="department_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="department_id"]').empty();
            }
        });

        // for state and lga
        $('select[name="state_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/dashboard/myform/ajax3/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="lga_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="lga_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="lga_id"]').empty();
            }
        });

    });

</script>

<script>
    $(function(){
          $('#academicstaff-form').hide();
          $('#nonacademicstaff-form').hide();
          $('#juniorstaff-form').hide();
          $('#all-forms').hide();

        $('input[name="continue"]').click(function(){
            var $staffCategory=$('input[name="staffcategory"]:checked').val();
             
             if($staffCategory=='Academic Staff'){
               $('#academicstaff-form').show();
               $('#nonacademicstaff-form').hide();
               $('#juniorstaff-form').hide();

               $('#all-forms').show();
            }else if($staffCategory=='Non-Academic Staff'){
                 $('#nonacademicstaff-form').show();
                 $('#academicstaff-form').hide();
                 $('#juniorstaff-form').hide();

                 $('#all-forms').show();
            }else if($staffCategory=='Junior Staff'){
                $('#juniorstaff-form').show();
                $('#academicstaff-form').hide();
                $('#nonacademicstaff-form').hide();

                $('#all-forms').show();
            }
         });

      });
      
</script>

<script type="text/javascript">
    $(function(){

        var total_score=function(){
            var sum=0;
            $('.appraisalscore').each(function(){
                var num=$(this).val();
                if(num!=0){
                    sum+=parseInt(num);
                }
            });

            if(sum<50){
                $('#totalscore').val(sum);
                $('#totalscore').css({'background-color':'red','color':'white','font-size':'18px'});
                
            }else if(sum>50){
                $('#totalscore').val(sum);
                $('#totalscore').css({'background-color':'green','color':'white','font-size':'18px'});
            }

        }

        $('.appraisalscore').keyup(function(){
            total_score();
        });

        //checking exceeded publication score
        $('#pubscore').on('input',function(){
            var publicascore=$(this).val();
            if(publicascore>20){
                $('#puberrmsg').removeClass('hidden');
            }else{
                $('#puberrmsg').addClass('hidden');
            }
        });
        //checking exceeded production score
        $('#prodscore').on('input',function(){
            var producscore=$(this).val();
            if(producscore>25){
                $('#proderrmsg').removeClass('hidden');
            }else{
                $('#proderrmsg').addClass('hidden');
            }
        });

    });
</script>

{{--  junior staff appraisal score  --}}
<script type="text/javascript">
    $(function(){

        var juniorstafftotal_score=function(){
            var sum=0;
            $('.juniorappscore:checked').each(function(){
                var num=$(this).val();
                if(num!=0){
                    sum+=parseInt(num);
                }
            });

            if(sum<50){
                $('#juniorstafftotalscore').val(sum);
                $('#juniorstafftotalscore').css({'background-color':'red','color':'white','font-size':'18px'});
                
            }else if(sum>50){
                $('#juniorstafftotalscore').val(sum);
                $('#juniorstafftotalscore').css({'background-color':'green','color':'white','font-size':'18px'});
            }

        }

        $('.juniorappscore').change(function(){
            juniorstafftotal_score();
        });
        


    });
</script>


<script> 
    $(function () { $("[data-toggle='tooltip']").tooltip(); }); 
</script>


{{--  printing area  --}}
<script src="{{ asset('js/jquery.printPage.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.btnprnt').printPage();
    });
</script>

@livewireScripts

</body>

</html>