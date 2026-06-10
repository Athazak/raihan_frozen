<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menampilkan semua barang
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        // Ambil barang beserta kategori
        $products = Product::with('category')
            ->latest()
            ->get();

        return view(
            'products.index',
            compact('products')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Form tambah barang
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        // Ambil seluruh kategori
        $categories = Category::all();

        return view(
            'products.create',
            compact('categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan barang baru
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi Input
        |--------------------------------------------------------------------------
        */
        $request->validate([

            // Nama barang
            'name' => 'required',

            // Kategori
            'category_id' => 'required',

            // Stok
            'stock' => 'required|numeric',

            // Minimum stok
            'minimum_stock' => 'required|numeric',

            // Satuan
            'unit' => 'required',

            // Harga jual
            'selling_price' => 'required|numeric',

            // Harga beli
            'purchase_price' => 'required|numeric',

            // Foto
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ], [

            'name.required' => 'Nama barang wajib diisi.',

            'category_id.required' => 'Kategori wajib dipilih.',

            'stock.required' => 'Stok wajib diisi.',

            'minimum_stock.required' => 'Minimum stok wajib diisi.',

            'unit.required' => 'Satuan wajib diisi.',

            'selling_price.required' => 'Harga jual wajib diisi.',

            'purchase_price.required' => 'Harga beli wajib diisi.',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Foto
        |--------------------------------------------------------------------------
        */

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request
                ->file('photo')
                ->store(
                    'products',
                    'public'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan ke database
        |--------------------------------------------------------------------------
        */

        Product::create([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'photo' => $photoPath,

            'stock' => $request->stock,

            'minimum_stock' => $request->minimum_stock,

            'unit' => $request->unit,

            'selling_price' => $request->selling_price,

            'purchase_price' => $request->purchase_price,

            'weight_size' => $request->weight_size,

            'storage_location' => $request->storage_location,

            'description' => $request->description
        ]);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Barang berhasil ditambahkan'
            );
    }
    /*
|--------------------------------------------------------------------------
| Detail Barang
|--------------------------------------------------------------------------
*/
    public function show(Product $product)
    {
        return view(
            'products.show',
            compact('product')
        );
    }
    /*
|--------------------------------------------------------------------------
| Menampilkan Form Edit Barang
|--------------------------------------------------------------------------
*/
    public function edit(Product $product)
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return view(
            'products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }
    /*
|--------------------------------------------------------------------------
| Update Barang
|--------------------------------------------------------------------------
*/
    public function update(
        Request $request,
        Product $product
    ) {
        /*
    |--------------------------------------------------------------------------
    | Validasi Input
    |--------------------------------------------------------------------------
    */
        $request->validate([


            // Nama barang wajib
            'name' => 'required',

            // Kategori wajib
            'category_id' => 'required',

            // Stok wajib angka
            'stock' => 'required|numeric',

            // Satuan wajib diisi
            'unit' => 'required',

            // Harga jual wajib
            'selling_price' => 'required|numeric',

            // Harga beli wajib
            'purchase_price' => 'required|numeric',


            // Foto opsional
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        /*
    |--------------------------------------------------------------------------
    | Update Foto
    |--------------------------------------------------------------------------
    */

        $photoPath = $product->photo;

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($product->photo) {
                Storage::disk('public')
                    ->delete($product->photo);
            }

            // Upload foto baru
            $photoPath = $request
                ->file('photo')
                ->store(
                    'products',
                    'public'
                );
        }

        /*
    |--------------------------------------------------------------------------
    | Update Data
    |--------------------------------------------------------------------------
    */

        $product->update([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'photo' => $photoPath,

            'stock' => $request->stock,

            'minimum_stock' => $request->minimum_stock,

            'unit' => $request->unit,

            'selling_price' => $request->selling_price,

            'purchase_price' => $request->purchase_price,

            'weight_size' => $request->weight_size,

            'storage_location' => $request->storage_location,

            'description' => $request->description
        ]);

        return redirect()
            ->route(
                'products.show',
                $product->id
            )
            ->with(
                'success',
                'Barang berhasil diperbarui'
            );
    }
    /*
|--------------------------------------------------------------------------
| Hapus Barang
|--------------------------------------------------------------------------
*/
    public function destroy(Product $product)
    {
        /*
    |--------------------------------------------------------------------------
    | Hapus Foto Jika Ada
    |--------------------------------------------------------------------------
    */
        if ($product->photo) {
            Storage::disk('public')
                ->delete($product->photo);
        }

        /*
    |--------------------------------------------------------------------------
    | Hapus Data
    |--------------------------------------------------------------------------
    */
        $product->delete();

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Barang berhasil dihapus'
            );
    }
}
