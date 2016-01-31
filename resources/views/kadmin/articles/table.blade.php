          @foreach ($posts as $post)
            <tr {!! !$post->seen && session('statut') == 'admin'? 'class="warning"' : '' !!}>
              <td class="text-primary"><strong>{{ $post->title }}</strong></td>
              <td>{{ $post->created_at }}</td> 
              <td>{!! Form::checkbox('active', $post->id, $post->active) !!}</td>
              @if(session('statut') == 'admin')
                <td>{{ $post->username }}</td>
                <td>{!! Form::checkbox('seen', $post->id, $post->seen) !!}</td>
              @endif
              <td>{!! link_to('blog/' . $post->slug, trans('back/blog.see'), ['class' => 'btn btn-success btn-block btn']) !!}</td>
              <td>{!! link_to_route('kadmin.articles.edit', trans('back/blog.edit'), [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
              <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['kadmin.articles.destroy', $post->id]]) !!}
                {!! Form::destroy(trans('back/blog.destroy'), trans('back/blog.destroy-warning')) !!}
              {!! Form::close() !!}
              </td>
            </tr>
          @endforeach