@if(isset($productCategory->subCategory))
  @if($productCategory->subCategory->isNotEmpty())
    @foreach($productCategory->subCategory as $key=>$child)
      <li>
        <div class="sidebar-widget-list-left">
          {{--<input  wire:click="categoryChecked({{$child->id}})" type="checkbox"/> <a href="#">{{ categorySeperator('-', $loop->depth) }} {{ $child->name }} </a>--}}
          <input type="checkbox" wire:model="options.{{ $key }}" value="{{$child->id}}"> {{ categorySeperator('-', $loop->depth) }} {{ $child->name }}
          <span class="checkmark"></span>

        </div>
      </li>
      @include('livewire.sidebar.categories-item', ['productCategory' => $child])
    @endforeach
  @endif
@endif