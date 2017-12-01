<ul id="service-results" class="list-group"></ul>

<form action="" id="frmAddService" method="post" accept-charset="utf-8">
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
            <label>
                {{ trans('dashboard_create_services.subject') }}
                <a href="#create-category" id="toggle-create-category">
                    <i class="fa fa-plus"></i>
                    {{ trans('dashboard_create_services.new') }}
                </a>
            </label>
            <select id="select-categories" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <a href="#remove-category" id="toggle-remove-category">
                <i id="remove-category" class="fa fa-trash"></i>
            </a>
            <div class="spaceY40"></div>
            <div id="create-category">
                <input type="text" id="new-category" class="form-control" placeholder="{{ trans('dashboard_create_services.newCategoryName') }}">
                <button type="button" id="btn-add-new-category" class="btn btn-primary">
                    {{ trans('dashboard_create_services.add') }}
                </button>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
            <label>{{ trans('dashboard_create_services.serviceName') }}</label>
            <input type="text" id="service-name" class="form-control" placeholder="{{ trans('dashboard_create_services.serviceNamePlace') }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
            <label>{{ trans('dashboard_create_services.servicePrice') }}</label>
            <input type="text" id="service-price" class="form-control" placeholder="{{ trans('dashboard_create_services.servicePricePlace') }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8 display-none">
        <div class="form-group bootstrap-fileinput-style-01">
            <label>{{ trans('dashboard_create_services.serviceDescription') }}</label>
            <textarea class="form-control" id="service-description" placeholder="{{ trans('dashboard_create_services.serviceDescriptionPlace') }}" rows="3"></textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-2">
        <div class="form-group">
            <button type="button" id="btn-add-new-service" class="btn btn-primary">
                {{ trans('dashboard_create_services.add') }}
            </button>
        </div>
    </div>
</form>
