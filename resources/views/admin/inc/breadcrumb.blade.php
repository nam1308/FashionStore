@if(isset($items) && !empty($items))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            @foreach($items as $item)
                <li class="breadcrumb-item {{ !isset($item['link']) && 'active' }}"
                    @if(!isset($item['link'])) aria-current="page" @endif>
                    @if(isset($item['link']))
                        <a href="/admin{{$item['link']}}">{{$item['label']}}</a>
                    @else
                        {{$item['label']}}
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
