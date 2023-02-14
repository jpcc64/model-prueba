                   <div class="card-body">
                       <form method="POST" action="/community">
                           {{ csrf_field() }}
                           <div class="form-group">
                               <label for="title">Title:</label>
                               <input type="text" class="@error('title') is-invalid  @enderror form-control"
                                   id="title" name="title" value="{{ old('title') }}"
                                   placeholder="What is the title of your article?">
                               @error('title')
                                   <div class="alert_alert-danger">{{ $message }}</div>
                               @enderror

                           </div>

                           <div class="form-group">
                               <label for="link">Link:</label>
                               <input type="text" class="@error('link') is-invalid @enderror form-control"
                                   id="url" name="link" value="{{ old('link') }}"
                                   placeholder="What is the URL?">
                               @error('link')
                                   <div class="alert_alert-danger">{{ $message }}</div>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="Channel">Channel:</label>
                               <select class="form-control @error('channel_id') is-invalid @enderror" name="channel_id">
                                   <option selected disabled>Pick a Channel...</option>
                                   @foreach ($channels as $channel)
                                       {{-- esta linea le da valores a las opciones del formulario y deja seleccionado en el select la ultima opcion que fue seleccionada --}}
                                       {{-- si trato de registrar el mismo link salta un error de mysql 'SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry' --}}
                                       <option value="{{ $channel->id }}"
                                           {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                           {{ $channel->title }}
                                       </option>
                                   @endforeach
                               </select>
                               @error('channel_id')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>
                           <div class="form-group card-footer">
                               <button class="btn btn-primary">Contribute Link</button>
                           </div>
                       </form>
                   </div>
                   {{ $links->links() }}
