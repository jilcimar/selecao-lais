<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text">PROFSSIONAIS</div>
                <div class="number count-to" data-from="0" data-to="{{$profissionais}}" data-speed="15" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">help</i>
            </div>
            <div class="content">
                <div class="text">USUÁRIOS</div>
                <div class="number count-to" data-from="0" data-to="{{$usuarios}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green">
            <div class="icon">
                <i class="material-icons">event</i>
            </div>
            <div class="content">
                <div class="text" style="font-size: 27px;">{{ Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d/m/Y') }}</div>
            </div>
        </div>
    </div>
</div>