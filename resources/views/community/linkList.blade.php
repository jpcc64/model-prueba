 <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 id="title">Community</h1>

                @if (count($links) == 0)
                    <h1>No contributions yet</h1>
                @else
                    @foreach ($links as $link)
                        <li>
                            <span class="label label-default" style="background: {{ $link->channel->color }}">
                                {{ $link->channel->title }}
                            </span>
                            <a href="{{ $link->link }}" target="_blank">
                                {{ $link->title }}
                            </a>
                            <small>Contributed by: {{ $link->creator->name }}
                                {{ $link->updated_at->diffForHumans() }}</small>

                        </li>
                    @endforeach
                @endif

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