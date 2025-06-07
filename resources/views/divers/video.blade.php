@extends('layouts.app')

@section('contenu')
  <div class="controller-fluid d-flex flex-column bg-otorange"
      style="height:94vh; justify-content:space-around">
    <video class="align-self-center m-1" controls="controls" preload="auto"
        style="max-width:100%; max-height:60vh" poster="{{ url('storage/presentation/PBpresentation.png')}}" >
      <source
        src="{{url('storage/presentation/aide.m4v')}}" type="video/mp4" />
      @lang('presentation.no_video')
    </video>
    <div class="d-sm-flex flex-row justify-content-around m-3">
      <div class="b-3 p-3 align-items-center border-left">
        <h5 class="mr-3">@lang('presentations.video_after')</h5>
        <a href="{{url('storage/presentation/aide.m4v')}}" download="PBpresentation">
          <button class="btn btn-otojaune rounded-0" type="button" name="button"><i class="fas fa-file-video"></i> télécharger (10M)</button>
        </a>
      </div>
      <div class="b-3 p-3 align-items-center border-left">
        <h5 class="mr-3">@lang('presentations.see_pdf')</h5>
        <a href="{{url('storage/presentation/aide.pdf')}}" download="PBpresentation">
          <button class="btn btn-danger rounded-0" type="button" name="button"><i class="fas fa-file-pdf"></i> télécharger (3M)</button>
        </a>
      </div>
    </div>
    <div class="pr-3 align-self-end">
      @annule([
        'nomAnnule' => __('boutons.retour'),
        'route' => route('aide'),
      ])
    </div>
  </div>
@endsection
