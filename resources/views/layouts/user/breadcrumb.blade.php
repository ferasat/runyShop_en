<div class="row">

    <div class="col-sm-12">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>با موفقیت انجام شد !</strong> {{ session('success') }}.
            </div>
        @endif
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0"> {{ $titlePage }}</h4>
                </div>
                <div class="col-md-4">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <i class="ti-settings mr-1"></i> دسترسی بیشتر
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                <a class="dropdown-item" href="{{asset('/dashboard/product/new')}}">اضافه کردن
                                    محصول</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{asset('/')}}">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
