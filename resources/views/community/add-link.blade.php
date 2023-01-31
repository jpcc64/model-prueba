                   <div class="card-body">
                       <form method="POST" action="/community">
                           {{ csrf_field() }}
                           <div class="form-group">
                               <label for="title">Title:</label>
                               <input type="text" class="@error('title') is-invalid  @enderror form-control"
                                   id="title" name="title" placeholder="What is the title of your article?">
                               @error('title')
                                   <div class="alert_alert-danger">{{ $message }}</div>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="link">Link:</label>
                               <input type="text" class="@error('link') is-invalid @enderror form-control"
                                   id="link" name="link" placeholder="What is the URL?">
                               @error('link')
                                   <div class="alert_alert-danger">{{ $message }}</div>
                               @enderror
                           </div>

                           <div class="form-group card-footer">
                               <button class="btn btn-primary">Contribute Link</button>
                           </div>

                           <div class="form-group">
                               <label for="Channel">Channel:</label>
                               <select class="form-control @error('channel_id') is-invalid @enderror" name="channel_id">
                                   <option selected disabled>Pick a Channel...</option>
                                   @foreach ($channels as $channel)
                                       <option value="{{ $channel->id }}">
                                           {{ $channel->title }}
                                       </option>
                                   @endforeach
                               </select>
                               @error('channel_id')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>
                       </form>
                   </div>
                   {{$links->links()}}
