@include('layout_organization.header')
@include('layout_organization.sidebar')
@include('layout_organization.navbar')
<main class="content">
    @if (\App\Models\Invoice::where('organization_id',Auth::user()->organization_id)->where('status',0)->count()>0)
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                <strong>{{__('message.unpaid_invoice')}} <a href="{{route('invoice.index')}}">{{__('message.click_to_pay')}}</a></strong>
            </div>
        </div>
    @endif

    @if (Auth::user()->organization->address == null || Auth::user()->organization->country_id == null || Auth::user()->organization->province_id == null )
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>{{__('message.finish_config')}} <a href="{{route('configuration.index')}}">{{__('message.click_config')}}</a></strong>
        </div>
    </div>
    @endif

    @if (Auth::user()->organization->is_active == 0 )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>{{__('message.account_suspended')}} <a href="{{route('invoice.index')}}">{{__('text.view')}}</a></strong>
        </div>
    </div>
    @endif
    @yield('content')
</main>
@include('layout_organization.footer')