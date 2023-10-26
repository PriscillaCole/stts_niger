<style>
    .card {
        border: 1px solid green;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        /* padding around */
        padding: 20px;
    }
</style>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">{{ __('admin.form.My Total Stock')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2">{{ $data['total_stock'] }}</h4>
                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-hourglass me-1 align-middle"></i></span><a href="{{ admin_url('/load-stocks')}}">{{ __('admin.form.View Stock')}}</a></p>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card panel-success">
            <div class="card-header">
                <h3 class="card-title">{{ __('admin.form.My Total Inspections')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2"> {{ $data['total_inspections'] }}</h4>
                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-hourglass me-1 align-middle"></i>{{ $data['pending_inspections'] }}</span><a href="{{ admin_url('/field-inspections')}}">{{ __('admin.form.pending inspections')}}</a></p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card panel-success">
            <div class="card-header">
                <h3 class="card-title">{{ __('admin.form.My Total Sales')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2"> {{ $data['total_sales'] }}</h4>
                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-hourglass me-1 align-middle"></i>{{ $data['pending_orders'] }}</span><a href="{{ admin_url('/orders')}}">{{ __('admin.form.pending orders')}}</a></p>
            </div>
        </div>
    </div>

  
</div>