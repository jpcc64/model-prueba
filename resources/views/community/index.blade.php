@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Community</h1>
            @foreach ($links as $link)
            <li>
                <a href="{{$link->link}}" target="_blank">
                    {{$link->title}}
                </a>
                <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                <span class="label label-default" style="background: {{ $link->channel->color }}">
                {{ $link->channel->title }}
                </span>
            </li>
            @endforeach

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Contribute a link</h3>
                </div>
            
                @include('community.add-link')
               
            </div>

        </div>
    </div>
    

</div>
@stop