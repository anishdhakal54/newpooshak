@if(!empty($menu['child']))
  <ul class="dropdown">
    @foreach($menu['child'] as $child)
    <li><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
    @endforeach
  </ul>
@endif