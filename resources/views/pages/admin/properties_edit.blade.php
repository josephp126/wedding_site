@extends('layouts.admin_app');

@section('sidebar_list')
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading active"><a href = "properties_list">Properties</a></li>
        <li class="app-sidebar__heading"><a href = "create">Create Property</a></li>
        <li class="app-sidebar__heading"><a href = "user_list">Users</a></li>
    </ul>
@endsection

