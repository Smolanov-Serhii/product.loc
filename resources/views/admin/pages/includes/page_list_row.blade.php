<?php
/**
 * @var $level integer
 * @var $page \App\Models\Page;
 */
?>
<tr>
    <td>
        <?php $z = 0; ?>
        @while ($z < $level)
                <span style="width: 20px; display: inline-block;"> - </span>
            <?php $z++ ?>
        @endwhile
        {{ $page->title }}
    </td>
    <td>
        <a
            href="/{{ $page->alias }}"
            target="_blank"
        >/{{ $page->alias }}</a>
    </td>
    <td>
        @if($page->enabled)
            <span class="badge badge-success">Enabled</span>
        @else
            <span class="badge badge-danger">Disable</span>
        @endif
    </td>
    <td>
        <div class="btn-group">
            <a href="{{ route('admin.pages.edit', ['page' => $page]) }}" class="btn btn-success"> <i class="fas fa-pen"></i> </a>
            <a style="margin: 0 3px" href="{{ route('admin.pages.content.update', ['page' => $page]) }}" class="btn btn-primary"><i class="far fa-list-alt"></i></a>
            <form method="POST" action="{{ route('admin.pages.delete', [ 'page'=> $page ]) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Вы уверены?')">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </td>

</tr>
@foreach($page['childTree'] as $page)
    <?php $parents[] = $page->title ; ?>
    @include('admin.pages.includes.page_list_row', ['page' => $page, 'level' => $level+1, 'parents' => $parents])
@endforeach
