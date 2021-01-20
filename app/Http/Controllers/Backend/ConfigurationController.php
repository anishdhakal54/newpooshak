<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Configuration;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use File;
use Illuminate\Http\Request;
use Storage;

class ConfigurationController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function getConfiguration()
    {
        $categories = [
                'Latest' => 'Latest Products',
                'Featured' => 'Featured Products'
            ] + Category::pluck('name', 'name')->toArray();


        $selectedCategories_1 = getConfiguration('products_section_1');
        $selectedCategories_2 = getConfiguration('products_section_2');
        $selectedCategories_3 = getConfiguration('products_section_3');
        $selectedCategories_4 = getConfiguration('products_section_4');


        return view('backend.settings.index')->with([
            'categories' => $categories,
            'selectedCategories_1' => json_decode($selectedCategories_1),
            'selectedCategories_2' => json_decode($selectedCategories_2),
            'selectedCategories_3' => json_decode($selectedCategories_3),
            'selectedCategories_4' => json_decode($selectedCategories_4),
        ]);
    }

    public function postConfiguration(Request $request)
    {
//        dd($request->all());
        $inputs = $request->only(
            'ribbon_text',
            'site_title',
            'site_description',
            'site_primary_email',
            'site_secondary_email',
            'site_primary_phone',
            'site_secondary_phone',
            'site_address',
            'order_email',
            'site_logo',
            'site_favicon',
            'products_section_1',
            'products_section_2',
            'products_section_3',
            'products_section_4',
            'facebook_link',
            'twitter_link',
            'googleplus_link',
            'instagram_link',
            'linkedin_link',
            'snap_chat',
            'enable_tax',
            'tax_percentage',
            'who_we_are',
            'our_mission',
            'our_vision',
            'our_help',
            'our_support',
            'footer-logo',
            'footer_text',
            'payments_logo',
            'copyright',
            'keywords',
            'description',
            'ad1',
            'ad1_link',
            'ad2',
            'ad2_link',
            'ad3',
            'ad3_link',
            'ad4',
            'ad4_link',
            'ad5',
            'ad5_link',
            'ad6',
            'ad6_link',
            'login-img',
            'marker_title',
            'marker_description',
            'latitude',
            'longitude',
            'newsletter_text',
            'home_eng_content',
            'home_ne_content',
            'rewards',
          'shipping_amount',
          'expiry_time'
        );

        foreach ($inputs as $inputKey => $inputValue) {
            if ($inputKey == 'site_logo' || $inputKey == 'site_favicon' || $inputKey == 'footer-logo' || $inputKey == 'payments_logo' || $inputKey == 'ad'
                || $inputKey == 'ad1' || $inputKey == 'ad2' || $inputKey == 'ad3' || $inputKey == 'ad4' || $inputKey == 'ad5' || $inputKey == 'ad6') {
                $file = $inputValue;
                // Delete old file
                $this->deleteFile($inputKey);
                // Upload file & get store file name
                $fileName = $this->uploadFile($file);
                $inputValue = 'settings/' . $fileName;
            }

            if ($inputKey == 'products_section_1' || $inputKey == 'products_section_2' || $inputKey == 'products_section_3' || $inputKey == 'products_section_4') {
                $inputValue = json_encode($inputValue);
            }

            Configuration::updateOrCreate(['configuration_key' => $inputKey], ['configuration_value' => $inputValue]);
        }

        // Update tax
        $enableTax = !array_key_exists("enable_tax", $inputs) ? 0 : 1;
        Configuration::updateOrCreate(['configuration_key' => 'enable_tax'], ['configuration_value' => $enableTax]);

        return redirect()->back()->with('success', 'Settings successfully updated!!');
    }

    protected function uploadFile($file)
    {
        // Store file
        $path = Storage::put('public/settings', $file, 'public');
        // Get stored file name
        $fileName = explode('public/settings/', $path);

        // File name
        return $fileName[1];
    }

    protected function deleteFile($inputKey)
    {
        $configuration = Configuration::where('configuration_key', '=', $inputKey)->first();
        // Check if configuration exists
        if (null !== $configuration && $configuration->exists()) {
            $fullPath = storage_path('app/public') . '/' . $configuration->configuration_value;
            if (File::exists($fullPath)) {
                // File exists
                File::delete($fullPath);
            }
        }
    }
}
