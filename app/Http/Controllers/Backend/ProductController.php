<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ProductRequest;
use App\Mail\User;
use App\Product;
use App\ProductColor;
use App\ProductFaq;
use App\ProductSpecification;
use App\ProductDownload;
use App\ProductImage;
use App\Size;
use App\SizeChart;
use App\Suscriber;
use Storage;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Helpers\Image\ImageService;
use App\Helpers\Image\LocalImageFile;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
  /**
   * @var ProductRepository
   */
  private $product;
  /**
   * @var CategoryRepository
   */
  private $category;

  public function __construct(ProductRepository $product, CategoryRepository $category)
  {
    $this->product = $product;
    $this->category = $category;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productsCount = $this->product->getAll()->count();
    $categories = $this->category->getCategories();

    return view('backend.products.index', compact('productsCount', 'categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = $this->category->getCategories();
    $sizes = Size::all();

    return view('backend.products.create', compact('categories', 'sizes'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function store(ProductRequest $request)
    {


        try {
            if ($request->hasFile('view_chart')) {
                request()->validate([
                    'view_chart' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . request()->view_chart->getClientOriginalExtension();

        request()->view_chart->move(public_path('view_chart/'), $imageName);
      }

      $product = $this->product->create($request->all());
      if ($request->hasFile('view_chart')) {
        $product->view_chart = $imageName;
        $product->save();
      }

    } catch (Exception $e) {

      throw new Exception('Error in saving product: ' . $e->getMessage());
    }
    $data2 = [

      'msg' => 'New Product Has Been Added On ' . trans('app.name'),
      'link' => '' . trans('app.url'),
      'button-name' => 'GO',
      'product-name' => $request['name'],
      'description' => $request['description'],

    ];


    return redirect()->back()->with('success', 'Product successfully created!');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = $this->product->getById($id);
    $size_chart = SizeChart::where('product_id', $id)->first();
    if ($size_chart) {
      $product->v1 = $size_chart->v1;
      $product->v2 = $size_chart->v2;
      $product->v3 = $size_chart->v3;
      $product->v4 = $size_chart->v4;
      $product->v5 = $size_chart->v5;
      $product->v6 = $size_chart->v6;

      $product->w1 = $size_chart->w1;
      $product->w2 = $size_chart->w2;
      $product->w3 = $size_chart->w3;
      $product->w4 = $size_chart->w4;
      $product->w5 = $size_chart->w5;
      $product->w6 = $size_chart->w6;

      $product->x1 = $size_chart->x1;
      $product->x2 = $size_chart->x2;
      $product->x3 = $size_chart->x3;
      $product->x4 = $size_chart->x4;
      $product->x5 = $size_chart->x5;
      $product->x6 = $size_chart->x6;

      $product->y1 = $size_chart->y1;
      $product->y2 = $size_chart->y2;
      $product->y3 = $size_chart->y3;
      $product->y4 = $size_chart->y4;
      $product->y5 = $size_chart->y5;
      $product->y6 = $size_chart->y6;

      $product->z1 = $size_chart->z1;
      $product->z2 = $size_chart->z2;
      $product->z3 = $size_chart->z3;
      $product->z4 = $size_chart->z4;
      $product->z5 = $size_chart->z5;
      $product->z6 = $size_chart->z6;

    }

    $categories = $this->category->getCategories();
    $selectedCategories = $product->categories()->get()->pluck('id')->toArray();
    $selectedSizes = json_decode($product->size);
    $sizes = Size::all();
    return view('backend.products.edit', compact('product', 'categories', 'selectedCategories', 'sizes', 'selectedSizes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   * @throws Exception
   */
  public function update(Request $request, $id)
  {

    try {
      if ($request->hasFile('view_chart')) {
        request()->validate([
          'view_chart' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->view_chart->getClientOriginalExtension();

        request()->view_chart->move(public_path('view_chart/'), $imageName);
      }

      $product = $this->product->update($id, $request->all());
      if ($request->hasFile('view_chart')) {
        // delete the old image
        if ($product->view_chart != '' && $product->view_chart != null) {
          $path = public_path() . "/view_chart/" . $product->view_chart;
          unlink($path);
        }
        $product->view_chart = $imageName;
        $product->save();

      }

    } catch (Exception $e) {

      throw new Exception('Error in saving product: ' . $e->getMessage());
    }

    return redirect()->back()->with('success', 'Product successfully updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\Response
   * @throws Exception
   */
  public function destroy($id)
  {
    try {

      $this->product->delete($id);

    } catch (Exception $e) {

      throw new Exception('Error in deleting product: ' . $e->getMessage());
    }

    return redirect()->back()->with('success', 'Product successfully deleted!');
  }

  public function getProductsJson(Request $request)
  {


    $queryProduct = $request->input('product');
    $queryCategory = $request->input('category');


    if (isset($queryProduct) && !isset($queryCategory)) {

      $products = Product::where('name', 'like', "%" . $queryProduct . "%")
        ->where('status', '=', 1)->get();
    } elseif (isset($queryCategory)) {

      $products = Product::whereHas('categories', function ($query) use ($queryProduct, $queryCategory) {
        $query->where('categories.slug', $queryCategory);
        $query->where('products.name', 'like', '%' . $queryProduct . '%');
        $query->where('products.status', '=', 1);
      })->get();
    } else {
      $products = $this->product->getAll();
    }

    foreach ($products as $productKey => $productValue) {
      $products[$productKey]['price'] = $productValue->getPrice();
      $products[$productKey]['path'] = optional($productValue->getImageAttribute())->smallUrl;

    }

    return datatables($products)->toJson();
  }

  public function uploadImage(Request $request)
  {
    $image = $request->file('image');
    $tmpPath = str_split(strtolower(str_random(3)));
    $checkDirectory = '/uploads/product/images/' . implode('/', $tmpPath);

    $dbPath = $checkDirectory . '/' . $image->getClientOriginalName();

    $imageService = new ImageService();
    $image = $imageService->uploadProduct($image, $checkDirectory);

    $tmp = $this->_getTmpString();

    return view('backend.products.upload-image')
      ->with('image', $image)
      ->with('tmp', $tmp);
  }

  public function deleteImage(Request $request)
  {
    $collection = ProductImage::where('path', $request->input('path'))->get(['id']);

    ProductImage::destroy($collection->toArray());

    return response()->json([
      'success' => true,
      'message' => 'Image successfully deleted.',
    ]);
  }

  public function deleteFaq(Request $request)
  {
    $faq = ProductFaq::findOrFail($request->input('faq'));

    $faq->delete();

    return response()->json([
      'success' => true,
      'message' => 'Faq successfully deleted!!'
    ]);
  }

  public function deleteSpecification(Request $request)
  {
    $specification = ProductSpecification::findOrFail($request->input('specification'));

    $specification->delete();

    return response()->json([
      'success' => true,
      'message' => 'Specification successfully deleted!!'
    ]);
  }

    public function deleteColor(Request $request)
    {
        $color = ProductColor::findOrFail($request->input('color'));

        $color->delete();

        return response()->json([
            'success' => true,
            'message' => 'Color successfully deleted!!'
        ]);
    }

    public function deleteDownload(Request $request)
    {
        $download = ProductDownload::findOrFail($request->input('download'));

    $download->delete();

    return response()->json([
      'success' => true,
      'message' => 'Download successfully deleted!!'
    ]);
  }

  public function downloadFileUpload(Request $request)
  {
    $file = $this->uploadFile($request->file('file'));
    $fileName = route('welcome') . '/storage/downloads/' . $file;

    return response()->json([
      'success' => true,
      'fileName' => $fileName,
      'message' => 'File successfully uploaded!!'
    ]);
  }

  protected function uploadFile($file)
  {
    // Store file
    $path = Storage::put('public/downloads', $file, 'public');
    // Get stored file name
    $fileName = explode('public/downloads/', $path);

    // File name
    return $fileName[1];
  }

  public function _getTmpString($length = 6)
  {
    $pool = 'abcdefghijklmnopqrstuvwxyz';

    return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
  }

  public function searchProduct(Request $request)
  {
    $term = trim($request->input('q'));
    if (empty($term)) {
      return response()->json([], 200);
    }

    $products = DB::table('products')->where('name', 'like', '%' . $term . '%')->orderBy('name')->take(15)->get();

    $formattedProducts = [];

    foreach ($products as $productKey => $productValue) {
      $formattedProducts[] = ['id' => $productValue->id, 'text' => $productValue->name];
    }

    return response()->json($formattedProducts, 200);

  }
}