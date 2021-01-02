<form wire:ignore action="{{ route('search') }}" method="get">
    <select  id="category" name="poscats" wire:ignore>
        <option value="">All Categories</option>
        @foreach($productCategories as $productCategory)
            <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
            @include('livewire.partials.search-dropdown-categories')
        @endforeach

    </select>
    <input placeholder="Search Products..." name="q" id="q" type="text" />
    <button  type="submit"><i class="lnr lnr-magnifier"></i></button>
</form>
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    @endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#q").autocomplete({

                source: function(request, response) {
                    $.ajax({
                        type:"GET",
                        url: "{{url('autocomplete')}}",
                        data: {
                            term : request.term,
                            category:$('#category').val()
                        },
                        dataType: "json",
                        success: function(data){
                            var resp = $.map(data,function(obj){
                                return obj.name;
                            });

                            response(resp);
                        }
                    });
                },
                minLength: 1
            });
        });

    </script>
@endpush