          @foreach ($category as $post)
            <tr>
              <td class="text-primary"><strong>{{ $post->title }}</strong></td>
              <td>{!! Form::checkbox('active', $post->id, $post->active) !!}</td>
              <td>{!! link_to('blog/' . $post->slug, trans('back/blog.see'), ['class' => 'btn btn-success btn-block btn']) !!}</td>
              <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['kadmin.category.destroy', $post->id]]) !!}
                {!! Form::destroy(trans('back/blog.destroy'), trans('back/blog.destroy-warning')) !!}
              {!! Form::close() !!}
              </td>
            </tr>
          @endforeach