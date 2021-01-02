<div class="sidebar-widget">
  <h4 class="pro-sidebar-title">Categories</h4>
  <div class="sidebar-widget-list">
    <ul>
      @foreach($productCategories as $key=>$productCategory)
        <li>
          <div class="sidebar-widget-list-left">
            {{--<input type="checkbox" wire:click="categoryChecked({{$productCategory->id}})" /> <a href="#">{{ $productCategory->name }}</a>--}}
            <input type="checkbox" wire:model="options.{{ $key }}" value="{{$productCategory->id}}">
            <span class="checkmark"></span>
          </div>
        </li>
        {{-- <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>--}}
        @include('livewire.sidebar.categories-item')
      @endforeach

    </ul>
  </div>
</div>
