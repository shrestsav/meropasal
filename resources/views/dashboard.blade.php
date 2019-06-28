@extends('layouts.app')

@section('content')

<!-- contents from vue js -->
<router-view></router-view>
<vue-progress-bar></vue-progress-bar>
@endsection

@push('vueScripts')
<script type="text/javascript" src="{{asset('js/system.js')}}"></script>
@endpush