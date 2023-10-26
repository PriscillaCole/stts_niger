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
                <h3 class="card-title">{{__('admin.form.Seed Producers')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2">{{ $data['total_producers'] }}</h4>
                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-hourglass me-1 align-middle"></i>{{ $data['pending_producers'] }}</span><a href="{{ admin_url('/seed-producers')}}">{{__('admin.form.pending applications')}}</a></p>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card panel-success">
            <div class="card-header">
                <h3 class="card-title">{{__('admin.form.Co-operatives')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2"> {{ $data['total_cooperatives'] }}</h4>
                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-hourglass me-1 align-middle"></i>{{ $data['pending_cooperatives'] }}</span><a href="{{ admin_url('/cooperatives')}}">{{__('admin.form.pending applications')}}</a></p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card panel-success">
            <div class="card-header">
                <h3 class="card-title">{{__('admin.form.Agro-Dealers')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2"> {{ $data['total_agro_dealers'] }}</h4>
                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-hourglass me-1 align-middle"></i>{{ $data['pending_agro_dealers'] }}</span><a href="{{ admin_url('/agro-dealers')}}">{{__('admin.form.pending applications')}}</a></p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card panel-success">
            <div class="card-header">
                <h3 class="card-title">{{__('admin.form.Marketable Seeds')}}</h3>
            </div>
            <div class="card-body">
                <h4 class="mb-2"> {{ $data['total_marketable_seeds'] }}</h4>
                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="glyphicon glyphicon-leaf me-1 align-middle"></i></span><a href="{{ admin_url('/marketable-seeds') }}">{{__('admin.form.marketable seeds')}}</a></p>
            </div>
        </div>
    </div>
</div>