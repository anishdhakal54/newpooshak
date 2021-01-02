<div>
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-content">
            <h1 class="breadcrumb-hrading">Wishlist Page</h1>
            <ul class="breadcrumb-links">
              <li><a href="/">Home</a></li>
              <li>Wishlist</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="cart-main-area mtb-60px">
    <div class="container">
      <h3 class="cart-page-title">Your cart items</h3>
      <div class="row">
        @if($wishlists->count() <= 0)
          <div class="alert alert-danger">
            <p>No products in wishlist.</p>
          </div>
        @else
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
              <div class="table-content table-responsive cart-table-content">
                <table>
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Until Price</th>
                    <th>Customize</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($wishlists as $wishlist)
                    @php(
                    $product = $wishlist->product
                    )
                    @livewire('account.wishlist-item',['product' => $product])
                  @endforeach

                  </tbody>
                </table>
              </div>
            </form>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
