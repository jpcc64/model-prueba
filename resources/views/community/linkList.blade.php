 <div class="container">
     <div class="row">
         <div class="col-md-8">
            <h1 id="title">Community - <a href="/community">{{$channel ? $channel->title : ""}}</a></h1>
             

             @forelse ($links as $link)
                 <li>
                     <a href="/community/{{ $link->channel->slug }}">
                         <span class="label label-default" id="titleChannel"
                             style="background: {{ $link->channel->color }}">
                             {{ $link->channel->title }}
                         </span>
                     </a>

                     <a id="link" href="{{ $link->link }}" target="_blank">
                         {{ $link->title }}
                     </a>
                     <small>Contributed by: {{ $link->creator->name }}
                         {{ $link->updated_at->diffForHumans() }}</small>

                 </li>
             @empty
                 <h1>No contributions yet</h1>
             @endforelse
         </div>

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
