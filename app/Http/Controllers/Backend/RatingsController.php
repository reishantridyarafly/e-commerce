<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CheckoutItem;
use App\Models\Checkouts;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RatingsController extends Controller
{
    public function index()
    {
        if (auth()->user()->type == 'Administrator') {
            if (request()->ajax()) {
                $products = Rating::with('user', 'product')->latest()->get();
                return DataTables::of($products)
                    ->addIndexColumn()
                    ->addColumn('nama', function ($data) {
                        return $data->user->first_name . ' ' . $data->user->last_name;
                    })
                    ->addColumn('product', function ($data) {
                        return $data->product->nama;
                    })
                    ->addColumn('ratings', function ($data) {
                        return $this->generateStarsHTML($data->rating);
                    })
                    ->addColumn('comment', function ($data) {
                        return $data->comment;
                    })
                    ->rawColumns(['ratings'])
                    ->make(true);
            }
        } else {
            if (request()->ajax()) {
                $products = DB::table('products')
                    ->leftJoin('ratings', function ($join) {
                        $join->on('products.id', '=', 'ratings.product_id')
                            ->where('ratings.user_id', '=', auth()->user()->id);
                    })
                    ->join('checkout_items', 'products.id', '=', 'checkout_items.product_id')
                    ->join('checkouts', 'checkout_items.checkout_id', '=', 'checkouts.id')
                    ->join('users', 'checkouts.user_id', '=', 'users.id')
                    ->select(
                        'products.id',
                        'products.nama',
                        'users.first_name as first_name',
                        'users.last_name as last_name',
                        'ratings.rating as rating',
                        'ratings.comment as comment'
                    )
                    ->where('checkouts.status', '=', 'completed')
                    ->where('checkouts.user_id', '=', auth()->user()->id)
                    ->groupBy('products.id', 'products.nama', 'users.first_name', 'users.last_name', 'ratings.rating', 'ratings.comment')
                    ->get();

                return DataTables::of($products)
                    ->addIndexColumn()
                    ->addColumn('nama', function ($data) {
                        return $data->first_name . ' ' . $data->last_name;
                    })
                    ->addColumn('product', function ($data) {
                        return $data->nama;
                    })
                    ->addColumn('ratings', function ($data) {
                        return $this->generateStarsHTML($data->rating);
                    })
                    ->addColumn('comment', function ($data) {
                        return $data->comment;
                    })
                    ->addColumn('aksi', function ($data) {
                        $btn = '';
                        if ($data->rating == '') {
                            $btn = '<button type="button" class="btn btn-warning btn-sm me-1" data-id="' . $data->id . '" data-product="' . $data->nama . '" id="btnRating"><i class="ri-star-line"></i> Rating</button>';
                        } else {
                            $btn = '<span class="badge badge-outline-primary rounded-pill">Sudah Rating</span>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['ratings', 'aksi'])
                    ->make(true);
            }
        }
        return view('backend.ratings.index');
    }

    public function generateStarsHTML($rating)
    {
        if ($rating === null) {
            $rating = 0;
        }

        $starsHTML = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $starsHTML .= '<i class="ri-star-fill star" data-rating="' . $i . '"></i>';
            } else {
                $starsHTML .= '<i class="ri-star-line star" data-rating="' . $i . '"></i>';
            }
        }
        return $starsHTML;
    }


    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'rating' => 'required',
                'comment' => 'required|string',
            ],
            [
                'rating.required' => 'Silakan isi rating terlebih dahulu!',
                'comment.required' => 'Silakan isi komen terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $contact = new Rating();
            $contact->user_id = auth()->user()->id;
            $contact->product_id = $request->id;
            $contact->rating = $request->rating;
            $contact->comment = $request->comment;
            $contact->save();
            return response()->json(['message' => 'Data berhasil disimpan']);
        }
    }
}
