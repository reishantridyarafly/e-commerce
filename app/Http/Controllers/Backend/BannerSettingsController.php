<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BannerSetting;
use App\Models\BannerSettings;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BannerSettingsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.bannerSettings.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'product' => 'required',
            ],
            [
                'title.required' => 'Silakan isi judul terlebih dahulu.',
                'product.required' => 'Silakan pilih produk terlebih dahulu.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $data = [
                'title' => $request->title,
                'product_id' => $request->product,
                'type' => $request->banner_id,
            ];

            $existingBanner = BannerSettings::where('type', $request->banner_id)->first();

            if ($existingBanner) {
                $existingBanner->update($data);
            } else {
                BannerSettings::create($data);
            }

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }
}
