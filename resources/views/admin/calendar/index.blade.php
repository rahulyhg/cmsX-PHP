@extends('layouts.admin')

@section('content')

<script src="/dashboard/js/controllers/calendar.js"></script>

<div class="col s12" ng-controller="CalendarController">
    <header class="row navigation-row">
        <div class="col s6">
            <h1>Kalendarz</h1>
        </div>
        <div class="col s6">
            {{--<a href="{{ url('/admin/calendar/create') }}" class="waves-effect waves-light btn right" title="Dodaj nowy wpis"><i class="fa fa-plus"></i></a>--}}
        </div>
    </header>
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div ui-calendar="uiConfig.calendar" ng-model="eventSources"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="EventModal" class="modal">
        <div class="modal-content">
            <h4>Zadanie: [[event.date]]</h4>
            <div class="row">
                <div class="input-field col s12 m6">
                    <div class="error-message" ng-show="errors.event.title.length>0">[[errors.event.title]]</div>
                    <input name="title" type="text" ng-model="event.title">
                    <label for="title" data-error="wrong" data-success="right" class="">Tytuł</label>
                </div>
                <div class="input-field col s12 m6 ">
                    <input name="content" type="text" ng-model="event.description">
                    <label for="content" data-error="wrong" data-success="right" class="">Opis</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action waves-effect waves-green btn-flat" ng-click="saveEvent()">Zapisz</a>
        </div>
    </div>

</div>
@endsection